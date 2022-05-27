<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/new_bbs/dbconfig.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/new_bbs/common.php";
	
	$real_ip = $_SERVER['REMOTE_ADDR'];	// 게시물 조회 사용자 ip
    $seq = $_GET['seq'];    // URL 파라미터


    $select_query = "SELECT * FROM contents WHERE seq='$seq'";	// url 파라미터로 받은 게시물 데이터 불러오기
    $select_result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_array($select_result);

	$update_query = "UPDATE contents SET hits = hits + 1 WHERE seq = '$seq'";	// url 파라미터로 받은 게시물 조회수 1씩 증가
	$update_result = mysqli_query($conn, $update_query);

	$seq = $row['seq'];
	$title = $row['title'];
    $writer = $row['writer'];
    $write_date = $row['write_date'];
    $hits = $row['hits'];
    $content = $row['content'];

	$log_dir = $_SERVER['DOCUMENT_ROOT']."/new_bbs/log";
	$log_file = fopen($log_dir."/csh_".date("Ymd"), "a+");
	fwrite($log_file, "\r\n".date("Y-m-d H:i:s")."\r\n".$seq."번째 게시물 -> \r\n"."제목 : ".$title.
												"\r\n작성자 : ".$writer.
												"\r\n작성일 : ".$write_date.
												"\r\n내용 : ".$content.
												"\r\n조회수 : ".$hits.
												"\r\n조회 아이피 : ".$real_ip."\r\n");
	fclose($log_file);

?>

<!doctype html>
<head>
	<meta charset="UTF-8">
	<title>게시판</title>
	<link rel="stylesheet" type="text/css" href="style.css?ver=1" />
</head>
<body>
	
<!-- 글 불러오기 -->
<div id="board_read">
	<h2><?php echo $title; ?></h2>
		<div id="user_info">
			<div id="bo_line"></div>
				<span style="text-align:right";><p><h4>작성자 : <a style="color:blue;"><?=$writer; ?></a></h4></p></span>
				<span style="text-align:right";><p><h4>작성일 : <a style="color:blue;"><?=$write_date; ?></a></h4></p></span>
				<span style="text-align:right";><p><h4>조회수 : <a style="color:blue;"><?=$hits; ?></a></h4></p></span>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$content"); ?>
			</div>
	<!-- 목록, 수정, 삭제 -->
	<div id="bo_ser">
		<ul>
			<li><a href="index.php">[목록으로]</a></li>
			<li><a href="update.php?idx=<?php echo $seq; ?>">[수정]</a></li>
			<li><a href="delete.php?idx=<?php echo $seq; ?>">[삭제]</a></li>
		</ul>
	</div>
</div>
</body>
</html>