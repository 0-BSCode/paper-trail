<?php
namespace Models;

use \Models\Database;

class StatusModel
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
        $this->db->query("SELECT * FROM status");
        return $this->db->resultSet();
    }
}