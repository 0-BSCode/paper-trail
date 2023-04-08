<?php
namespace Models;

use \Models\Database;

class CommentModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * GET BY TICKET ID
     * @return array
     */
    public function getByTicket($ticket_id): array
    {
        $this->db->query("SELECT c.comment_id, c.ticket_id, c.description, c.date_created,
                                 u.first_name, u.last_name
                            FROM comment c
                            INNER JOIN user u
                            ON c.user_id = u.user_id
                            WHERE ticket_id = :ticket_id
                            ORDER BY c.date_created ASC");
        $this->db->bind(":ticket_id", $ticket_id);
        return $this->db->resultSet();
    }

    /**
     * CREATE
     * @return boolean
     */
    public function createOne($user_id, $ticket_id, $description): bool
    {
        $this->db->query("INSERT INTO comment (`user_id`, `ticket_id`, `description`) VALUES (:user_id, :ticket_id, :description)");
        $this->db->bind(":user_id", $user_id);
        $this->db->bind(":ticket_id", $ticket_id);
        $this->db->bind(":description", $description);
        if ($this->db->execute())
            return true;
        return false;
    }
}