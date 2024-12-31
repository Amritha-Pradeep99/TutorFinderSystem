<?php
include('../Assets/connection/connection.php');
include('Head.php');

ob_start();
 $sel="select * from tbl_tutor t inner join tbl_place p on t.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id inner join tbl_subject s on t.subject_id =s.subject_id where tutor_id='".$_SESSION['tutorid']."'";
$row=$Conn->query($sel);
$data=$row->fetch_assoc() ;
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .profile-container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        table td:first-child {
            font-weight: bold;
            text-align: right;
            width: 30%;
        }
        table td:last-child {
            text-align: left;
        }
        .action-links {
            text-align: center;
        }
        .action-links a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 4px;
            margin: 5px;
            display: inline-block;
        }
        .action-links a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<div class="profile-container">
<h1 align="center">My Profile</h1>

  <table width="200" border="1" align="center">
 
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <?php echo $data['tutor_name']?>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <?php echo $data['tutor_email']?>
      </td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
     <?php echo $data['tutor_contact']?>
     </td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtaddress"></label>
      <?php echo $data['tutor_address']?>
     </td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="txtdistrict"></label>
       <?php echo $data['district_name']?>
      </td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txtplace"></label>
       <?php echo $data['place_name']?>
      </td>
    </tr>
     <tr>
      <td>Subject</td>
      <td><label for="txtsubject"></label>
       <?php echo $data['subject_name']?>
      </td>
    </tr>
    
  </table>
  <div class="action-links">
        <a href="Editprofile.php">Edit Profile</a>
        <a href="Changepassword.php">Change Password</a>
    </div>
</div>
</form>
</body>
</html>
<?php
ob_flush();
include("Foot.php");
?>