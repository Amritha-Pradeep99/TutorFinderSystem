<?php
include('../Assets/connection/connection.php');
if(isset($_POST['btnregister']))
{
	$name=$_POST["txtname"];
	$email=$_POST["txtemail"];
	$contact=$_POST["txtcontact"];
	$address=$_POST["txtaddress"];
	$gender=$_POST["txtgender"];

	$dob=$_POST["txtdob"];
	$password=$_POST["txtpassword"];
	$photo=$_FILES["txt_photo"]["name"];
	$path=$_FILES["txt_photo"]["tmp_name"];
	move_uploaded_file($path,'../Assets/File/Student/'.$photo);
	$place=$_POST["selplace"];
	$ins="insert into tbl_student(student_name,student_email,student_contact,student_address,student_dob,student_password,student_photo,place_id,student_gender)values('".$name."','".$email."','".$contact."','".$address."','".$dob."','".$password."','".$photo."','".$place."','".$gender."')";
	
	if($Conn->query($ins))
	{
		echo "<script>
		alert('inserted');
		window.location='Studentreg.php';
		</script>";
	}
}

	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        /* Body and Container Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #007bff; /* Blue text color */
        }
        .container {
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
            font-size: 24px;
            color: #007bff; /* Blue heading */
        }

        /* Link Styling */
        .home-link {
            display: inline-block;
            margin: 20px auto;
            text-align: center;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            width: 80px;
            transition: background-color 0.3s;
        }
        .home-link:hover {
            background-color: #0056b3;
        }

        /* Form and Input Styling */
        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
        }
        .label {
            width: 30%;
            font-weight: bold;
            color: #007bff;
        }
        .value {
            width: 70%;
        }
        input[type="text"], input[type="file"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="radio"] {
            margin-right: 5px;
        }

        /* Buttons */
        .buttons {
            text-align: center;
            margin-top: 20px;
        }
        input[type="submit"], input[type="reset"] {
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        input[type="reset"] {
            background-color: #f4f4f4;
            color: #007bff;
            border: 1px solid #007bff;
        }
        input[type="reset"]:hover {
            background-color: #e0e0e0;
        }
        textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical; /* Allow resizing only vertically */
    min-height: 100px; /* Set a minimum height */
    font-family: Arial, sans-serif;
    font-size: 16px;
}
input[type="date"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
    font-size: 16px;
    color: #333;
}

    </style>
</head>
<body>

<!-- Home Link Outside the Container -->
<a href="../index.php" class="home-link">Home</a>

<div class="container">
    <h1>Student Registration</h1>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="row">
            <div class="label">Name</div>
            <div class="value"><input type="text" required name="txtname" id="txtname" title="Name Allows Only Alphabets, Spaces, and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" /></div>
        </div>
        <div class="row">
            <div class="label">Email</div>
            <div class="value"><input type="text" required name="txtemail" id="txtemail" /></div>
        </div>
        <div class="row">
            <div class="label">Gender</div>
            <div class="value">
                <label><input type="radio" name="txtgender" value="male" required /> Male</label>
                <label><input type="radio" name="txtgender" value="female" /> Female</label>
            </div>
        </div>
        <div class="row">
            <div class="label">District</div>
            <div class="value">
                <select name="seldistrict" id="seldistrict" onchange="getPlace(this.value)" required>
                    <option value="">---select---</option>
                    <!-- PHP Code for dynamic options -->
                    <?php
                        $sel="select * from tbl_district";
                        $result=$Conn->query($sel);
                        while($data=$result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $data["district_id"]?>"><?php echo $data["district_name"]?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="label">Place</div>
            <div class="value">
                <select name="selplace" id="selplace" required>
                    <option value="">---select---</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="label">Contact</div>
            <div class="value"><input type="text" required name="txtcontact" pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaining 9 digits with 0-9" /></div>
        </div>
        <div class="row">
            <div class="label">Address</div>
            <div class="value">
        <textarea name="txtaddress" id="txtaddress" required></textarea></div>
        </div>
        <div class="row">
            <div class="label">Date of Birth</div>
            <div class="value"><input type="date" name="txtdob" id="txtdob" required  max=""/></div>
        </div>
        <div class="row">
            <div class="label">Password</div>
            <div class="value"><input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters" required name="txtpassword" /></div>
        </div>
        <div class="row">
            <div class="label">Photo</div>
            <div class="value"><input type="file" name="txt_photo" id="txt_photo" required /></div>
        </div>
        <div class="buttons">
            <input type="submit" name="btnregister" id="btnregister" value="Register" />
            <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
        </div>
    </form>
</div>

</body>
</html>

<script>
    // Calculate the date 5 years ago from today
    const today = new Date();
    const fiveYearsAgo = new Date(today.getFullYear() - 5, today.getMonth(), today.getDate());

    // Format the date as YYYY-MM-DD for the input max attribute
    const maxDate = fiveYearsAgo.toISOString().split('T')[0];

    // Set the max attribute to the calculated date
    document.getElementById('txtdob').setAttribute('max', maxDate);
</script>

 <script src="../Assets/JQ/jQuery.js"></script>
<script>

    
  function getPlace(did) {
    $.ajax({
      url: "../Assets/Ajaxpages/Ajaxplace.php?did=" + did,
      success: function (result) {

        $("#selplace").html(result);
      }
    });
  }

</script>