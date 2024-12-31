 <?php  
	
include('../Assets/connection/connection.php');
include("Head.php");

if(isset($_GET['id']))
{
	$del="delete from tbl_complaint where complaint_id='".$_GET['id']."'";
	if($Conn->query($del))
	{
		?>
		<script>
		alert('Deleted');
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
    <title>View Complaints</title>
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
            width: 60%;
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
        a {
            color: #d9534f; /* Bootstrap's danger color */
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .action-btn {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .action-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <h1>View Complaint</h1>
    <table>
        <tr>
            <th>SlNo</th>
            <th>Student</th>
            <th>Tutor</th>
            <th>Title</th>
            <th>Content</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
        $sel = "SELECT * FROM tbl_complaint c INNER JOIN tbl_student s ON c.student_id = s.student_id INNER JOIN tbl_tutor t ON c.tutor_id = t.tutor_id";
        $result = $Conn->query($sel);
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['student_name']; ?></td>
            <td><?php echo $data['tutor_id']; ?></td>
            <td><?php echo $data['complaint_title']; ?></td>
            <td><?php echo $data['complaint_content']; ?></td>
            <td><?php echo $data['complaint_date']; ?></td>
            <td><a class="action-btn" href="Reply.php?id=<?php echo $data['complaint_id']; ?>">Reply</a></td>
        </tr>
        <?php } ?>
    </table>

    <h1>Replied Complaint</h1>
    <table>
        <tr>
            <th>SlNo</th>
            <th>Student</th>
            <th>Tutor</th>
            <th>Title</th>
            <th>Content</th>
            <th>Date</th>
            <th>Reply</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
        $sel = "SELECT * FROM tbl_complaint c INNER JOIN tbl_student s ON c.student_id = s.student_id INNER JOIN tbl_tutor t ON c.tutor_id = t.tutor_id WHERE complaint_status = '1'";
        $result = $Conn->query($sel);
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['student_name']; ?></td>
            <td><?php echo $data['tutor_id']; ?></td>
            <td><?php echo $data['complaint_title']; ?></td>
            <td><?php echo $data['complaint_content']; ?></td>
            <td><?php echo $data['complaint_date']; ?></td>
            <td><?php echo $data['complaint_reply']; ?></td>
            <td><a class="action-btn" href="Viewcomplaints.php?id=<?php echo $data['complaint_id']; ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</form>

</body>
</html>

<?php
include("Foot.php");
?>