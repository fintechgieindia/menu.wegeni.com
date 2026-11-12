<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AntiSpamService
{
    protected ?string $lastSpamReason = null;

    /**
     * Disposable / Temporary email domains to block.
     */
    protected array $disposableDomains = [
        'mailinator.com', 'tempmail.com', 'guerrillamail.com', '10minutemail.com',
        'sharklasers.com', 'trashmail.com', 'dispostable.com', 'getnada.com',
        'yopmail.com', 'burnermail.io', 'dropmail.me', 'crazymailing.com',
        'mytemp.email', 'fakemailgenerator.com', 'throwawaymail.com', 'tempail.com',
        'temp-mail.org', 'mohmal.com', 'nada.ltd', 'inboxkitten.com'
    ];

    /**
     * Common spam keywords / patterns.
     */
    protected array $spamKeywords = [
        'viagra', 'cialis', 'casino', 'poker', 'crypto trading', 'bitcoin investment',
        'seo ranking service', 'backlink blast', 'guest post outreach',
        'porn', 'adult webcam', 'escort service', 'payday loan', 'fast money'
    ];

    /**
     * Check if the incoming request is considered spam.
     */
    public function isSpam(Request $request, bool $checkTimeTrap = true): bool
    {
        // 1. Honeypot check
        if ($this->checkHoneypots($request)) {
            $this->logSpam($request, 'Honeypot field was filled');
            return true;
        }

        // 2. Time-trap check (submitted suspiciously fast or too late)
        if ($checkTimeTrap && $this->checkTimeTrap($request)) {
            $this->logSpam($request, 'Time-trap triggered (submitted too fast or token expired)');
            return true;
        }

        // 3. Disposable email check
        if ($this->checkDisposableEmail($request)) {
            $this->logSpam($request, 'Disposable/temporary email address detected');
            return true;
        }

        // 4. Content / Keyword / Script spam check
        if ($this->checkSpamContent($request)) {
            $this->logSpam($request, 'Spam content/pattern/excessive links detected');
            return true;
        }

        // 5. Google reCAPTCHA check (if configured and token present)
        if ($this->checkRecaptchaFailed($request)) {
            $this->logSpam($request, 'reCAPTCHA verification failed');
            return true;
        }

        return false;
    }

    /**
     * Check honeypot fields.
     */
    protected function checkHoneypots(Request $request): bool
    {
        $honeypotFields = [
            'last_name_check',
            'website_hp',
            'hp_email',
            'address_check',
            'phone_check'
        ];

        foreach ($honeypotFields as $field) {
            if ($request->filled($field)) {
                $this->lastSpamReason = "Honeypot field '{$field}' was filled";
                return true;
            }
        }

        return false;
    }

    /**
     * Check if form was submitted unnaturally fast (< 3 seconds) or after 24 hours.
     */
    protected function checkTimeTrap(Request $request): bool
    {
        if (!$request->has('_form_time')) {
            return false;
        }

        try {
            $timestamp = Crypt::decrypt($request->input('_form_time'));
            $elapsedSeconds = time() - (int)$timestamp;

            if ($elapsedSeconds < 3) {
                $this->lastSpamReason = "Form submitted too fast ({$elapsedSeconds}s)";
                return true;
            }

            if ($elapsedSeconds > 86400) {
                $this->lastSpamReason = "Form submission token expired ({$elapsedSeconds}s)";
                return true;
            }
        } catch (\Exception $e) {
            $this->lastSpamReason = "Invalid time-trap token";
            return true;
        }

        return false;
    }

    /**
     * Check for disposable or burner email domains.
     */
    protected function checkDisposableEmail(Request $request): bool
    {
        $email = $request->input('email');
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        $domain = strtolower(substr(strrchr($email, "@"), 1));

        if (in_array($domain, $this->disposableDomains)) {
            $this->lastSpamReason = "Disposable email domain: {$domain}";
            return true;
        }

        return false;
    }

    /**
     * Check message content for spam signatures (Cyrillic bot spam, spam keywords, excessive URLs).
     */
    protected function checkSpamContent(Request $request): bool
    {
        $fieldsToCheck = [
            'message', 'business_requirements', 'details', 'requirements',
            'company', 'name'
        ];

        $combinedText = '';
        foreach ($fieldsToCheck as $field) {
            if ($request->filled($field)) {
                $val = $request->input($field);
                if (is_string($val)) {
                    $combinedText .= ' ' . $val;
                }
            }
        }

        if (empty($combinedText)) {
            return false;
        }

        // A. Cyrillic / Russian script check
        if (preg_match('/[\x{0400}-\x{04FF}]/u', $combinedText)) {
            $this->lastSpamReason = "Cyrillic/Russian script detected in content";
            return true;
        }

        // B. Excessive links (> 2 URLs in inquiry message)
        $linkCount = preg_match_all('/https?:\/\//i', $combinedText);
        if ($linkCount > 2) {
            $this->lastSpamReason = "Excessive URLs found ({$linkCount} links)";
            return true;
        }

        // C. Spam keyword match
        $lowerText = strtolower($combinedText);
        foreach ($this->spamKeywords as $keyword) {
            if (str_contains($lowerText, $keyword)) {
                $this->lastSpamReason = "Spam keyword detected: '{$keyword}'";
                return true;
            }
        }

        return false;
    }

    /**
     * Verify reCAPTCHA with Google if configured.
     */
    protected function checkRecaptchaFailed(Request $request): bool
    {
        $secret = config('services.recaptcha.secret_key');
        if (empty($secret)) {
            return false;
        }

        if (!$request->has('g-recaptcha-response')) {
            return false;
        }

        try {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret'   => $secret,
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]);

            if (!$response->json('success')) {
                $this->lastSpamReason = "Google reCAPTCHA verification returned failure";
                return true;
            }
        } catch (\Exception $e) {
            Log::warning("reCAPTCHA API request error: " . $e->getMessage());
        }

        return false;
    }

    /**
     * Log spam attempts for auditing.
     */
    protected function logSpam(Request $request, string $reason): void
    {
        $this->lastSpamReason = $reason;
        Log::warning("[AntiSpam] Blocked spam submission: {$reason}", [
            'ip'         => $request->ip(),
            'url'        => $request->fullUrl(),
            'user_agent' => $request->userAgent(),
            'email'      => $request->input('email'),
        ]);
    }

    /**
     * Get the reason why the last check was flagged as spam.
     */
    public function getReason(): ?string
    {
        return $this->lastSpamReason;
    }

    /**
     * Generate an encrypted time token for inclusion in HTML forms.
     */
    public static function generateTimeToken(): string
    {
        return Crypt::encrypt(time());
    }
}
