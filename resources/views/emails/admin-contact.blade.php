<p>Hello Geni Fast Team,</p>

<p>
    You have received a new inquiry through the Contact Us form on the website.
</p>

<p>
    Below are the submission details:
</p>

<p>
    <strong>Name:</strong> {{ $name }} <br>
    <strong>Email:</strong> {{ $email }} <br>
    <strong>Phone:</strong> {{ $phone }} <br>

    @if(!empty($company))
        <strong>Company:</strong> {{ $company }} <br>
    @endif

    @if(!empty($designation))
        <strong>Designation:</strong> {{ $designation }} <br>
    @endif

    @if(!empty($subject))
        <strong>Subject:</strong> {{ $subject }} <br>
    @endif
</p>
<p>
    <strong>Message:</strong><br>
    {{ $user_message }}
</p>

<p>
    <strong>Next Steps:</strong><br>
    • Review the message and categorize the enquiry <br>
    • Respond to the customer promptly <br>
    • Provide necessary follow-up information
</p>

<p>
    Thank you,<br>
    <strong>Geni Fast</strong>
</p>