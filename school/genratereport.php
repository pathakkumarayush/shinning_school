<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do you want to delete this Student")) { 
        return false;
    }
    }
</script> 
<?php
  if(isset($_POST['genrate1']))
  {
  


require_once("xl/excelwriter.class.php");

$excel=new ExcelWriter("xl/report.xls");
if($excel==false)	
echo $excel->error;

$myArr=array("S.No.","Student Name","Student Father","Student Class","Contact");
$excel->writeLine($myArr);
if($_POST['gender']=="female")
{
$gen="Female";
     if($_POST['class']=="All Class")
     {
$qry=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."' and student_gender='$gen'");
     }
	 else
	   {
	    if($_POST['section']=="Select Section")
		  {
		    $_POST['section']="";
		  }
	   $qry=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."' and student_gender='$gen' and student_class='".$_POST['class']."' and student_section='".$_POST['section']."'");
	   }
}
if($_POST['gender']=="Male")
{
$gen="male";
    if($_POST['class']=="All Class")
     {
$qry=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."' and student_gender='$gen'");
     }
      else
	   {
	      if($_POST['section']=="Select Section")
		  {
		    $_POST['section']="";
		  }
	   
	   $qry=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."' and student_gender='$gen' and student_class='".$_POST['class']."' and student_section='".$_POST['section']."'");
	   }  
}

if($qry!=false)
{
	$i=1;
	while($res=mysqli_fetch_array($qry))
	{
		$myArr=array($i,$res['student_name'],$res['student_fname'],$res['student_class'],$res['student_contactno']);
		$excel->writeLine($myArr);
		$i++;
	}
}

 ?>
  <script type="text/javascript">
window.location='xl/report.xls';

  </script>
  <?php
  
  
}

if(isset($_POST['genrate2']))
{
   require_once("xl/excelwriter.class.php");

$excel=new ExcelWriter("xl/report.xls");
if($excel==false)	
echo $excel->error;

$myArr=array("S.No.","Student Name","Student Father","Student Class","Caste","Contact");
$excel->writeLine($myArr);

if(($_POST['class']=="All Class") && ($_POST['gender']=="Select Gender"))
{
    $qry=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'  and caste='".$_POST['caste']."'");


}
 else if(($_POST['class']!="All Class") && ($_POST['gender']=="Select Gender"))
		 {
		 if($_POST['section']=="Select Section") 
		  {
		    $_POST['section']="";
		  }
	   
	   $qry=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'  and student_class='".$_POST['class']."' and student_section='".$_POST['section']."' and caste='".$_POST['caste']."'");
	  
	   
	   }  
else if(($_POST['class']!="All Class") && ($_POST['gender']!="Select Gender"))
		 {
		 if($_POST['section']=="Select Section") 
		  {
		    $_POST['section']="";
		  }
	   
	   $qry=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'  and student_class='".$_POST['class']."' and student_section='".$_POST['section']."' and caste='".$_POST['caste']."' and student_gender='".$_POST['gender']."'");
	   
	   
	   }  


if($qry!=false)
{
	$i=1;
	while($res=mysqli_fetch_array($qry))
	{
		$myArr=array($i,$res['student_name'],$res['student_fname'],$res['student_class'],$res['caste'],$res['student_contactno']);
		$excel->writeLine($myArr);
		$i++;
	}
}

  ?>
    <script type="text/javascript">
window.location='xl/report.xls';

  </script>
 
  
  <?php
  }
  
  if(isset($_POST['genrate3']))
  {
        require_once("xl/excelwriter.class.php");

$excel=new ExcelWriter("xl/report.xls");
if($excel==false)	
echo $excel->error;

$myArr=array("S.No.","Student Name","Student Father","Student Class","Caste","Contact");
$excel->writeLine($myArr);
       if($_POST['gender']=="Select Gender")
	   {
       $qry1=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'");
       }
	   else
	      {
		  $qry1=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and student_session='".$_POST['session']."' and student_gender='".$_POST['gender']."'");
		  }
	   $i=1;
	    while($row=mysqli_fetch_array($qry1))
		{
		 $d= date("Y",strtotime($row['student_doj']));
		 $d1=$d+1;
		 
		 
		  $d=$d."-".$d1;
		
		  if($d==$_SESSION['session'])
		  {
		    $qry=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."' and student_id='".$row['student_id']."'"); 
		
  if($qry!=false)
{
	
	while($res=mysqli_fetch_array($qry))
	{
		$myArr=array($i,$res['student_name'],$res['student_fname'],$res['student_class'],$res['caste'],$res['student_contactno']);
		$excel->writeLine($myArr);
		$i++;
		  }
		
		}
	}
}

  ?>
   
   <script type="text/javascript">
window.location='xl/report.xls';

  </script>
  
  <?php

  }
  
  if(isset($_POST['genrate4']))
  {
      function age_from_dob($dob) {

    list($d,$m,$y) = explode('-', $dob);
    
    if (($m = (date('m') - $m)) < 0) {
        $y++;
    } elseif ($m == 0 && date('d') - $d < 0) {
        $y++;
    }
    
    return date('Y') - $y;
    
}


require_once("xl/excelwriter.class.php");

$excel=new ExcelWriter("xl/report.xls");
if($excel==false)	
echo $excel->error;

$myArr=array("S.No.","Student Name","Student Father","Student Class","Student Dob","Age","Contact");
$excel->writeLine($myArr);
if($_POST['gender']=="Select Gender")
{
$qry=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'");
}
else
  {
  $qry=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."' and student_gender='".$_POST['gender']."'");
  }

 
