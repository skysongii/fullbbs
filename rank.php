<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/new_bbs/dbconfig.php";

    $select_query = "SELECT * FROM member";
    $select_result = mysqli_query($conn, $select_query);
    while($row = mysqli_fetch_array($select_result)) {
        
    }
