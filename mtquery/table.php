<?php
session_start(); 
if(!isset($_SESSION['login_status']))    
	header('Location:login.html');
?>

<?php

echo " <html>  \n";
echo "<head>\n";
echo "  <meta charset='utf-8'>\n";
echo "  <meta name='viewport' content='width=device-width, initial-scale=1'>\n";
echo "  <title>MT Query</title>\n";
echo "  <link rel='stylesheet' href='css/jquery-ui.css'>\n";
echo "  <link rel='stylesheet' href='css/style.css'>\n";
echo "  <script src='js/jquery-1.12.4.js'></script>\n";
echo "  <script src='js/jquery-ui.js'></script>\n";

echo "  <script type='text/javascript'>\n";
echo "  $( function() {\n";
echo "    $( \"#datepicker\" ).datepicker({ dateFormat: \"yy-mm-dd\"  });\n";
echo "    $( \"#datepicker2\" ).datepicker({ dateFormat: \"yy-mm-dd\" });\n";
echo "  } );\n";

echo "  function CurentDate()\n";
echo "    { \n";
echo "        var now = new Date();\n";
echo "        var year = now.getFullYear();       //年\n";
echo "        var month = now.getMonth() + 1;     //月\n";
echo "        var day = now.getDate();            //日\n";
echo "        var clock = year + '-';\n";
echo "        if(month < 10)\n";
echo "            clock += '0';\n";
echo "        clock += month + '-';\n";
echo "        if(day < 10)\n";
echo "            clock += '0';\n";
echo "        clock += day + ' ';\n";
echo "        return(clock); \n";
echo "    } \n";
echo "  </script>\n";

echo " <script type='text/javascript'> \n";
echo " function altRows(id){           \n";
echo " 	if(document.getElementsByTagName){  \n";		
echo " 		var table = document.getElementById(id);  \n";
echo " 		var rows = table.getElementsByTagName(\"tr\");\n"; 		 
echo " 		for(i = 0; i < rows.length; i++){          \n";
echo " 			if(i % 2 == 0){                        \n";
echo " 				rows[i].className = 'evenrowcolor';\n";
echo " 			}else{                                 \n";
echo " 				rows[i].className = 'oddrowcolor'; \n";
echo " 			}      \n";
echo " 		}          \n";
echo " 	}              \n";
echo " }               \n";

echo " window.onload=function(){ \n";
echo " 	altRows('alternatecolor');\n";
echo " } \n";
echo " </script>\n";


