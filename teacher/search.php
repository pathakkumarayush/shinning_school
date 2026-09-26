<?php
include('db.php');
if($_POST)
{
$q=$_POST['search'];
$sql_res=mysqli_query($con,"select student_id,student_name,student_fname,student_scholar,student_class from student  where student_name like '%$q%' or student_scholar like '%$q%' or student_class like '%$q%' or student_fname like '%$q%' order by student_id LIMIT 50");
while($row=mysqli_fetch_array($sql_res))
{
$username=$row['student_name'];
$email=$row['student_scholar'];
$class=$row['student_class'];
$father=$row['student_fname'];

$b_username='<strong>'.$q.'</strong>';
$b_email='<strong>'.$q.'</strong>';
$b_class='<strong>'.$q.'</strong>';
$b_father='<strong>'.$q.'</strong>';

$final_username = str_ireplace($q, $b_username, $username);
$final_email = str_ireplace($q, $b_email, $email);
$final_class = str_ireplace($q, $b_class, $class);
$final_father = str_ireplace($q, $b_father, $father);
?>
<div class="show" align="left">
<span class="name">Student Name - &nbsp;&nbsp;<?php echo $final_username; ?></span>&nbsp;<span class="name">Father -&nbsp;&nbsp;<?php echo $final_father; ?></span>&nbsp;<br/><br/>

<span>Admission No&nbsp;&nbsp;- <?php echo $final_email; ?></span><br/>
<br/>
<span>Student Class &nbsp;&nbsp;- &nbsp;&nbsp;&nbsp;<?php echo $final_class; ?></span>
<br/>
</div>
<?php
}
}
?>
