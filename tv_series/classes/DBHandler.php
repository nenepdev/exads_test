<?php

class DBHandler
{
    public function connect()
    {
        $conn = new mysqli('localhost', 'root', '', 'exads_test');

        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    public function close_connection($conn)
    {
        return($conn->close());
    }
}