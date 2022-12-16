<?php

class DatabaseController
{
    private mysqli $db;

    public function connectDatabase()
    {
        $this->db = new mysqli('db', 'root', 'test', 'web');
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS adverts(
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            titles VARCHAR(255) NOT NULL,
            name VARCHAR(255) NOT NULL,
            description VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL
        )";
        $this->db->query($sql);
    }

    public function setAdvert($titles, $name, $desc, $email)
    {
        $sql = "INSERT INTO adverts(titles, name, description, email) VALUES(
            '{$titles}',
            '{$name}',
            '{$desc}',
            '{$email}'
        )";
        $this->db->query($sql);
    }

    public function getAdvert()
    {
        $sql = "SELECT * FROM adverts";
        $result = $this->db->query($sql);
        return $result;
    }
}