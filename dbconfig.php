<?php
    $conn = mysqli_connect("localhost", "sunho", "1234", "frontdb");
    $conn->set_charset("utf8");

    if(!$conn) {
        echo "실패";
    } 