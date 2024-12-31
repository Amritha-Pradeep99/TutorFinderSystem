<?php
$Name="";
$Gender="";
$Department="";
$Mark1="";
$Mark2="";
$Mark3="";
$Totalmark="";
$Grade="";
$Percentage="";
if(isset($_POST["btnsubmit"]))
{
	$Firstname=$_POST["name1"];
	$Lastname=$_POST["name2"];
	$Gender=$_POST["Gender"];
	$Department=$_POST["sel_dept"];
	$Mark1=$_POST["mark1"];
	$Mark2=$_POST["mark2"];
	$Mark3=$_POST["mark3"];
	$Totalmark=$Mark1+$Mark2+$Mark3;
	$Percentage=($Totalmark/300)*100;
	
if ($Percentage>=90)
{
	 $Grade="A";
} 
else if($Percentage>=80)
{
	 $Grade="B";
}
else 
{
	 $Grade="C";
}

if($Gender=="male")
{
	$Name="Mr.".$Firstname."".$Lastname;
}
else
{
	$Name="Ms.".$Firstname."".$Lastname;
}
}
if(isset($_POST["btncancel"]))
{
	$Firstname="";
	$Lastname="";
	$Mark1="";
	$Mark2="";
	$Mark3="";
	$Departmen="";
	$Gender="";
	
}

?>
$<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="368" border="1">
    <tr>
      <td width="171">First name</td>
      <td width="181"><label for="name1"></label>
      <input type="text" name="name1" id="name1" /></td>
    </tr>
    <tr>
      <td>Last name</td>
      <td><label for="name2"></label>
      <input type="text" name="name2" id="name2" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="Gender" id="radio1" value="male" />
      <label for="male">male   
        <input type="radio" name="Gender" id="radio2" value="female" />
      female</label></td>
    </tr>
    <tr>
      <td>Department</td>
      <td>
        <label for="select"></label>
        <select name="sel_dept" id="department">
        <option>--select--</option>
        <option value="Bsw">social work</option>
        <option value="Cs">Computer science</option>
      </select></td>
    </tr>
    <tr>
      <td>Mark 1</td>
      <td><label for="mark1"></label>
      <input type="text" name="mark1" id="mark1" /></td>
    </tr>
    <tr>
      <td>Mark 2</td>
      <td><label for="mark2"></label>
      <input type="text" name="mark2" id="mark2" /></td>
    </tr>
    <tr>
      <td>Mark 3</td>
      <td><label for="mark3"></label>
      <input type="text" name="mark3" id="mark3" /></td>
    </tr>
    <tr>
      <td colspan="2"align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="cancel" /></td>
    </tr>
  </table> 
  <table width="251" height="256" border="1">
    <tr>
      <td width="115">Name   :</td>
      <td width="120">&nbsp;</td>
    </tr>
    <tr>
      <td>Gender :</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Department :</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><p>Total Mark :</p></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Percentage :</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Grade :</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>