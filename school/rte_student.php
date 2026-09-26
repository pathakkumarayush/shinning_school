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
<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do You Want To Delete This Student")) { 
        return false;
    }
    }
</script>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Student Detail/home.png" /><a href="./?pageid=student_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">RTE Student</h2>
</div>
<?php
if(!empty($_GET['did']))
{

$d=date("Y-m-d");
$query=mysqli_query($con,"update student set status='2',tcdate='$d' where student_id='".$_GET['did']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."'");	 

}
?>
<?php
$maxid=mysqli_query($con,"select count(student_id) from student where rti='Yes' and student_school='".$_SESSION["uid"]."' and student_session='".$_SESSION['session']."'and status='0'");
$maxrow=mysqli_fetch_array($maxid);
$rowmax=mysqli_fetch_array($maxid);
?>
<div class="col_4">
<div class="form-style-2-heading">Total Student: <?php echo $maxrow['count(student_id)']; ?></div>
<table class="table table-bordered" id="sample_1" style="font-size:12px; ">
              <thead style="background-color:#009933; color:#FFFFFF">
              <tr style="background-color:#009933;color:#FFFFFF">
                  <th>No.</th>
				  <th>Scholar No.</th>
                  <th>Name</th>
                  <th>Father</th>
				  <th>Class</th>
                  <th>Mobile</th>
                  <th>Action</th>
              </tr>
			  
			  
              </thead>
			  
              <tbody>
			  <?php
    $sql=mysqli_query($con,"select * from student where rti='Yes' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
	
	$i=1;
	while($row=mysqli_fetch_array( $sql))
	{
		?>
                  <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $row['student_scholar'] ?></td>
                  <td><?php echo $row['student_name'] ?></td>
                  <td class="center "><?php echo $row['student_fname'] ?></td>
                  <td><?php echo $row['student_class'] ?></td>
                  <td><?php echo $row['student_contactno'] ?></td>
                 <td>
				  <a href="<?php echo $var."edit_admission&upstudid=".$row['student_id']; ?>" target="_blank">View</a>&nbsp;&nbsp;||&nbsp;&nbsp;
				  <a href="<?php echo $var."new_student&did=".$row['student_id']; ?>" onClick="return confirmation();">Delete</a></td>
              </tr>
              
            
    <?php
	 $i++;
	}
	?>
          </tbody>
          </table>
   
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

   <script src="js/jquery-1.8.3.min.js"></script>
   <script type="text/javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="js/DT_bootstrap.js"></script>
   <script src="js/dynamic-table.js"></script>
 