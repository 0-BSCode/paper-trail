<?php
namespace Controllers;

use \Controllers\Ticket;

@session_start();

class Index
{
  private $ticketController;
  public function __construct()
  {
    $this->ticketController = new Ticket;
  }

  public function home()
  {
    view('Index/home', $this->ticketController->getTickets(), true);
  }
}