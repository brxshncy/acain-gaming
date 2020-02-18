<?php
require('../controller/db.php');
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$property = "SELECT * FROM owner WHERE id ='$id' ";
	$qry = $conn->query($property) or trigger_error(mysqli_error($conn)." ".$property);
	$a = mysqli_fetch_assoc($qry);
	$z = $a['id'];
	 ?>
	<div class="row">
		<div class="col col-md-6">
			<div class="form-group">
				<label>Owner Name</label>
				<input type="hidden" name="p_owner_id" class="form-control" value="<?php echo $a['id'] ?>" readonly>
				<input type="text" class="form-control" value="<?php echo ucwords($a['fname']." ".$a['lname']) ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col col-md-6">
			<div class="form-group">
				<label>Property ID</label>
				<select name="property_id" class="form-control">
					<option value=""></option>
					<?php
						$props = "SELECT * FROM property WHERE owner_id = '$z' ";
						$run = $conn->query($props) or trigger_error(mysqli_error($conn)." ".$props);
						while($o = mysqli_fetch_assoc($run)): ?>
						<option value="<?php echo $o['id'] ?>"><?php echo $o['prop_u_id']; ?></option>
					<?php endwhile ?>
				</select>
			</div>
		</div>
	</div>
	<hr>


<?php } ?>

	<div id="props_details">
	</div>
<script>
	$(document).ready(function(){
	$('#props_id').change(function(){
		let props_id = $(this).val();
		console.log(props_id);
		if(props_id !== ""){
				$.ajax({
				url:'ajax_calls/property_details.php',
				method:'post',
				data:{id:props_id},
				success:function(data){
					$('#props_details').html(data);
					$('#props_details').show();
				},
				error:function(err){
					console.log(err)
				}
			})
		}
		else{
			$('#props_details').hide();
		}
	
	})
})
</script>

