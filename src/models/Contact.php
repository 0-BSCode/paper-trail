<?php
namespace Models;

use \Models\Database;

class ContactModel
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
        $this->db->query("SELECT * FROM contact");
        return $this->db->resultSet();
    }

    /**
     * GET ONE
     * @return array
     */
    public function getOne($contact_id): array
    {
        $this->db->query("SELECT * FROM contact WHERE contact_id = :contact_id");
        $this->db->bind(":contact_id", $contact_id);
        return (array) $this->db->single();
    }

    /**
     * CREATE
     * @return string|bool
     */
    public function createOne($user_id, $first_name, $last_name, $email, $contact_no): string|bool
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

    /**
     * DELETE
     * @return boolean
     */
    public function deleteOne($user_id, $contact_id): bool
    {
        $this->db->query("DELETE FROM contact WHERE contact_id = :contact_id");
        $this->db->bind(":contact_id", $contact_id);

        if ($this->db->execute())
            return true;
        return false;
    }

    /**
     * UPDATE
     * @return boolean
     */
    public function updateOne($contact_id, $first_name, $last_name, $email, $contact_no)
    {
        $this->db->query("UPDATE contact SET first_name= :first_name, last_name=:last_name, email = :email, contact_no = :contact_no WHERE contact_id = :contact_id");
        $this->db->bind(":contact_id", $contact_id);
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