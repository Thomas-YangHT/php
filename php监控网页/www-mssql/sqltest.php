<?
$server="61.189.20.137,1433";
$username="query";
$password="query)!!%";
$sqlconnect=mssql_connect($server, $username, $password);
$sqldb=mssql_select_db("sf_cna_gamedb",$sqlconnect);
$sqlquery="SELECT top 100 server_name,totcount FROM sf_game.cu_report;";
$results= mssql_query($sqlquery);
while ($row=mssql_fetch_array($results)){
echo $row['totcount']."<br>\n";}
mssql_close($sqlconnect);
showtbl_a();

function showtbl_a()  {
  echo "<table width='97%' border='0' align='center' cellpadding='2' cellspacing='1'>";
  echo "<tr height=15><td colspan=23 bgcolor='#5555FF'><p align='center'><font color=#FFFFCC>test</font></p></td>";
  echo "<td colspan=1><a href=></td></tr>";
  echo "<tr bgcolor='#AA99FF' height=12>";
  echo "<th scope='col'>日期</th>";
  echo "  			<th scope='col'>电信S0</th>";
  echo "			<th scope='col'>电信S1</th>";
  echo "			<th scope='col'>电信S2</th>";
  echo "			<th scope='col'>电信S3</th>";
  echo "			<th scope='col'>电信S4</th>";
  echo "			<th scope='col'>电信S5</th>";
  echo "			<th scope='col'>电信S6</th>";
  echo "			<th scope='col'>电信S7</th>";
  echo "			<th scope='col'>电信S8</th>";
  echo "			<th scope='col'>电信S9</th>";
  echo "			<th scope='col'>电信S10</th>";
  echo "			<th scope='col'>网通S0</th>";
  echo "			<th scope='col'>网通S1</th>";
  echo "			<th scope='col'>网通S2</th>";
  echo "			<th scope='col'>网通S3</th>";
  echo "			<th scope='col'>网通S4</th>";
  echo "			<th scope='col'>网通S5</th>";
  echo "			<th scope='col'>网通S6</th>";
  echo "			<th scope='col'>网通S7</th>";
  echo "			<th scope='col'>网通S8</th>";
  echo "			<th scope='col'>网通S9</th>";
  echo "			<th scope='col'>网通S10</th>";
  echo "</tr>";
}

?>

