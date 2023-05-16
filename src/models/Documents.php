<?php
namespace Models;

use \Models\Database;
class DocumentModel{
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
        $this->db->query("SELECT * FROM document");
        return $this->db->resultSet();
    }

    /**
     * CREATE
     * @return string|bool
     */
        
    public function createDocument($user_id, $name, $link, $description): string|bool
    {
        $this->db->query("INSERT INTO document (`name`, `link`, `description`) VALUES (:name, :link, :description)");
        $this->db->bind(":name", $name);
        $this->db->bind(":link", $link);
        $this->db->bind(":description", $description);
        if ($this->db->execute())
            return $this->db->lastInsertedID();
        return false;
    }
}

?>