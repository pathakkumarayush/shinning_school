<html>
<head>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script src="jquery.table2excel.js"></script>
<script type="text/javascript">
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: ''});
               }); 
               //download Excel
               $("#excel").click(function(){
                var file_name = $("#cls").val()+'__'+$("#exm").val()+'__'+$("#ses").val();
                  $("#tbl_exm").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Transport student("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>
<script language="javascript">
function download_report()
{
window.location='report.xls';
}
</script>
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>


</head>
<body alink="#00FF66" link="#00CC00">
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
div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Transport/trans.png" /><a href="./?pageid=transport_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/sicon.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Transport Student Detail</h2>


</div>

<div class="col_4" style="margin-top:0px; min-height:335px;" >
                    
                     <form action="#" method="post" enctype="multipart/form-data">
				
                         <a href="./?pageid=transport_home">Transport</a> >>Transport Detail</a>
                          <div class="box-head" style="width:1127px; margin-top:30px">
						<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."transport_student"."&&divid=4"; ?>">Search Student By Class</a>&nbsp;&nbsp;||&nbsp;&nbsp;
						
						<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."transport_student"."&&divid=2"; ?>">Search Student By Session</a>&nbsp;&nbsp;||&nbsp;&nbsp;
						
						<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."transport_student"."&&divid=3"; ?>">Inactive Student By Session</a>
						</div>
			

	      
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
            <td><select name="class" class="select" style="width:125px" onChange="getstudent(this.value)">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class']; ?>"  ><?php echo $rclass['class'].$rclass['class_section']; ?></option>
			  
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
	       if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
	       ?>
   
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:0px 0px 0px 70px; font-size:14px; width:300px">
     

         <tr>
            <td>Session<span class="textfieldRequiredMsg"></span></td>
            
            <td> <input type="text" name="ses" value="<?php echo $_SESSION['session']; ?>" >  </td>
		    </tr>
			  <tr>
			     <td>&nbsp;</td>
				 <td>&nbsp;</td>
			  </tr>
			  
		   <tr>
		   <td>&nbsp;</td>
		   <td><input type="submit" name="search2" value="Submit" style="width:80px"></td>   
		  </tr>
        </table><br>
        </div>
       <?php
		 }
		  ?>    
		  
		   <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==3))
		   {
	       ?>
   
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:0px 0px 0px 70px; font-size:14px; width:300px">
     

         <tr>
            <td>Session<span class="textfieldRequiredMsg"></span></td>
            
            <td> <input type="text" name="ses" value="<?php echo $_SESSION['session']; ?>" >  </td>
		    </tr>
			  <tr>
			     <td>&nbsp;</td>
				 <td>&nbsp;</td>
			  </tr>
			  
		   <tr>
		   <td>&nbsp;</td>
		   <td><input type="submit" name="search3" value="Submit" style="width:80px"></td>   
		  </tr>
        </table><br>
        </div>
       <?php
		 }
		  ?>    


			
						
			<div class="cl">&nbsp;</div>	
				   <div class="box-head" style="width:1127px">
						<h2 class="left">Student Availing Transport Facilities</h2>
						
				  </div>
			   <div class="table" style="border:#FF0000 0px solid; height:1020px; width:1145px; overflow:scroll">
			  <?php
			  if(isset($_POST['search4']))
			  {
			
             $search=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_session='".$_SESSION['session']."' and status='0' and transport_status='Active'");
				
				 ?>
			 <table style="width:1127px">
			     <tr>  
			         <td>Sr.No</td>
					 <td>Student Name</td>
					 <td>Student Class</td>
					 <td>Stop Name</td>
					 <td>Bus No</td>
					 <td>Rout</td>
					 <td></td>
					 <td></td>
					 <td></td>
					 <td></td>
					 <td></td>
					 <td></td>
					 <td></td>
					 <td></td>
					 <td></td>
					 <td></td>
					 <td></td>
					 
					
			     </tr> 
				<?php 
				$i=1;	 
				  while($rowstud=mysqli_fetch_array($search))
				 {
				 ?>
				 
				 <tr>
				     <td><?php echo $i;  ?></td>
					 <td><?php echo ucwords($rowstud['student_name']);  ?></td>
					  <td><?php echo ucwords($rowstud['student_class']);  ?></td>
					 <td> <?php echo $rowstud['transport_stopage'];
					 ?>
					 </td>
					 <td><?php echo $rowstud['transport_veh'];  ?></td>
					 <td><?php echo $rowstud['transport_rout'];  ?></td>
					 <td><?php echo $rowstud['m1'];  ?></td>
					 <td><?php echo $rowstud['m2'];  ?></td>
					 <td><?php echo $rowstud['m3'];  ?></td>
					 <td><?php echo $rowstud['m4'];  ?></td>
					 <td><?php echo $rowstud['m6'];  ?></td>
					 <td><?php echo $rowstud['m7'];  ?></td>
					 <td><?php echo $rowstud['m8'];  ?></td>
					 <td><?php echo $rowstud['m9'];  ?></td>
					 <td><?php echo $rowstud['m10'];  ?></td>
				
					 <td><a href="<?php echo $var."bus&upstudid=".$rowstud['student_id']; ?>" target="_blank"><b>Inactive</b></a></td>
				 </tr>
				 <?php
				 $i++;
				 }
				 
				 ?>
				
			    </table>        
				<?php }?>	 
						
						
						
						 <?php
			  if(isset($_POST['search2']))
			  {
			
             $search=mysqli_query($con,"select * from student where student_session='".$_POST['ses']."' and status='0' and transport_status='Active' order by student_class,student_name asc");
				
				 ?>
			 <table id="tbl_exm" style="width:1127px">
			 
			     <tr style="font-weight:bold;">  
			         <td>Sr.Noo</td>
					 <td>Student Name</td>
					 <td>Student Class</td>
					 <td>Stop Name</td>
					 <td>Bus No</td>
					 <td>Rout</td>
					 <td colspan="10">Month</td>
					 <td></td>
					 
					 
					
			     </tr> 
				<?php 
				$i=1;	 
				  while($rowstud=mysqli_fetch_array($search))
				 {
				 ?>
				 
				 <tr>
				     <td><?php echo $i;  ?></td>
					 <td><?php echo ucwords($rowstud['student_name']);  ?></td>
					  <td><?php echo ucwords($rowstud['student_class']);  ?></td>
					 <td> <?php echo $rowstud['transport_stopage'];
					 ?>
					 </td>
					 <td><?php echo $rowstud['transport_veh'];  ?></td>
					 <td><?php echo $rowstud['transport_rout'];  ?></td>
					 <td><?php echo $rowstud['m1'];  ?></td>
					 <td><?php echo $rowstud['m2'];  ?></td>
					 <td><?php echo $rowstud['m3'];  ?></td>
					 <td><?php echo $rowstud['m4'];  ?></td>
					 <td><?php echo $rowstud['m6'];  ?></td>
					 <td><?php echo $rowstud['m7'];  ?></td>
					 <td><?php echo $rowstud['m8'];  ?></td>
					 <td><?php echo $rowstud['m9'];  ?></td>
					 <td><?php echo $rowstud['m10'];  ?></td>
				
					 <td><a href="<?php echo $var."bus&upstudid=".$rowstud['student_id']; ?>" target="_blank"><b>Inactive</b></a></td>
				 </tr>
				 <?php
				 $i++;
				 }
				 
				 ?>
				<tr><td colspan="15"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button></td></tr>
			    </table>        
				<?php }?>	 
				
				
					
			 <?php
			  if(isset($_POST['search3']))
			  {
			
             $search=mysqli_query($con,"select * from student where student_session='".$_POST['ses']."' and status='0' and transport_status='Active' and bus='No' order by student_class,student_name asc");
				
				 ?>
			 <table id="tbl_exm" style="width:1127px">
			 
			     <tr style="font-weight:bold;">  
			         <td>Sr.No</td>
					 <td>Student Name</td>
					 <td>Student Class</td>
					 <td>Stop Name</td>
					 <td>Bus No</td>
					 <td>Rout</td>
					 <td colspan="10">Month</td>
					 <td></td>
					 
					 
					
			     </tr> 
				<?php 
				$i=1;	 
				  while($rowstud=mysqli_fetch_array($search))
				 {
				 ?>
				 
				 <tr>
				     <td><?php echo $i;  ?></td>
					 <td><?php echo ucwords($rowstud['student_name']);  ?></td>
					  <td><?php echo ucwords($rowstud['student_class']);  ?></td>
					 <td> <?php echo $rowstud['transport_stopage'];
					 ?>
					 </td>
					 <td><?php echo $rowstud['transport_veh'];  ?></td>
					 <td><?php echo $rowstud['transport_rout'];  ?></td>
					 <td><?php echo $rowstud['m1'];  ?></td>
					 <td><?php echo $rowstud['m2'];  ?></td>
					 <td><?php echo $rowstud['m3'];  ?></td>
					 <td><?php echo $rowstud['m4'];  ?></td>
					 <td><?php echo $rowstud['m6'];  ?></td>
					 <td><?php echo $rowstud['m7'];  ?></td>
					 <td><?php echo $rowstud['m8'];  ?></td>
					 <td><?php echo $rowstud['m9'];  ?></td>
					 <td><?php echo $rowstud['m10'];  ?></td>
				
					 <td><a href="<?php echo $var."bus&upstudid=".$rowstud['student_id']; ?>" target="_blank"><b>Active</b></a></td>
				 </tr>
				 <?php
				 $i++;
				 }
				 
				 ?>
				<tr><td colspan="15"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button></td></tr>
			    </table>        
				<?php }?>	 
						
		        </div>		
		
		</form>
		</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>