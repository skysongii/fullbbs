<?php 
	// include_once $_SERVER['DOCUMENT_ROOT']."dbconfig.php"; 
	include_once "common.php"; 
	include_once "dbconfig.php";

	// $conn = mysqli_connect("127.0.0.1", "sunho", "1234" , "frontdb");
	$select_query = "SELECT * FROM contents limit 10";
	// $select_result = $conn->query($select_query);
    // $row = $select_result->fetch_assoc();
	$select_result = mysqli_query($conn, $select_query);
	$row = mysqli_fetch_array($select_result);
	// echo $row['title'];
	
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
	<table class="list-table">
	<thead>
		<tr>
			<th width="70">번호</th>
				<th width="500">제목</th>
				<th width="120">글쓴이</th>
				<th width="100">작성일</th>
				<th width="100">조회수</th>

				<input type="button" value="글쓰기" onclick="location.href='write.php'">
			</tr>
		</thead>

		<?php
			while($row = mysqli_fetch_array($select_result))
			{
				//title변수에 DB에서 가져온 title을 선택
				echo "<script>alert('$row')</script>";
				$seq = $row['seq'];
				$title = $row['title'];
				$writer = $row['writer'];
				$write_date = $row['write_date'];
				$hits = $row['hits'];
				if(strlen($title)>30)
				{ 
					//title이 30을 넘어서면 ...표시
					$title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
				}
				?>

	<tbody>
		<tr>
			<?= $seq;?>
		<td width="70"><?php echo $seq; ?></td>
		<td width="500"><a href=""><?php echo $title;?></a></td>
		<td width="120"><?php echo $writer?></td>
		<td width="100"><?php echo $write_date?></td>
		<td width="100"><?php echo $hits; ?></td>
		</tr>
	</tbody>
	<p><input type="button" value="Login" class="login_btn"><a href="login_ok.php"></a></p>
	<?php } ?>
	<!-- <input type=button value="글쓰기"><a href="/page/board/write.php"><button>글쓰기</button></a> -->

	</table>
	<!-- <div id="write_btn"> -->
	<!-- </div> -->
</div>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
</body>
</html>

<script>
	$(document).ready(function() {
		aa();
	});
	var title = "<?=$row?>";
	function aa() {
		console.log(title);
	}

</script>