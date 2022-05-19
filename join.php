<?php
    include_once "common.php";
?>

<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="regist_wrap" class="wrap">
        <center>
        <div style="line-height:30px;">
            <h1>Regist Form</h1><br>
            <form action="join_ok.php" method="post" name="regiform" id="regist_form" class="form">
                <p>ID : <input type="text" name="userid" id="userid" placeholder="ID"> 
                <input type="button" value="중복확인" onclick="validationChk()";>
                </p><br>
                <p>PassWord : <input type="password" name="userpw" id="userpw" placeholder="Password" onkeyup="pwChk();"> 
            </p>
            <br>
            <div>PWCheck : <input type="password" name="userpw_ch" id="userpw_ch" placeholder="Password Check" onkeyup="pwChk();">
            <span id="okpw" style="font-size:12px; color:blue; display:none;" >
                비밀번호가 일치합니다.
                </span>
                <span id="nopw" style="font-size:12px; color:red; display:none;">
                    비밀번호가 일치하지 않습니다.
                </span>
            </div><br>
                <p>NAME : <input type="text" name="username" id="username" placeholder="Name"></p><br>
                <p>E-mail : <input type="text" name="useremail" id="useremail" placeholder="E-mail"></p><br>
                <p><input type="button" value="check" id="chk-btn" class="signup_btn" onclick="chkJoin();"></p>
                <p><input type="submit" value="Sin Up" id="sin-btn"class="signup_btn" style="display:none;"></p>
                <br><div>이미 가입되어 있으신가요? <input type="button" value="로그인" class="signup_btn" onclick="location.href='login.php'"></a></div>
            </form>
        </div>
        </center>
    </div>
</body>

<script>

    var chk_yn = 0;
    // 비밀번호 일치와 중복확인시에만 사인업 버튼 활성화
    function pwChk() {
        var original_pw = $("#userpw").val().trim();
        var chk_pw = $("#userpw_ch").val().trim();
        
        if(chk_yn >= 1) {
            if(original_pw != '' && chk_pw != '') {
                if(original_pw == chk_pw) {
                    $("#okpw").css("display","block");
                    $("#nopw").css("display","none");
                } else {
                    $("#nopw").css("display","block");
                    $("#okpw").css("display","none");
                    $("#sin-btn").css("display", "none");
                    $("#chk-btn").css("display", "block");
    
                }
            }
        }
    };

    // 아이디 중복확인
    function validationChk() {
        var user_id = $("#userid").val();
        
        // console.log(user_id);

        $.ajax({
            type: "post",
            url: "id_chk.php",
            data: {
                'ipt_id' : user_id 
            },
            success: function(data) {
                if(data == "false") {
                    alert("사용 가능한 아이디입니다.");
                    chk_yn += 1;
                    console.log(chk_yn);
                } else if(data == "empty") {
                    alert("아이디를 입력해주세요.");
                } else {
                    alert("이미 중복된 아이디입니다.");
                }
            },
        });
    }

    // 사인업 버튼 블락 전 체크
    function chkJoin() {
        let id  = $("#userid").val();           // 호이스팅 불가
        let pwd = $("#userpw").val();
        let pwd_chk = $("#userpw_ch").val();
        let name = $("#username").val().trim();
        let email = $("#useremail").val();

        if(chk_yn >= 1) {
            if(id && pwd && pwd_chk && name && email) {
                alert("sin up 버튼을 눌러주세요.");
                $("#sin-btn").css("display", "block");
                $("#chk-btn").css("display", "none");
            } else {
                alert("빈칸이 없도록 입력해주세요.");
                $("#sin-btn").css("display", "none");
            }
        } else {
            alert("아이디 중복확인을 해주세요.");
            $("#sin-btn").css("display", "none");
            $("#chk-btn").css("display", "block");
        }
    }
</script>