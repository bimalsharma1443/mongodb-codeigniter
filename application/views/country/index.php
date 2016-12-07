	<a href="<?php echo './addcountry'; ?>">Add Country </a>
	<hr>
	<table>
		<thead>
			<th> Id </th>
			<th> Country Name </th>
			<th> Edit </th>
			<th> Delete </th>
		</thead>
		<tbody>
			<?php $i=1; ?>
			<?php if(count($results) != 0){?>
				<?php foreach ($results as $key => $value) { ?>
					<tr>
						<td> <?php echo $i; ?> </td>
						<td> <?php echo $value['country_name']; ?> </td>
						<td> <a href="<?php echo './editcountry/'.$value['_id']; ?>"> Edit</a> </td>
						<td> <a href="<?php echo './deletecountry/'.$value['_id']; ?>"> Delete</a> </td>
					</tr>
				<?php $i++; ?>
				<?php } ?>
			<?php }else{ ?>
				<tr> 
					<td colspan="4">
						No Country is added
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>


	