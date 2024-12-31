<?php 
include("../Assets/connection/connection.php");
include("Head.php");

if(isset($_POST["btnsubmit"]))
{
	$Place=$_POST["txtplacename"];
	$District=$_POST["sel_dis"];
	$insQry="insert into tbl_place(place_name,district_id)values('".$Place."','".$District."')";
	 if($Conn->query($insQry))
	 {
		 echo "<script>
		 alert('inserted');
		 window.location='Place.php';
		 </script>";
	 }
}
if(isset($_GET['id']))
{
	$del="delete from tbl_place where place_id=".$_GET['id'];
	if($Conn->query($del))
	{
		echo "<script>
		alert('Deleted');
		window.location='Place.php';
		</script>";
	}
}
?>
	



  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Management</title>
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
        input[type="text"], select {
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

<form id="form" name="form1" method="post" action="">
    <h1>Place</h1>
    <table>
        <tr>
            <td>District</td>
            <td>
                <select name="sel_dis" id="sel_dis" required>
                    <option value="">---Select---</option>
                    <?php
                    $sel = "SELECT * FROM tbl_district";
                    $result = $Conn->query($sel);
                    while ($data = $result->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $data["district_id"] ?>"><?php echo $data["district_name"] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Place Name</td>
            <td>
                <input type="text" required name="txtplacename" id="txtplacename">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit">
                <input type="submit" name="btncancel" id="btncancel" value="Cancel">
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <th>SlNo</th>
            <th>District</th>
            <th>Place</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
        $sel = "SELECT * FROM tbl_place p INNER JOIN tbl_district d ON d.district_id = p.district_id";
        $result = $Conn->query($sel);
        while ($data = $result->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data["district_name"] ?></td>
                <td><?php echo $data["place_name"] ?></td>
                <td><a href="Place.php?id=<?php echo $data['place_id'] ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
</form>

</body>
</html>

<?php
include("Foot.php");
?>