<?php
namespace Controllers;

@session_start();

use \Models\TicketModel;
use \Models\CategoryModel;

class Ticket
{
    private $ticketModel;
    private $categoryModel;
    public function __construct()
    {
        $this->ticketModel = new TicketModel;
        $this->categoryModel = new CategoryModel;
    }

    public function tickets()
    {
        view("Tickets/index", $this->getTickets(), true);
    }

    public function viewTicket($params)
    {
        view("Tickets/view", $this->getTicket($params['id']), true);
    }

    public function create()
    {
        view("Tickets/create", $this->getCategories(), true);
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

    public function createTicket()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->ticketModel->createTicket($_SESSION['user_id'], $_POST['category_id'], $_POST['title'], $_POST['description']))
            header("Location: " . URLROOT);
        else
            die(TICKET_NOT_CREATED);
    }
}