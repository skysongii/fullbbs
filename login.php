<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="login_wrap">
    <div>
        <h1>로그인을 해주세요</h1>
        <form action="login_ok.php" method="post" id="login_form">
            <p><input type="text" name="userid" id="userid" placeholder="ID"></p>
            <p><input type="password" name="userpw" id="userpw" placeholder="Password"></p>
            <p><input type="button" value="Login" class="login_btn"><a href="login_ok.php"></a></p>
        </form>
        <p class="regist_btn">Not a member? &nbsp;<a href="join.php">Sign Up</a></p>
    </div>
</div>
</body>