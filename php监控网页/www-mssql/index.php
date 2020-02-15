<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<META http-equiv=refresh content=300>
<title>实时人数监测</title>

<script type="text/javascript">
function DateSelector(selYear, selMonth, selDay)
{
    this.selYear = selYear;
    this.selMonth = selMonth;
    this.selDay = selDay;
    this.selYear.Group = this;
    this.selMonth.Group = this;
    // 给年份、月份下拉菜单添加处理onchange事件的函数
    if(window.document.all != null) // IE
    {
        this.selYear.attachEvent("onchange", DateSelector.Onchange);
        this.selMonth.attachEvent("onchange", DateSelector.Onchange);
    }
    else // Firefox
    {
        this.selYear.addEventListener("change", DateSelector.Onchange, false);
        this.selMonth.addEventListener("change", DateSelector.Onchange, false);
    }

    if(arguments.length == 4) // 如果传入参数个数为4，最后一个参数必须为Date对象
        this.InitSelector(arguments[3].getFullYear(), arguments[3].getMonth() + 1, arguments[3].getDate());
    else if(arguments.length == 6) // 如果传入参数个数为6，最后三个参数必须为初始的年月日数值
        this.InitSelector(arguments[3], arguments[4], arguments[5]);
    else // 默认使用当前日期
    {
        var dt = new Date();
        this.InitSelector(dt.getFullYear(), dt.getMonth() + 1, dt.getDate());
    }
}

// 增加一个最大年份的属性
DateSelector.prototype.MinYear = 1900;

// 增加一个最大年份的属性
DateSelector.prototype.MaxYear = (new Date()).getFullYear();

// 初始化年份
DateSelector.prototype.InitYearSelect = function()
{
    // 循环添加OPION元素到年份select对象中
    for(var i = this.MaxYear; i >= this.MinYear; i--)
    {
        // 新建一个OPTION对象
        var op = window.document.createElement("OPTION");
        
        // 设置OPTION对象的值
        op.value = i;
        
        // 设置OPTION对象的内容
        op.innerHTML = i;
        
        // 添加到年份select对象
        this.selYear.appendChild(op);
    }
}

// 初始化月份
DateSelector.prototype.InitMonthSelect = function()
{
    // 循环添加OPION元素到月份select对象中
    for(var i = 1; i < 13; i++)
    {
        // 新建一个OPTION对象
        var op = window.document.createElement("OPTION");
        
        // 设置OPTION对象的值
        op.value = i;
        
        // 设置OPTION对象的内容
        op.innerHTML = i;
        
        // 添加到月份select对象
        this.selMonth.appendChild(op);
    }
}

// 根据年份与月份获取当月的天数
DateSelector.DaysInMonth = function(year, month)
{
    var date = new Date(year, month, 0);
    return date.getDate();
}

// 初始化天数
DateSelector.prototype.InitDaySelect = function()
{
    // 使用parseInt函数获取当前的年份和月份
    var year = parseInt(this.selYear.value);
    var month = parseInt(this.selMonth.value);
    
    // 获取当月的天数
    var daysInMonth = DateSelector.DaysInMonth(year, month);
    
    // 清空原有的选项
    this.selDay.options.length = 0;
    // 循环添加OPION元素到天数select对象中
    for(var i = 1; i <= daysInMonth ; i++)
    {
        // 新建一个OPTION对象
        var op = window.document.createElement("OPTION");
        
        // 设置OPTION对象的值
        op.value = i;
        
        // 设置OPTION对象的内容
        op.innerHTML = i;
        
        // 添加到天数select对象
        this.selDay.appendChild(op);
    }
}

// 处理年份和月份onchange事件的方法，它获取事件来源对象（即selYear或selMonth）
// 并调用它的Group对象（即DateSelector实例，请见构造函数）提供的InitDaySelect方法重新初始化天数
// 参数e为event对象
DateSelector.Onchange = function(e)
{
    var selector = window.document.all != null ? e.srcElement : e.target;
    selector.Group.InitDaySelect();
}

