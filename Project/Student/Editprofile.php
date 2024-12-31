<?php
include('../Assets/connection/connection.php');
include("Head.php");

$sel="select * from tbl_student  where student_id='".$_SESSION['studentid']."'";
$row=$Conn->query($sel);
$data=$row->fetch_assoc(); 
if(isset($_POST['btnedit']))
{
	$Name=$_POST['txtname'];
	$Email=$_POST['txt_email'];
	$Contact=$_POST['txtcontact'];
	$Address=$_POST['txtaddress'];

	$upqry="update tbl_student set student_name='".$Name."',student_email='".$Email."',student_contact='".$Contact."',student_address='".$Address."' where student_id='".$_SESSION['studentid']."'";
	         if($Conn->query($upqry))
			{
				echo "<script>
				alert('updated');
				window.location='Myprofile.php';
				</script>";
			}
			else
			{
				echo "<script>
				alert('updation failed');
				window.location='Myprofile.php';
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
        .container {
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
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        td {
            border: 1px solid #ddd;
        }
        input[type="text"],
        input[type="email"] {
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
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Profile</h1>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="txtname" id="txtname" value="<?php echo $data['student_name']?>" title="Name allows only alphabets, spaces, and the first letter must be capital letter" pattern="^[A-Z]+[a-zA-Z ]*$" required />
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="email" value="<?php echo $data['student_email']?>" required name="txt_email" />
                </td>
            </tr>
            <tr>
                <td>Contact</td>
                <td>
                    <input type="text" name="txtcontact" id="txtcontact" value="<?php echo $data['student_contact']?>" required pattern="[7-9]{1}[0-9]{9}" title="Phone number must start with 7-9 followed by 9 digits (0-9)" />
                </td>
            </tr>
            <tr>
                <td>Address</td>
                <td>
                    <input type="text" name="txtaddress" id="txtaddress" value="<?php echo $data['student_address']?>" required />
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

<?php
include("Foot.php");
?>