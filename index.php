<?php 
	include_once $_SERVER['DOCUMENT_ROOT']."dbconfig.php"; 
	
	$select_query = "SELECT * FROM contents limit 10";
	$select_result = mysqli_query($conn, $select_query);
	$row = mysqli_fetch_assoc($select_result);
	
	
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
			</tr>
		</thead>
		<?php
		// board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
			while($row = $select_result->fetch_array())
			{
			//title변수에 DB에서 가져온 title을 선택
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
		<td width="70"><?php echo $board['idx']; ?></td>
		<td width="500"><a href=""><?php echo $title;?></a></td>
		<td width="120"><?php echo $board['name']?></td>
		<td width="100"><?php echo $board['date']?></td>
		<td width="100"><?php echo $board['hit']; ?></td>
		</tr>
	</tbody>
	<p><input type="button" value="Login" class="login_btn"><a href="login_ok.php"></a></p>
	<?php } ?>
	</table>
	<!-- <div id="write_btn"> -->
	<input type=button value="글쓰기"><a href="/page/board/write.php"><button>글쓰기</button></a>
	<!-- </div> -->
</div>
</body>
</html>