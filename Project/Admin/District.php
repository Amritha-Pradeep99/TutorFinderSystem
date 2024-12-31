<?php
include('../Assets/connection/connection.php');
include("Head.php");

$eid="";
$ename="";
if(isset($_POST['btnsubmit']))
{
	$name = $_POST['txtdistrictname'];
	$hid = $_POST['txthidden'];
	$selQry = "select * from tbl_district where district_name='".$name."'";
	$ro=$Conn->query($selQry);
	if($do=$ro->fetch_assoc())
	{
		echo "<script>
		alert('already exist');
		window.location='District.php';
		</script>";
	}
	else
	{
		if($hid!="")
		{
			$upqry="update tbl_district set district_name='".$name."' where district_id='".$hid."'";
			if($Conn->query($upqry))
			{
		echo "<script>
		alert('updated');
		window.location='District.php';
		</script>";
	        }
			else
			{
			
			
			echo "<script>
		alert('updation failed');
		window.location='District.php';
		</script>";
			}
			
			
		}
		else
		{
			
			
	$ins = "insert into tbl_district(district_name)values('".$name."')";
	if($Conn->query($ins))
	{
		
		echo "<script>
		alert('inserted');
		window.location='District.php';
		</script>";
	
	}
	else
	{
		echo "<script>
		alert('insertion failed');
		window.location='District.php';
		</script>";
	}
		}
	
	}
}
if(isset($_GET['id']))
{
	$del="delete from tbl_district where district_id='".$_GET['id']."'";
	if($Conn->query($del))
	{
		echo"<script>
		alert('Deleted');
		window.location'District.php';
		</script>";
	}
}
if(isset($_GET['Eid']))
{
	$selqry="select * from tbl_district where district_id='".$_GET['Eid']."'";
	$r=$Conn->query($selqry);
	if($d=$r->fetch_assoc())
	{
        $eid=$d['district_id'];
		$ename=$d['district_name'];
	}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>District Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 10px;
            overflow-x: auto;
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
            color: #dc3545;
            font-weight: bold;
            text-decoration: none;
            margin: 0 5px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<form id="form1" name="form1" method="post" action="">
    <h1>District</h1>
    <table align="center">
        <tr>
            <td>District Name</td>
            <td>
                <input name="txthidden" type="hidden" value="<?php echo $eid ?>"/>
                <input type="text" name="txtdistrictname" id="txtdistrictname" value="<?php echo $ename ?>" required autocomplete="off"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
                <input type="submit" name="btncancel" id="btncancel" value="Cancel" />
            </td>
        </tr>
    </table>

    <table align="center">
        <tr>
            <th>Sl No</th>
            <th>District Name</th>
            <th>Action</th>
        </tr>
        
        <?php
        $i = 0;
        $sel = "SELECT * FROM tbl_district";
        $row = $Conn->query($sel);
        while ($data = $row->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data['district_name'] ?></td>
                <td>
                    <a href="District.php?id=<?php echo $data['district_id'] ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</form>

</body>
</html>

<?php
include("Foot.php");
?>