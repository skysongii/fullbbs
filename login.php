<?php
    include_once "common.php";
    include_once "dbconfig.php";
?>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="login_wrap">
    <div style="text-align:center;">
    
            <h1>로그인을 해주세요</h1><br>
            <form action="login_ok.php" method="post" id="login_form">
                <p><input type="text" name="userid" id="userid" placeholder="ID" style="width:150px;">
                <!-- <input type="button" value="중복확인" onclick="validationChk()";> -->
                </p><br>
                <p><input type="password" name="userpw" id="userpw" placeholder="Password"></p><br>
                <p><input type="button" value="Login" class="login_btn" onclick="location.href='login_ok.php'";></p>
            </form>
            <br>
            <h3>회원이 아니신가요? <input type="button" value="회원가입" onclick="location.href='join.php'"></h3>
    </div>
</div>
</body>
<script>
    $(document).ready(function() {
        // validationChk();
    })

    // function validationChk() {
    //     var user_id = $("#userid").val();
        
    // }
</script>