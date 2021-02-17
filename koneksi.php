<?php
    $conn = new mysqli("localhost","root","","plant_identifierdb");
    if ($conn->connect_error) {
        die ($conn->connect_error);
    };
?>