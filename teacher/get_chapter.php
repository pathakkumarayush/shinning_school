<?php
include('dbconfig.php');
if($_POST['id'])
{
	$id=$_POST['id'];
	
	$stmt = $conn->prepare("SELECT * FROM add_chapter WHERE subject_id=:id");
	$stmt->execute(array(':id' => $id));
	?><option selected="selected">Select Chapter :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
		<option value="<?php echo $row['id']; ?>"><?php echo $row['cname']; ?></option>
		<?php
	}
}
?>