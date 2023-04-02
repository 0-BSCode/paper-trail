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
     * READ BY ID
     * @return user
     */
    public function getById($id): array|null
    {
        $this->db->query("SELECT id, username, email FROM user WHERE id = :id LIMIT 1");
        $this->db->bind(':id', $id);
        if ($this->db->execute())
            return $this->db->resultSet();
        return null;
    }

    /**
     * READ BY LOGIN CREDENTIALS
     * @return user
     */
    public function getByEmail($email): array
    {
        $this->db->query("SELECT id, username, email, password FROM user WHERE email = :email LIMIT 1");
        $this->db->bind(':email', $email);
        $res = (array) $this->db->single();
        return $res;
    }
}