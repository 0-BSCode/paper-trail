<?php
namespace Models;

use \Models\Database;

class NotificationEntityTypeModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * GET BY ID
     * @return array
     */
    public function getById($notification_entity_type_id): array
    {
        $this->db->query("SELECT * FROM notification_entity_type WHERE notification_entity_type_id = :notification_entity_type_id");
        $this->db->bind(":notification_entity_type_id", $notification_entity_type_id);
        return (array) $this->db->single();
    }

    /**
     * GET BY ACTION TYPE
     */
    public function getByActionType($action_type): array
    {
        $this->db->query("SELECT * FROM notification_entity_type WHERE action_type = :action_type");
        $this->db->bind(":action_type", $action_type);
        return (array) $this->db->single();
    }
}