// 根据参数初始化下拉菜单选项
DateSelector.prototype.InitSelector = function(year, month, day)
{
    // 由于外部是可以调用这个方法，因此我们在这里也要将selYear和selMonth的选项清空掉
    // 另外因为InitDaySelect方法已经有清空天数下拉菜单，因此这里就不用重复工作了
    this.selYear.options.length = 0;
    this.selMonth.options.length = 0;
    
    // 初始化年、月
    this.InitYearSelect();
    this.InitMonthSelect();
    
    // 设置年、月初始值
    this.selYear.selectedIndex = this.MaxYear - year;
    this.selMonth.selectedIndex = month - 1;
    
    // 初始化天数
    this.InitDaySelect();
    
    // 设置天数初始值
    this.selDay.selectedIndex = day - 1;
}
</script>
</head>
<body>

<script language=javascript>
var DS_x,DS_y;

function dateSelector() //构造dateSelector对象，用来实现一个日历形式的日期输入框。
{
var myDate=new Date();
this.year=myDate.getFullYear(); //定义year属性，年份，默认值为当前系统年份。
this.month=myDate.getMonth()+1; //定义month属性，月份，默认值为当前系统月份。
this.date=myDate.getDate(); //定义date属性，日，默认值为当前系统的日。
this.inputName=''; //定义inputName属性，即输入框的name，默认值为空。注意：在同一页中出现多个日期输入框，不能有重复的name！
this.display=display; //定义display方法，用来显示日期输入框。
}

function display() //定义dateSelector的display方法，它将实现一个日历形式的日期选择框。
{
var week=new Array('日','一','二','三','四','五','六');

document.write("<style type=text/css>");
document.write(" .ds_font td,span { font: normal 12px 宋体; color: #000000; }");
document.write(" .ds_border { border: 1px solid #000000; cursor: hand; background-color: #DDDDDD }");
document.write(" .ds_border2 { border: 1px solid #000000; cursor: hand; background-color: #DDDDDD }");
document.write("</style>");

document.write("<input style='text-align:center;' id='DS_"+this.inputName+"' name='"+this.inputName+"' value='"+this.year+"-"+this.month+"-"+this.date+"' title=双击可进行编缉 ondblclick='this.readOnly=false;this.focus()' onblur='this.readOnly=true' readonly>");
document.write("<button style='width:60px;height:18px;font-size:12px;margin:1px;border:1px solid #A4B3C8;background-color:#DFE7EF;' type=button onclick=this.nextSibling.style.display='block' onfocus=this.blur()>选择日期</button>");

document.write("<div style='position:absolute;display:none;text-align:center;width:0px;height:0px;overflow:visible' onselectstart='return false;'>");
document.write(" <div style='position:absolute;left:-60px;top:20px;width:142px;height:165px;background-color:#F6F6F6;border:1px solid #245B7D;' class=ds_font>");
document.write(" <table cellpadding=0 cellspacing=1 width=140 height=20 bgcolor=#CEDAE7 onmousedown='DS_x=event.x-parentNode.style.pixelLeft;DS_y=event.y-parentNode.style.pixelTop;setCapture();' onmouseup='releaseCapture();' onmousemove='dsMove(this.parentNode)' style='cursor:move;'>");
document.write(" <tr align=center>");
document.write(" <td width=12% onmouseover=this.className='ds_border' onmouseout=this.className='' onclick=subYear(this) title='减小年份'><<</td>");
document.write(" <td width=12% onmouseover=this.className='ds_border' onmouseout=this.className='' onclick=subMonth(this) title='减小月份'><</td>");
document.write(" <td width=52%><b>"+this.year+"</b><b>年</b><b>"+this.month+"</b><b>月</b></td>");
document.write(" <td width=12% onmouseover=this.className='ds_border' onmouseout=this.className='' onclick=addMonth(this) title='增加月份'>></td>");
document.write(" <td width=12% onmouseover=this.className='ds_border' onmouseout=this.className='' onclick=addYear(this) title='增加年份'>>></td>");
document.write(" </tr>");
document.write(" </table>");

document.write(" <table cellpadding=0 cellspacing=0 width=140 height=20 onmousedown='DS_x=event.x-parentNode.style.pixelLeft;DS_y=event.y-parentNode.style.pixelTop;setCapture();' onmouseup='releaseCapture();' onmousemove='dsMove(this.parentNode)' style='cursor:move;'>");
document.write(" <tr align=center>");
for(i=0;i<7;i++)
document.write(" <td>"+week[i]+"</td>");
document.write(" </tr>");
document.write(" </table>");

document.write(" <table cellpadding=0 cellspacing=2 width=140 bgcolor=#EEEEEE>");
for(i=0;i<6;i++)
{
document.write(" <tr align=center>");
for(j=0;j<7;j++)
document.write(" <td width=10% height=16 onmouseover=if(this.innerText!=''&&this.className!='ds_border2')this.className='ds_border' onmouseout=if(this.className!='ds_border2')this.className='' onclick=getvalue(this,document.all('DS_"+this.inputName+"'))></td>");
document.write(" </tr>");
}
document.write(" </table>");

document.write(" <span style=cursor:hand onclick=this.parentNode.parentNode.style.display='none'>【关闭】</span>");
document.write(" </div>");
document.write("</div>");

dateShow(document.all("DS_"+this.inputName).nextSibling.nextSibling.childNodes[0].childNodes[2],this.year,this.month)
}

