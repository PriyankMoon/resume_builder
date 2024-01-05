<?php
// this is for setting the default time 
date_default_timezone_set('Asia/Kolkata');
class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'resume_builder';
    private $db = null;

    function __construct() {
        $this->db = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Check for a successful connection
        if ($this->db->connect_error) {
            die('Connection failed: ' . $this->db->connect_error);
        }

        // Set the character set to utf8 (or any other preferred character set)
        $this->db->set_charset('utf8');
    }

    public function connect() {
        return $this->db;
    }
}

$db = new Database();
$db = $db->connect();
