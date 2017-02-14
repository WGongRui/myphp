<!DOCTYPE html>
<html lang="zh-cn">
	<head>
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<!-- 新 Bootstrap 核心 CSS 文件 -->
		<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
		<!-- 可选的Bootstrap主题文件（一般不用引入） -->
		<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
		<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
		<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<title>Index.html</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				
			</div>
			<div class="row">
				<?php 
					include_once "config.php";
					$var = 'a';

					if($var)
						echo "true";

					echo "<hr>";
					function aa() {
						// $var = 10;
						echo $GLOBALS['var'];
					}

					aa();
						echo "<br>";
					function bb(& $c) {
						$c .= "world";
					}

					$c = "date_isodate_set()";
					bb($c);
					echo $c;

					echo "<br>";
					echo db_Config :: db_url . "&nbsp;&nbsp;&nbsp;" . db_Config :: db_name;
				 ?>
			</div>
		</div>
	</body>
</html>