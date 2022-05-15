<?php
    $conn = mysqli_connect("127.0.0.1", "sunho", "1234", "frontdb");
    $conn->set_charset("utf8");

    if(!$conn) {
        echo "실패";
    };