<?php
// Model.php


class Model
{
    protected $id;
    protected $db;

    // Constructor
    // public function __construct($id = null)
    // {
    //     $this->id = $id;
    //     var_dump('hw');
    //     // Connect to the database

    // }

    // Connect to the database
    protected function connectToDatabase()
    {

        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            // Set PDO to throw exceptions on errors
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Handle database connection error
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    // Getter for ID
    public function getId()
    {
        return $this->id;
    }

    // Setter for ID
    public function setId($id)
    {
        $this->id = $id;
    }
    private function closeDatabaseConnection()
    {
        $this->db = null;
    }
    public function __destruct()
    {
        $this->closeDatabaseConnection();
    }

    // You can include other common functionality shared by models here
}