if($qry!=false)
{
	$i=1;
	while($res=mysqli_fetch_array($qry))
	{
	   $age= date("d-m-Y",strtotime($res['student_dob']))."<br>";
	     $age1= age_from_dob($age);
		 if($age1==$_POST['age'])
		 { 
	
		$myArr=array($i,$res['student_name'],$res['student_fname'],$res['student_class'],$res['student_dob'],$age1,$res['student_contactno']);
		$excel->writeLine($myArr);
		$i++;
	}
	}
}

  ?>
  <script type="text/javascript">
window.location='xl/report.xls';

  </script>
  <?php
  }
?>

<div id="container">
 <div class="shell">
		<div id="main">
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				  <img src="css/images/studentdetail.jpg" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:20px">Genrate report</span>
                 
                   <div style="border:#900 2px solid; margin-top:10px"></div>
                    
							
		
				    
	   <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      
   
  <br><br>
            <div class="box-head" style="width:730px">
						 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."genratereport"."&&divid=1"; ?>">By Gender</a>&nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."genratereport"."&&divid=2"; ?>">By Caste</a> ||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."genratereport"."&&divid=3"; ?>">By Student Admission</a>||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."genratereport"."&&divid=4"; ?>">By Age</a>
						</div>
            <?php
		   //student by scholar number
	        if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		    {
	        ?>
          <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px">
         

            <tr>
              <td>Gender</td>
              <td><select name="gender" class="select" style="width:125px">
			  <option value="female">Female</option>
			  <option value="Male">Male</option>
			  </select>
			  </td>
			  </tr>
			  <tr>
			     <td>&nbsp;</td>
		         <td>&nbsp;</td>	  
			  </tr>
			  <tr>
                <td>Class<span class="textfieldRequiredMsg"></span></td>
              <?php
                $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:125px" onchange="showSection(this.value)">
               <option value="All Class">All Class</option>
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
			  <td><div id="txtHint1"></div></td>
			  </tr>
			  <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			  </tr>
			  
			  <tr>
			<td>&nbsp;</td>  
           <td><input type="submit" name="genrate1" value="Genrate Report" style="width:120px"></td>   
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
          <table style="margin:30px 0px 0px 70px; font-size:14px">
         

            <tr>
              <td>Caste</td>
              <td><select name="caste" class="select" style="width:125px">
			  <option value="Genral">Genral</option>
			  <option value="Sc">Sc</option>
			   <option value="St">St</option>
			    <option value="Obc">Obc</option>
			  </select>
			  </td>
			  </tr>
			  <tr>
			     <td>&nbsp;</td>
		         <td>&nbsp;</td>	  
			  </tr>
			  <tr>
                <td>Class<span class="textfieldRequiredMsg"></span></td>
              <?php
                $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:125px" onchange="showSection(this.value)">
               <option value="All Class">All Class</option>
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
			  <td><div id="txtHint1"></div></td>
			  </tr>
			  <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			  </tr>
			      <tr>
              <td>Gender</td>
              <td><select name="gender" class="select" style="width:125px">
			  <option>Select Gender</option>
			  <option value="female">Female</option>
			  <option value="Male">Male</option>
			  </select>
			  </td>
			  </tr>
			  <tr>
			     <td>&nbsp;</td>
		         <td>&nbsp;</td>	  
			  </tr>
			  <tr>
			<td>&nbsp;</td>  
           <td><input type="submit" name="genrate2" value="Genrate Report" style="width:120px"></td>   
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
          <table  style="margin:30px 0px 0px 70px; font-size:14px; width:400px">
    

        <tr>
   <td>Select Session</td><td><select name="session" class="select">
             <option value="-1">Select Session</option>
            
           
           <?php  for($i=1995;$i<=2069;$i++)
			  {  ?>
            <?php $j=$i; $j++;  $k=$i."-".$j; ?>
            <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
            <?php } ?>
            
           </select></td>
		   </tr>
		    <tr>
			     <td>&nbsp;</td>
		         <td>&nbsp;</td>	  
			  </tr>
		   <tr>
		        <tr>
              <td>Gender</td>
              <td><select name="gender" class="select" style="width:125px">
			  <option value="Select Gender">Select Gender</option>
			  <option value="female">Female</option>
			  <option value="Male">Male</option>
			  </select>
			  </td>
			  </tr>
			  <tr>
			     <td>&nbsp;</td>
		         <td>&nbsp;</td>	  
			  </tr>
		   </tr>
		   <tr>
        <td><input type="submit" name="genrate3" value="Genrate Report" style="width:120px"></td>
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
          <table  style="margin:30px 0px 0px 70px; font-size:14px; width:400px">
		      <tr>
			     <td>Age</td>
			     <td><input type="text" name="age" class="tb5" style="width:120px"></td>
			  </tr>
			  <tr>
			     <td>&nbsp;</td>
				  <td>&nbsp;</td>
			  </tr>
			  <tr>
              <td>Gender</td>
              <td><select name="gender" class="select" style="width:125px">
			  <option>Select Gender</option>
			  <option value="female">Female</option>
			  <option value="Male">Male</option>
			  </select>
			  </td>
			  </tr>
			  <tr>
			     <td>&nbsp;</td>
		         <td>&nbsp;</td>	  
			  </tr>
			  <tr>
			     <td>&nbsp;</td>
				  <td><input type="submit" name="genrate4" value="Genrate Report" style="width:120px"></td>
			  </tr>
          </table>
		  </div>
		  <?php
		  }
		  ?>
                 
                   </form>					
        
  	   
			   
			        <!-- Box Head -->
					
					<!-- End Box Head -->	

					<!-- Table -->
					
					<!-- Table -->
					
				</div>
				<!-- End Box -->
				
				<!-- Box -->
				
				<!-- End Box -->

			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<br><br><br><br><br><br><br>