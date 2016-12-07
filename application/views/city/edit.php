<form method="post" action="">
	<select name="country_id">
		<option> Select Country</option>
		<?php foreach ($country_list as $key => $value) { ?>
			<option value="<?php echo $value['_id'];?>" <?php if($city_data['country_id'] == $value['_id']){ echo 'selected';} ?>><?php echo $value['country_name'];?></option>
		<?php } ?>
	</select>
	<input type="text" name="city_name" value="<?php echo $city_data['city_name']; ?>">
	<button type="submit"> Submit </button>
</form>