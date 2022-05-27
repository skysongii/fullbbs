<?php
    include_once "dbconfig.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/new_bbs/common.php";


    $mb_id = $_POST['userid'];
    $mb_pw = $_POST['userpw'];

    $select_query = "SELECT id, AES_DECRYPT(UNHEX(pw), '$password') as pw from member where id = '$mb_id'";
    $select_result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_assoc($select_result);
    $row_mb_id = $row['id'];
    $row_mb_pw = $row['pw'];

    
    if($mb_id != '' || $mb_pw != '') {
        if($row_mb_id == $mb_id && $row_mb_pw == $mb_pw) { ?>
            <script>alert("로그인에 성공했습니다."); location.href="index.php"</script>
            <? session_start();
            $_SESSION['login_id'] = $mb_id;
        } else {?>
            <script>alert("로그인에 실패했습니다. 다시 한 번 확인해주세요."); history.back();</script>
            <?} 
    } else { ?>
        <script>alert("로그인에 실패했습니다. 다시 한 번 확인해주세요."); history.back();</script>
    <?}
    ?>