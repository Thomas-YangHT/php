<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<META http-equiv=refresh content=300>
<title>ʵʱ�������</title>

<script type="text/javascript">
function DateSelector(selYear, selMonth, selDay)
{
    this.selYear = selYear;
    this.selMonth = selMonth;
    this.selDay = selDay;
    this.selYear.Group = this;
    this.selMonth.Group = this;
    // ����ݡ��·������˵���Ӵ���onchange�¼��ĺ���
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

    if(arguments.length == 4) // ��������������Ϊ4�����һ����������ΪDate����
        this.InitSelector(arguments[3].getFullYear(), arguments[3].getMonth() + 1, arguments[3].getDate());
    else if(arguments.length == 6) // ��������������Ϊ6�����������������Ϊ��ʼ����������ֵ
        this.InitSelector(arguments[3], arguments[4], arguments[5]);
    else // Ĭ��ʹ�õ�ǰ����
    {
        var dt = new Date();
        this.InitSelector(dt.getFullYear(), dt.getMonth() + 1, dt.getDate());
    }
}

// ����һ�������ݵ�����
DateSelector.prototype.MinYear = 1900;

// ����һ�������ݵ�����
DateSelector.prototype.MaxYear = (new Date()).getFullYear();

// ��ʼ�����
DateSelector.prototype.InitYearSelect = function()
{
    // ѭ�����OPIONԪ�ص����select������
    for(var i = this.MaxYear; i >= this.MinYear; i--)
    {
        // �½�һ��OPTION����
        var op = window.document.createElement("OPTION");
        
        // ����OPTION�����ֵ
        op.value = i;
        
        // ����OPTION���������
        op.innerHTML = i;
        
        // ��ӵ����select����
        this.selYear.appendChild(op);
    }
}

// ��ʼ���·�
DateSelector.prototype.InitMonthSelect = function()
{
    // ѭ�����OPIONԪ�ص��·�select������
    for(var i = 1; i < 13; i++)
    {
        // �½�һ��OPTION����
        var op = window.document.createElement("OPTION");
        
        // ����OPTION�����ֵ
        op.value = i;
        
        // ����OPTION���������
        op.innerHTML = i;
        
        // ��ӵ��·�select����
        this.selMonth.appendChild(op);
    }
}

// ����������·ݻ�ȡ���µ�����
DateSelector.DaysInMonth = function(year, month)
{
    var date = new Date(year, month, 0);
    return date.getDate();
}

// ��ʼ������
DateSelector.prototype.InitDaySelect = function()
{
    // ʹ��parseInt������ȡ��ǰ����ݺ��·�
    var year = parseInt(this.selYear.value);
    var month = parseInt(this.selMonth.value);
    
    // ��ȡ���µ�����
    var daysInMonth = DateSelector.DaysInMonth(year, month);
    
    // ���ԭ�е�ѡ��
    this.selDay.options.length = 0;
    // ѭ�����OPIONԪ�ص�����select������
    for(var i = 1; i <= daysInMonth ; i++)
    {
        // �½�һ��OPTION����
        var op = window.document.createElement("OPTION");
        
        // ����OPTION�����ֵ
        op.value = i;
        
        // ����OPTION���������
        op.innerHTML = i;
        
        // ��ӵ�����select����
        this.selDay.appendChild(op);
    }
}

// ������ݺ��·�onchange�¼��ķ���������ȡ�¼���Դ���󣨼�selYear��selMonth��
// ����������Group���󣨼�DateSelectorʵ����������캯�����ṩ��InitDaySelect�������³�ʼ������
// ����eΪevent����
DateSelector.Onchange = function(e)
{
    var selector = window.document.all != null ? e.srcElement : e.target;
    selector.Group.InitDaySelect();
}

// ���ݲ�����ʼ�������˵�ѡ��
DateSelector.prototype.InitSelector = function(year, month, day)
{
    // �����ⲿ�ǿ��Ե�������������������������ҲҪ��selYear��selMonth��ѡ����յ�
    // ������ΪInitDaySelect�����Ѿ���������������˵����������Ͳ����ظ�������
    this.selYear.options.length = 0;
    this.selMonth.options.length = 0;
    
    // ��ʼ���ꡢ��
    this.InitYearSelect();
    this.InitMonthSelect();
    
    // �����ꡢ�³�ʼֵ
    this.selYear.selectedIndex = this.MaxYear - year;
    this.selMonth.selectedIndex = month - 1;
    
    // ��ʼ������
    this.InitDaySelect();
    
    // ����������ʼֵ
    this.selDay.selectedIndex = day - 1;
}
</script>
</head>
<body>

