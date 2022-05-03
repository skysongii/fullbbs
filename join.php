<head>
	<link rel="stylesheet" href="./lib/css/style.css">
</head>
<body>
    <div id="regist_wrap" class="wrap">
        <div>
            <h1>Regist Form</h1>
            <form action="join_ok.php" method="post" name="regiform" id="regist_form" class="form" onsubmit="return sendit()">
                <p><input type="text" name="userid" id="userid" placeholder="ID"></p>
                <p><input type="password" name="userpw" id="userpw" placeholder="Password"></p>
                <p><input type="password" name="userpw_ch" id="userpw_ch" placeholder="Password Check"></p>
                <p><input type="text" name="username" id="username" placeholder="Name"></p>
                <p><input type="text" name="useremail" id="useremail" placeholder="E-mail"></p>
           
                <p><input type="submit" value="Sin Up" class="signup_btn"></p>
                <p class="pre_btn">Are you join? <a href="index.php">Login.</a></p>
            </form>
        </div>
    </div>
</body>

