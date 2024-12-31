<?php
$result="";
if(isset($_POST["btnsum"]))
{
	$Number1=$_POST["txtnum1"];
	$Number2=$_POST["txtnum2"];
	$result=$Number1+$Number2;
}
if(isset($_POST["btnsum2"]))
{
	$Number1=$_POST["txtnum1"];
	$Number2=$_POST["txtnum2"];
	$result=$Number1-$Number2;
}
if(isset($_POST["btnsum3"]))
{
	$Number1=$_POST["txtnum1"];
	$Number2=$_POST["txtnum2"];
	$result=$Number1*$Number2;
}
if(isset($_POST["btnsum4"]))
{
	$Number1=$_POST["txtnum1"];
	$Number2=$_POST["txtnum2"];
	$result=$Number1/$Number2;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Number1</td>
      <td><label for="txtnum1"></label>
        <input type="text" name="txtnum1" id="txtnum1" /></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td><label for="txtnum2"></label>
      <input type="text" name="txtnum2" id="txtnum2" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"> <input type="submit" name="btnsum" id="btnsum" value="+" />
      <input type="submit" name="btnsum2" id="btnsum2" value="-" />
      <input type="submit" name="btnsum3" id="btnsum3" value="*" />
      <input type="submit" name="btnsum4" id="btnsum4" value="/" /></td>
    </tr>
    <tr>
      <td>Result</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>