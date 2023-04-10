<?php
namespace Controllers;

@session_start();

use \Models\NotificationModel;

class Notification
{
    private $notificationModel;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel;
    }

    public function getNotifications($user_id): array
    {
        return $this->notificationModel->getByUser($user_id);
    }
}