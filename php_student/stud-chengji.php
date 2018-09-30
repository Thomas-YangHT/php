
<?php

echo " <html>  \n";
echo "<head>\n";
echo "  <meta charset='utf-8'>\n";
echo "  <meta name='viewport' content='width=device-width, initial-scale=1'>\n";
echo "  <title>CHENGJI Query</title>\n";
echo "  <link rel='stylesheet' href='css/jquery-ui.css'>\n";
echo "  <link rel='stylesheet' href='css/style.css'>\n";
echo "  <script src='js/jquery-1.12.4.js'></script>\n";
echo "  <script src='js/jquery-ui.js'></script>\n ";

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
echo "<body style='margin:0 auto;text-align:center;'>\n";
echo "</br>";
echo " <form id='form' name='form' method='post' action='$PHP_SELF'>\n";
echo " 班级: <input type='text' name='ClassName' id='ClassName' value='1807'>\n";
echo " 项目: <input type='text' name='TestLevel' id='TestLevel' value='1'>\n";
echo " 0-学生基本信息；1-计算机基础成绩；\n";
echo "   <input class='shiny-blue' type='submit' name='Submit' value='提交' />\n";
echo " </form>\n";

?>


<?php
     function make_safe($variable) {
      $variable = addslashes(trim($variable));
     return $variable;
     }
	 
     function ShowTable() {
		#print_r($_REQUEST);
        $ClassName=make_safe($_REQUEST["ClassName"]);
		$TestLevel=make_safe($_REQUEST["TestLevel"]);

     	$conn=mysql_connect("192.168.100.222","yanght","yanght")
		or die("无法连接数据库，请重来");
		
     	$ClassName = mysql_real_escape_string($ClassName);
		#$TestLevel = mysql_real_escape_string($TestLevel);
		
        mysql_select_db("students",$conn);
        mysql_query("SET NAMES utf8");

        $sql1="select a.name,b.* from base as a,chengji as b where a.stud_no=b.stud_no and a.stud_no like '".$ClassName."%'";
		$sql="select * from base order by stud_no";
	
		if ($TestLevel==1){$sql=$sql1;}
		#echo $sql;
		#if ($TestLevel==0){$sql=$sql;}
        $res=mysql_query($sql,$conn);
        $rows=mysql_affected_rows($conn);//获取行数
        $colums=mysql_num_fields($res);//获取列数

        echo "</br><div style='margin:0 auto;text-align:center;font-size:22px;font-family:SimHei;'>欢迎您使用数据查询，数据如下：(共计".$rows."行".$colums."列)"."</div></br>\n";
        echo "<table class='altrowstable' id='alternatecolor' style='margin:0 auto;align:center;'> <tr>\n";
		
        for($i=0; $i < $colums; $i++){
            $field_name=mysql_field_name($res,$i);
            echo "<th>".$field_name."</th>\n";
        }
        echo "</tr>\n";
        while($row=mysql_fetch_row($res)){
            echo "<tr>\n";
            for($i=0; $i<$colums; $i++){
              echo "<td>".$row[$i]."</td>\n";
            }
            echo "</tr>\n";
        }
        echo "</table>\n";

     }
	 
     ShowTable();
	 echo "</body>\n";
	 echo "</html> \n";
?>

