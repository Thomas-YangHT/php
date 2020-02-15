
<html>
<head>
<meta http-equiv='Content-Type' content='text/html' charset='utf-8'>

<style type="text/css">

</style>
</head>

<body>
<div id="bigbox"  class="ceng">
<div id="banner" class="ceng"><img src="images/banner.gif" width="778" height="70" /></div>
<div id="main" class="ceng">

<div id="log">
<div id="yonghu">
<?php
function make_safe($variable) {
$variable = addslashes(trim($variable));
return $variable;
}
$user=make_safe($_REQUEST["user"]);
$pass=make_safe($_REQUEST["pass"]);

if ($user=="" or  $pass=="" )
{
      echo"你输入的信息有空,请<a href=\"login.html\">"."返回"."</a>重新输入";
}
else
{
    mysql_connect("localhost","root","mysqlstart0715")         /*请修改用户名和密码*/
    or die("无法连接数据库，请重来");
    mysql_select_db("cmdb")
    or die("无法选择数据库，请重来");
	$user = mysql_real_escape_string($user);
    $pass = mysql_real_escape_string($pass);
    mysql_query("SET NAMES 'GBK'");/*解决汉字*/
    $row = mysql_fetch_assoc(mysql_query(" SELECT password,name,channel FROM users where name = '$user' and password = '$pass'"));
    $mima=$row[password];
    
    if($pass == $mima)
    {
           session_start();
           $_SESSION['user']=$user;
		   $_SESSION['channel']=$row[channel];
           $_SESSION['login_status']=1;
           
          # echo "channel:".iconv('gbk','utf-8',$_SESSION['channel']).":".$row[channel];
		   echo "<script>alert('成功登陆')</script>";
           echo "<script>window.parent.location.href='index.html'; </script>"; 
		   
    }
    else
    {
            echo"你的用户名或者密码输入错误,请<a href=\"login.html\">"."返回"."</a>";
    }
}


?>

</div>

</div>

</div>

</div>
</body>
</html>