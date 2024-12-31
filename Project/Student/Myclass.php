<?php

include('../Assets/connection/connection.php');
include("Head.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .profile-container {
            width: 100%;
            max-width: 1000px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h1>Booking List</h1>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <th>Slno</th>
                <th>Class</th>
                <th>Amount</th>
                <th>Tutor</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
                $i = 0;
                $sel = "SELECT  * 
                        FROM tbl_booking b 
                        INNER JOIN tbl_tutorclass t ON t.tutorclass_id = b.tutorclass_id 
                        INNER JOIN tbl_tutor tu ON t.tutor_id = tu.tutor_id  
                        INNER JOIN tbl_class c ON t.class_id = c.class_id 
                        LEFT JOIN tbl_note n ON n.class_id = c.class_id
                        WHERE b.student_id = '" . $_SESSION['studentid'] . "'";
                
                $result = $Conn->query($sel);
                
                if ($result && $result->num_rows > 0) {
                    while ($data = $result->fetch_assoc()) {
                        $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo htmlspecialchars($data['class_name']); ?></td>
                    <td><?php echo htmlspecialchars($data['student_amount']); ?></td>
                    <td><?php echo htmlspecialchars($data['tutor_name']); ?></td>
                    <td><?php echo htmlspecialchars($data['tutor_contact']); ?></td>
                    <td>
    <?php 
    if ($data['booking_status'] == 1) {
        echo "Booking Accepted";
        ?>
        <a href="Payment.php?bid=<?php echo $data['booking_id']; ?>">Pay</a>
        <?php
    } 
    elseif ($data['booking_status'] == 2) { 
        echo "Booking Confirmed";
         ?>
        <a href="<?php echo htmlspecialchars($data['tutorclass_meeturl']); ?>" target="_blank">Join Meeting</a>
        <a href="../Assets/File/Notes/<?php echo htmlspecialchars($data['note_file']); ?>" target="_blank" download>Download Note</a>
    <?php 
    }
     else { 
         echo "Not replied"; 
    } 
    ?>
</td>

                    <td>
                        <?php
                    if ($data['booking_status'] == 2) {
                        ?>
                        <a href="Complaint.php?cid=<?php echo htmlspecialchars($data['tutor_id']); ?>">Post Complaint</a><br>
                        <a href="Rating.php?rid=<?php echo htmlspecialchars($data['tutor_id']); ?>">Rating</a>
                        <?php
                    }
                    ?>
                    </td>
                </tr>
            <?php 
                    } 
                } else {
                    echo "<tr><td colspan='7'>No data available</td></tr>";
                }
            ?>
        </table>
    </form>
</div>

</body>
</html>

<?php
include("Foot.php");
?>
