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

    public function viewContactOne($params){
        view("Contacts/viewOne", ["contact" => $this->getContactOne($params['id'])], true);
    }
    public function editContact($params)
    {
        view("Contacts/update", ["contact" => $this->getContactOne($params['id'])], true);
    }
    public function delete(){
        view("Contact/delete", ["contacts"=>$this->deleteContact($_POST['contact_id'])], true);
    }

    public function __construct()
    {
        $this->contactModel = new ContactModel;
    }

    public function getContactOne($contact_id){
        return $this->contactModel->getOne($contact_id);

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

    public function updateContact($params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $this->contactModel->updateOne($params['id'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['contact_no']);
            header("Location: " . URLROOT . "/contact/" . $params['id'] . "/view-contact-one");

        }
    }

    public function deleteContact($contact_id)
    {
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $contact_id = $this->contactModel->deleteContact($_SESSION['user_id'], $_POST['contact_id']);
            header("Location: " . URLROOT . "/contact/view");

        }
    }

}


?>