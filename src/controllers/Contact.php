<?php
namespace Controllers;

@session_start();

use Models\Database;
use Models\ContactModel;


class Contact{

    public $contactModel;
    public function create(){
        view("Contacts/create");
    }
    public function view(){
        view("Contacts/view", ["contacts" => $this->getContact()], true);
    }

    public function __construct()
    {
        $this->contactModel = new ContactModel;
    }

    public function getContact(): array
    {
        return $this->contactModel->getAll();
    }
    public function createContact()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contact_id = $this->contactModel->createContact($_SESSION['user_id'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['contact_no']);
            header("Location: " . URLROOT . "/contact/view");

        }
    }

}


?>