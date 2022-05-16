<?php 
    include_once $_SERVER['DOCUMENT_ROOT']."/new_bbs/dbconfig.php";
	include_once "common.php"; 
	session_start();

	$select_query = "SELECT * FROM contents limit 10";
	// $select_result = $conn->query($select_query);
    // $row = $select_result->fetch_assoc();
	$select_result = mysqli_query($conn, $select_query);
	$row = mysqli_fetch_array($select_result);
	$ses_id = $_SESSION['login_id'];
	?>

<!doctype html>
<head>
	<meta charset="UTF-8">
	<title>게시판</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<div id="board_area"> 
		<h1>자유게시판</h1>
		<h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
		<? if($ses_id) { ?>
			<div style="float: right;" id="ok-login">
				<p><input type="button" value="로그아웃" class="login_btn" onclick=""></a></p>
			</div>
		<? } else { ?>
			<div style="float: right;" id="no-login">
				<p><input type="button" value="로그인" class="login_btn" onclick="location.href='login.php'"></a></p>
			</div>
		<? } ?>

		<table class="list-table">
	<thead>
		<tr>
			<th width="70">번호</th>
				<th width="500">제목</th>
				<th width="120">글쓴이</th>
				<th width="100">작성일</th>
				<th width="100">조회수</th>
			</tr>
		</thead>
		<tr>
			<?php
				while($row = mysqli_fetch_array($select_result))
				{
					//title변수에 DB에서 가져온 title을 선택
					$seq = $row['seq'];
					$title = $row['title'];
					$writer = $row['writer'];
					$write_date = $row['write_date'];
					$w_date = substr($write_date, 2, 14);
					$hits = $row['hits'];

					if(strlen($title)>30)
					{ 
						//title이 30을 넘어서면 ...표시
						$title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
					}
					?>
			<td width="70"><?= $seq; ?></td>
			<td width="500"><a href=""><?php echo $title;?></a></td>
			<td width="120"><?php echo $writer?></td>
			<td width="100"><?php echo $w_date?></td>
			<td width="100"><?php echo $hits; ?></td>
		</tr>
		<?php } ?>
		<!-- <input type=button value="글쓰기"><a href="/page/board/write.php"><button>글쓰기</button></a> -->
		
	</table>
	<div style="float: right;">
	<br>
		<input type="button" value="글쓰기" onclick="location.href='write.php'">
	</div>
</body>
</html>

<script>
	$(document).ready(function() {

	});

	function logout() {
		// <?= session_destroy();?>;
		location.reload();
	}
</script>