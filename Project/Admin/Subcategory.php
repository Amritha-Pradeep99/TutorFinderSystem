<?php 
include("../Assets/connection/connection.php");
if(isset($_POST["btnsubmit"]))
{
	$Subcategory=$_POST["txtsubcategory"];
	$Category=$_POST["selcategory"];
	$insQry="insert into tbl_subcategory(subcategory_name,category_id)values('".$Subcategory."','".$Category."')";
	
	 if($Conn->query($insQry))
	{
		echo "<script>
		alert('inserted');
		window.location='Subcategory.php';
		</script>";
	}
}
if(isset($_GET['id']))
{
	$del="delete from tbl_category where category_id=".$_GET['id'];
	if($Conn->query($del))
	{
		echo"<script>
		alert('Deleted');
		window.location='Category.php';
		</script>";
	}
}
?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">Subcategory</h1>
  <table border="1" align="center">
    <tr>
      <td>category</td>
      <td><label for="selcategory"></label>
        <select name="selcategory" id="selcategory">
        <option>---select---</option>
        <?php
		$sel="select * from tbl_category";
		$result=$Conn->query($sel);
		while($data=$result->fetch_assoc())
		{
			?>
            <option value="<?php echo $data["category_id"] ?>"><?php echo $data["category_name"] ?></option>
            <?php
		}
		?>
        
      </select>
      </td>
    </tr>
    <tr>
      <td>subcategory name</td>
      <td><label for="txtsubcategory"></label>
      <input type="text" name="txtsubcategory" id="txtsubcategory" /></td>
    </tr>
    <tr>
      <td colspan="2"align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="cancel" /></td>
    </tr>
  </table>
  <br /><br />
  <table border="1" align="center">
    <tr>
      <td>SlNo</td>
      <td>category</td>
      <td>subcategory</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_subcategory s inner join tbl_category c on c.category_id =s.category_id";
	$result=$Conn->query($sel);
	while($data=$result->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["category_name"]?></td>
      <td><?php echo $data["subcategory_name"]?></td>
      <td><a href="Subcategory.php?id=<?php echo $data['subcategory_id']?>">Delete</a>
      </td>
      <?php
	}
	?>
    </tr>
  </table>
</form>
</body>
</html>