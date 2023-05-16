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
        // echo "Documents/view";
        view("Contacts/view", [""], true);
    }

    public function __construct()
    {
        $this->contactModel = new ContactModel;

    }

}


?>