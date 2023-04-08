<?php
namespace Controllers;

@session_start();

use \Models\CommentModel;

class Comment
{
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = new CommentModel;
    }

    public function createComment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->commentModel->createOne($_SESSION['user_id'], $_POST['ticket_id'], $_POST['description']))
            header("Location: " . URLROOT . "/ticket/" . $_POST['ticket_id'] . "/view-ticket");
        else
            die(COMMENT_NOT_CREATED);
    }
}