<?php

include('../Assets/connection/connection.php');
include("Head.php");

if(isset($_POST['btnsubmit']))
{
	$subject=$_POST['txtsubject'];
	
		
			
	        $ins = "insert into tbl_subject(subject_name)values('".$subject."')";
	        if($Conn->query($ins))
	        {
	         	
	      	echo "<script>
		    alert('inserted');
		    window.location='Subject.php';
		    </script>";
	
			}
	
}
if(isset($_GET['id']))
{
	$del="delete from tbl_subject where subject_id='".$_GET['id']."'";
	if($Conn->query($del))
	{
		echo"<script>
		alert('Deleted');
		window.location='Subject.php';
		</script>";
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Management</title>
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
        a {
            color: #d9534f; /* Bootstrap's danger color */
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Subject Management</h1>
<form id="form1" name="form1" method="post" action="">
    <table>
        <tr>
            <td>Subject</td>
            <td>
                <input type="text" required name="txtsubject" id="txtsubject" autocomplete="off" />
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
            </td>
        </tr>
    </table>
</form>

<table>
    <tr>
        <th>SlNo</th>
        <th>Subject</th>
        <th>Action</th>
    </tr>
    <?php
    $i = 0;
    $sel = "select * from tbl_subject";
    $row = $Conn->query($sel);
    while ($data = $row->fetch_assoc()) {
        $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data['subject_name']; ?></td>
        <td><a href="Subject.php?id=<?php echo $data['subject_id']; ?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>

<?php
include("Foot.php");
?>