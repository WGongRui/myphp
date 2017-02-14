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
			<br>
			<?php
                const filetypes = ["aac","ace","ai","ain","amr","app","arj","asf","asp","aspx","av","avi","bin","bmp","cab","cad","cat","cdr","chm","com","css","cur","dat","db","dll","dmv","doc","dot","dps","dpt","dwg","dxf","emf","eps","et","ett","exe","fla","folder","ftp","gif","hlp","htm","html","icl","ico","img","inf","ini","iso","jpeg","jpg","js","m3u","max","mdb","mde","mht","mid","midi","mov","mp3","mp4","mpeg","mpg","msi","nrg","ocx","ogg","ogm","pdf","png","pot","ppt","psd","pub","qt","ra","ram","rar","rm","rmvb","rtf","swf","tar","tif","tiff","txt","unknown","url","vbs","vsd","vss","vst","wav","wave","wm","wma","wmd","wmf","wmv","wps","wpt","xls","xlt","xml","zip","php"];
				$url = $_SERVER["REQUEST_URI"];
				// 访问首页
				if($url == "/mypro/index.php") {
					list_files("");
				} else {
					$folder = base64_decode(isset($_GET["folder"]) ? $_GET["folder"] : "");
					if(strlen(trim($folder)) < 1) {
						list_files("");
					} else {
						if(file_exists(__DIR__ . "\\" . $folder)) {
							list_files($folder);
						} else {
							list_files("");
						}
					}
				}

				function list_files($folder) {
					$base = __DIR__ . $folder;
					$arr = scandir($base);
					$size = count($arr);
					// 先显示文件夹
					for($k = 0;$k < $size;$k++) {
					    if($arr[$k] == ".") continue;
                        if($arr[$k] == ".." && $base == __DIR__) continue;
                        $path = $base . "\\" . $arr[$k];
                        $path = str_replace("\\\\","\\",$path);
						if(is_dir($path)) {
                            if($arr[$k] == "..") {
                                dispaly_parent(substr($folder,0,strripos($folder,"\\")));
                            } else {
                                display($path,$folder,$arr[$k]);
                            }
                        }
					}
					// 显示文件
					for($k = 0;$k < $size;$k++) {
                        $path = $base . "\\" . $arr[$k];
						if(is_file($path)) {
							display($path,$folder,$arr[$k]);
						}
					}
				}
				//  显示上一级
                function dispaly_parent( $folder) {
                    echo "<a href ='index.php?folder=" . base64_encode($folder) . "'>&nbsp;";
                    echo "<img src='images/filetype/folder.gif'/>";
                    echo "&nbsp;&nbsp;返回上一级</a><br>";
                }

                function display($path,$folder,$file) {
					$temp = $folder . "\\" .$file;
					if(is_dir($path)) {
						echo "<a href ='index.php?folder=" . base64_encode($temp) . "'>&nbsp;";
						echo "<img src='images/filetype/folder.gif'/>";	
					} else {
						echo "<a href ='" . str_replace("\\","/",$temp) . "'>&nbsp;";
						echo "<img src='images/filetype/" . file_type_icon($file) . ".gif'/>";	
					}
					echo "&nbsp;&nbsp;" . $file . "</a><br>";
				}

				function file_type_icon($file) {
					if($pos = strrpos($file,".")) {
						$search = array_search(substr($file,$pos + 1),filetypes);
						if($search != false) {
							return filetypes[$search];
						}
					}
					return "unknown";
				}
			?>
		</div>
	</body>
</html>