<?php
require_once('func.php');
if(isset($_POST['submit']))
{
	  $subj=mysqli_query($con,"select * from subjects where name='".$_POST['drop_2']."' and class='".$_POST['drop_1']."' and school='".$_SESSION['uid']."'");
	
	  $teach=mysqli_query($con,"select * from teacher where teacher_name='".$_POST['drop_3']."' and teacher_school='".$_SESSION['uid']."'");
	  
	  $rowsub=mysqli_fetch_array($subj);
	  $teach1=mysqli_fetch_array($teach);
	  $findtea=mysqli_query($con,"select * from timetable where dayid='".$_POST['day']."' and period_id='".$_POST['period']."' and 
	  teacher='".$_POST['drop_3']."' and school_id='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	
	if(($rowsub['no_of_periods']>0) && ($teach1['max_per']>0))
	{
	   if(mysqli_num_rows($findtea)>0)
    {
	?>
           <script type="text/javascript">
            alert("This teacher is already engaged in some other class	");
            </script>
    <?php
	       }
	else
	   {
		     $a=$rowsub['no_of_periods']-1;
			 $b=$teach1['max_per']-1;
			 $udatelim=mysqli_query($con,"update subjects set no_of_periods='$a' where name='".$_POST['drop_2']."' and school='".$_SESSION['uid']."' and class='".$_POST['drop_1']."'");
			
			 $udateteach=mysqli_query($con,"update teacher set max_per='$b' where teacher_name='".$_POST['drop_3']."' and school='".$_SESSION['uid']."'");
			 
            $findtea1=mysqli_query($con,"select * from timetable where dayid='".$_POST['day']."' and period_id='".$_POST['period']."'  and school_id='".$_SESSION['uid']."'");
			
			if(mysqli_num_rows($findtea1)<1)
			{
            $timetable=mysqli_query($con,"insert into timetable(dayid,class_id,period_id,subject_id,school_id,teacher,session) 
		values('".$_POST['day']."','".$_POST['drop_1']."','".$_POST['period']."','".$_POST['drop_2']."','".$_SESSION['uid']."','".$_POST['drop_3']."','".$_SESSION['session']."')");
		 
		
		 
		  
		  
		  $msg="Inserted Successfully";
			}
			else 
			{ ?> 
			 <script type="text/javascript">
            alert("Subject already exist in this period");
            </script>
			<?php
            }
	}
	}
	 else
	 { 
	 ?>
           <script type="text/javascript">
            alert("You are exeding the max subject limit/max no of period to tacher limit of this subject");
            </script>
		<?php
		}
 }
 if(isset($_POST['update']))
 {
	 
	 $upd=mysqli_query($con,"update timetable set dayid='".$_POST['day']."',class_id='".$_POST['drop_1']."',
	 period_id='".$_POST['period']."',subject_id='".$_POST['drop_2']."',teacher='".$_POST['drop_3']."' where id='".$_GET['id']."' and school_id='".$_SESSION['uid']."'");
	 ?>
     <script type="text/javascript">
	  window.location = "<?php echo $var.timetable; ?>";
	</script>
     <?php
}
if(!empty($_GET['did']))
{
	$del=mysqli_query($con,"delete from timetable where id='".$_GET['did']."' and school_id='".$_SESSION['uid']."'");
} 
 ?>

<script type="text/javascript">
 function validate()
{
 if( document.myForm.class.value == "-1" )
   {
     alert( "Please Select Class" );
     return false;
   }
   else
   {
	 return true; 
	}
}
</script>
<script type="text/ecmascript">
(function($){
    $.fn.extend({
    customStyle : function(options) {
        if(!$.browser.msie || ($.browser.msie&&$.browser.version>6)) {
            return this.each(function() {
                var currentSelected = $(this).find(':selected');
                $(this).after('<span class="customStyleSelectBox"><span class="customStyleSelectBoxInner">'+currentSelected.text()+'</span></span>').css({position:'absolute', opacity:0,fontSize:$(this).next().css('font-size')});
                var selectBoxSpan = $(this).next();
                var selectBoxWidth = parseInt($(this).width()) - parseInt(selectBoxSpan.css('padding-left')) -parseInt(selectBoxSpan.css('padding-right'));            
                var selectBoxSpanInner = selectBoxSpan.find(':first-child');
                selectBoxSpan.css({display:'inline-block'});
                selectBoxSpanInner.css({width:selectBoxWidth, display:'inline-block'});
                var selectBoxHeight = parseInt(selectBoxSpan.height()) + parseInt(selectBoxSpan.css('padding-top')) + parseInt(selectBoxSpan.css('padding-bottom'));
                $(this).height(selectBoxHeight).change(function() {
                    selectBoxSpanInner.text($(this).find(':selected').text()).parent().addClass('changed');
                });
         });
        }
    }
    });
})(jQuery);
$(function() {
    $('select.styled').customStyle();
});
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#wait_1').hide();
	$('#drop_1').change(function(){
	  $('#wait_1').show();
	  $('#result_1').hide();
      $.get("func.php", {
		func: "drop_1",
		drop_var: $('#drop_1').val()
      }, function(response){
        $('#result_1').fadeOut();
        setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
      });
    	return false;
	});
});

function finishAjax(id, response) {
  $('#wait_1').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
function finishAjax_tier_three(id, response) {
  $('#wait_2').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
</script>
<div id="container">
 <br /><br /><br /><br /><br />
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
			<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
			   <img src="css/images/timetable.png" style="margin-left:20px;height:80px; width:80px"><br />
               <span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Add Subject</span>
               <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=time_home">Timetable</a> >>Add Subject</a>
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data" onsubmit="return(validate());">
                   <?php
                     if(!empty($errormsg))
                    { 
                    ?>
	                 <span style="color:#FF0000"><?php echo $errormsg; ?></span>
                   <?php
                   }
                   
			 if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		  <?php
		   }
	       ?>
                <?php
 if(!empty($_GET['id']))
 {
?>

<?php
   if(!empty($errormsg))
   { ?>
	<span style="color:#FF0000"><?php echo $errormsg; ?></span>
   <?php
   }
?>
<?php
   $updtime=mysqli_query($con,"SELECT * FROM timetable where id='".$_GET['id']."'");
   
   $rowupd=mysqli_fetch_array($updtime);
 
 ?>

<table>
<tr>
   <td>Days<span>*</span></td>
   <td>
       <select name="day" >
       <option value="0">Select Days</option>
	   <?php
	       $days=mysqli_query($con,"select * from days");
		   while($rowdays=mysqli_fetch_array($days))
		   {
	   ?>
        <option value="<?php echo $rowdays['day']; ?>" <?php if($rowupd['dayid']==$rowdays['day']){ ?> selected="selected"<?php } ?>><?php echo $rowdays['day']; ?></option>
       <?php
		   }
	   ?>
       
       
       </select>
   </td>
</tr>

<tr>
   <td>Select Periods<span>*</span></td>
       <?php
	      $periods=mysqli_query($con,"select * from period");
	    ?>
   
   <td>
         <select name="period">
         <option value="0">Select Period</option>
         <?php
		    while($rowperiod=mysqli_fetch_array($periods))
			{
			?>
              <option value="<?php echo $rowperiod['period_name'];?>"<?php if($rowupd['period_id']==$rowperiod['period_name']){ ?> selected="selected"<?php } ?> ><?php   echo $rowperiod['period_name'];?></option>
            <?php 	
		    
			}
		 ?>
         
         </select>
   </td>
</tr>
    
    <tr>
   
   <td>Select Classr<span>*</span></td>
       <td> <select name="drop_1" id="drop_1">
    
      <option value="" selected="selected" disabled="disabled">Select a Category</option>
      
      <?php getTierOne(); ?>
    
    </select> 
       </td>
</tr>
    <tr>
    <td></td>
    <td>
      <span id="wait_1" style="display: none;">
    <img alt="Please Wait" src="ajax-loader.gif"/>
    </span>
    <span id="result_1" style="display: none;"></span>
    <span id="wait_2" style="display: none;">
    <img alt="Please Wait" src="ajax-loader.gif"/>
    </span>
    <span id="result_2" style="display: none;"></span> 
    </td>
    </tr>
<tr>
 <td>&nbsp;</td>
 <td><input type="submit" name="update" value="update"></td>
</tr>


</table>

<?php
}
else
   {
?>
				
<table style="font-size:18px" >
<tr>
   <td>Days<span>*</span></td>
   <td>
       <select name="day" class="select" style="width:180px">
       <option value="0">Select Days</option>
	   <?php
	       $days=mysqli_query($con,"select * from days");
		   while($rowdays=mysqli_fetch_array($days))
		   {
	   ?>
        <option value="<?php echo $rowdays['day']; ?>"><?php echo $rowdays['day']; ?></option>
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
      <td>Select Class<span>*</span></td>
       <td> <select name="drop_1" id="drop_1" style="width:180px" >
    
      <option value="" selected="selected" disabled="disabled">Select Class</option>
      
      <?php getTierOne(); ?>
    
    </select> 
       </td>
</tr>
    
	
	
	<tr>
    <td></td>
    <td>
    <span id="wait_1" style="display: none;">
    <img alt="Please Wait" src="ajax-loader.gif"/>
    </span>
    <span id="result_1" style="display: none;"></span>
    <span id="wait_2" style="display: none;">
    <img alt="Please Wait" src="ajax-loader.gif"/>
    </span>
    <span id="result_2" style="display: none;"></span> 
    </td>
    </tr>
   <tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>

	<tr>
   <td>Select Periods<span>*</span></td>
      <?php
	  $timetable11=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."' and class='".$_SESSION['gclass']."'");
	  $rtimetb1=mysqli_fetch_array($timetable11); 
      $val=$rtimetb1['no_of_periods']/6;   
	  
	 ?>
    <td>
         <select name="period" class="styled" style="width:180px">
         <option value="0">Select Period</option>
         <?php
		    for($i=1;$i<=$val;$i++)
			{
			?>
              <option value="Period<?php echo $i;?>">Period<?php echo $i;?></option>
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
 <td><input type="submit" name="submit" value="submit"></td>
</tr>
</table>
<?php
 }
 ?>
<br><br><br><br>
<span style="font-size:18px; font-weight:bold; margin-left:150px; color:#F00">Monday</span>
<table width="800px"  style="margin:40px 0px 0px 10px;border-radius:10px;">
      <tr style=" background-color:#f0dea4;font-weight:bold; font-size:16px">
      <td>Period</td>
 <?php
      $timetable=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
	  while($rowtime=mysqli_fetch_array($timetable))
	{
	   $j=$rowtime['no_of_periods'];
	   $k=$j/6;
	   
	?>	
        <td><b><?php echo ucfirst($rowtime['class']); ?></b></td>
<?php
    }
  ?>
       </tr>
               <?php
			      for($i=1;$i<=$k;$i++)
				{
			    ?>
        </tr>
		<tr>
              <td style=" background-color:#f0dea4;font-weight:bold; font-size:16px">Period<?php echo $i; ?></td>	
        <?php
            $timetable1=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
	        $num=mysqli_num_rows($timetable1);
	        while($rtimetb=mysqli_fetch_array($timetable1)) 
		 {
			 $period="period".$i;
		     $get_tb=mysqli_query($con,"select * from timetable where class_id='".$rtimetb['class']."' and period_id='$period' and dayid='mon' and school_id='".$_SESSION['uid']."'"); 
		     $rowtb=mysqli_fetch_array($get_tb);
		//for($j=1;$j<=$num;$j++)
         ?>
            <td style="background:#CCCCCC; font-weight:bold"><?php echo ucfirst($rowtb['subject_id']);  ?><?php if(!empty($rowtb['teacher'])){ echo "(".ucfirst($rowtb['teacher']).")";}  ?><?php if(!empty($rowtb['subject_id'])) {?><a href="<?php echo $var."timetable&&id=".$rowtb['id']; ?>"><b>Edit</b></a><?php } ?></td>
          <?php
			  }
		   ?>
			    </tr>
		  <?php
                }
			?>
      </table>


<span style="font-size:18px; font-weight:bold; margin-left:150px; color:#F00">Tuesday</span>
<table width="800px" style="margin:0px 0px 0px 10px;border-radius:10px;">
      <tr style=" background-color:#f0dea4;font-weight:bold; font-size:16px">
      <td>Period</td>
 <?php
      $timetable=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
	  while($rowtime=mysqli_fetch_array($timetable))
	{
	   $j=$rowtime['no_of_periods'];
	   $k=$j/6;
	   
	?>	
        <td><b><?php echo ucfirst($rowtime['class']); ?></b></td>
<?php
    }
  ?>
       </tr>
               <?php
			      for($i=1;$i<=$k;$i++)
				{
			    ?>
        </tr>
              <td style=" background-color:#f0dea4;font-weight:bold; font-size:16px">Period<?php echo $i; ?></td>	
        <?php
            $timetable1=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
	        $num=mysqli_num_rows($timetable1);
	        while($rtimetb=mysqli_fetch_array($timetable1)) 
		 {
			 $period="period".$i;
		     $get_tb=mysqli_query($con,"select * from timetable where class_id='".$rtimetb['class']."' and period_id='$period' and dayid='tue' and school_id='".$_SESSION['uid']."'"); 
		     $rowtb=mysqli_fetch_array($get_tb);
		//for($j=1;$j<=$num;$j++)
         ?>
            <td style="background:#CCCCCC; font-weight:bold"><?php echo ucfirst($rowtb['subject_id']);  ?><?php if(!empty($rowtb['teacher'])){ echo "(".ucfirst($rowtb['teacher']).")";}  ?><?php if(!empty($rowtb['subject_id'])) {?><a href="<?php echo $var."timetable&&id=".$rowtb['id']; ?>"><b>Edit</b></a><?php } ?></td>
          <?php
			  }
		   ?>
			    </tr>
		  <?php
                }
			?>
      
</table>

<span style="font-size:18px; font-weight:bold; margin-left:150px; color:#F00">Wednesday</span>
<table width="800px" style="margin:0px 0px 0px 10px;border-radius:10px;">
      <tr style=" background-color:#f0dea4;font-weight:bold; font-size:16px">
      <td>Period</td>
 <?php
      $timetable=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
	  while($rowtime=mysqli_fetch_array($timetable))
	{
	   $j=$rowtime['no_of_periods'];
	   $k=$j/6;
	   
	?>	
        <td><b><?php echo ucfirst($rowtime['class']); ?></b></td>
<?php
    }
  ?>
       </tr>
               <?php
			      for($i=1;$i<=$k;$i++)
				{
			    ?>
        </tr>
              <td style=" background-color:#f0dea4;font-weight:bold; font-size:16px">Period<?php echo $i; ?></td>	
        <?php
            $timetable1=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
	        $num=mysqli_num_rows($timetable1);
	        while($rtimetb=mysqli_fetch_array($timetable1)) 
		 {
			 $period="period".$i;
		     $get_tb=mysqli_query($con,"select * from timetable where class_id='".$rtimetb['class']."' and period_id='$period' and dayid='wed' and school_id='".$_SESSION['uid']."'"); 
		     $rowtb=mysqli_fetch_array($get_tb);
		//for($j=1;$j<=$num;$j++)
         ?>
            <td style="background:#CCCCCC; font-weight:bold"><?php echo ucfirst($rowtb['subject_id']);  ?><?php if(!empty($rowtb['teacher'])){ echo "(".ucfirst($rowtb['teacher']).")";}  ?><?php if(!empty($rowtb['subject_id'])) {?><a href="<?php echo $var."timetable&&id=".$rowtb['id']; ?>"><b>Edit</b></a><?php } ?></td>
          <?php
			  }
		   ?>
			    </tr>
		  <?php
                }
			?>
      
</table>

<span style="font-size:18px; font-weight:bold; margin-left:150px; color:#F00">Thurstday</span>
<table width="800px" style="margin:0px 0px 0px 10px;border-radius:10px;">
      <tr style=" background-color:#f0dea4;font-weight:bold; font-size:16px">
      <td>Period</td>
 <?php
      $timetable=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
	  while($rowtime=mysqli_fetch_array($timetable))
	{
	   $j=$rowtime['no_of_periods'];
	   $k=$j/6;
	   
	?>	
        <td><b><?php echo ucfirst($rowtime['class']); ?></b></td>
<?php
    }
  ?>
       </tr>
               <?php
			      for($i=1;$i<=$k;$i++)
				{
			    ?>
        </tr>
              <td style=" background-color:#f0dea4;font-weight:bold; font-size:16px">Period<?php echo $i; ?></td>	
        <?php
            $timetable1=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
	        $num=mysqli_num_rows($timetable1);
	        while($rtimetb=mysqli_fetch_array($timetable1)) 
		 {
			 $period="period".$i;
		     $get_tb=mysqli_query($con,"select * from timetable where class_id='".$rtimetb['class']."' and period_id='$period' and dayid='thurs' and school_id='".$_SESSION['uid']."'"); 
		     $rowtb=mysqli_fetch_array($get_tb);
		//for($j=1;$j<=$num;$j++)
         ?>
            <td style="background:#CCCCCC; font-weight:bold"><?php echo ucfirst($rowtb['subject_id']);  ?><?php if(!empty($rowtb['teacher'])){ echo "(".ucfirst($rowtb['teacher']).")";}  ?><?php if(!empty($rowtb['subject_id'])) {?><a href="<?php echo $var."timetable&&id=".$rowtb['id']; ?>"><b>Edit</b></a><?php } ?></td>
          <?php
			  }
		   ?>
			    </tr>
		  <?php
                }
			?>
      
</table>

<span style="font-size:18px; font-weight:bold; margin-left:150px; color:#F00">Friday</span>
<table width="800px" style="margin:0px 0px 0px 10px;border-radius:10px;">
      <tr style=" background-color:#f0dea4;font-weight:bold; font-size:16px">
      <td>Period</td>
 <?php
      $timetable=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
	  while($rowtime=mysqli_fetch_array($timetable))
	{
	   $j=$rowtime['no_of_periods'];
	   $k=$j/6;
	   
	?>	
        <td><b><?php echo ucfirst($rowtime['class']); ?></b></td>
<?php
    }
  ?>
       </tr>
               <?php
			      for($i=1;$i<=$k;$i++)
				{
			    ?>
        </tr>
              <td style=" background-color:#f0dea4;font-weight:bold; font-size:16px">Period<?php echo $i; ?></td>	
        <?php
            $timetable1=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
	        $num=mysqli_num_rows($timetable1);
	        while($rtimetb=mysqli_fetch_array($timetable1)) 
		 {
			 $period="period".$i;
		     $get_tb=mysqli_query($con,"select * from timetable where class_id='".$rtimetb['class']."' and period_id='$period' and dayid='fri' and school_id='".$_SESSION['uid']."'"); 
		     $rowtb=mysqli_fetch_array($get_tb);
		//for($j=1;$j<=$num;$j++)
         ?>
            <td style="background:#CCCCCC; font-weight:bold"><?php echo ucfirst($rowtb['subject_id']);  ?><?php if(!empty($rowtb['teacher'])){ echo "(".ucfirst($rowtb['teacher']).")";}  ?><?php if(!empty($rowtb['subject_id'])) {?><a href="<?php echo $var."timetable&&id=".$rowtb['id']; ?>"><b>Edit</b></a><?php } ?></td>
          <?php
			  }
		   ?>
			    </tr>
		  <?php
                }
			?>
      
</table>

<span style="font-size:18px; font-weight:bold; margin-left:150px; color:#F00">Saturday</span>
<table width="800px" style="margin:0px 0px 0px 10px;border-radius:10px;">
      <tr style=" background-color:#f0dea4;font-weight:bold; font-size:16px">
      <td>Period</td>
 <?php
      $timetable=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
	  while($rowtime=mysqli_fetch_array($timetable))
	{
	   $j=$rowtime['no_of_periods'];
	   $k=$j/6;
	   
	?>	
        <td><b><?php echo ucfirst($rowtime['class']); ?></b></td>
<?php
    }
  ?>
       </tr>
               <?php
			      for($i=1;$i<=$k;$i++)
				{
			    ?>
        </tr>
              <td style=" background-color:#f0dea4;font-weight:bold; font-size:16px">Period<?php echo $i; ?></td>	
        <?php
            $timetable1=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
	        $num=mysqli_num_rows($timetable1);
	        while($rtimetb=mysqli_fetch_array($timetable1)) 
		 {
			 $period="period".$i;
		     $get_tb=mysqli_query($con,"select * from timetable where class_id='".$rtimetb['class']."' and period_id='$period' and dayid='sat' and school_id='".$_SESSION['uid']."'"); 
		     $rowtb=mysqli_fetch_array($get_tb);
		//for($j=1;$j<=$num;$j++)
         ?>
            <td style="background:#CCCCCC; font-weight:bold"><?php echo ucfirst($rowtb['subject_id']);  ?><?php if(!empty($rowtb['teacher'])){ echo "(".ucfirst($rowtb['teacher']).")";}  ?><?php if(!empty($rowtb['subject_id'])) {?><a href="<?php echo $var."timetable&&id=".$rowtb['id']; ?>"><b>Edit</b></a><?php } ?></td>
          <?php
			  }
		   ?>
			    </tr>
		  <?php
                }
			?>
      
</table>


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

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
