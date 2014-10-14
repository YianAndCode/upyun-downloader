<?php
/*
                   _ooOoo_
                  o8888888o
                  88" . "88
                  (| -_- |)
                  O\  =  /O
               ____/`---'\____
             .'  \\|     |//  `.
            /  \\|||  :  |||//  \
           /  _||||| -:- |||||-  \
           |   | \\\  -  /// |   |
           | \_|  ''\---/''  |   |
           \  .-\__  `-`  ___/-. /
         ___`. .'  /--.--\  `. . __
      ."" '<  `.___\_<|>_/___.'  >'"".
     | | :  `- `.;`\ _ /`;.`/ - ` : | |
     \  \ `-.   \_ __\ /__ _/   .-` /  /
======`-.____`-.___\_____/___.-`____.-'======
                   `=---='
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
         佛祖保佑       永无BUG
*/
    require 'config.php';
    session_start();

    if(!isset($_POST['captcha']))//未传递验证码
    {
        session_destroy(); //环保社会，节约资源
        exit(0);
    }

    if($_SESSION['captcha']==$_POST['captcha'])
    {
        $etime = time() + $available_time;
        $sign = substr(md5($key.'&'.$etime.'&'.$path), 12,8).$etime;
        session_destroy(); //环保社会，节约资源
        header("Location:".$url.$path."?_upt=".$sign) ;
        exit(0);
    }
    else
    {
        echo '<!DOCTYPE HTML><html><head><title>'. $filename .' - 下载' .'</title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /><link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\" /></head><body><div class=\"pop-wrap\"><table><tr><td><div class=\"pop\"><p class=\"big\">验证码都不对你下个毛线啊！</p><p><a href=\"index.php\">点此返回下载页</a></p></div></td></tr></table></div></body></html>';
    }
?>