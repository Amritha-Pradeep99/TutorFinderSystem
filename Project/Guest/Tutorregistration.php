<?php
include("../Assets/connection/connection.php");
if(isset($_POST['btnsubmit']))
{
	$Name=$_POST["txtname"];
	$Email=$_POST["txtemail"];
	$Contact=$_POST["txtcontact"];
	$Password=$_POST["txtpassword"];
	$Confirmpassword=$_POST["txtconfirmpassword"];
	$gender=$_POST['txtgender'];
	$dob=$_POST['txtdob'];
	$sub=$_POST['selsub'];
	/*$Photo=$_FILES["txt_photo"]["name"];
	$path=$_FILES["txt_photo"]["tmp_name"];
	move_uploaded_file($path,"../Assets/File/Tutor/".$Photo);*/
	$Place=$_POST["selplace"];
	$address=$_POST['txtaddress'];
	if($Password==$Confirmpassword){
	$ins="insert into tbl_tutor(tutor_name,tutor_email,tutor_contact,tutor_password,place_id,tutor_gender,tutor_dob,subject_id,tutor_address)values('".$Name."','".$Email."','".$Contact."','".$Password."','".$Place."','".$gender."','".$dob."','".$sub."','".$address."')";
	if($Conn->query($ins))
	{
		echo "<script>
		alert('inserted');
		window.location='Tutorregistration.php';
		</script>";
	}
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tutor Registration</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
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
        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto 50px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table td {
            padding: 12px;
        }
        table td:first-child {
            font-weight: bold;
            text-align: left;
            width: 30%;
            color: #007bff;
        }
        table td:last-child {
            text-align: center;
        }
        input[type="text"], input[type="file"], select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        .gender-label {
            color: #007bff;
            text-align: center;
            display: inline-block;
            margin: 0 10px;
        }
        input[type="submit"], input[type="reset"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #0056b3;
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

<!-- Home link above the form container -->
<a href="../index.php" class="home-link">Home</a>

<div class="form-container">
    <h1>Tutor Registration</h1>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table>
            <tr>
                <td>Name</td>
                <td><input required type="text" name="txtname" id="txtname" title="Name Allows Only Alphabets, Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" /></td>
            </tr>
            <tr>
                <td>District</td>
                <td>
                    <select name="seldistrict" id="seldistrict" onchange="getPlace(this.value)" required>
                        <option>---select---</option>
                        <?php
                            $sel="select * from tbl_district";
                            $result=$Conn->query($sel);
                            while($data=$result->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $data["district_id"]?>"><?php echo $data["district_name"]?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Place</td>
                <td>
                    <select name="selplace" id="selplace" required>
                        <option>--select--</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Subject</td>
                <td>
                    <select name="selsub" id="selsub" required>
                        <option>--select--</option>
                        <?php
                            $selQry="select * from tbl_subject";
                            $r=$Conn->query($selQry);
                            while($d=$r->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $d['subject_id']?>"><?php echo $d['subject_name']?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Gender</td>
                <td style="text-align:left;">
                    <span class="gender-label"><input type="radio" required name="txtgender" id="txtgender" value="male" /> Male</span>
                    <span class="gender-label"><input type="radio" name="txtgender" id="txtgender" value="female" /> Female</span>
                </td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><input type="date" name="txtdob" id="txtdob" required /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" required name="txtemail" id="txtemail" /></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="txtaddress" id="txtaddress" required></textarea></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><input type="text" required name="txtcontact" pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaining 9 digits with 0-9" id="txtcontact" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txtpassword" id="txtpassword" /></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txtconfirmpassword" id="txtconfirmpassword" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnsubmit" id="btnsubmit" value="Register" />
                    <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>

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