<?php
namespace Models;

use \Models\Database;

class NotificationObjectModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * CREATE
     * @return string|bool
     */
    public function create($notification_entity_type_id, $entity_id): string|bool
    {
        $this->db->query("INSERT INTO notification_object (`notification_entity_type_id`, `entity_id`) VALUES (:notification_entity_type_id, :entity_id)");
        $this->db->bind(":notification_entity_type_id", $notification_entity_type_id);
        $this->db->bind(":entity_id", $entity_id);
        if ($this->db->execute())
            return $this->db->lastInsertedID();
        return false;
    }
}