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
                        INNER JOIN user u
                        ON t.user_id = u.user_id
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

    public function getOne($ticket_id): array
    {
        $this->db->query("SELECT * 
                            FROM ticket t
                            INNER JOIN category c
                            ON t.category_id = c.category_id
                            WHERE ticket_id = :ticket_id
                            ORDER BY t.ticket_id ASC"
        );
        $this->db->bind(":ticket_id", $ticket_id);
        return (array) $this->db->single();
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
     * UODATE
     * @return boolean
     */
    public function updateTicket($ticket_id, $category_id, $title, $description)
    {
        $this->db->query("UPDATE ticket SET title = :title, category_id = :category_id, description = :description WHERE ticket_id = :ticket_id");
        $this->db->bind(":category_id", $category_id);
        $this->db->bind(":title", $title);
        $this->db->bind(":description", $description);
        $this->db->bind(":ticket_id", $ticket_id);
        if ($this->db->execute())
            return true;
        return false;
    }

    /**
     * UPDATE
     * @return boolean
     */
    public function updateTicketStatus($ticket_id, $status): bool
    {
        $this->db->query("UPDATE ticket SET status = :status WHERE ticket_id = :ticket_id");
        $this->db->bind(":ticket_id", $ticket_id);
        $this->db->bind(":status", $status);
        if ($this->db->execute())
            return true;
        return false;
    }
}