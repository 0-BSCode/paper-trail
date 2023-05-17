<?php
namespace Models;

use \Models\Database;
class ContactModel{
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
        $this->db->query("SELECT * FROM contact");
        return $this->db->resultSet();
    }
    /**
     * CREATE
     * @return string|bool
     */
    public function createContact($user_id, $first_name, $last_name, $email, $contact_no): string|bool
    {
        $this->db->query("INSERT INTO contact (`first_name`, `last_name`, `email`, `contact_no`) VALUES (:first_name, :last_name, :email, :contact_no)");
        $this->db->bind(":first_name", $first_name);
        $this->db->bind(":last_name", $last_name);
        $this->db->bind(":email", $email);
        $this->db->bind(":contact_no", $contact_no);
        
        if ($this->db->execute())
            return $this->db->lastInsertedID();
        return false;
    }
    public function deleteContact($user_id, $contact_id): bool
    {
        $this->db->query("DELETE FROM contact WHERE contact_id = :contact_id");
        $this->db->bind(":contact_id", $contact_id);

        if ($this->db->execute())
            return true;
        return false;
    }

}

?>