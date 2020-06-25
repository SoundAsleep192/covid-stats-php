<?php

class PandemicDay
{
    private $conn;
    private $table = 'CovidGlobal';

    public $id;
    public $date_reported;
    public $country_code;
    public $country_name;
    public $who_region;
    public $new_cases;
    public $cumulative_cases;
    public $new_deaths;
    public $cumulative_deaths;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = 'SELECT * FROM ' . $this->table;

        $statement = $this->conn->prepare($query);

        $statement->execute();

        return $statement;
    }
}
