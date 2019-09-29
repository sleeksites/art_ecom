<?php 
require 'db_info.php';
$sql = "select * from category_table";
$result = $con -> query($sql);
if($result->num_rows>0)
{
?>
	<select name="category" required class="form-control mb-2">
		<option selected disabled>Chose a category</option>
<?php
	while($row = $result->fetch_assoc())
	{	
?>
	<option value=" <?php echo $row['id'] ?> "><?php echo $row['category'] ?></option>
<?php 
	}
	?>
	</select>
<?php
}
else
{
	echo "Nothing to fetch";
}
?>