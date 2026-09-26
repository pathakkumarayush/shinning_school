<script type="text/javascript">
function popitup(url) 
{
newwindow=window.open(url,'name','height=535,width=623');
if(window.focus) {newwindow.focus()}
return false;
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
<div class="left_sect"><img src="images/FEE Management/feehome.png" /><a href="./?pageid=db_fee">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Dayboarding Fee</h2>
</div>

<div class="col_4">
<div class="form-style-2-heading"></div>
<table class="table table-bordered" id="sample_1" style="font-size:12px; ">
   <thead style="background-color:#009933; color:#FFFFFF">
              <tr style="background-color:#009933;color:#FFFFFF">
              <th>No.</th>
              <th>Name</th>
              <th>Father</th>
			  <th>Class</th>
              <th>Total Fee</th>
			  <th>Deposit Fee</th>
			  <th>Con.</th>
			  <th>Bal.</th>
              </tr>
              </thead>
              <tbody>           
	<?php
	$numq=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and marksheet='Yes' and tc='0' order by student_class ASC");
	$i=1;
	while($rowstd=mysqli_fetch_array($numq))
	{
	$selrc=mysqli_query($con,"select * from definefeedb  where class='".$rowstd['student_class']."'");
    $rowselrec=mysqli_fetch_array($selrc);	
	
	$search=mysqli_query($con,"select sum(fee_deposit) from fee_db where session='".$_SESSION['session']."' and student='".$rowstd['student_id']."'");
	$row=mysqli_fetch_array($search);
	?>
    <tr>
    <td><?php echo $i;  ?></td>
    <td><?php echo $rowstd['student_name'] ?></td>
    <td><?php echo $rowstd['student_fname'] ?></td>
	<td><?php echo $rowstd['student_class'] ?></td>
	<td><?php echo $rowselrec['amnt'] ?></td>
    <td><?php echo $fdeposit = $row['sum(fee_deposit)']?></td>
	<td><?php echo $con = $rowstd['dcon'] ?></td>
    <td>
	<?php echo  $rowselrec['amnt']-$fdeposit-$con ?>
	</td>
	 <td></td>
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

   <script src="js1/jquery-1.8.3.min.js"></script>
   <script type="text/javascript" src="js1/jquery.dataTables.js"></script>
   <script type="text/javascript" src="js1/DT_bootstrap.js"></script>
   <script src="js1/dynamic-table.js"></script>
 <?php
include_once 'db.php';
if(isset($_POST['submit']))
{    
   
	
	 $tmp_name = $_FILES['e_f']['tmp_name'];
	 $file_name = $_FILES['e_f']['name'];
	 $ext = end(explode(".", $file_name));
	 $image_name = time().".".$ext;
	 $file_Uploade = move_uploaded_file($tmp_name,"uploads/".$image_name);

$sqlAdd = mysqli_query($con,"insert into resume(e_name,e_fh,mobile,dob,email,e_q,e_post,e_exp,e_sub,e_sale,e_esal,e_d,address,e_f) VALUES
('".$_POST['e_name']."','".$_POST['e_fh']."','".$_POST['mobile']."','".$_POST['dob']."','".$_POST['email']."','".$_POST['e_q']."','".$_POST['e_post']."','".$_POST['e_exp']."','".$_POST['e_sub']."','".$_POST['e_sale']."','".$_POST['e_esal']."','".$_POST['e_d']."','".$_POST['address']."','$image_name')");
   
 echo "Inserted sucessfully";  
}
?>