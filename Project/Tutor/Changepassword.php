<?php
include('../Assets/connection/connection.php');
include("Head.php");
$sel="select * from tbl_tutor  where tutor_id='".$_SESSION['tutorid']."'";
$row=$Conn->query($sel);
$data=$row->fetch_assoc(); 
$dbpwd=$data['tutor_password'];
if(isset($_POST['btnchangepassword']))
{
	$Oldpassword=$_POST['txtoldpassword'];
	$Newpassword=$_POST['txtnewpassword'];
	$Retypepassword=$_POST['txtretypepassword'];
	if($dbpwd==$Oldpassword)
	{
		if($Newpassword==$Retypepassword)
		{
			$upqry="update tbl_tutor set tutor_password='".$Newpassword."' where tutor_id='".$_SESSION['tutorid']."'";
	         if($Conn->query($upqry))
			{
				echo "<script>
				alert('updated');
				window.location='Changepassword.php';
				</script>";
			}
			else
			{
				echo "<script>
				alert('updation failed');
				window.location='Changepassword.php';
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
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        input[type="text"] {
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
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
                <td>
                    <input type="text" required name="txtoldpassword" id="txtoldpassword" />
                </td>
            </tr>
            <tr>
                <td>New password</td>
                <td>
                    <input type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters" required name="txtnewpassword" id="txtnewpassword" />
                </td>
            </tr>
            <tr>
                <td>Re-type password</td>
                <td>
                    <input type="text" required name="txtretypepassword" id="txtretypepassword" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnchangepassword" id="btnchangepassword" value="Change Password" />
                    <input type="submit" name="btncancel" id="btncancel" value="Cancel" />
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