<?php 
//�O�����r�g 
header("Refresh:600"); 
//���} 
$title = "�gӭʹ�����ŷ�����B�O�yϵ�y"; 
//ȡ�ìF�ڵ����ڕr�g,�K�D�Q�� 'YYYY �� M �� D ��' �ĸ�ʽ 
$date = date("Y �� m �� j ��",time()); 
//ȡ�ý��������, 0 �� '������' , 1 �� '����һ' , ... , 6 �� '������' 
$week = date("w",time()); 
//��в��,�����ֵ�����,�D�Q������ 
$weekday = array('������','����һ','���ڶ�','������','������','������','������'); 
//�@ʾ��� 
echo "<TABLE BORDER=20 WIDTH=900 ALIGN=CENTER BGCOLOR=#00ff00>"; 
//�@ʾ���} 
echo "<TR><TD ALIGN=CENTER COLSPAN=15 BGCOLOR=#cc44ff><FONT SIZE=5><B> $title </B><BR> $date " . $weekday[$week] . "</FONT></TD></TR>"; 
//�@ʾ�z�y�Ŀ 
echo "<TR BGCOLOR=#ccddee><TH>���C���Q</TH><TH>�ɜy�r�g</TH><TH>FTP</TH><TH>SSH</TH><TH>TELNET</TH><TH>SMTP</TH><TH>DNS</TH><TH>DHCP</TH><TH>HTTP</TH><TH>POP3</TH><TH>SAMBA</TH><TH>IMAP</TH><TH>SNMP</TH><TH>PROXY</TH><TH>MySQL</TH></TR>"; 
//�z�y�n�����Q,�n�����ݵĸ�ʽ������ʾ,�� @ ��̖�ָ�,һ�б�ʾһ���O�y���C,�O�y�Ŀ���� 13 �, 1 ����Ҫ�O�y , 
// 0 �����O�y, 13 ���Ŀ�քe��ʾ FTP��SSH��TELNET��SMTP��DNS��DHCP��HTTP��POP3��SAMBA��IMAP��SNMP��PROXY��MySQL 
// 
//��ʽ: 
// ���C���Q@IP λַ�����C���Q@�O�y�Ŀ 
//����: 
// �ཌW���W@192.168.0.254@1100110011101 

$file = "host.txt"; 
//ȡ�Ùn�����ݴ������,һ��Ԫ�ش���һ�� 
$get = file("$file"); 

//ȡ�Üyԇ���C����,Ӌ�� $get ��е�Ԫ�ؔ�Ŀ���ɵ�֪ 
$host_count = count($get); 

//���x�yԇ port ��� 
$port = array(21,22,23,25,53,67,80,110,139,143,161,3128,3306); 

for ( $i = 0 ; $i < $host_count ; $i++ ) { 
//�и�ÿһ�е��Y�ϴ������,�� @ ��ָ��̖, $get_line[$i][0] �����C���Q , $get_line[$i][1] ��yԇ�� IP �����C���Q 
//$get_line[$i][2] ��yԇ�Ŀ,���� 13 � 
$get_line[$i] = split("\@",$get[$i]); 

//�@ʾ��λ���Q 
echo "<TR><TD BGCOLOR=#62defe>" . $get_line[$i][0] . "</TD><TD BGCOLOR=#77ff00 ALIGN=CENTER>" . date("H:i:s",time()) . "</TD>"; 

//ȡ�Üyԇ�Ŀ���L��,�Kȥ���^β�Ŀհ���Ԫ 
$len = strlen(trim($get_line[$i][2])); 

//�yԇ timeout �r�g 
$timeout = 1; 

for ( $j = 0 ; $j < $len ; $j++) { 

//���eȡ���Ȍ��Ŀÿһ헵�ֵ,����� 1 ,�����yԇ , 0 �y�����yԇ 
if (substr($get_line[$i][2],$j,1) == "1") { 
//�M�Мyԇ,�K�����e�`ӍϢݔ�� 
$test[$j] = @fsockopen($get_line[$i][1],$port[$j],$errno,$errstr,$timeout); 
//�@ʾ�yԇ�Y�� 
if ($test[$j]) { 
echo "<TD BGCOLOR=yellow align=center>�ɹ�</FONT></TD>"; 
} else { 
echo "<TD BGCOLOR=red align=center><FONT COLOR=white>ʧ��</FONT></TD>"; 
} 
} else { 
echo "<TD BGCOLOR=#fed19a align=center><FONT COLOR=blue> N/A </FONT></TD>"; 
} 
} 
echo "</TR>"; 
} 
//���] 
$message = "<B>���]��</B><BR>����1.N/A ��ʾδ�yԇ <BR>����2.�yԇ�Y���H������,�o���_���ŷ����Ƿ��������\��<BR>����3.���O�y����ÿ 10 ��犸���һ��"; 
echo "<TR><TD COLSPAN=15 BGCOLOR=#f77dfd> $message </TD><TR>"; 
echo "</TABLE>"; 
?>
