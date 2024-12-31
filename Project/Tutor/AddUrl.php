<?php
include('../Assets/connection/connection.php');
include("Head.php");
if(isset($_POST["btn_sub"]))
{
	$url=$_POST["txt_url"];
	$upqry="update tbl_booking set student_status='1',tutorclass_meeturl='".$url."' where booking_id='".$_GET['id']."'";
	if($Conn->query($upqry))
	{
		 ?>
		 <script>
		 alert('url added');
		 window.location='Viewstudentbooking.php';
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
    <title>Submit URL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .form-container {
            width: 100%;
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 12px;
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
    <h1>Submit URL</h1>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td><label for="txt_url">URL</label></td>
                <td><input type="text" name="txt_url" id="txt_url" required /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btn_sub" id="btn_sub" value="Submit" />
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