<?php
include('../Assets/connection/connection.php');
include("Head.php");
if(isset($_GET['aid']))
{
    $upQry="update tbl_booking set booking_status='1' where booking_id = '".$_GET['aid']."'";
    if($Conn->query($upQry))
    {
        ?>
        <script>
            alert("Accepted");
            window.location="Viewstudentbooking.php";
        </script>
        <?php
    }
    
}
if(isset($_GET['rid']))
{
    $upQry="update tbl_booking set booking_status='3' where booking_id = '".$_GET['rid']."'";
    if($Conn->query($upQry))
    {
        ?>
        <script>
            alert("Rejected");
            window.location="Viewstudentbooking.php";
        </script>
        <?php
    }
    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Booking List</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .table-container {
        width: 100%;
        max-width: 800px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
    h1 {
        text-align: center;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }
    th {
        background-color: #f4f4f4;
        font-weight: bold;
    }
    td {
        color: #333;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    a {
        color: #007bff;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>

<div class="table-container">
    <h1>Booking List</h1>
    <table>
        <thead>
            <tr>
                <th>Slno</th>
                <th>Student Name</th>
                <th>Contact</th>
                <th>Class</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = 0;
            $sel = "SELECT * FROM tbl_booking b 
                    INNER JOIN tbl_student s ON b.student_id = s.student_id 
                    INNER JOIN tbl_tutorclass t ON t.tutorclass_id = b.tutorclass_id 
                    INNER JOIN tbl_class c ON t.class_id = c.class_id 
                    WHERE tutor_id = '".$_SESSION['tutorid']."'";
            $result = $Conn->query($sel);
            while ($data = $result->fetch_assoc()) {
                $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['student_name']; ?></td>
                <td><?php echo $data['student_contact']; ?></td>
                <td><?php echo $data['class_name']; ?></td>
                <td><?php echo $data['student_amount']; ?></td>
                <td><?php echo $data['booking_date']; ?></td>
                <td>
    <?php

    if ($data['booking_status'] == 0) {
        echo "booked";

        ?>
        <a href="Viewstudentbooking.php?aid=<?php echo $data['booking_id']; ?>">Accepted</a>
        <?php
    } else if ($data['booking_status'] == 1) {
        echo "Accepted";
    }
    else if($data['booking_status'] == 2)
    {

        echo "Payment completed";
        ?>
        <a href="AddUrl.php?id=<?php echo $data['booking_id']; ?>">Add URL</a>
        <?php
    } else if ($data['booking_status'] == 3) {
        ?>
        <a href="Viewstudentbooking.php?rid=<?php echo $data['booking_id']; ?>">Rejected</a>
        <?php
    }
    // else{
    //     echo "Pending";
    // }
    ?>
</td>

            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
include("Foot.php");
?>