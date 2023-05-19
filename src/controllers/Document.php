<?php
namespace Controllers;

@session_start();

use Models\DocumentModel;

class Document
{

    public $documentModel;

    public function __construct()
    {
        $this->documentModel = new DocumentModel;
    }

    public function create()
    {
        view("Documents/create", [], true);
    }

    public function index()
    {
        view("Documents/index", ["documents" => $this->getDocuments()], true);
    }

    public function viewDocument($params)
    {
        view("Documents/view", ["document" => $this->getDocument($params['id'])], true);
    }

    public function editDocument($params)
    {
        view("Documents/update", ["document" => $this->getDocument($params['id'])], true);
    }

    public function getDocuments(): array
    {
        return $this->documentModel->getAll();
    }

    public function getDocument($document_id)
    {
        return $this->documentModel->getOne($document_id);
    }

    public function createDocument()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $document_id = $this->documentModel->createOne($_SESSION['user_id'], $_POST['name'], $_POST['link'], $_POST['description']);

            if (gettype($document_id) === 'boolean') {
                die(DOCUMENT_NOT_CREATED);
            }

            header("Location: " . URLROOT . "/document/index");
        }
    }

    public function updateDocument($params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->documentModel->updateOne($params['id'], $_POST['name'], $_POST['link'], $_POST['description'])) {
            header("Location: " . URLROOT . "/document/" . $params['id'] . "/view-document");
        } else {
            die(DOCUMENT_NOT_UPDATED);
        }
    }

    public function deleteDocument()
    {
        if (
            $_SERVER['REQUEST_METHOD'] === 'POST' && $this->documentModel->deleteOne($_SESSION['user_id'], $_POST['document_id'])
        ) {
            header("Location: " . URLROOT . "/document/index");
        } else {
            die(DOCUMENT_NOT_DELETED);
        }
    }
}
?>