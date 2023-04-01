<?php
namespace Models;

use \Models\Database;

class User
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
    public function createUser($username, $email, $password): bool
    {
        $this->db->query("INSERT INTO user (`username`, `email`, `password`) VALUES (:username, :email, :password)");
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        if ($this->db->execute())
            return true;
        return false;
    }

    /**
     * READ
     * @return user
     */
    public function getById($id): array|null
    {
        $this->db->query("SELECT username, email FROM user WHERE id = :id LIMIT 1");
        $this->db->bind(':id', $id);
        if ($this->db->execute())
            return $this->db->resultSet();
        return null;
    }
}