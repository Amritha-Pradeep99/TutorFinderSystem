<?php
session_start();
include('../Assets/connection/connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
"Welcome"<?php echo $_SESSION['username']?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td><a href="Myprofile.php">Myprofile</a></td>
    </tr>
    <tr>
      <td><a href="Editprofile.php">Editprofile</a></td>
    </tr>
    <tr>
      <td><a href="Changepassword.php">Changepassword</a></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>