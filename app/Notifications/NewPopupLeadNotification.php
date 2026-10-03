<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class NewPopupLeadNotification extends BaseNotification
{
    public $data;

    /**
     * Create a new notification instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'New Lead from Popup: ' . ($this->data['full_name'] ?? 'Unknown'),
            'data' => $this->data,
        ];
    }
}
