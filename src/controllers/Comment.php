<?php
namespace Controllers;

@session_start();

use \Models\CommentModel;
use \Models\TicketModel;
use \Controllers\Notification;

class Comment
{
    private $commentModel;
    private $ticketModel;
    private $notificationController;

    public function __construct()
    {
        $this->commentModel = new CommentModel;
        $this->ticketModel = new TicketModel;
        $this->notificationController = new Notification;
    }

    public function createComment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->commentModel->createOne($_SESSION['user_id'], $_POST['ticket_id'], $_POST['description'])) {
            $ticket = $this->ticketModel->getOne($_POST['ticket_id']);
            $this->notificationController->createNotification('COMMENT', $ticket['ticket_id'], [$ticket['user_id']]);
            header("Location: " . URLROOT . "/ticket/" . $_POST['ticket_id'] . "/view-ticket");
        } else
            die(COMMENT_NOT_CREATED);
    }
}