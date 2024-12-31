<?php
include('../Assets/connection/connection.php');
include("Head.php");
$sel="select * from tbl_student s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where student_id='".$_SESSION['studentid']."'";
$row=$Conn->query($sel);
$data=$row->fetch_assoc() 
?>
	





    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .profile-container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        td {
            padding: 12px;
            border: 1px solid #ddd;
            vertical-align: top;
        }
        td:first-child {
            font-weight: bold;
            text-align: right;
            width: 30%;
        }
        td:last-child {
            text-align: left;
        }
        img {
            display: block;
            margin: 0 auto 10px;
            border-radius: 8px;
        }
        .action-links {
            text-align: center;
        }
        .action-links a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 4px;
            margin: 5px;
            display: inline-block;
        }
        .action-links a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h1>My Profile</h1>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td colspan="2" align="center">
                    <img src="../Assets/File/Student/<?php echo htmlspecialchars($data['student_photo']); ?>" width="167px" height="339px" alt="Student Photo"/>
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo htmlspecialchars($data['student_name']); ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo htmlspecialchars($data['student_email']); ?></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><?php echo htmlspecialchars($data['student_contact']); ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo htmlspecialchars($data['student_address']); ?></td>
            </tr>
            <tr>
                <td>District</td>
                <td><?php echo htmlspecialchars($data['district_name']); ?></td>
            </tr>
            <tr>
                <td>Place</td>
                <td><?php echo htmlspecialchars($data['place_name']); ?></td>
            </tr>
        </table>
        <div class="action-links">
            <a href="Editprofile.php">Edit Profile</a>
            <a href="Changepassword.php">Change Password</a>
        </div>
    </form>
</div>

</body>
</html>

<?php
include("Foot.php");
?>