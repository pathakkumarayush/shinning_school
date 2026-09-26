

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
<div class="left_sect"><img src="images/Time Table/time.png" /><a href="./?pageid=time_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
<img src="images/lib.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Teacher Periods</h2>
<a href="./?pageid=teacherperiod" style="float:right; text-decoration:none; color:#FFFFFF; margin-top:8px; background-color:#006666; padding:8px; margin-right:10px;">Teacher Setting</a>
</div>
<div class="col_4" style="margin-top:0px;" >		
				
                
    <form method="post" name="myForm" action="#" enctype="multipart/form-data" onsubmit="return(validate());">
                  <?php
   if(!empty($errormsg))
   { ?>
	
    <div class="error" style="width:250px; height:10px; margin-left:120px"><?php echo $errormsg; ?></div>
   <?php
   }
?>
<?php
   if(!empty($msg))
   { ?>
	<div class="success" style="width:150px; height:10px; margin-left:120px"><?php echo $msg;?></div>
   <?php
   }
   if(!empty($_GET['sums']) && empty($msg))
   { ?>
	<div class="success" style="width:150px; height:10px; margin-left:120px"><?php echo $_GET['sums'];?></div>
   <?php
   }
		if(empty($_GET['id']))
		{
		?>
		<table style="margin-top:30px; margin-left:20px; font-size:15px">
    <?php
	        $status="Active";
		     $que_teac=mysqli_query($con,"select * from teacher where teacher_school='".$_SESSION['uid']."' and status='$status'");
	?>
<tr>
   <td>Teacher Name<span>*</span></td>
   <td><select name="teacher" class="select" style="width:155px">
       <option>Select Teacher</option>
       <?php         
			 while($row_tea=mysqli_fetch_array($que_teac))
			 {
			?>	 
			<option value="<?php echo $row_tea['teacher_name'];?>"><?php echo $row_tea['teacher_name']?></option>
            <?php	 
			}
		  ?>
       </select></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>




<tr><td></td>
		<td>
		<input type="submit" name="submit" value="submit" />
		</td></tr>




</table>
     
		<?php
		  }
		?>
		<br><br>
		 
            <div class="box-head" style="margin-top:60px">
					Teacher Periods Details	
						
						</div>
        
		   <div class="table" style="border:#FF0000 0px solid; height:320px; overflow:scroll; ">
           <?php 
           if(isset($_POST['submit']))
		   {
		   $teacher = $_POST['teacher'];
		   $class_id = $_POST['class'];
		  
		   ?>
		          <table style="width:100%">
		          <tr style="background-color:#009933;color:#FFFFFF">
                  <th>No.</th>
				  <th>Day</th>
                  <th>Class</th>
                  <th>Period</th>
				  <th>Subject</th>
                  <th>Teacher</th>
                  
              </tr>
		   <?php
		   $sql=mysqli_query($con,"select * from timetable where teacher='".$_POST['teacher']."' ");
	       $i=1;
	       while($row=mysqli_fetch_array( $sql))
	       {
		   ?>
			 <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $row['dayid'] ?></td>
                  <td><?php echo $row['class_id'] ?></td>
                  <td class="center "><?php echo $row['period_id'] ?></td>
                
				  <td><?php echo $row['subject_id'] ?></td>
                  <td><?php echo $row['teacher'] ?></td>  
		   </tr>
		    <?php
	        $i++;
	         }
	        ?>
		   </table>
		   <?php
		   }
		   ?>
           </div>
      
                 
                   </form>
                    <!-- Box Head -->
					
					<!-- End Box Head -->	

					<!-- Table -->
					
					<!-- Table -->
					
				
				<!-- End Box -->
				
				</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  
			