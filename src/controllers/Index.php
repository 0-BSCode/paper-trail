<?php
namespace Controllers;

use \Controllers\Ticket;
use \Controllers\Notification;

@session_start();

class Index
{
  private $ticketController;
  private $notificationController;
  public function __construct()
  {
    $this->ticketController = new Ticket;
    $this->notificationController = new Notification;
  }

  public function home()
  {
    view('Index/home', ["ticket" => $this->ticketController->getTickets(), "update" => $this->notificationController->getNotifications($_SESSION['user_id'])], true);
  }
}