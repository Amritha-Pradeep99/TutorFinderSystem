<?php
$eid=0;
$ename="";
include('../Assets/connection/connection.php');
if(isset($_POST['btnsubmit']))
{
	$name=$_POST['txtbrandname'];
	$hid=$_POST['txthidden'];
	$selqry="select * from tbl_brand where brand_name='".$name."'";
	$ro=$Conn->query($selqry);
	if($do=$ro->fetch_assoc())
	{
		echo "<script>
		alert('already exit');
		window.location='Brand.php';
		</script>";
	}
	else
	{
		if($eid!=0)
		{
			
		     $upqry="update tbl_brand set brand_name='".$name."' where brand_id='".$eid."'";
	         if($Conn->query($upqry))
			{
				echo "<script>
				alert('updated');
				window.location='Brand.php';
				</script>";
			}
			else
			{
				echo "<script>
				alert('updation failed');
				window.location='Brand.php';
				</script>";
			}
		}
		else
		{
			 $ins = "insert into tbl_brand(brand_name)values('".$name."')";
				if($Conn->query($ins))
				{
					
				echo "<script>
				alert('inserted');
				window.location='Brand.php';
				</script>";
		
				}
				else
				{
				echo "<script>
				alert('insertion failed');
				window.location='Brand.php';
				</script>";
				}
			}
		}
}
if(isset($_GET['id']))
{
	$del="delete from tbl_brand where brand_id='".$_GET['id']."'";
	if($Conn->query($del))
	{
		echo"<script>
		alert('Deleted');
        window.location='Brand.php';
		</script>";
	}
}
if(isset($_GET['Eid']))
{
	$selqry="select * from tbl_brand where brand_id='".$_GET['Eid']."'";
	$r=$Conn->query($selqry);
	if($d=$r->fetch_assoc())
	{
        $eid=$d['brand_id'];
		$ename=$d['brand_name'];
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
  <table width="200" border="1">
    <tr>
      <td>Brand name</td>
      <td><label for="txtbrandname"></label>
      <input required name="txthidden" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/><?php echo $eid?>
      <input type="text" name="txtbrandname" id="txtbrandname" value="<?php echo $ename?>" requiredautocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2"align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="cancel" /></td>
    </tr>
    
  </table>
  <table width="200" border="1">
  
    <tr>
      <td>Sl No</td>
      <td>Brand name</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_brand";
	$row=$Conn->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['brand_name'] ?></td>
      <td><a href="Brand.php?id=<?php echo $data['brand_id']?>">Delete</a></td>
      <td><a href="Brand.php?Eid=<?php echo $data['brand_id']?>">Edit</a></td>
    </tr>
    <?php 
	}
	?>
  </table>
</form>
</body>
</html>