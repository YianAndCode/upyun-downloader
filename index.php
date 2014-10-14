<!DOCTYPE HTML>
<html>
<head>
<title><?php require "config.php"; echo $filename.' - 下载'; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="pop-wrap">
    <table>
        <tr>
            <td>
                <div class="pop">
                	<form id="form_captcha" name="form_captcha" method="post" action="download.php">
                		<p>请输入验证码：<input type="text" name="captcha" id="captcha" class="form_font inputbox_captcha" /><br /><br />
                		<a href="javascript:refreshimg();"><img src="captcha.php" id="captcha_img" />&nbsp;看不清验证码
                		</a>
                		</p>
                		<input class="form_font" type="submit" value="下载文件" />
                	</form>
                </div>
            </td>
        </tr>
    </table>
</div>	
</body>
<script type="text/javascript">
	function refreshimg()
	{
		document.getElementById("captcha_img").src = "captcha.php"+'?'+new Date();
	}
</script>
</html>