<?php
namespace Models;

use \Models\Database;

class NotificationChangeModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * CREATE
     * @return bool
     */
    public function create($notification_object_id, $actor_id): bool
    {
        $this->db->query("INSERT INTO notification_change (`notification_object_id`, `actor_id`) VALUES (:notification_object_id, :actor_id)");
        $this->db->bind(":notification_object_id", $notification_object_id);
        $this->db->bind(":actor_id", $actor_id);
        if ($this->db->execute())
            return true;
        return false;
    }
}