<?php
namespace Controllers;

@session_start();

use \Models\TicketModel;

class Ticket
{
    private $ticketModel;
    public function __construct()
    {
        $this->ticketModel = new TicketModel;
    }

    public function tickets()
    {
        view("Tickets/index", $this->getTasks(), true);
    }

    public function create()
    {
        view("Tickets/create", [], true);
    }


    public function getTasks(): array
    {
        if ($_SESSION['role'] === 'organization') {
            return $this->ticketModel->getAll();
        } else {
            return $this->ticketModel->getByUser($_SESSION['user_id']);
        }
    }
}