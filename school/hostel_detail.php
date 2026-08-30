<?php
   if(isset($_POST['submit2']))
   {
   $alloc_std=mysqli_query($con,"update student set transport_status='".$_POST['status']."',transport_stopage='".$_POST['stop_id']."' where student_id='".$_POST['std_id']."'");
   ?>
   <script type="text/javascript">
   window.location="<?php echo $var."allocate_student&msg=Inserted Successfully";  ?>";
   </script>
   <?php
   }

?>
<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do you want to delete this Student")) { 
        return false;
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
<div class="left_sect"><img src="images/Hostel/Hostel.png" /><a href="./?pageid=hostel_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/icon-hostel.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">
 <a href="./?pageid=hostel_home" style="text-decoration:none">Hostel</a> ->Rooms Allocation</a></h2>
 
</div>
<div class="col_4" style="margin-top:0px; min-height:335px;">

			
				<form action="#" method="post" enctype="multipart/form-data">
				<!-- Box -->
				
				
                    	
						   
                          <div class="box-head" style="width:1127px; margin-top:30px">
						 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."hostel_detail"."&&divid=1"; ?>">Search Student By Scholar Number</a>&nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."hostel_detail"."&&divid=2"; ?>">Search Student By Id</a> || &nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."hostel_detail"."&&divid=4"; ?>">Search Student By Class</a>|| &nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."hostel_detail"."&&divid=5"; ?>">Search By Hostel</a>
						 
						</div>
			  
		    <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px">
         

            <tr>
              <td>Enter Scholar No</td>
              <td>&nbsp;</td>
			  <td><input type="text" name="student_scholar" class="tb5" style="width:120px"></td>
              <td>&nbsp;</td>
			  <td><input type="submit" name="search1" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
        <br />
        </div>
        
          
          <table border="0" style="margin:10px 0px 0px 0px">
           <div style="border:#F00 0px solid; width:300px; margin-left:20px">
           <div id="txtHint"></div>
        </div>
        </tr>
		</table>
      <?php
		}
	   ?>

	      <?php
		  //student by scholar Id
	      if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		  {
	      ?>
   
         <div style="border: solid #000 0px; width:1100; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
      

           <tr>
             <td>Student Id</td>
             <td><input type="text" name="studentid" class="tb5" style="width:110px"></td>
            
             <td><input type="submit" name="search2" value="Submit" style="width:80px"></td>   
          </tr>
        </table><br>
        </div>
       <?php
		 }
		  ?>
	     <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==4))
		   {
	   ?>
   
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:0px 0px 0px 70px; font-size:14px; width:300px">
     

         <tr>
                <td>Class<span class="textfieldRequiredMsg"></span></td>
              <?php
                $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
                
			 ?>
            <td><select name="class" class="select" style="width:125px" onchange="getstudent(this.value)">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class_id']; ?>"  ><?php echo $rclass['class'].$rclass['class_section']; ?></option>
            <?php
				 }
			?>
            
            </select>
              </td>
		    </tr>
			  <tr>
			     <td>&nbsp;</td>
				 <td>&nbsp;</td>
			  </tr>
			  
		   <tr>
		   <td>&nbsp;</td>
		   <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
		  </tr>
        </table><br>
        </div>
       <?php
		 }
		  ?>
			     <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==5))
		   {
	   ?>
   
         <div style="border: solid #000 0px; width:1100; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:0px 0px 0px 70px; font-size:14px; width:300px">
     <?php
   $hostel=mysqli_query($con,"select * from add_hostel where school='".$_SESSION['uid']."'");
     ?>
           <tr>
<td>Hostel Name :<label style="color:#FF0000">*</label> </td>
<td><select name="name" class="select">
    <option value="-1">Select Hostel</option>
  <?php
     while($room_hostel=mysqli_fetch_array($hostel))
	 {
  ?>
   <option value="<?php echo $room_hostel['id'];  ?>" <?php if($row_sel['hostel_id']==$room_hostel['id']) {?> selected="selected" <?php } ?> ><?php echo $room_hostel['host_name'];  ?></option>
  <?php
  }
  ?>
   </select></td>
</tr>

          <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
         
			<tr>
		   <td>&nbsp;</td>
		   <td><input type="submit" name="search5" value="Submit" style="width:80px"></td>   
		  </tr>
        </table><br>
        </div>
       <?php
		 }
		  ?>
			   
			      
			


			
						
			<div class="cl">&nbsp;</div>	
				   <div class="box-head" style="width:1127px">
						<h2 class="left">Student Availing Hostel Facilities</h2>
						
				  </div>
			   <div class="table" style="border:#FF0000 0px solid; height:220px; width:1127px; margin-left:10px; overflow:scroll">
			   <?php
				     if(isset($_POST['search4']))
					 {
					  $class1=mysqli_query($con,"select * from class where class_id='".$_POST['class']."' and school='".$_SESSION['uid']."'");
					 $row_class=mysqli_fetch_array($class1);
  	 $search=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and status='0' and student_class='".$row_class['class']."' and student_section='".$row_class['class_section']."' and hostel_status='".Active."'  order by student_name Asc");
	                }
				  if(isset($_POST['search1']))
					 {
					    	 $search=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and status='0' and student_scholar='".$_POST['student_scholar']."' and hostel_status='".Active."'  order by student_name Asc");
				}
				 if(isset($_POST['search2']))
					 {
					    	 $search=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and status='0' and student_id='".$_POST['studentid']."' and hostel_status='".Active."'  order by student_name Asc");
				
				}
				 if(isset($_POST['search5']))
					 {
					 $hostel_name=$_POST['name'];
					  $hostel_name;
					 
					    	 $search=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and status='0'  and hostel_status='".Active."' and hostel_name='".$_POST['name']."'  order by student_name Asc");
				
				}
				
			 ?>
			 
			   <table style="width:1100px">
			     <tr>  
			         <td>Sr.No</td>
					 <td>Student Name</td>
					 <td>Hostel</td>
					 <td>Room No</td>
					 			     </tr> 
				<?php 
				$i=1;	 
				  while(@$rowstud=mysqli_fetch_array($search))
				 {
				 ?>
				 
				 <tr>
				     <td><?php echo $i;  ?></td>
					 <td><?php echo ucwords($rowstud['student_name']);  ?></td>
					 <td>
					  <?php 
					   $hostel=mysqli_query($con,"select * from add_hostel where id='".$rowstud['hostel_name']."'");
					   $rowhostel=mysqli_fetch_array($hostel); 
					   echo $rowhostel['host_name'];
					  ?>
					 
					 </td>
					 <td><?php 
					 $room=mysqli_query($con,"select * from add_rooms where room_id='".$rowstud['room']."'");
					 $row_room=mysqli_fetch_array($room); 
					 echo $row_room['room_no'];  
					 
					 ?></td>
					 
					 
				 </tr>
				 <?php
				 $i++;
				 }
				 
				 ?>
			   </table>        
							
		        </div>		
		</div>
		<!-- Main -->
		</form>
	 <!-- Box Head -->
						
				</div>
			
 
<br clear="all" />
</div>
<br clear="all" />
<br clear="all" />
</div>
</div>
				