<script language=javascript>
var DS_x,DS_y;

function dateSelector() //����dateSelector��������ʵ��һ��������ʽ�����������
{
var myDate=new Date();
this.year=myDate.getFullYear(); //����year���ԣ���ݣ�Ĭ��ֵΪ��ǰϵͳ��ݡ�
this.month=myDate.getMonth()+1; //����month���ԣ��·ݣ�Ĭ��ֵΪ��ǰϵͳ�·ݡ�
this.date=myDate.getDate(); //����date���ԣ��գ�Ĭ��ֵΪ��ǰϵͳ���ա�
this.inputName=''; //����inputName���ԣ���������name��Ĭ��ֵΪ�ա�ע�⣺��ͬһҳ�г��ֶ����������򣬲������ظ���name��
this.display=display; //����display������������ʾ���������
}

function display() //����dateSelector��display����������ʵ��һ��������ʽ������ѡ���
{
var week=new Array('��','һ','��','��','��','��','��');

document.write("<style type=text/css>");
document.write(" .ds_font td,span { font: normal 12px ����; color: #000000; }");
document.write(" .ds_border { border: 1px solid #000000; cursor: hand; background-color: #DDDDDD }");
document.write(" .ds_border2 { border: 1px solid #000000; cursor: hand; background-color: #DDDDDD }");
document.write("</style>");

document.write("<input style='text-align:center;' id='DS_"+this.inputName+"' name='"+this.inputName+"' value='"+this.year+"-"+this.month+"-"+this.date+"' title=˫���ɽ��б༩ ondblclick='this.readOnly=false;this.focus()' onblur='this.readOnly=true' readonly>");
document.write("<button style='width:60px;height:18px;font-size:12px;margin:1px;border:1px solid #A4B3C8;background-color:#DFE7EF;' type=button onclick=this.nextSibling.style.display='block' onfocus=this.blur()>ѡ������</button>");

document.write("<div style='position:absolute;display:none;text-align:center;width:0px;height:0px;overflow:visible' onselectstart='return false;'>");
document.write(" <div style='position:absolute;left:-60px;top:20px;width:142px;height:165px;background-color:#F6F6F6;border:1px solid #245B7D;' class=ds_font>");
document.write(" <table cellpadding=0 cellspacing=1 width=140 height=20 bgcolor=#CEDAE7 onmousedown='DS_x=event.x-parentNode.style.pixelLeft;DS_y=event.y-parentNode.style.pixelTop;setCapture();' onmouseup='releaseCapture();' onmousemove='dsMove(this.parentNode)' style='cursor:move;'>");
document.write(" <tr align=center>");
document.write(" <td width=12% onmouseover=this.className='ds_border' onmouseout=this.className='' onclick=subYear(this) title='��С���'><<</td>");
document.write(" <td width=12% onmouseover=this.className='ds_border' onmouseout=this.className='' onclick=subMonth(this) title='��С�·�'><</td>");
document.write(" <td width=52%><b>"+this.year+"</b><b>��</b><b>"+this.month+"</b><b>��</b></td>");
document.write(" <td width=12% onmouseover=this.className='ds_border' onmouseout=this.className='' onclick=addMonth(this) title='�����·�'>></td>");
document.write(" <td width=12% onmouseover=this.className='ds_border' onmouseout=this.className='' onclick=addYear(this) title='�������'>>></td>");
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

document.write(" <span style=cursor:hand onclick=this.parentNode.parentNode.style.display='none'>���رա�</span>");
document.write(" </div>");
document.write("</div>");

dateShow(document.all("DS_"+this.inputName).nextSibling.nextSibling.childNodes[0].childNodes[2],this.year,this.month)
}

function subYear(obj) //��С���
{
var myObj=obj.parentNode.parentNode.parentNode.cells[2].childNodes;
myObj[0].innerHTML=eval(myObj[0].innerHTML)-1;
dateShow(obj.parentNode.parentNode.parentNode.nextSibling.nextSibling,eval(myObj[0].innerHTML),eval(myObj[2].innerHTML))
}

