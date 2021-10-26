<?php 
include('connection.php');
if(!empty($_POST["state_id"]))
{
  
	$query="select * from city_master where state_id=".$_POST["state_id"];
	$res=mysqli_query($conn,$query);
	while($row=mysqli_fetch_assoc($res)){
            ?>
			<option value="<?php echo $row["city_id"]; ?>"><?php echo $row["city_name"]; ?></option>
			<?php
	}
}
?>