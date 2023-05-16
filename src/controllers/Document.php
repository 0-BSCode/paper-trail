<?php
namespace Controllers;


use Models\Database;
use Models\DocumentModel;


class Document{

    public $documentModel;
    public function create(){
        view("Documents/create");
    }

    public function view(){
        echo "Documents/view";
        view("Documents/view", [], true);
    }

    public function __construct()
    {
        $this->documentModel = new DocumentModel;

    }

}


?>