echo "<!-- CSS goes in the document HEAD or added to your external stylesheet --> \n";
echo " <style type='text/css'> \n";
echo " table.altrowstable {\n";
echo " 	font-family: verdana,arial,sans-serif;\n";
echo " 	font-size:11px;\n";
echo " 	color:#333333;\n";
echo " 	border-width: 1px;\n";
echo " 	border-color: #a9c6c9;\n";
echo " 	border-collapse: collapse;\n";
echo " }\n";
echo " table.altrowstable th {\n";
echo " 	border-width: 1px;\n";
echo " 	padding: 8px;\n";
echo " 	border-style: solid;\n";
echo " 	border-color: #a9c6c9;\n";
echo " 	background-color:#ccd4d4;\n";
echo " }\n";
echo " table.altrowstable td {\n";
echo " 	border-width: 1px;\n";
echo " 	padding: 8px;\n";
echo " 	border-style: solid;\n";
echo " 	border-color: #a9c6c9;\n";
echo " }\n";
echo " .oddrowcolor{\n";
echo " 	background-color:#d4e3e5;\n";
echo " }\n";
echo " .evenrowcolor{\n";
echo " /*	background-color:#c3dde0; */\n";
echo " background-color:#ffffff;\n";
echo " }\n";
echo " .shiny-blue {\n";
echo "   background-color: #759ae9;\n";
echo "   background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #759ae9), color-stop(50%, #376fe0), color-stop(50%, #1a5ad9), color-stop(100%, #2463de));\n";
echo "   background-image: -webkit-linear-gradient(top, #759ae9 0%, #376fe0 50%, #1a5ad9 50%, #2463de 100%);\n";
echo "   background-image: -moz-linear-gradient(top, #759ae9 0%, #376fe0 50%, #1a5ad9 50%, #2463de 100%);\n";
echo "   background-image: -ms-linear-gradient(top, #759ae9 0%, #376fe0 50%, #1a5ad9 50%, #2463de 100%); \n";
echo "   background-image: -o-linear-gradient(top, #759ae9 0%, #376fe0 50%, #1a5ad9 50%, #2463de 100%);\n";
echo "   background-image: linear-gradient(top, #759ae9 0%, #376fe0 50%, #1a5ad9 50%, #2463de 100%);\n";
echo "   border-top: 1px solid #1f58cc;\n";
echo "   border-right: 1px solid #1b4db3;\n";
echo "   border-bottom: 1px solid #174299; \n";
echo "   border-left: 1px solid #1b4db3; \n";
echo "   border-radius: 4px; \n";
echo "   -webkit-box-shadow: inset 0 0 2px 0 rgba(57, 140, 255, 0.8);\n";
echo "   box-shadow: inset 0 0 2px 0 rgba(57, 140, 255, 0.8); \n";
echo "   color: #fff; \n";
echo "   font: bold 12px/1 'helvetica neue', helvetica, arial, sans-serif;\n";
echo "   padding: 7px 0; \n";
echo "   text-shadow: 0 -1px 1px #1a5ad9;\n";
echo "   width:50px;\n";
echo "    }\n";
echo " </style>\n";
echo " </head>\n";
echo "<body style='margin:0 auto;align:center;'>\n";
echo "</br>";
echo " <form id='form' name='form' method='post' action='$PHP_SELF'>\n";
echo " 开始时间: <input type='text' name='datepicker' id='datepicker' value='2016-07-22'>\n";
echo " 结束时间: <input type='text' name='datepicker2' id='datepicker2'  value=''>\n";
echo "   <input class='shiny-blue' type='submit' name='Submit' value='提交' />\n";
echo " </form>\n";
echo " <script>\n";
echo " document.getElementById('datepicker2').value=CurentDate();\n";
echo " </script>\n";
?>


