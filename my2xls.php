#!php
#example: php my2xls.php>tmp.xls
<?php
$DB_Server = "172.30.100.203";
$DB_Username = "sqladmin";
$DB_Password = "1234";
$DB_DBName = "neogeo_db";
$DB_TBLName = "t_characters";
$Connect = mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Couldn't connect.");
$Db = mysql_select_db($DB_DBName, $Connect) or die("Couldn't select database.");
$file_type = "vnd.ms-excel";
$file_ending = "xls";
header("Content-Type: application/$file_type");
header("Content-Disposition: attachment; filename=mydowns.$file_ending");
header("Pragma: no-cache");
header("Expires: 0");
$now_date = date('Y-m-d H:i');
$title = "数据库名:$DB_DBName,数据表:$DB_TBLName,备份日期:$now_date";
$sql = "Select * from $DB_TBLName";
$ALT_Db = mysql_select_db($DB_DBName, $Connect) or die("Couldn't select database");
$result = mysql_query($sql,$Connect) or die(mysql_error());
echo("$title\n");
$sep = "\t";
for ($i = 0; $i < mysql_num_fields($result); $i++) {
echo mysql_field_name($result,$i) . "\t";
}
print("\n");
$i = 0;
while($row = mysql_fetch_row($result))
{
$schema_insert = "";
for($j=0; $j<mysql_num_fields($result);$j++)
{
if(!isset($row[$j]))
   $schema_insert .= "NULL".$sep;
else if ($row[$j] != "")
   $schema_insert .= "$row[$j]".$sep;
else
   $schema_insert .= "".$sep;
}
$schema_insert = str_replace($sep."$", "", $schema_insert);
$schema_insert .= "\t";
print(trim($schema_insert));
print "\n";
$i++;
}
return (true);
?> 

 


