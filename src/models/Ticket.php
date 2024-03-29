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
        $this->db->query("SELECT t.ticket_id, t.title, t.date_created,
                                 c.name category_name,
                                 u.first_name, u.last_name,
                                 s.name status_name 
                        FROM ticket t
                        INNER JOIN category c
                        ON t.category_id = c.category_id
                        INNER JOIN user u
                        ON t.user_id = u.user_id
                        INNER JOIN status s
                        ON t.status_id = s.status_id
                        ORDER BY t.date_created DESC"
        );
        return $this->db->resultSet();
    }

    /**
     * GET BY USER ID
     * @return array
     */
    public function getByUser($user_id): array
    {
        $this->db->query("SELECT t.*,
                                 c.name category_name,
                                 s.name status_name, s.description status_description 
                            FROM ticket t
                            INNER JOIN category c
                            ON t.category_id = c.category_id
                            INNER JOIN status s
                            ON t.status_id = s.status_id
                            WHERE user_id = :user_id
                            ORDER BY t.ticket_id ASC"
        );
        $this->db->bind(":user_id", $user_id);
        return $this->db->resultSet();
    }

    public function getOne($ticket_id): array
    {
        $this->db->query("SELECT t.*,
                                 c.name category_name,
                                 s.name status_name, s.description status_description 
                            FROM ticket t
                            INNER JOIN category c
                            ON t.category_id = c.category_id
                            INNER JOIN status s
                            ON t.status_id = s.status_id
                            WHERE ticket_id = :ticket_id
                            ORDER BY t.ticket_id ASC"
        );
        $this->db->bind(":ticket_id", $ticket_id);
        return (array) $this->db->single();
    }

    /**
     * CREATE
     * @return string|bool
     */
    public function createOne($user_id, $category_id, $title, $description): string|bool
    {
        $this->db->query("INSERT INTO ticket (`user_id`, `category_id`, `title`, `description`) VALUES (:user_id, :category_id, :title, :description)");
        $this->db->bind(":user_id", $user_id);
        $this->db->bind(":category_id", $category_id);
        $this->db->bind(":title", $title);
        $this->db->bind(":description", $description);
        if ($this->db->execute())
            return $this->db->lastInsertedID();
        return false;
    }

    /**
     * UPDATE
     * @return boolean
     */
    public function updateOne($ticket_id, $category_id, $title, $description)
    {
        $this->db->query("UPDATE ticket SET title = :title, category_id = :category_id, description = :description, date_updated = current_timestamp() WHERE ticket_id = :ticket_id");
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
    public function updateOneStatus($ticket_id, $status_id): bool
    {
        $this->db->query("UPDATE ticket SET status_id = :status_id WHERE ticket_id = :ticket_id");
        $this->db->bind(":ticket_id", $ticket_id);
        $this->db->bind(":status_id", $status_id);
        if ($this->db->execute())
            return true;
        return false;
    }
}