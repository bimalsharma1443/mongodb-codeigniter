	<a href="<?php echo './addcity'; ?>">Add City </a>
	<hr>
	<table>
		<thead>
			<th> Id </th>
			<th> City Name </th>
			<th> Country Name </th>
			<th> Edit </th>
			<th> Delete </th>
		</thead>
		<tbody>
			<?php $i=1; ?>
			<?php foreach ($results as $key => $value) { ?>
				<tr>
					<td> <?php echo $i; ?> </td>
					<td> <?php echo $value['city_name']; ?> </td>
					<td> <?php echo $value['country_name']; ?> </td>
					<td> <a href="<?php echo './editcity/'.$value['_id']; ?>"> Edit</a> </td>
					<td> <a href="<?php echo './deletecity/'.$value['_id']; ?>"> Delete</a> </td>
				</tr>
			<?php $i++; ?>
			<?php } ?>
		</tbody>
	</table>


	