function subYear(obj) //减小年份
{
var myObj=obj.parentNode.parentNode.parentNode.cells[2].childNodes;
myObj[0].innerHTML=eval(myObj[0].innerHTML)-1;
dateShow(obj.parentNode.parentNode.parentNode.nextSibling.nextSibling,eval(myObj[0].innerHTML),eval(myObj[2].innerHTML))
}

function addYear(obj) //增加年份
{
var myObj=obj.parentNode.parentNode.parentNode.cells[2].childNodes;
myObj[0].innerHTML=eval(myObj[0].innerHTML)+1;
dateShow(obj.parentNode.parentNode.parentNode.nextSibling.nextSibling,eval(myObj[0].innerHTML),eval(myObj[2].innerHTML))
}

function subMonth(obj) //减小月份
{
var myObj=obj.parentNode.parentNode.parentNode.cells[2].childNodes;
var month=eval(myObj[2].innerHTML)-1;
if(month==0)
{
month=12;
subYear(obj);
}
myObj[2].innerHTML=month;
dateShow(obj.parentNode.parentNode.parentNode.nextSibling.nextSibling,eval(myObj[0].innerHTML),eval(myObj[2].innerHTML))
}

function addMonth(obj) //增加月份
{
var myObj=obj.parentNode.parentNode.parentNode.cells[2].childNodes;
var month=eval(myObj[2].innerHTML)+1;
if(month==13)
{
month=1;
addYear(obj);
}
myObj[2].innerHTML=month;
dateShow(obj.parentNode.parentNode.parentNode.nextSibling.nextSibling,eval(myObj[0].innerHTML),eval(myObj[2].innerHTML))
}

function dateShow(obj,year,month) //显示各月份的日
{
var myDate=new Date(year,month-1,1);
var today=new Date();
var day=myDate.getDay();
var selectDate=obj.parentNode.parentNode.previousSibling.previousSibling.value.split('-');
var length;
switch(month)
{
case 1:
case 3:
case 5:
case 7:
case 8:
case 10:
case 12:
length=31;
break;
case 4:
case 6:
case 9:
case 11:
length=30;
break;
case 2:
if((year%4==0)&&(year%100!=0)||(year%400==0))
length=29;
else
length=28;
}
for(i=0;i<obj.cells.length;i++)
{
obj.cells[i].innerHTML='';
obj.cells[i].style.color='';
obj.cells[i].className='';
}
for(i=0;i<length;i++)
{
obj.cells[i+day].innerHTML=(i+1);
if(year==today.getFullYear()&&(month-1)==today.getMonth()&&(i+1)==today.getDate())
obj.cells[i+day].style.color='red';
if(year==eval(selectDate[0])&&month==eval(selectDate[1])&&(i+1)==eval(selectDate[2]))
obj.cells[i+day].className='ds_border2';
}
}

function getvalue(obj,inputObj) //把选择的日期传给输入框
{
var myObj=inputObj.nextSibling.nextSibling.childNodes[0].childNodes[0].cells[2].childNodes;
if(obj.innerHTML)
inputObj.value=myObj[0].innerHTML+"-"+myObj[2].innerHTML+"-"+obj.innerHTML;
inputObj.nextSibling.nextSibling.style.display='none';
for(i=0;i<obj.parentNode.parentNode.parentNode.cells.length;i++)
obj.parentNode.parentNode.parentNode.cells[i].className='';
obj.className='ds_border2'
}

