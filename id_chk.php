<?php
    // include_once "dbconfig.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/new_bbs/dbconfig.php";

    $ipt_id = $_POST['ipt_id'];
    $ipt_id = str_replace(" ", "", $ipt_id);    // 입력한 아이디 공백 제거

    $select_query = "SELECT id FROM member WHERE id='$ipt_id'";
    $select_result = mysqli_query($conn, $select_query);
    
    if(empty($ipt_id)) {
        echo "empty";
    } else {
        if($row = mysqli_fetch_assoc($select_result)) {
            echo "true";
        } else  {
            echo "false";
        }
    }
    


	

    
    