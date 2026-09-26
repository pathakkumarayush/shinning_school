<?php
    include('dbconfig.php');
    if($_POST['id'])
    {
	$id=$_POST['id'];
		
	$stmt = $conn->prepare("SELECT * FROM subjects WHERE class=:id and session='2024-2025'");
	$stmt->execute(array(':id' => $id));
	?>
	<option selected="selected">Select Subject </option>
	<?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
	?>
    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
    <?php
	}
    }
    ?>