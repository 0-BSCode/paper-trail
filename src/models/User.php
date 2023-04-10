<?php
namespace Models;

use \Models\Database;

class UserModel
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
    public function createUser($first_name, $last_name, $email, $password): bool
    {
        $this->db->query("INSERT INTO user (`first_name`, `last_name`, `email`, `password`) VALUES (:first_name, :last_name, :email, :password)");
        $this->db->bind(':first_name', $first_name);
        $this->db->bind(':last_name', $last_name);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        if ($this->db->execute())
            return true;
        return false;
    }

    /**
     * READ BY ID
     * @return usermodel
     */
    public function getById($user_id): array
    {
        $this->db->query("SELECT user_id, first_name, last_name, email, role FROM user WHERE user_id = :user_id LIMIT 1");
        $this->db->bind(':user_id', $user_id);
        return (array) $this->db->single();
    }

    /**
     * READ BY EMAIL
     * @return usermodel
     */
    public function getByEmail($email): array
    {
        $this->db->query("SELECT user_id, first_name, last_name, email, password, role FROM user WHERE email = :email LIMIT 1");
        $this->db->bind(':email', $email);
        return (array) $this->db->single();
    }

    // TODO: Verify security
    /**
     * READ BY ROLE
     * @return 
     */
    public function getByRole($role): array
    {
        $this->db->query("SELECT user_id, first_name, last_name, email FROM user WHERE role = :role");
        $this->db->bind(':role', $role);
        return $this->db->resultSet();
    }
}