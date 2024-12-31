<?php
include('../Assets/connection/connection.php');
$eid="";
$ename="";
if(isset($_POST['btnsubmit']))
{
	$name = $_POST['txtcategoryname'];
	$hid = $_POST['txthidden'];
	$selqry="select * from tbl_category where category_name='".$name."'";
	$ro=$Conn->query($selqry);
	if($do=$ro->fetch_assoc())
	{
		echo "<script>
		alert('already exit');
		window.location='Category.php';
		</script>";
	}
	else
	{
		if($hid!="")
		{
			$upqry="update tbl_category set category_name='".$name."' where category_id='".$hid."'";
	        if($Conn->query($upqry))
			{
				echo "<script>
				alert('updated');
				window.location='Category.php';
				</script>";
			}
			else
			{
				echo "<script>
				alert('updation failed');
				window.location='Category.php';
				</script>";
			}
		}
			else
	    	{
			
			
	        $ins = "insert into tbl_category(category_name)values('".$name."')";
	        if($Conn->query($ins))
	        {
	         	
	      	echo "<script>
		    alert('inserted');
		    window.location='Category.php';
		    </script>";
	
	        }
	        else
	        {
		    echo "<script>
	    	alert('insertion failed');
		    window.location='Category.php';
		    </script>";
	        }
		}
	}
}
if(isset($_GET['id']))
{
	$del="delete from tbl_category where category_id='".$_GET['id']."'";
	if($Conn->query($del))
	{
		echo"<script>
		alert('Deleted');

		window.location'Category.php';
		</script>";
	}
}
if(isset($_GET['Eid']))
{
	$selqry="select * from tbl_category where category_id='".$_GET['Eid']."'";
	$r=$Conn->query($selqry);
	if($d=$r->fetch_assoc())
	{
        $eid=$d['category_id'];
		$ename=$d['category_name'];
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
      <td>Category name</td>
      <td><label for="txtcategoryname"></label>
       <input name="txthidden" type="hidden" value="<?php echo $eid?>"/>
      <input type="text" name="txtcategoryname" id="txtcategoryname"  value="<?php echo $ename?>" requiredautocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2"align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="cancel" /></td>
    </tr>
  </table>
  <table width="200" border="1">
    <tr>
      <td>Sl No</td>
      <td>Category name</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_category";
	$row=$Conn->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
        
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['category_name'] ?></td>
      <td><a href="Category.php?id=<?php echo $data['category_id']?>">Delete</a></td>
      <td><a href="Category.php?Eid=<?php echo $data['category_id']?>">Edit</a></td>
      <?php
      }
      ?>
    </tr>
  </table>
</form>
</body>
</html>