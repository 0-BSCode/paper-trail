<?php
namespace Controllers;

@session_start();

use \Models\TicketModel;
use \Models\CategoryModel;
use \Models\CommentModel;
use \Models\StatusModel;
use \Models\UserModel;
use \Models\DocumentModel;
use \Controllers\Notification;

class Ticket
{
    private $ticketModel;
    private $categoryModel;
    private $statusModel;
    private $commentModel;
    private $userModel;
    private $documentModel;
    private $notificationController;

    public function __construct()
    {
        $this->ticketModel = new TicketModel;
        $this->categoryModel = new CategoryModel;
        $this->commentModel = new CommentModel;
        $this->statusModel = new StatusModel;
        $this->userModel = new UserModel;
        $this->documentModel = new DocumentModel;
        $this->notificationController = new Notification;
    }

    public function viewTicket($params)
    {
        view("Tickets/view", ["ticket" => $this->getTicket($params['id']), "comments" => $this->getComments($params['id']), "statuses" => $this->statusModel->getAll(), "updates" => $this->notificationController->getTicketNotifications($params["id"])], true);
    }

    public function editTicket($params)
    {
        view("Tickets/update", ["ticket" => $this->getTicket($params['id']), "categories" => $this->getCategories(), "comments" => $this->getComments($params['id']), "documents" => $this->getDocuments()], true);
    }

    public function create()
    {
        view("Tickets/create", ["categories" => $this->getCategories(), "documents" => $this->getDocuments()], true);
    }

    public function getTickets(): array
    {
        if ($_SESSION['role'] === 'organization') {
            return $this->ticketModel->getAll();
        } else {
            return $this->ticketModel->getByUser($_SESSION['user_id']);
        }
    }

    public function getTicket($ticket_id)
    {
        return $this->ticketModel->getOne($ticket_id);
    }

    public function getCategories(): array
    {
        return $this->categoryModel->getAll();
    }

    public function getComments($ticket_id): array
    {
        return $this->commentModel->getByTicket($ticket_id);
    }

    public function getDocuments(): array
    {
        return $this->documentModel->getAll();
    }

    public function createTicket()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ticket_id = $this->ticketModel->createOne($_SESSION['user_id'], $_POST['category_id'], $_POST['title'], $_POST['description']);

            if (gettype($ticket_id) === 'boolean') {
                die(TICKET_NOT_CREATED);
            }

            $organization_members = $this->userModel->getByRole('organization');
            $this->notificationController->createNotification('CREATE', $ticket_id, array_column($organization_members, 'user_id'));
            header("Location: " . URLROOT);
        }
    }

    public function updateTicket($params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->ticketModel->updateOne($params['id'], $_POST['category_id'], $_POST['title'], $_POST['description'])) {
            $organization_members = $this->userModel->getByRole('organization');
            $this->notificationController->createNotification('UPDATE', $params['id'], array_column($organization_members, 'user_id'));
            header("Location: " . URLROOT . "/ticket/" . $params['id'] . "/view-ticket");
        } else
            die(TICKET_NOT_UPDATED);
    }

    public function updateTicketStatus($params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->ticketModel->updateOneStatus($params['id'], $_POST['status_id'])) {
            $ticket = $this->ticketModel->getOne($params['id']);
            $this->notificationController->createNotification('STATUS', $ticket['ticket_id'], [$ticket['user_id']]);
            header("Location: " . URLROOT . "/ticket/" . $params['id'] . "/view-ticket");
        } else
            die(TICKET_NOT_UPDATED);
    }
}