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
    
    if(!empty($row_id)) { ?>
        <script>alert("이미 가입된 회원 아이디입니다."); history.back();</script> 
    <?} else { ?>
        <script>alert("가입을 축하합니다!!"); location.href="login.php";</script>      
        <? $insert_query = "INSERT INTO member (id, pw, name, email) VALUES ('$mb_id', '$mb_pw', '$mb_name', '$mb_email')";
        $insert_result = $conn->query($insert_query);
    }?>