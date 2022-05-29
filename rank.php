<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/new_bbs/dbconfig.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/new_bbs/header.php";
    

    $select_query = "SELECT name, point FROM member ORDER BY point DESC";
    $select_result = mysqli_query($conn, $select_query);
    while($row = mysqli_fetch_array($select_result)) {
        echo $row['name']."\n";
        echo $row['point']."<br>";
    }
