<?php
include('../Assets/connection/connection.php');
include("Head.php");
if(isset($_POST['btnsubmit']))
{
	$class=$_POST["selclass"];
	$title=$_POST["txttitle"];
	$file=$_FILES["txtfile"]["name"];
	$path=$_FILES["txtfile"]["tmp_name"];
	move_uploaded_file($path,"../Assets/File/Notes/".$file);
	$des=$_POST["txtdescription"];
	

	
	$ins="insert into tbl_note(class_id,note_title,note_file,note_des)values('".$class."','".$title."','".$file."','".$des."')";
	
	if($Conn->query($ins))
	{
		?>
		<script>
		alert('inserted');
		window.location='Addnote.php';
		</script>
        <?php
	}
}
if(isset($_GET['id']))
{
	$del="delete from tbl_note where note_id='".$_GET['id']."'";
	if($Conn->query($del))
	{
		?>
		<script>
		alert('Deleted');
		window.location='Addnote.php';
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
    <title>Add Notes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
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
            margin-bottom: 20px;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        input[type="text"], input[type="file"], select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        table.list-table {
            width: 100%;
            border-collapse: collapse;
        }
        .list-table th, .list-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        .list-table th {
            background-color: #007bff;
            color: white;
        }
        .list-table a {
            color: #007bff;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #007bff;
            border-radius: 4px;
            margin-right: 5px;
        }
        .list-table a:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Add Notes</h1>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table>
            <tr>
                <td><label for="selclass">Class</label></td>
                <td>
                    <select name="selclass" id="selclass" required>
                        <option value="">--Select--</option>
                        <?php
                        $sel="select * from tbl_class";
                        $row=$Conn->query($sel);
                        while($data=$row->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $data['class_id']?>"><?php echo $data['class_name']?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="txttitle">Title</label></td>
                <td><input type="text" name="txttitle" id="txttitle" required /></td>
            </tr>
            <tr>
                <td><label for="txtfile">File</label></td>
                <td><input type="file" name="txtfile" id="txtfile" required /></td>
            </tr>
            <tr>
                <td><label for="txtdescription">Description</label></td>
                <td><input type="text" name="txtdescription" id="txtdescription" required /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
            </tr>
        </table>
    </form>

    <h1>Notes List</h1>
    <table class="list-table">
        <tr>
            <th>Sl No</th>
            <th>Class</th>
            <th>Title</th>
            <th>Description</th>
            <th>File</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
        $sel = "SELECT * FROM tbl_note n inner join tbl_class c on n.class_id=c.class_id";
        $row = $Conn->query($sel);
        while ($data = $row->fetch_assoc()) {
            $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data['class_name'] ?></td>
            <td><?php echo $data['note_title'] ?></td>
            <td><?php echo $data['note_des'] ?></td>
            <td><a href="../Assets/File/Notes/<?php echo $data['note_file']; ?>" target="_blank">View</a></td>
            <td><a href="Addnote.php?id=<?php echo $data['note_id'] ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
<?php
include("Foot.php");
?>
