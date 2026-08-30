<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


	$conn = new PDO('mysql:host=localhost;dbname=shining', 'custom', 'Smart%_000');
	
    if($_POST['id'])
    {
	echo $id=$_POST['id'];
		
	$stmt = $conn->prepare("SELECT * FROM subjects WHERE class=:id and session='2026-2027'");
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