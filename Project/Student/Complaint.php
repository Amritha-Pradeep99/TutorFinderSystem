<?php

include('../Assets/connection/connection.php');
include("Head.php");

if(isset($_POST["btnsubmit"]))
{
		$title=$_POST["txttitle"];
		$content=$_POST["txtcontent"];
		$insQry="insert into tbl_complaint(complaint_date,complaint_content,student_id,tutor_id,complaint_title)values(curdate(),'".$content."','".$_SESSION["studentid"]."','".$_GET['cid']."','".$title."')";
		
			if($Conn->query($insQry))
			{	?>
            	<script>
				alert('Inserted');
				location.href='Complaint.php';
				</script>
              <?php
				
			}
			else
			{   
			?>
            	<script>
				alert('Failed');
				location.href='Complaint.php';
				</script>
                <?Php
             }
}
if(isset($_GET['id']))
{
	$del="delete from tbl_complaint where complaint_id='".$_GET['id']."'";
	if($Conn->query($del))
	{
		?>
		<script>
		alert('Deleted');
		window.location='Complaint.php';
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
    <title>Complaint Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 800px;
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
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        td {
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        input[type="text"] {
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
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Submit a Complaint</h1>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td>Title</td>
                <td><input type="text" required name="txttitle" id="txttitle" /></td>
            </tr>
            <tr>
                <td>Content</td>
                <td><input type="text" required name="txtcontent" id="txtcontent" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
                </td>
            </tr>
        </table>
    </form>

    <h1>Complaints List</h1>
    <table>
        <thead>
            <tr>
                <th>Slno</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>Reply</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 0;
                $selQry = "SELECT * FROM tbl_complaint WHERE student_id='" . $_SESSION['studentid'] . "'";
                $rel = $Conn->query($selQry);
                while ($data = $rel->fetch_assoc()) {
                    $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data["complaint_title"]; ?></td>
                <td><?php echo $data["complaint_content"]; ?></td>
                <td><?php echo $data["complaint_date"]; ?></td>
                <td><?php echo ($data['complaint_status'] == 1) ? $data["complaint_reply"] : "Not Replied"; ?></td>
                <td><a href="Complaint.php?id=<?php echo $data['complaint_id']; ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
include("Foot.php");
?>