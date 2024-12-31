
<?php
include("../Assets/connection/connection.php");
include("Head.php");
if(isset($_POST['btnsubmit']))
{
	$Title=$_POST["txt_title"];
	$File=$_FILES["txt_file"]["name"];
	$path=$_FILES["txt_file"]["tmp_name"];
	move_uploaded_file($path,"../Assets/File/Tutor/".$File);
	$ins="insert into tbl_demo(demo_title,demo_file,tutorclass_id)values('".$Title."','".$File."','".$_GET['did']."')";
	if($Conn->query($ins))
	{
		?>
		<script>
		alert('inserted');
		window.location='Demo.php?did=<?php echo $did;?>';
		</script>
        <?php
	}
	else
	{
		echo "<script>
		alert('insertion failed');
		window.location='Demo.php';
		</script>";
	}
	}
	if(isset($_GET['id']))
{
	$del="delete from tbl_demo where demo_id=".$_GET['id'];
	if($Conn->query($del))
	{
		?><script>
		alert('Deleted');
		window.location='Demo.phpdid=<?php echo $did;?>';
		</script><?php
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .form-container {
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
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        input[type="text"], input[type="file"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        input[type="text"], input[type="file"] {
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
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        td img {
            width: 50px;
            height: 50px;
            border-radius: 4px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Upload File</h1>
    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
        <table>
            <tr>
                <th>Title</th>
                <td><input type="text" required name="txt_title" id="txt_title" autocomplete="off" /></td>
            </tr>
            <tr>
                <th>File</th>
                <td><input type="file" required name="txt_file" id="txt_file" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
                </td>
            </tr>
        </table>
    </form>
    
    <h1>Uploaded Files</h1>
    <table>
        <thead>
            <tr>
                <th>Slno</th>
                <th>Title</th>
                <th>File</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = 0;
            $sel = "SELECT * FROM tbl_demo WHERE tutorclass_id='".$_GET['did']."'";
            $row = $Conn->query($sel);
            while($data = $row->fetch_assoc()) {
                $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['demo_title']; ?></td>
                <td><img src="../Assets/File/Tutor/<?php echo $data['demo_file']; ?>" /></td>
                <td><a href="Demo.php?id=<?php echo $data['demo_id']; ?>&did=<?php echo $_GET['did']; ?>">Delete</a></td>
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