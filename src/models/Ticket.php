<?php
namespace Models;

use \Models\Database;

class TicketModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * GET ALL
     * @return array
     */
    public function getAll(): array
    {
        $this->db->query("SELECT * 
                        FROM ticket t
                        INNER JOIN category c
                        ON t.category_id = c.category_id
                        ORDER BY t.ticket_id ASC"
        );
        return $this->db->resultSet();
    }

    /**
     * GET BY USER ID
     * @return array
     */
    public function getByUser($user_id): array
    {
        $this->db->query("SELECT * 
                            FROM ticket t
                            INNER JOIN category c
                            ON t.category_id = c.category_id
                            WHERE user_id = :user_id
                            ORDER BY t.ticket_id ASC"
        );
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