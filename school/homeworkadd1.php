<script>
function show(remark,id,school,name)
{

var rm=document.getElementById(remark).value;
var sch=document.getElementById(school).value;
var name=document.getElementById(name).value;
window.location="show.php?q="+rm+"&id="+id+"&sch="+sch+"&name="+name;

}
</script>
<script language="javascript">
function checkAll()
{
if (myform.allbox.checked==true)
	for(i=0; i<document.myform.elements.length;i++)
	{
		document.myform.elements[i].checked=true;
	}
else
{
	for (i=0; i<document.myform.elements.length;i++)
	{
		document.myform.elements[i].checked=false;
	}
}
}
</script>
<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}

.col_4{ width:100%; height:auto; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
-moz-box-shadow: 0 0 10px rgba(0,0,0, .65);
box-shadow: 0 0 10px rgba(0,0,0, .65);}
::-webkit-input-placeholder {
    color:    #000;
}
:-moz-placeholder {
    color:    #000;
}
::-moz-placeholder {
    color:    #000;
}
:-ms-input-placeholder {
    color:    #000;
}


.form-style-2-heading{
    font-weight: bold;
    font-style: italic;
    border-bottom: 2px solid #ddd;
    margin-bottom: 20px;
    font-size: 15px;
    padding:10px;
}

input[type="text"],input[type="email"],input[type="number"] {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 20px;
}
.select {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
}
.input-mini{
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 37px;
}
textarea{
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
}
input[type="text"]:focus,
input[type="text"].focus {
  border: solid 5px #339933;
  background-color:#eaeaea;
}
input[type="email"]:focus,
input[type="email"].focus {
  border: solid 5px #339933;
  background-color:#eaeaea;
}
textarea:focus{border: solid 5px #339933;background-color:#eaeaea;}
input[type=submit],
input[type=button]{
    border: none;
    background: #FF8500;
    color: #fff;
    box-shadow: 1px 1px 4px #DADADA;
    -moz-box-shadow: 1px 1px 4px #DADADA;
    -webkit-box-shadow: 1px 1px 4px #DADADA;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
	padding:10px;
	font-weight:bold;
	
	
}
input[type=submit]:hover,
input[type=button]:hover{
    background: #EA7B00;
    color: #fff;
}

.row-fluid .span6 {
    width: 48%;
	float:left;
   
    margin-top: 10px;
    margin-left: 5px;
}
.pagination {
margin-left:20px;
   
}
.pagination ul {
    display: inline-block;
    *display: inline;
    margin-bottom: 0;
    margin-left: 50px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    *zoom: 1;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}
.pagination ul > li {
    display: inline;
}
.pagination ul > li:first-child > a, .pagination ul > li:first-child > span {
    border-left-width: 1px;
    -webkit-border-bottom-left-radius: 4px;
    border-bottom-left-radius: 4px;
    -webkit-border-top-left-radius: 4px;
    border-top-left-radius: 4px;
    -moz-border-radius-bottomleft: 4px;
    -moz-border-radius-topleft: 4px;
}
.pagination ul > li > a, .pagination ul > li > span {
    float: left;
    padding: 4px 12px;
    line-height: 20px;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
    border-left-width: 0;
}
.pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span {
    background-color: #f5f5f5;
}
.pagination ul > .active > a, .pagination ul > .active > span {
    color: #999;
    cursor: default;
}
.table{ width:100%; margin-top:10px;}
.dataTables_filter{ margin-top:-18px; padding:10px;}
</style>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/short-code-sms.png" /><a href="./?pageid=sent_message">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/Sms-icon.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Send Homework</h2>
</div>
<div class="col_4" style="margin-top:0px; " >	

<?php
if(isset($_POST['submit']))
{

$id = $_POST['id'];
$type = 'student';
$subj = 'Homework';
$status ='Yes';
$date=date("Y-m-d");
$msg="Homework For Your Child is ".$_SESSION['homwork']." Alloted date is ".$_SESSION['datefrom']." and submission date is ".$_SESSION['dateto']."."; 
$sch=$_SESSION['uid'];


foreach($_POST['formDoor'] as $id2)
{

$result=mysqli_query($con,"insert into sendmsg(sender,sender_user,reciever,sub,msg,status,date,session,type,class) values('".$_SESSION['uid']."','".$_SESSION['uid']."','".$id2."','".$subj."','".$msg."','".$status."','".$date."','".$_SESSION['session']."','$type','".$_SESSION['class']."')")or die(mysqli_error());	
?>
<script type="text/livescript">
window.alert("Homework send successsfully");
</script>
 <script type="text/livescript">
	 window.location="<?php echo $var."homeworkadd";  ?>";
	</script>
<?php
}
}
?>
<?php
$subj1=mysqli_query($con,"SELECT * FROM class WHERE class = '".$_SESSION['class']."' and school='".$_SESSION['uid']."'");
$subj11=mysqli_fetch_array($subj1);
//$sub=mysqli_query($con,"select * from classsubject where class='".$subj11["class"].$subj11["class_section"]."' and school='".$_SESSION['schoolname']."'");
//$rowsub=mysqli_fetch_array($sub);

$student=mysqli_query($con,"SELECT * FROM `student` WHERE student_class='".$subj11["class"]."' and student_section='".$subj11["class_section"]."' and student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'");

?>


<br />
<h2 style="color: #006633; margin-left:30px; font-size:18px; ">Weekly Home Work For <?php echo $subj11["class"].$subj11["class_section"];   ?> &nbsp; &nbsp;</h2>
<br />

<div>
<form action="" method="post" name="myform" enctype="multipart/form-data" style="margin-left:20px;">
<div style="border:#FF0000 0px solid">
<table border="1" width="550">
<tr>
<td>
 <input type='checkbox' value='on' id='chkall' name='allbox' onclick='checkAll();'/>
</td>
<td>Student Name</td>
<td>Homework</td>
</tr>
<?php
$i=1;
while($rowstud=mysqli_fetch_array($student))
{
	
?>

<tr>
<td>
<input type="checkbox" name='formDoor[]' value="<?php echo $rowstud["student_id"]; ?>"  id='chk<?php echo $i; ?>' /></td>
<td>&nbsp;<?php echo ucwords($rowstud['student_name']); ?></td>
<input type="hidden" name="id" value="<?php echo $rowstud['uid']; ?>">
<input type="hidden" name="student_id" value="<?php echo $rowstud['student_id']; ?>">
<input type="hidden" name="school" id="school" value="<?php echo $rowstud['student_school']; ?>">
<input type="hidden" name="name" id="name" value="<?php echo $rowstud['student_name']; ?>">
<td>
<div style="border:#FF0000 0px solid; width:400px; height:50px; overflow:scroll; font-weight:bold">

    <?php
    echo "Homework For Your Child is ".$_SESSION['homwork']." Alloted date is ".$_SESSION['datefrom']." and submission date is ".$_SESSION['dateto']."."; 
    ?>
   
   </div>
   </td>
  </td>

</tr>
<?php
$i++;
}
?>
</table>
<br>
<input type="submit"  name="submit" style="float:left; " value="Send Homework"/>
</div>
</form>
</div>


</div>
					</div>
			</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>		
