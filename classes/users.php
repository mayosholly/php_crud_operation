<?php

require_once('config.php');


class User extends Config
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $phone;
    //insert users into database

    public function __construct($id = 0,  $firstname = '', $lastname = '', $email = '', $phone = '')
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    public function getPhone()
    {
        return $this->phone;
    }

    public function insertData()
    {
        try {
            $sql = "INSERT INTO users(first_name, last_name, email, phone) VALUES(?, ?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$this->firstname, $this->lastname, $this->email, $this->phone]);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function fetchAll()
    {
        try {
            $sql = "SELECT * FROM users ORDER BY id DESC ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function fetchOne()
    {
        $sql = "SELECT * FROM users WHERE id = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->id]);
        return $stmt->fetchAll();
    }

    public function update()
    {
        try {
            $sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$this->firstname, $this->lastname, $this->email, $this->phone, $this->id]);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            $sql = "DELETE FROM users WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$this->id]);
            $stmt->fetchAll();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
