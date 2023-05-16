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

    public function createDocument($title, $link, $description): bool
    {
        $this->db->query("INSERT INTO document (`name`, `linktoDoc`, `description`) VALUES (:title, :link, :description)");
        $this->db->bind(":title", $title);
        $this->db->bind(":link", $link);
        $this->db->bind(":description", $description);
        if ($this->db->execute())
            return true;
        return false;
    }
}

?>