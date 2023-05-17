<?php
namespace Controllers;

@session_start();

use Models\Database;
use Models\DocumentModel;


class Document{

    public $documentModel;
    public function create(){
        view("Documents/create");
    }

    public function view(){
        view("Documents/view", ["documents" => $this->getDocument()], true);
    }

    public function delete(){
        view("Document/delete", ["documents" =>$this->deleteDocument($_POST['document_id'])], true);
    }

    public function __construct()
    {
        $this->documentModel = new DocumentModel;
    }

    public function getDocument(): array
    {
        return $this->documentModel->getAll();
    }

    public function createDocument()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $document_id = $this->documentModel->createDocument($_SESSION['user_id'], $_POST['name'], $_POST['link'], $_POST['description']);
            header("Location: " . URLROOT . "/document/view");
        }
    }

    public function deleteDocument($document_id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $document_id = $this->documentModel->deleteDocument($_SESSION['user_id'], $_POST['document_id']);
            header("Location: " . URLROOT . "/document/view");

        }

    }



}


?>