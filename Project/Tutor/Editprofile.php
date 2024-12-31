<?php
include('../Assets/connection/connection.php');
include("Head.php");
$sel="select * from tbl_tutor  where tutor_id='".$_SESSION['tutorid']."'";
$row=$Conn->query($sel);
$data=$row->fetch_assoc(); 
if(isset($_POST['btnedit']))
{
	$Name=$_POST['txtname'];
	$Email=$_POST['txtemail'];
	$Contact=$_POST['txtcontact'];
	$Address=$_POST['txtaddress'];

	$upqry="update tbl_tutor set tutor_name='".$Name."',tutor_email='".$Email."',tutor_contact='".$Contact."',tutor_address='".$Address."' where tutor_id='".$_SESSION['tutorid']."'";
	         if($Conn->query($upqry))
			{
				echo "<script>
				alert('updated');
				window.location='Editprofile.php';
				</script>";
			}
			else
			{
				echo "<script>
				alert('updation failed');
				window.location='Editprofile.php';
				</script>";
			}
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 5px;
            box-sizing: border-box;
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

<div class="profile-container">
    <h1>Edit Profile</h1>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input required type="text" name="txtname" title="Name Allows Only Alphabets, Spaces, and First Letter Must Be Capital" pattern="^[A-Z]+[a-zA-Z ]*$" id="txtname" value="<?php echo $data['tutor_name']?>" />
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="text" required name="txtemail" id="txtemail" value="<?php echo $data['tutor_email']?>" />
                </td>
            </tr>
            <tr>
                <td>Contact</td>
                <td>
                    <input type="text" required name="txtcontact" pattern="[7-9]{1}[0-9]{9}" title="Phone number should start with 7-9 and contain 10 digits" id="txtcontact" value="<?php echo $data['tutor_contact']?>" />
                </td>
            </tr>
            <tr>
                <td>Address</td>
                <td>
                    <input type="text" required name="txtaddress" id="txtaddress" value="<?php echo $data['tutor_address']?>" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnedit" id="btnedit" value="Edit" />
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
</body>
</html>
<?php
include("Foot.php");
?>