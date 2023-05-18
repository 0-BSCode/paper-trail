<?php
namespace Controllers;

@session_start();

use \Models\NotificationEntityTypeModel;
use \Models\NotificationObjectModel;
use \Models\NotificationChangeModel;
use \Models\NotificationModel;

class Notification
{
    private $notificationEntityTypeModel;
    private $notificationObjectModel;
    private $notificationChangeModel;
    private $notificationModel;

    public function __construct()
    {
        $this->notificationEntityTypeModel = new NotificationEntityTypeModel;
        $this->notificationObjectModel = new NotificationObjectModel;
        $this->notificationChangeModel = new NotificationChangeModel;
        $this->notificationModel = new NotificationModel;
    }

    public function getNotifications($user_id): array
    {
        return $this->notificationModel->getByUser($user_id);
    }

    public function getTicketNotifications($ticket_id): array
    {
        return $this->notificationModel->getByTicket($ticket_id);
    }

    public function createNotification($action_type, $entity_id, $notifier_ids)
    {
        // Create notification object
        $entity_type = $this->notificationEntityTypeModel->getByActionType($action_type);

        $notification_object_id = $this->notificationObjectModel->createOne($entity_type['notification_entity_type_id'], $entity_id);

        if (gettype($notification_object_id) === 'boolean') {
            die();
        }

        // Create notification change
        $this->notificationChangeModel->createOne($notification_object_id, $_SESSION['user_id']);

        // Create notification
        foreach ($notifier_ids as $notifier_id) {
            $this->notificationModel->createOne($notification_object_id, $notifier_id);
        }
    }
}