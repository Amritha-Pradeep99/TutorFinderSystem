<?php
include('../Assets/connection/connection.php');
include("Head.php");
if(isset($_GET["id"]))
{
	$selQry="select * from tbl_tutorclass ";
	$result1=$Conn->query($selQry);
    $data1=$result1->fetch_assoc();
   	$samount=$data1['tutorclass_amount'];
	
	
	
	$insQry="insert into tbl_booking(student_amount,tutorclass_id,student_id,booking_date,booking_status)values('".$samount."','".$_GET['id']."','".$_SESSION['studentid']."',curdate(),'0')";
	 if($Conn->query($insQry))
	 {
		 ?>
		 <script>
		 alert('Booked');
		 window.location='Viewclass.php';
		 </script>
         <?php
	 }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
        .star-light {
            color: #FC3;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<form id="form1" name="form1" method="post" action="">
    <table>
        <tr>
            <th>Slno</th>
            <th>Class</th>
            <th>Amount</th>
            <th>Tutor</th>
            <th>Contact</th>
            <th>Rating</th>
            <th>Demo</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
        $sel = "SELECT * 
        FROM tbl_tutorclass tc 
        INNER JOIN tbl_class c ON c.class_id = tc.class_id 
        INNER JOIN tbl_tutor t ON tc.tutor_id = t.tutor_id  
        LEFT JOIN tbl_demo d ON d.tutorclass_id = tc.tutorclass_id
        WHERE c.class_id = tc.class_id;
        ";
        $result = $Conn->query($sel);
        while ($data = $result->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><b style="color:#007bff"><?php echo $data['class_name'] ?></b></td>
                <td><?php echo $data['tutorclass_amount'] ?></td>
                <td><?php echo $data['tutor_name'] ?></td>
                <td><?php echo $data['tutor_contact'] ?></td>
                <td>
                    <?php
                    $average_rating = 0;
                    $total_review = 0;
                    $five_star_review = 0;
                    $four_star_review = 0;
                    $three_star_review = 0;
                    $two_star_review = 0;
                    $one_star_review = 0;
                    $total_user_rating = 0;

                    $query = "SELECT * FROM tbl_review WHERE tutor_id = '" . $data["tutor_id"] . "' ORDER BY review_id DESC";
                    $result1 = $Conn->query($query);

                    while ($row = $result1->fetch_assoc()) {
                        if ($row["review_rating"] == '5') { $five_star_review++; }
                        if ($row["review_rating"] == '4') { $four_star_review++; }
                        if ($row["review_rating"] == '3') { $three_star_review++; }
                        if ($row["review_rating"] == '2') { $two_star_review++; }
                        if ($row["review_rating"] == '1') { $one_star_review++; }

                        $total_review++;
                        $total_user_rating += $row["review_rating"];
                    }

                    if ($total_review > 0) {
                        $average_rating = $total_user_rating / $total_review;
                    }
                    ?>
                    <div style="font-size: 20px; color: #F96;">
                        <?php
                        for ($star = 1; $star <= 5; $star++) {
                            if ($star <= $average_rating) {
                                echo '<i class="fas fa-star star-light"></i>';
                            } else {
                                echo '<i class="fas fa-star" style="color:#999;"></i>';
                            }
                        }
                        ?>
                    </div>
                    <td>
    <?php if (!empty($data['demo_file'])): ?>
        <a href="../Assets/File/Tutor/<?php echo $data['demo_file']; ?>" target="_blank">Demo Class</a>
    <?php else: ?>
        <!-- Leave blank or add alternative content here -->
    <?php endif; ?>
</td>

                </td>
                <td><a href="Viewclass.php?id=<?php echo $data['tutorclass_id'] ?>">Book</a></td>
            </tr>
        <?php } ?>
    </table>
</form>

</body>
</html>
<?php
include("Foot.php");
?>