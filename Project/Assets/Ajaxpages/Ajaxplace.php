 <option>---select---</option>
        <?php
        include('../connection/connection.php');
        $sel="select * from tbl_place where district_id='".$_GET['did']."'";
	    $result=$Conn->query($sel);
	    while($data=$result->fetch_assoc())
	{
		?>
        <option value="<?php echo $data["place_id"]?>"><?php echo $data["place_name"]?></option>
        <?php
	}
	?>