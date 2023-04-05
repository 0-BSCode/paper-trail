<?php
namespace Models;

use \Models\Database;

class Ticket
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * GET BY USER ID
     * @return array
     */
    public function getByUser($user_id): array
    {
        $this->db->query("SELECT * FROM ticket WHERE user user_id = :user_id");
        $this->db->bind(":user_id", $user_id);
        return $this->db->resultSet();
    }

    /**
     * CREATE
     * @return boolean
     */
    public function createTicket($user_id, $category_id, $title, $description)
    {
        $this->db->query("INSERT INTO ticket (`user_id`, `category_id`, `title`, `description`) VALUES (:user_id, :category_id, :title, :description)");
        $this->db->bind(":user_id", $user_id);
        $this->db->bind(":category_id", $category_id);
        $this->db->bind(":title", $title);
        $this->db->bind(":description", $description);
        if ($this->db->execute())
            return true;
        return false;
    }

    /**
     * UPDATE
     * @return boolean
     */
    public function changeTicketStatus($ticket_id, $status): bool
    {
        $this->db->query("UPDATE ticket SET status = :status WHERE id = :id");
        $this->db->bind(":status", $status);
        if ($this->db->execute())
            return true;
        return false;
    }
}