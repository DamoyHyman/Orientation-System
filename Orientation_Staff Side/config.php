<?php
try
{
    $username = "dhyman2";
    $password = "Madmaix_123";
    $servername = "localhost";
        
    $conn = new PDO("mysql:host=$servername; dbname=dhyman2", trim($username), trim($password));
        
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>