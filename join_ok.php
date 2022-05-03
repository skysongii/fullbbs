<?php
    include_once "dbconfig.php";

    $mb_id = $_POST['userid'];
    $mb_pw = $_POST['userpw'];
    $mb_name = $_POST['username'];
    $mb_email = $_POST['useremail'];

    $select_query = "SELECT * from member where id = '$mb_id'";
    $select_result = $conn->query($select_query);
    $row = $select_result->fetch_assoc();
    $row_id = $row['id'];
    echo $row_id;