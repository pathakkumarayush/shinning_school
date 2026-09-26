<?php
 if(isset($_POST['submit2']))
 {
 $query12=mysqli_query($con,"select * from add_vehcles where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and veh_no='".$_POST['vehcle']."'");
 $row12=mysqli_fetch_array($query12);
 if($row12['Rseats']<1)
 {
 ?>
 <script type="text/javascript">
 alert("No Seats Available"); 
 </script>
 <?php
 }
  $val=$row12['Rseats']-1;
  $upd=mysqli_query($con,"update add_vehcles set Rseats='$val' where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and veh_no='".$_POST['vehcle']."'");
  
  mysqli_query($con,"insert into bus_details(class,sid,root,stopage,vno,status,type,time_in) values('".$_POST["class"]."','".$_POST["std_id"]."','".$_POST['rout']."','".$_POST['stopage']."','".$_POST['vehcle']."','".$_POST['status']."','".$_POST['transport_type']."','".$_POST['time_in']."')");
   
   $alloc_std=mysqli_query($con,"update student set transport_status='".$_POST['status']."',transport_stopage='".$_POST['stopage']."',transport_rout='".$_POST['rout']."',transport_veh='".$_POST['vehcle']."',transport_type='".$_POST['transport_type']."' where student_id='".$_POST['std_id']."'");
?>
  
<?php
}
?>
   <script type="text/javascript">
   function confirmation() 
    { 
    if(!confirm("Do you want to delete this Student")) 
	{ 
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
div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Transport/trans.png" /><a href="./?pageid=in_out">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/sicon.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Allocate Transport</h2>


</div>

<div class="col_4" style="margin-top:0px; min-height:335px;" >
                    
							
		 <?php
	          
			 if(!empty($_GET['msg']))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['msg'];   ?></div>
		  <?php
		   }
	       ?>
		
		<?php
		   if((empty($_GET['tid'])))
		   {
		?>			
			   <a href="./?pageid=transport_home">Transport</a> >>Allocate Transport</a>	    
	   <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      
   
  <br><br>
            <div class="box-head" style="width:1142px">
						<!-- <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."rout_allo"."&&divid=1"; ?>">Search Student By Scholar Number</a>&nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."rout_allo"."&&divid=2"; ?>">Search Student By Id</a> ||--> &nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."rout_allo"."&&divid=4"; ?>">Search Student By Class</a>
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
			  <td><input type="text" name="scholarno1" class="tb5" style="width:120px"></td>
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
   
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
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
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:400px">
     

         <tr>
                <td>Student Class<span class="textfieldRequiredMsg"></span></td>
              <?php
                $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
                
			 ?>
            <td><select name="class" class="select" style="width:220px; border-radius:4px;" onchange="getstudent(this.value)">
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
			  <td>Student Name</td>
			  <td><div id="txtHint1"></div></td>
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
		 
		    if(isset($_POST['search4']))
			{
		  
		$search=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and status='0' and student_id='".$_POST['scholarno1']."'");
				
			$rowstudent=mysqli_fetch_array($search);
			
		 ?>
          
           <table border="0" cellspacing="0" cellpadding="0" style="font-size:16px; width:50%; margin-left:80px; margin-top:30px">
			<tr>
			<td>Student Name</td>
			<td><?php 
			echo $rowstudent['student_name'];  
			?></td>
	        </tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>Class</td>
			<td><?php echo $rowstudent['student_class'];   ?></td>
	        </tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>Rout</td>
			<td>
			 
			   <?php
	      $query=mysqli_query($con,"select * from rout_inout where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	       ?>
	      <select name="rout" class="select" onchange="getvehcle(this.value)" >
		  <option>Select Stopage</option>
		  <?php
		  while($row=mysqli_fetch_array($query))
		  {
	   ?>
	   <option value="<?php echo $row['id'];  ?>"> <?php echo $row['rout_no']."-".$row['time_in']; ?></option>
		<?php
		 }
		?>	
		</select>
			</td>
	        </tr>				
	       <tr>
			<td><input type="hidden" name="std_id" value="<?php echo $rowstudent['student_id'];  ?>"></td>
			<td>&nbsp;<input type="hidden" name="class" value="<?php echo $rowstudent['student_class'];  ?>"></td>
			</tr>
			  <tr>
			<td>Stopage</td>
			<td><div id="txtHint35"></div></td>
			</tr>
			  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			 <tr>
			<td>Transport Type</td>
			<td><select name="transport_type" class="select">
			     <option value="Two Way">Two Way</option>
				  <option value="One Way">One Way</option>
			    </select> 
			</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			 <tr>
			<td>Select Time</td>
			<td><select name="time_in" class="select" style="width:150px" required />
			<option value="">Select Time</option>
			<option value="9-AM-In">9-AM-In</option>
			<option value="1-PM-Out">1-PM-Out</option>
		    <option value="3-PM-Out">3-PM-Out</option>
			</select>
			</td>
			</tr>
			  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>Status</td>
			<td><input type="radio" name="status" value="Active" checked="checked">&nbsp; Active &nbsp;<input type="radio" name="status" value="Inactive">&nbsp; Inactive</td>
			</tr>
		    <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
		   <tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit2" value="Allocate Transport" /></td>
			</tr>
		   </table>
		   <br />
      
      
                 
                   </form>					
        
   <?php
      }
	   if(isset($_POST['search1']))
			{
		  
		$search=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and status='0' and student_scholar='".$_POST['scholarno1']."'");
				
			$rowstudent=mysqli_fetch_array($search);
			
		 ?>
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:16px; margin-left:80px; margin-top:30px">
			<tr>
			<td>Student Name</td>
			<td><?php 
			echo $rowstudent['student_name'];  
			?></td>
	        </tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>Class</td>
			<td><?php echo $rowstudent['student_class'];   ?></td>
	        </tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>Rout</td>
			<td>
			 
			   <?php
	      $query=mysqli_query($con,"select * from rout_allocation where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	       ?>
	      <select name="rout" class="select" onchange="getvehcle(this.value)" >
		  <option>Select Stopage</option>
		  <?php
		  while($row=mysqli_fetch_array($query))
		  {
	   ?>
	   <option value="<?php echo $row['id'];  ?>"> <?php echo $row['rout_no']; ?></option>
		<?php
		 }
		?>	
		</select>
			</td>
	        </tr>				
	       <tr>
			<td><input type="hidden" name="std_id" value="<?php echo $rowstudent['student_id'];  ?>"></td>
			<td>&nbsp;</td>
			</tr>
			  <tr>
			<td>Stopage</td>
			<td><div id="txtHint3"></div></td>
			</tr>
			  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			 <tr>
			<td>Transport Type</td>
			<td><select name="transport_type" class="select">
			     <option value="Two Way">Two Way</option>
				  <option value="One Way">One Way</option>
			    </select> 
			</td>
			</tr>
			  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>Status</td>
			<td><input type="radio" name="status" value="Active" checked="checked">&nbsp; Active &nbsp;<input type="radio" name="status" value="Inactive">&nbsp; Inactive</td>
			</tr>
		    <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
		   <tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit2" value="Allocate Transport" /></td>
			</tr>
		   </table>
      
        <br />
                 
                   </form>					
        
   <?php
      }
        
      
	   if(isset($_POST['search2']))
			{
		  
		$search=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and status='0' and student_id='".$_POST['studentid']."'");
				
			$rowstudent=mysqli_fetch_array($search);
			
		 ?>
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:16px; margin-left:80px; margin-top:30px">
			<tr>
			<td>Student Name</td>
			<td><?php 
			echo $rowstudent['student_name'];  
			?></td>
	        </tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>Class</td>
			<td><?php echo $rowstudent['student_class'];   ?></td>
	        </tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>Rout</td>
			<td>
			 
			   <?php
	      $query=mysqli_query($con,"select * from rout_allocation where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	       ?>
	      <select name="rout" class="select" onchange="getvehcle(this.value)" >
		  <option>Select Stopage</option>
		  <?php
		  while($row=mysqli_fetch_array($query))
		  {
	   ?>
	   <option value="<?php echo $row['id'];  ?>"> <?php echo $row['rout_no']; ?></option>
		<?php
		 }
		?>	
		</select>
			</td>
	        </tr>				
	       <tr>
			<td><input type="hidden" name="std_id" value="<?php echo $rowstudent['student_id'];  ?>"></td>
			<td>&nbsp;</td>
			</tr>
			  <tr>
			<td>Stopage</td>
			<td><div id="txtHint3"></div></td>
			</tr>
			  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			  <tr>
			<td>Transport Type</td>
			<td><select name="transport_type" class="select">
			     <option value="Two Way">Two Way</option>
				  <option value="One Way">One Way</option>
			    </select> 
			</td>
			</tr>
			  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>Status</td>
			<td><input type="radio" name="status" value="Active" checked="checked">&nbsp; Active &nbsp;<input type="radio" name="status" value="Inactive">&nbsp; Inactive</td>
			</tr>
		    <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
		   <tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit2" value="Allocate Transport" style="height:40px; width:60px" /></td>
			</tr>
		   </table>
      
        <br />
                 
                   </form>					
        
   <?php
      }




	  }
	?>
			        <!-- Box Head -->
					
					<!-- End Box Head -->	

					<!-- Table -->
					
					<!-- Table -->
					
				</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>