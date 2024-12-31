<?php
include('../Assets/connection/connection.php');
if(isset($_POST['btnsubmit']))
{
	$name=$_POST['txtname'];
	$email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];
	$ins="insert into tbl_admin(admin_name,admin_email,admin_password)values('".$name."','".$email."','".$password."')";
	
	if($Conn->query($ins))
	{
		echo "<script>
		alert('inserted');
		window.location='AdminRegistration.php';
		</script>";
	}
}
if(isset($_GET['id']))
{
	$del="delete from tbl_admin where admin_id='".$_GET['id']."'";
	if($Conn->query($del))
	{

	echo "<script>
	alert('Delete');
	window.location='AdminRegistration.php';
	</script>";
	}
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
  <table width="276" height="180" border="1">
    <tr>
      <td width="86"> <p>Name</p>
      <p>Email</p>
      <p>Password</p></td>
      <td width="174"><p>
        <label for="name1">
          <input type="text" name="txtname" id="name1" />
          <br />
          <br />
        </label>
        <label for="email1"></label>
        <input type="text" name="txtemail" id="email1" />
      </p>
        <p>
          <label for="password1"></label>
          <input type="text" name="txtpassword" id="password1" />
      </p></td>
    </tr>
    <tr>
      <td colspan="2"align="center"><input type="submit" name="btnsubmit" id="submit1" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="cancel" /></td>
    </tr>
  </table>
  <table width="200" border="1">
    <tr>
      <td>Sl No</td>
      <td>Name</td>
      <td>Email</td>
      <td>Password</td>
      <td><p>Action</p></td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_admin";
	$row=$Conn->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
	
	
	    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data['admin_name']?></td>
      <td><?php echo $data['admin_email']?></td>
     <td><?php echo $data['admin_password']?></td>
     <td><a href="AdminRegistration.php?id=<?php echo $data['admin_id']?>">Delete</a></td>
      </tr>
      <?php
	}
	?>
    </tr>
  </table>
</form>
</body>
</html>