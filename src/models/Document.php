<?php
namespace Models;

use \Models\Database;

class DocumentModel
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
        $this->db->query("SELECT * FROM document");
        return $this->db->resultSet();
    }

    /**
     * GET BY USER ID
     * @return array
     */
    public function getOne($document_id): array
    {
        $this->db->query("SELECT * FROM document WHERE document_id = :document_id");
        $this->db->bind(":document_id", $document_id);
        return (array) $this->db->single();
    }

    /**
     * CREATE
     * @return string|bool
     */
    public function createOne($user_id, $name, $link, $description): string|bool
    {
        $this->db->query("INSERT INTO document (`name`, `link`, `description`) VALUES (:name, :link, :description)");
        $this->db->bind(":name", $name);
        $this->db->bind(":link", $link);
        $this->db->bind(":description", $description);
        if ($this->db->execute())
            return $this->db->lastInsertedID();
        return false;
    }

    /**
     * DELETE
     * @return bool
     */
    public function deleteOne($user_id, $document_id): bool
    {
        $this->db->query("DELETE FROM document WHERE document_id = :document_id");
        $this->db->bind(":document_id", $document_id);

        if ($this->db->execute())
            return true;
        return false;
    }

    /**
     * UODATE
     * @return boolean
     */
    public function updateOne($document_id, $name, $link, $description)
    {
        $this->db->query("UPDATE document SET name = :name, link = :link, description = :description WHERE document_id = :document_id");
        $this->db->bind(":document_id", $document_id);
        $this->db->bind(":name", $name);
        $this->db->bind(":link", $link);
        $this->db->bind(":description", $description);

        if ($this->db->execute())
            return true;
        return false;
    }
}
?>