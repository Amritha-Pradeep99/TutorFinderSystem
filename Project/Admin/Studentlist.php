<?php
include('../Assets/connection/connection.php');
include("Head.php");

?>
   
	
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
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
        img {
            border-radius: 4px;
        }
        .Container{
            width: 1200px;
            margin-left:260px;
            overflow-x: scroll !important;

        }
        form{
            display:flex;
            justify-content:center;
            margin:20px;
            margin-left:40px;
            flex-direction:column;
            align-items:flex-end;
        }
    </style>
</head>
<body>
    <h1>Student List</h1>
    <form id="form1" name="form1" method="post" action=""  >
        <div class="Container">
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
                <th>Photo</th>
            </tr>
            <?php
            $i = 0;
            $sel = "SELECT * 
                    FROM tbl_student s 
                    INNER JOIN tbl_place p ON s.place_id = p.place_id 
                    INNER JOIN tbl_district d ON d.district_id = p.district_id";
            $result = $Conn->query($sel);
            while ($data = $result->fetch_assoc()) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data['student_name'] ?></td>
                <td><?php echo $data['student_email'] ?></td>
                <td><?php echo $data['student_gender'] ?></td>
                <td><?php echo $data['student_contact'] ?></td>
                <td><?php echo $data['student_address'] ?></td>
                <td><?php echo $data['student_dob'] ?></td>
                <td><?php echo $data['district_name'] ?></td>
                <td><?php echo $data['place_name'] ?></td>
                <td>
                    <img src="../Assets/File/Student/<?php echo $data['student_photo'] ?>" width="50" height="50" alt="Student Photo">
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
        </div>
    </form>
</body>
</html>
<?php
include("Foot.php");
?>
