<?php
class Database
{
    private $host = 'localhost';
    private $db_name = 'f0426558_covid-stats';
    private $username = 'f0426558_root';
    private $password = 'lH6wG0zi';
    private $conn;

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            echo 'Connection Error:' . $err->getMessage();
        }

        return $this->conn;
    }
}
