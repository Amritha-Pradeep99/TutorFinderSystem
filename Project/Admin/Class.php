<?php
include('../Assets/connection/connection.php');
include("Head.php");

$cid="";
$cname="";
if(isset($_POST['btnsubmit']))
{
	$name = $_POST['txtclassname'];
	$hid = $_POST['txthidden'];
	$ins = "insert into tbl_class(class_name)values('".$name."')";
	if($Conn->query($ins))
	{
		
		echo "<script>
		alert('inserted');
		window.location='Class.php';
		</script>";
	
	}
	else
	{
		echo "<script>
		alert('insertion failed');
		window.location='Class.php';
		</script>";
	}
}
	
if(isset($_GET['id']))
{
	$del="delete from tbl_class where class_id='".$_GET['id']."'";
	if($Conn->query($del))
	{
		echo"<script>
		alert('Deleted');
		window.location'Class.php';
		</script>";
	}
}
if(isset($_GET['Eid']))
{
	$selqry="select * from tbl_class where class_id='".$_GET['Eid']."'";
	$r=$Conn->query($selqry);
	if($d=$r->fetch_assoc())
	{
        $cid=$d['class_id'];
		$cname=$d['class_name'];
	}
}
?>


	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
       <td>class name</td>
      <td><label for="txtclassname"></label>
      <input name="txthidden" type="hidden" value="<?php echo $cid?>"/>
      <input type="text" name="txtclassname" id="txtclassname" value="<?php echo $cname?>" requiredautocomplete="off" required/>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
  <table  border="1">
    <tr>
      <td>SlNo</td>
      <td>class name</td>
      <td>Action</td>
    </tr>
      
    <?php
	$i=0;
	$sel="select * from tbl_class";
	$row=$Conn->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
        
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['class_name']?></td>
      <td><a href="Class.php?id=<?php echo $data['class_id']?>">Delete</a></td>
      
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
?>