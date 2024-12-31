<?php
include('../Assets/connection/connection.php');
include("Head.php");
if(isset($_POST["btnsubmit"]))
{
	$Amount=$_POST["txtamount"];
	$Class=$_POST["sel_class"];
	$insQry="insert into tbl_tutorclass(tutorclass_amount,class_id,tutor_id)values('".$Amount."','".$Class."','".$_SESSION['tutorid']."')";
	 if($Conn->query($insQry))
	 {
		 echo "<script>
		 alert('inserted');
		 window.location='Tutorclass.php';
		 </script>";
	 }
}
if(isset($_GET['id']))
{
	$del="delete from tbl_tutorclass where tutorclass_id=".$_GET['id'];
	if($Conn->query($del))
	{
		echo "<script>
		alert('Deleted');
		window.location='Tutorclass.php';
		</script>";
	}
}
?>
	

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class and Amount Submission</title>
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
        input[type="text"], select {
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
    <h1>Submit Class and Amount</h1>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td><label for="sel_class">Class</label></td>
                <td>
                    <select name="sel_class" id="sel_class" required>
                        <option value="">---Select---</option>
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
                <td><label for="txtamount">Amount</label></td>
                <td><input type="text" name="txtamount" id="txtamount" required /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
                </td>
            </tr>
        </table>
    </form>

    <h1>Class List</h1>
    <table class="list-table">
        <tr>
            <th>Sl No</th>
            <th>Class</th>
            <th>Amount</th>
            <th>Action</th>
        </tr>
        <?php
        $i=0;
        $sel="select * from tbl_tutorclass tc inner join tbl_class c on c.class_id = tc.class_id where tutor_id='".$_SESSION['tutorid']."'";
        $result=$Conn->query($sel);
        while($data=$result->fetch_assoc()) {
        $i++;
        ?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $data["class_name"]?></td>
            <td><?php echo $data["tutorclass_amount"]?></td>
            <td>
                <a href="Tutorclass.php?id=<?php echo $data['tutorclass_id']?>">Delete</a>
                <a href="Demo.php?did=<?php echo $data['tutorclass_id']?>">Demo Class</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>

<?php
include("Foot.php");
?>