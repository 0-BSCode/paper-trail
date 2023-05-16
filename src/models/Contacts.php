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

    public function createContact($first_name, $last_name, $email, $contact_no): bool
    {
        $this->db->query("INSERT INTO contact (`first_name`, `last_name`, `email`, `contact_no`) VALUES (:first_name, :last_name, :email, :contact_no)");
        
        
        $this->db->bind(":first_name", $first_name);
        $this->db->bind(":last_name", $last_name);
        $this->db->bind(":email", $email);
        $this->db->bind(":contact_no", $contact_no);
        
        if ($this->db->execute())
            return true;
        return false;
    }
}

?>