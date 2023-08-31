<?php


class DB_Connection
{
    protected $db_host = "localhost";
    protected $db_name = "flight";
    protected $db_user = "root";
    protected $db_pass = "";

    public function make_connection() {
        $connection = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        // Check connection
        if ($connection->connect_error) {
            return false;
        }
        return $connection;
    }

    public function db_connection_close(&$connection) {
        return $connection->close();
    }
}