<?php
     function make_safe($variable) {
      $variable = addslashes(trim($variable));
     return $variable;
     }
	 
     function ShowTable($table_name) {
		#print_r($_REQUEST);
        $starttime=make_safe($_REQUEST["datepicker"]);
        $endtime  =make_safe($_REQUEST["datepicker2"]); 
		#echo "start:".$starttime;
		#echo "end:".$endtime;
		$today = date("Y-m-d"); 
		
		if( empty($starttime) ) {$starttime=date("Y-m-d",strtotime("-21 day"));}
	    if( empty($endtime) ) {$endtime=$today;}
		
     	$conn=mysql_connect("120.92.5.253","log","KH22hX3Y83Ddq8az")
		or die("无法连接数据库，请重来");
		
     	$starttime = mysql_real_escape_string($starttime);
      $endtime   = mysql_real_escape_string($endtime);  
		
        mysql_select_db("test",$conn);
        mysql_query("SET NAMES GBK");
        #$sql="select * from $table_name where 渠道='".$_SESSION['channel']."'\n";
		#$sql.="and 日期<='".$endtime."' and 日期>='".$starttime."'\n";	
		#$sql="select * from $table_name  where `".iconv('UTF-8','GBK','渠道')."`='".$_SESSION['channel']."'\n";
		#$sql.="and ".iconv('UTF-8','GBK','日期')."<='".$endtime."' and ".iconv('UTF-8','GBK','日期').">='".$starttime."'\n";
    if(iconv('GBK','UTF-8',$_SESSION['channel'])=='%'){ 
		     $sql="select * from (";
		     $sql.=" select *,1 as px from $table_name  where ".iconv('UTF-8','GBK','渠道')."='".iconv('UTF-8','GBK','爱微游')."'"; 
			 $sql.=" union all";
			 $sql.=" select *,2 as px from $table_name  where ".iconv('UTF-8','GBK','渠道')."='".iconv('UTF-8','GBK','疯狂游乐场')."'";
			 $sql.=" union all";
			 $sql.=" select *,3 as px from $table_name  where ".iconv('UTF-8','GBK','渠道')."!='".iconv('UTF-8','GBK','爱微游')."' and ".iconv('UTF-8','GBK','渠道')."!='".iconv('UTF-8','GBK','疯狂游乐场')."'";
             $sql.=")as aaa ";
			 $sql.=" where ".iconv('UTF-8','GBK','日期')."<='".$endtime."' and ".iconv('UTF-8','GBK','日期').">='".$starttime."' ";
			 $sql.=" order by px,".iconv('UTF-8','GBK','渠道').",".iconv('UTF-8','GBK','日期');
		}else  if(iconv('GBK','UTF-8',$_SESSION['channel'])=='three'){ 
			 $sql="select * from $table_name  where (`".iconv('UTF-8','GBK','渠道')."`='20021' or `".iconv('UTF-8','GBK','渠道')."`='".iconv('UTF-8','GBK','山口山战记')."' or `".iconv('UTF-8','GBK','渠道')."`='".iconv('UTF-8','GBK','大力金刚')."')";
		     $sql.=" and ".iconv('UTF-8','GBK','日期')."<='".$endtime."' and ".iconv('UTF-8','GBK','日期').">='".$starttime."'";	
		     $sql.=" order by ".iconv('UTF-8','GBK','渠道').",".iconv('UTF-8','GBK','日期');	
		}else{
			 $sql="select * from $table_name  where `".iconv('UTF-8','GBK','渠道')."`='".$_SESSION['channel']."'";
		     $sql.=" and ".iconv('UTF-8','GBK','日期')."<='".$endtime."' and ".iconv('UTF-8','GBK','日期').">='".$starttime."'";
		}	
		#echo $sql;
		
        $res=mysql_query($sql,$conn);
        $rows=mysql_affected_rows($conn);//获取行数
        $colums=mysql_num_fields($res);//获取列数

        echo "</br><div style='margin:0 auto;align:center;font-size:22px;font-family:SimHei;'>欢迎您使用数据查询，".$_SESSION['user']."查询".iconv('GBK','UTF-8',$_SESSION['channel'])."的数据如下："."(共计".$rows."行".$colums."列)"."</div></br>\n";
        echo "<table class='altrowstable' id='alternatecolor' style='margin:0 auto;align:center;'> <tr>\n";
		
        for($i=0; $i < $colums-1; $i++){
            $field_name=mysql_field_name($res,$i);
			if($field_name==iconv('UTF-8','GBK','次存') or $field_name==iconv('UTF-8','GBK','三存') or $field_name==iconv('UTF-8','GBK','七存')  or $field_name==iconv('UTF-8','GBK','十五存') or $field_name==iconv('UTF-8','GBK','三十存')){ $field_name=$field_name.'%'; }
            echo "<th>".iconv('GBK','UTF-8',$field_name)."</th>\n";
        }
        echo "</tr>\n";
        while($row=mysql_fetch_row($res)){
            echo "<tr>\n";
            for($i=0; $i<$colums-1; $i++){
			  if($row[$i]!="" and ($i==6 or $i==7 or $i==8)){$row[$i]=round($row[$i],2);}
			  if($row[$i]!="" and ($i==6 or $i==14 or $i==15 or $i==16 or $i==17 or $i==18)){$row[$i]=iconv('GBK','UTF-8',$row[$i])."%";}
              echo "<td>".iconv('GBK','UTF-8',$row[$i])."</td>\n";
            }
            echo "</tr>\n";
        }
        echo "</table>\n";

     }
	 
     ShowTable("mteveryday");
	 echo "</body>\n";
	 echo "</html> \n";
?>

