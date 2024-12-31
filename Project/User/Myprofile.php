<?php
include('../Assets/connection/connection.php');
session_start();
$sel="select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where user_id='".$_SESSION['userid']."'";
$row=$Conn->query($sel);
$data=$row->fetch_assoc() 
?>
	  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">My Profile</h1>
  <table width="200" border="1" align="center">
    <tr>
      <td colspan="2" align="center"><img src="../Assets/File/User/<?php echo $data['user_photo']?>" width="150px" height="300px"/><label for="txt_photo"></label>
      </td>
    </tr>
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
       <?php echo $data['user_name']?>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
       <?php echo $data['user_email']?>
      </td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
       <?php echo $data['user_contact']?>
      </td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtaddress"></label>
       <?php echo $data['user_address']?>
      </td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="txtdistrict"></label> <?php echo $data['district_name']?>
      </td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txtplace"></label> <?php echo $data['place_name']?>
    </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><a href="Editprofile.php">Edit profile</a>
      <a href="Changepassword.php">Changepassword</a></td>
      
    </tr>
  </table>
</form>
</body>
</html>
