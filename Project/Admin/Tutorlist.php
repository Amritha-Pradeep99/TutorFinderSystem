<?php
include('../Assets/connection/connection.php');
include("Head.php");

?>
   
	
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tutor List</title>
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
        width: 50%;
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
    form{
            display:flex;
            justify-content:center;
            margin:20px;
            margin-left:70px;
            flex-direction:column;
            align-items:flex-end;
        }
</style>
</head>
<body>
  <h1 align="center">Tutor List</h1>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <th>SlNo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Address</th>
                <th>DOB</th>
                <th>District</th>
                <th>Place</th>
            </tr>
            <?php
                $i = 0;
                $sel = "SELECT * 
                        FROM tbl_tutor s 
                        INNER JOIN tbl_place p ON s.place_id = p.place_id 
                        INNER JOIN tbl_district d ON d.district_id = p.district_id";
                $result = $Conn->query($sel);
                while ($data = $result->fetch_assoc()) {
                    $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data['tutor_name'] ?></td>
                <td><?php echo $data['tutor_email'] ?></td>
                <td><?php echo $data['tutor_gender'] ?></td>
                <td><?php echo $data['tutor_contact'] ?></td>
                <td><?php echo $data['tutor_address'] ?></td>
                <td><?php echo $data['tutor_dob'] ?></td>
                <td><?php echo $data['district_name'] ?></td>
                <td><?php echo $data['place_name'] ?></td>
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