function addYear(obj) //�������
{
var myObj=obj.parentNode.parentNode.parentNode.cells[2].childNodes;
myObj[0].innerHTML=eval(myObj[0].innerHTML)+1;
dateShow(obj.parentNode.parentNode.parentNode.nextSibling.nextSibling,eval(myObj[0].innerHTML),eval(myObj[2].innerHTML))
}

function subMonth(obj) //��С�·�
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

function addMonth(obj) //�����·�
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

function dateShow(obj,year,month) //��ʾ���·ݵ���
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

function getvalue(obj,inputObj) //��ѡ������ڴ��������
{
var myObj=inputObj.nextSibling.nextSibling.childNodes[0].childNodes[0].cells[2].childNodes;
if(obj.innerHTML)
inputObj.value=myObj[0].innerHTML+"-"+myObj[2].innerHTML+"-"+obj.innerHTML;
inputObj.nextSibling.nextSibling.style.display='none';
for(i=0;i<obj.parentNode.parentNode.parentNode.cells.length;i++)
obj.parentNode.parentNode.parentNode.cells[i].className='';
obj.className='ds_border2'
}

function dsMove(obj) //ʵ�ֲ������
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
   SF������س��� 
      <font size="1">&nbsp;&nbsp;&nbsp;</font>
	<font size="2">V1.0 by Thomas 2007-4</font></b></font>
</p>

<hr color="#008080">


<form name="form1" method="post" action="<?=$PHP_SELF?>"> 


��
<script language=javascript>
var myDate1=new dateSelector();
myDate1.year--;
myDate1.inputName='start_date'; //ע����������������name��ͬһҳ����������򣬲��ܳ����ظ���name��
myDate1.display();
</script> 
 &nbsp; 
 ��
<script language=javascript>
var myDate2=new dateSelector();
myDate2.year--;
myDate2.inputName='end_date'; //ע����������������name��ͬһҳ����������򣬲��ܳ����ظ���name��
myDate2.display();
</script> 

        <select name="AreaName" id="AreaName">
	<option selected="selected" value="D1">����1</option>
	<option value="W1">��ͨ1</option>
         </select>

        <select name="Flag" id="Flag">
	<option value="1">�����ʺŵ�½��</option>
	<option value="2">Rankǰ10��</option>
	<option value="3">spǰ5��</option>
	<option selected="selected" value="4">10������������</option>
	<option value="5">30������������ʱ��</option>
	<option value="6">ƽ������ʱ��</option>
	<option value="7">��½����</option>
	<option value="8">��½����</option>
	<option value="9">��½IP��</option>
	<option value="10">�µ�½�ʺ�С��30����</option>

</select>
           
    <INPUT TYPE="submit" value="�ύ">
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
  print("<div align=center><font color=BLUE>������ʱ��: " . date("Y-m-d H:i:s") . ", ����ҳÿ5���Ӹ���һ��</font></div>");

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
  echo "<th scope='col'>����</th>";
  echo "  			<th scope='col'>����S0</th>";
  echo "			<th scope='col'>����S1</th>";
  echo "			<th scope='col'>����S2</th>";
  echo "			<th scope='col'>����S3</th>";
  echo "			<th scope='col'>����S4</th>";
  echo "			<th scope='col'>����S5</th>";
  echo "			<th scope='col'>����S6</th>";
  echo "			<th scope='col'>����S7</th>";
  echo "			<th scope='col'>����S8</th>";
  echo "			<th scope='col'>����S9</th>";
  echo "			<th scope='col'>����S10</th>";
  echo "			<th scope='col'>��ͨS0</th>";
  echo "			<th scope='col'>��ͨS1</th>";
  echo "			<th scope='col'>��ͨS2</th>";
  echo "			<th scope='col'>��ͨS3</th>";
  echo "			<th scope='col'>��ͨS4</th>";
  echo "			<th scope='col'>��ͨS5</th>";
  echo "			<th scope='col'>��ͨS6</th>";
  echo "			<th scope='col'>��ͨS7</th>";
  echo "			<th scope='col'>��ͨS8</th>";
  echo "			<th scope='col'>��ͨS9</th>";
  echo "			<th scope='col'>��ͨS10</th>";
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