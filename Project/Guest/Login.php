
<?php

include('../Assets/connection/connection.php');
session_start();
if(isset($_POST['btnlogin']))
{
	$Email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];
	
	
	$selstudent="select * from tbl_student where student_email='".$Email."' and student_password='".$password."'";
	$rowstudent=$Conn->query($selstudent);
	
	$seltutor="select * from tbl_tutor where tutor_email='".$Email."' and tutor_password='".$password."'";
	$rowtutor=$Conn->query($seltutor);

  $seladmin="select * from tbl_admin where admin_email='".$Email."' and admin_password='".$password."'";
	$rowadmin=$Conn->query($seladmin);
	
	
	 if($datastudent=$rowstudent->fetch_assoc())
	{
		$_SESSION['studentid']=$datastudent['student_id'];
		$_SESSION['studentname']=$datastudent['student_name'];
		header("Location:../Student/Homepage.php");
	}
	else if($datatutor=$rowtutor->fetch_assoc())
	{
		$_SESSION['tutorid']=$datatutor['tutor_id'];
		$_SESSION['tutorname']=$datatutor['tutor_name'];
		header("Location:../Tutor/Homepage.php");
	}
  else if($dataadmin=$rowadmin->fetch_assoc())
	{
		$_SESSION['aid']=$dataadmin['admin_id'];
		$_SESSION['aname']=$dataadmin['admin_name'];
		header("Location:../Admin/Homepage.php");
	}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<style>
  /* Background with Diagonal White Lines */
  body {
    background: linear-gradient(135deg, #87CEEB, #B0E0E6);
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    overflow: hidden;
    position: relative;
  }

  /* Diagonal White Lines */
  body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: repeating-linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0, rgba(255, 255, 255, 0.2) 2px, transparent 2px, transparent 40px);
    z-index: -1;
  }

  /* Form Container */
  .form-container {
    background-color: #ffffff;
    border-radius: 12px;
    padding: 30px 40px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    width: 350px;
    text-align: center;
    position: relative;
    border-top: 4px solid #87CEEB;
    border-bottom: 4px solid #87CEEB;
  }

  /* Heading Style */
  h1 {
    color: #4682B4;
    margin-bottom: 20px;
    font-weight: bold;
    border-bottom: 2px solid #87CEEB;
    display: inline-block;
    padding-bottom: 5px;
  }

  /* Input Fields */
  input[type="text"], input[type="password"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #87CEEB;
    border-radius: 5px;
    box-sizing: border-box;
  }

  /* Buttons */
  input[type="submit"] {
    background-color: #4682B4;
    color: white;
    padding: 12px;
    margin-top: 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
    transition: background-color 0.3s ease;
  }

  /* Hover Effect for Buttons */
  input[type="submit"]:hover {
    background-color: #5a9bd3;
  }

  /* Link Styling */
  a {
    display: inline-block;
    margin-top: 10px;
    color: #87CEEB;
    text-decoration: none;
    font-weight: bold;
  }

  a:hover {
    text-decoration: underline;
  }
</style>
</head>
<body>
  <div class="form-container">
    <h1>Login</h1>
    <form id="form1" name="form1" method="post" action="">
      <input type="text" name="txtemail" id="txtemail" placeholder="Email" required />
      <input type="password" name="txtpassword" id="txtpassword" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 characters" />
      <input type="submit" name="btnlogin" id="btnlogin" value="Login" />
      
      <a href="Tutorregistration.php">New Tutor</a>
      <a href="Studentreg.php">New Student</a>
    </form>
  </div>
</body>
</html>
