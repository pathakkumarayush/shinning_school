<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}
.col_6{ width:58.5%; height:700px; background-color:#FFFFFF; margin-left:15px; float:left; margin-top:10px;}
.col_4{ width:40%; height:700px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;}
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

input[type="text"] {
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
    function confirmation() {
      return confirm('Are you sure you want to delete this?');
    }
</script>
<?php
 if(!empty($_GET['did']))
 {
 $delete=mysqli_query($con,"delete from teacher where id='".$_GET['did']."'");
 }
 ?>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/frontdesk/front desk home.png" /><a href="index.php">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">User name and password information</h2>
<a href="./?pageid=userid_password" style="float:right; margin-top:12px; color:#333366; font-size:20px;">->> Student Details</a>
</div>

<div class="col_6">
<div class="form-style-2-heading">Class Teacher User name and password information</div>
<table class="table table-bordered" id="sample_1" style="font-size:12px; font-weight:bold; ">
              <thead style="background-color:#009933; color:#FFFFFF;border:1px #993300 solid;">
              <tr style="background-color:#009933;color:#FFFFFF">
                  <th>No.</th>
				  <th>Teacher Name</th>
				  <th>Father/Husband</th>
				  <th>User Name</th>
				  <th>Password</th>
				  <th>Class Name</th>
				 
			  </tr>
			  </thead>
			  <tbody>
			  <?php
	          $sql="SELECT * FROM  class_teacher where teacher_session='".$_SESSION['session']."'";
	          $result_set=mysqli_query($con,$sql);
	          $i=1;
	          while($row=mysqli_fetch_array($result_set))
	          {
	          $uid = $row['teacher'];
	          $studrowt=mysqli_query($con,"select * from teacher where uid='$uid' and teacher_session='".$_SESSION['session']."'");
	          $studrow = mysqli_fetch_array($studrowt);
			  
			  $logint=mysqli_query($con,"select * from login where uid='$uid' and type='teacher'");
	          $lorow = mysqli_fetch_array($logint);
			    
		      ?>
              <tr>
              <td><?php echo $i;  ?></td>
              <td><?php echo $studrow['teacher_name']; ?></td>
			  <td><?php echo $studrow['father_name']; ?></td>
			
			  <td><?php echo $row['teacher']; ?></td>
              <td><?php echo $lorow['pass']; ?></td>
			  <td><?php echo $row['class']; ?></td>
			  
              </tr>
              <?php
	          $i++;
	          }
	          ?>
          </tbody>
          </table>
		  
</div>


<?php /*?><div class="col_6">
<div class="form-style-2-heading">CO-SCHOLASTIC AREAS Teacher User name and password information</div>
<table class="table table-bordered" id="sample_1" style="font-size:12px; font-weight:bold; ">
              <thead style="background-color:#009933; color:#FFFFFF;border:1px #993300 solid;">
              <tr style="background-color:#009933;color:#FFFFFF">
                  <th>No.</th>
				  <th>Teacher Name</th>
				  <th>Father/Husband</th>
				  <th>User Name</th>
				  <th>Password</th>
				  <th>Class Name</th>
				 
			  </tr>
			  </thead>
			  <tbody>
			  <?php
	          $sql="SELECT * FROM  class_teacherr";
	          $result_set=mysqli_query($con,$sql);
	          $i=1;
	          while($row=mysqli_fetch_array($result_set))
	          {
	          $uid = $row['teacher'];
	          $studrowt=mysqli_query($con,"select * from teacher where uid='$uid'");
	          $studrow = mysqli_fetch_array($studrowt);
			  
			  $logint=mysqli_query($con,"select * from login where uid='$uid' and type='exam'");
	          $lorow = mysqli_fetch_array($logint);
			    
		      ?>
              <tr>
              <td><?php echo $i;  ?></td>
              <td><?php echo $studrow['teacher_name']; ?></td>
			  <td><?php echo $studrow['father_name']; ?></td>
			
			  <td><?php echo $row['teacher']; ?></td>
              <td><?php echo $lorow['pass']; ?></td>
			  <td><?php echo $row['class']; ?></td>
			  
              </tr>
              <?php
	          $i++;
	          }
	          ?>
          </tbody>
          </table>
		  
</div><?php */?>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

   <script src="js/jquery-1.8.3.min.js"></script>
   <script type="text/javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="js/DT_bootstrap.js"></script>
   <script src="js/dynamic-table.js"></script>
