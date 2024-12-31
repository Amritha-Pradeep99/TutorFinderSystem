<?php  
include('../Assets/connection/connection.php');
include("Head.php");

if(isset($_POST['btnsubmit']))
{
	$reply=$_POST["txtreply"];
	
	$upQry="update tbl_complaint set complaint_status='1',complaint_reply='".$reply."' where complaint_id='".$_GET['id']."'";
	if($Conn->query($upQry))
	{
		?>
		<script>
		alert('Replied');
		window.location='Viewcomplaints.php';
		</script>
        <?php
	}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 45%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin: 10px 2%;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h1>Reply Form</h1>
<form id="form1" name="form1" method="post" action="">
    <table>
        <tr>
            <td>Reply</td>
            <td>
                <input type="text" required name="txtreply" id="txtreply" />
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
            </td>
        </tr>
    </table>
</form>

</body>
</html>

<?php
include("Foot.php");
?>