function dsMove(obj) //实现层的拖移
{
if(event.button==1)
{
var X=obj.clientLeft;
var Y=obj.clientTop;
obj.style.pixelLeft=X+(event.x-DS_x);
obj.style.pixelTop=Y+(event.y-DS_y);
}
}
</script>


 <p align="left">
 <font color="#008080">
 <b>
   SF人数监控程序 
      <font size="1">&nbsp;&nbsp;&nbsp;</font>
	<font size="2">V1.0 by Thomas 2007-4</font></b></font>
</p>

<hr color="#008080">


<form name="form1" method="post" action="<?=$PHP_SELF?>"> 


从
<script language=javascript>
var myDate1=new dateSelector();
myDate1.year--;
myDate1.inputName='start_date'; //注意这里设置输入框的name，同一页中日期输入框，不能出现重复的name。
myDate1.display();
</script> 
 &nbsp; 
 到
<script language=javascript>
var myDate2=new dateSelector();
myDate2.year--;
myDate2.inputName='end_date'; //注意这里设置输入框的name，同一页中日期输入框，不能出现重复的name。
myDate2.display();
</script> 

        <select name="AreaName" id="AreaName">
	<option selected="selected" value="D1">电信1</option>
	<option value="W1">网通1</option>
         </select>

        <select name="Flag" id="Flag">
	<option value="1">日新帐号登陆数</option>
	<option value="2">Rank前10名</option>
	<option value="3">sp前5名</option>
	<option selected="selected" value="4">10分钟在线人数</option>
	<option value="5">30分钟以上在线时长</option>
	<option value="6">平均在线时长</option>
	<option value="7">登陆次数</option>
	<option value="8">登陆人数</option>
	<option value="9">登陆IP数</option>
	<option value="10">新登陆帐号小于30分钟</option>

</select>
           
    <INPUT TYPE="submit" value="提交">
  </p>
</FORM>

<hr color="#008080">


<?
$server="61.189.20.137,1433";
$username="query";
$password="query)!!%";
$sqlconnect=mssql_connect($server, $username, $password);
$sqldb=mssql_select_db("sf_cna_gamedb",$sqlconnect);
$sqlquery="SELECT top 100 server_name,totcount,tmdatetime FROM sf_game.cu_report where tmdatetime between $mydate1 and $mydate2 order by tmdatetime desc;";
$results= mssql_query($sqlquery);
#//while ($row=mssql_fetch_array($results)){
#//echo $row['totcount']."<br>\n";}
#//mssql_close($sqlconnect);

  
  $nowtime = date("Y-m-d H:i:s"); 
  print("<div align=center><font color=BLUE>最后更新时间: " . date("Y-m-d H:i:s") . ", 本网页每5分钟更新一次</font></div>");

  showtbl_a(); 
  while ($row=mssql_fetch_array($results)){
#      echo $row['totcount'];}
      showtbl($row['tmdatetime'],$row['totcount']);
      } 
  showtbl_b();
  echo "<BR>";
  
	
mssql_close($sqlconnect);




####
####
####

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


function showtbl($tmdatetime,$w_count0)  {
 // global $alarm;
 // global $sound;

  echo "<tr bgcolor='#339966' valign='middle' height=15>";
  echo "                        <th scope='col'>$tmdatetime</th>";
  echo "  			<th scope='col'>$count0</th>";
  echo "			<th scope='col'>$count1</th>";
  echo "			<th scope='col'>$count2</th>";
  echo "			<th scope='col'>$count3</th>";
  echo "			<th scope='col'>$count4</th>";
  echo "			<th scope='col'>$count5</th>";
  echo "			<th scope='col'>$count6</th>";
  echo "			<th scope='col'>$count7</th>";
  echo "			<th scope='col'>$count8</th>";
  echo "			<th scope='col'>$count9</th>";
  echo "			<th scope='col'>$count10</th>";
  echo "			<th scope='col'>$w_count0</th>";
  echo "			<th scope='col'>$w_count1</th>";
  echo "			<th scope='col'>$w_count2</th>";
  echo "			<th scope='col'>$w_count3</th>";
  echo "			<th scope='col'>$w_count4</th>";
  echo "			<th scope='col'>$w_count5</th>";
  echo "			<th scope='col'>$w_count6</th>";
  echo "			<th scope='col'>$w_count7</th>";
  echo "			<th scope='col'>$w_count8</th>";
  echo "			<th scope='col'>$w_count9</th>";
  echo "			<th scope='col'>$w_count10</th>";
  echo "</tr>";
}


function showtbl_b()  {
  echo "</table>";
}

?>

</body>
</html>