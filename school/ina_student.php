<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do You Want To Return  Tc Record This Student")) { 
        return false;
    }
    }
</script> 
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=920');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
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
                  $("#sample_1").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Student details("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>            
			  
			  <?php
			  
 if(!empty($_GET['did']))
{
// $query=mysqli_query($con,"delete from student where student_id='".$_GET['did']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."'");  
$d=date("Y-m-d");
$query=mysqli_query($con,"update student set status='0' where student_id='".$_GET['did']."' and  student_session='".$_SESSION['session']."'");   
}
			  
			  
              if(!empty($_GET['tid']))
              {
              $d=date("Y-m-d");
              $query=mysqli_query($con,"update student set status='0',tcdate='' where student_id='".$_GET['tid']."' and student_session='".$_SESSION['session']."'");	 
			  $qry=mysqli_query($con,"delete from tc where sid='".$_GET['tid']."'");	 
              }
			  ?>
			  
              <?php
              $maxid=mysqli_query($con,"select count(student_id) from student where student_school='".$_SESSION["uid"]."' and student_session='".$_SESSION['session']."' and status='3'");
  
              $maxrow=mysqli_fetch_array($maxid);
  
              $rowmax=mysqli_fetch_array($maxid);

              $maxid2=mysqli_query($con,"select count(student_id) from student where student_school='".$_SESSION["uid"]."' and student_session='".$_SESSION['session']."' and status='3'");
              $maxrow2=mysqli_fetch_array($maxid2);

              if(isset($_POST['search1']))
			  {
					  
			  $search=mysqli_query($con,"select * from student where student_scholar='".$_POST['scholarno1']."' and student_session='".$_SESSION['session']."' and status='3'");
				 
			  $num=mysqli_num_rows($search);
			  }
			  ?>
              <?php
			  if(isset($_POST['search2']))
			  {
			  $search=mysqli_query($con,"select * from student where student_session='".$_POST['studentid']."' and status='3' order by student_name,student_class Asc");
		      $num=mysqli_num_rows($search);	   
			  }
			  if(isset($_POST['search3']))
			  {
			  $search=mysqli_query($con,"select * from student where student_name Like '".$_POST['studentname']."%' and student_session='".$_SESSION['session']."' and status='3' order by student_name,student_class Asc");
		      $num=mysqli_num_rows($search);	   
			  }
			 
			  if(isset($_POST['search4']))
			  {
			  if($_POST['section']=="Select Section")
			  {
			  $search=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and   student_session='".$_SESSION['session']."' and status='3' order by student_name,student_class Asc");
				
			  $num=mysqli_num_rows($search);	   
			  }
			  else
          	  {
			  $search=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_section='".$_POST['section']."' and 
			  student_session='".$_SESSION['session']."' and status='3' order by student_name,student_class Asc");
			  $num=mysqli_num_rows($search);	   
	          } 
			  }
			  ?>
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
:-ms-input-placeholder 
{
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
#div1{ display:none;}
#div2{ display:none;}
</style>
<div class="full_div">
        <br clear="all" />
        <div class="left_sect"><img src="images/Student Detail/home.png" /><a href="./?pageid=student_home">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
        <img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">INACTIVE STUDENT DETAILS</h2>
        </div>
        <div class="col_4">
         <div style="font-size:24px; color:#990000; margin:40px 0px 0px 10px; border:#FF0000 0px solid	">Total Student:<?php echo $maxrow['count(student_id)']; ?></div>
							
			
				    
	    <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
        <br><br>
        <div class="box-head" style="width:auto;">
	    <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."ina_student"."&&divid=1"; ?>">Search By Adm. No</a> &nbsp;||&nbsp;
	    <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."ina_student"."&&divid=3"; ?>">Search By Name</a>&nbsp;||&nbsp;
	    <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."ina_student"."&&divid=4"; ?>">Search By Class</a>&nbsp;||&nbsp;
		<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."ina_student"."&&divid=2"; ?>">View All Student</a> 
		</div>				
        <?php
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
          <table style="margin:30px 0px 0px 10px; font-size:14px; width:350px">
      

           <tr>
             <td>Session</td>
             <td><input type="text" name="studentid" class="tb5" style="width:110px" value="<?php echo $_SESSION['session']; ?>"></td>
            
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
          <table  style="margin:30px 0px 0px 10px; font-size:14px; width:400px">
    

           <tr>
             <td>Name</td>
             <td><input type="text" name="studentname" class="tb5" style="width:210px"></td>
            <td>&nbsp;</td>
             <td><input type="submit" name="search3" value="Submit" style="width:80px"></td>   
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
          <table style="margin:30px 0px 0px 10px; font-size:14px; width:300px">
     

         <tr>
                <td>Class<span class="textfieldRequiredMsg"></span></td>
              <?php
                $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:150px" onchange="showSection(this.value)">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class']; ?>"  ><?php echo $rclass['class']; ?></option>
            <?php
				 }
			?>
            
            </select>
              </td>
			 <!-- <td><div id="txtHint1"></div></td>-->
           <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
		  </tr>
        </table><br>
        </div>
       <?php
		 }
		  ?>
		 
	 		 
	 <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/studentlisti.php?student_class=<?php echo $_POST['class'];  ?>')">     <input type="button" value="Print List " style="width:100px; position:absolute"></a>
	 
	 	 <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/studentlistalli.php?ses=<?php echo $_SESSION['session'];  ?>')">     <input type="button" value="ALL STUDENT List " style="width:150px; margin-left:114PX;  position:absolute"></a>
		 
		
		  
		 
		<div class="table" style="border:#006633 30px solid; height:480px; width:auto;overflow:scroll">
        <table id="sample_1" width="100%" border="0" cellspacing="0" cellpadding="0">
	     <tr style="background-color:#009933;color:#FFFFFF">
                  <th>Sr No.</th>
                
                  <th>Sch No.</th>
                  <th>Name</th>
                  <th>D.O.B</th>
                  <th>Gender</th>
                  <th>Father's Name</th>
                  <th>Class</th>
                  <th>Mobile</th>
               <!--   <th>Address</th>-->
                  <th style="width:140px;">Action</th>
              </tr>
        <?php
        $i=1;
	    if($num>0)
		{
	    while($row=mysqli_fetch_array($search))
		{
		
	    ?>	
        <tr style="color:#335599">
       <td style="text-align: center;"><?php echo $i;  ?></td>
                  
                  <td><?php echo $row['student_scholar'] ?></td>
                  <td><?php echo $row['student_name'] ?></td>
                  <td><?php echo $row['student_dob'] ?></td>
                  <td><?php echo $row['student_gender'] ?></td>
                  <td class="center "><?php echo $row['student_fname'] ?></td>
                  <td><?php echo $row['student_class'] ?></td>
                  <td><?php echo $row['student_contactno'] ?></td>
                  <?php /*?><td><?php echo $row['student_address'] ?></td><?php */?>
          <td>
 
		  <a href="<?php echo $var."ina_student&did=".$row['student_id']; ?>" onClick="return confirmation();"> 
		  <b>Return Active</b></a>
		   &nbsp;&nbsp;||&nbsp;&nbsp;
		   <a href="<?php echo $var."tc_form&tid=".$studrow['student_id']; ?>" onClick="return confirmationn();" target="_blank">TC</a>
		  </td>
	  
        </tr>
    <?php
     $i++;
	 }
	}
	else
	{
	?>
	<tr>
	   <td colspan="11"><center style="color:#CC0000;font-size: 20px;font-weight: bold;">No Record found!</center></td>
	</tr>
	<?php
	}
	?>
	<tr>
			 <td colspan="10"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	</td>
			</tr>
	</table>
         </div>
      
                 
                   </form>					
        
     
			   
		</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
	