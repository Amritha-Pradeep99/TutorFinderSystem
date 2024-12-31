<?php
include('../Assets/connection/connection.php');
include("Head.php");

$sel="select * from tbl_student  where student_id='".$_SESSION['studentid']."'";
$row=$Conn->query($sel);
$data=$row->fetch_assoc(); 
$dbpwd=$data['student_password'];
if(isset($_POST['btnchangepassword']))
{
	$Oldpassword=$_POST['txtoldpassword'];
	$Newpassword=$_POST['txtnewpassword'];
	$Retypepassword=$_POST['txtretypepassword'];
	if($dbpwd==$Oldpassword)
	{
		if($Newpassword==$Retypepassword)
		{
			$upqry="update tbl_student set student_password='".$Newpassword."' where student_id='".$_SESSION['studentid']."'";
	         if($Conn->query($upqry))
			{
				echo "<script>
				alert('updated');
				window.location='Studentreg.php';
				</script>";
			}
			else
			{
				echo "<script>
				alert('updation failed');
				window.location='Studentreg.php';
				</script>";
			}
		}
	}
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .form-container {
            width: 100%;
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
        }
        td {
            padding: 10px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .form-actions {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Change Password</h1>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td>Old password</td>
                <td><input type="password" required name="txtoldpassword" id="txtoldpassword" /></td>
            </tr>
            <tr>
                <td>New password</td>
                <td><input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase, one lowercase letter, and at least 8 or more characters" required name="txtnewpassword" id="txtnewpassword" /></td>
            </tr>
            <tr>
                <td>Re-type password</td>
                <td><input type="password" required name="txtretypepassword" id="txtretypepassword" /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="btnchangepassword" id="btnchangepassword" value="Change Password" />
                    <input type="submit" name="btncancel" id="btncancel" value="Cancel" style="background-color: #6c757d;"/>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>

<?php
include("Foot.php");
?>