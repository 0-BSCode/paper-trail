<?php
namespace Controllers;

@session_start();

use Models\Database;
use Models\ContactModel;


class Contact
{

    public $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel;
    }

    public function create()
    {
        view("Contacts/create", [], true);
    }

    public function index()
    {
        view("Contacts/index", ["contacts" => $this->getContacts()], true);
    }

    public function viewContact($params)
    {
        view("Contacts/view", ["contact" => $this->getContact($params['id'])], true);
    }

    public function editContact($params)
    {
        view("Contacts/update", ["contact" => $this->getContact($params['id'])], true);
    }

    public function getContacts(): array
    {
        return $this->contactModel->getAll();
    }

    public function getContact($contact_id)
    {
        return $this->contactModel->getOne($contact_id);
    }

    public function createContact()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contact_id = $this->contactModel->createOne($_SESSION['user_id'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['contact_no']);

            if (gettype($contact_id) === 'boolean') {
                die(CONTACT_NOT_CREATED);
            }

            header("Location: " . URLROOT . "/contact/index");
        }
    }

    public function updateContact($params)
    {
        if (
            $_SERVER['REQUEST_METHOD'] === 'POST' && $this->contactModel->updateOne($params['id'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['contact_no'])
        ) {
            header("Location: " . URLROOT . "/contact/" . $params['id'] . "/view-contact");
        } else {
            die(CONTACT_NOT_UPDATED);
        }
    }

    public function deleteContact()
    {
        if (
            $_SERVER['REQUEST_METHOD'] === 'POST' && $this->contactModel->deleteOne($_SESSION['user_id'], $_POST['contact_id'])
        ) {
            header("Location: " . URLROOT . "/contact/index");
        } else {
            die(CONTACT_NOT_DELETED);
        }
    }
}
?>