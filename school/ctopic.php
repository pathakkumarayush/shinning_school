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
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }
      //-->
</SCRIPT>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 


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
                    filename: "Fee Collection By Date("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>


<script>
jQuery(function($){
  $('#date_from').datepicker({ dateFormat: 'yy-m-dd' });
  $('#date_to').datepicker({ dateFormat: 'yy-m-dd' });
  $("#date_from_btn").click(function() { 
   $("#date_from").datepicker( "show" );
  });
  $("#date_to_btn").click(function() { 
   $("#date_to").datepicker( "show" );
  });
    });
</script>
<?php

 if(!empty($_GET['did']))
	  {
	    $delete=mysqli_query($con,"delete from add_topic where id='".$_GET['did']."'");
	    $msg="Deleted Successfully";
	  }
?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this topic")) { 
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
    padding: 15px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 20px;
}
.class {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
}

.subject {
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
<div class="left_sect"><img src="images/aeh.png" /><a href="./?pageid=home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
<img src="images/lib.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Search Classwise </h2>

<a href="./?pageid=topic" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">View All Record</a>

</div>
<div class="col_4" style="margin-top:0px;" >			
				

<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".class").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_sub.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".subject").html(html);
			} 
		});
	});
	
	
	$(".subject").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_chapter.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".chapter").html(html);
			} 
		});
	});
	
});
</script>
                     
               
  <form method="post" name="myForm" action="#" enctype="multipart/form-data" onsubmit="return(validate());">
   <?php
   if(!empty($errormsg))
   { ?>
	
    <div class="error" style="width:250px; height:10px; margin-left:20px"><?php echo $errormsg; ?></div>
   <?php
   }
?>
<?php
   if(!empty($msg))
   { ?>
	<div class="success" style="width:150px; height:10px; margin-left:20px"><?php echo $msg;?></div>
   <?php
   }
  
		if(empty($_GET['id']))
		{
		?>
		  <table style="margin:40px 0px 0px 15px">


       
         <tr>
       <td>Select Class</td>
       <td>
	  
       <select name="class" class="class" style="width:175px">
       <option value="-1">Select Class</option>
       <?php
	   
	    $result = mysqli_query($con,"SELECT * FROM class") 
	    or die(mysqli_error());
        while($tier = mysqli_fetch_array( $result)) 
		{
		?>
        <option value="<?php echo $tier['class']; ?>"><?php echo $tier['class']; ?></option>
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
   <td><input type="submit" name="submit" value="submit" style="width:80px; font-weight:bold"></td>
</tr>


</table>
      <?php
	    }
		  else
		    {
			?>
			<table style="margin:40px 0px 0px 15px">



<tr>
   <td>Chapter Name<span style="color:#F00">*</span></td>
   <td><input type="text" name="cname" value="<?php echo $rowc['cname']; ?>" id="sub_nam" class="tb5" style="width:155px"></td>
</tr>

<input type="hidden" name="id" value="<?php echo $_GET['id'];  ?>">
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>

<tr>
   <td>&nbsp;</td>
   <td><input type="submit" name="update" value="Update" style="width:80px; font-weight:bold"></td>
</tr>


</table>
		<?php
		  }
		?>
		<br><br>
		  <div id="txtHint1">
		  <?php
		   if(!empty($_SESSION['r']) && ($_SESSION['r']!="-1"))
	  {
	   $class=$_SESSION['q'].$_SESSION['r'];
	   $fet_sub=mysqli_query($con,"select  * from class where school='".$_SESSION['uid']."' and class='".$_SESSION['q']."' and class_section='".$_SESSION['r']."'");
	  }
	  else
	     {
		   $class=$_SESSION['q'];
		   $fet_sub=mysqli_query($con,"select  * from class where school='".$_SESSION['uid']."' and class='".$_SESSION['q']."'");
		 }
		 
            
			$fetsub=mysqli_fetch_array($fet_sub);
		    $nosub=mysqli_query($con,"SELECT sum(no_of_periods) FROM `subjects` where class='$class' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' ");           
		  
		   $rowcountsub=mysqli_fetch_array($nosub);
		   $val=$fetsub['no_of_periods']-$rowcountsub['sum(no_of_periods)'];
		   
		 ?>
            <div class="box-head">
						<h2 class="left">Currently Available Records </h2>
						 
						
						</div>
        
		   <div class="table" style="border:#FF0000 0px solid; height:520px; overflow:scroll">
           <table id="tbl_exm" width="100%" border="0" cellspacing="0" cellpadding="0">
		 
		  <tr style="line-height:40px;"><td colspan="15">
			  
			  <button type="button" class="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>
			  </td></tr>
		 
		   <tr>
              <td>Sr</td>
			  <td>Class</td>
			  <td>Subject</td>
			  <td>Chapter</td>
			  <td>Topic</td>
			  <td>Desc</td>
			  <td>Period</td>
              <td>Date</td>
			  <!--<td>E-Date</td>-->
			  <td>Rmk</td>
			  
	          <td>Action</td>
          </tr>
		
		  
		  
      <?php
	  if(isset($_POST['submit']))
      {
	  
      $i=1;
	 
	  $fet_subj=mysqli_query($con,"select  * from add_topic where class_id='".$_POST['class']."' and session='".$_SESSION['session']."'");
	  while($rowsubj=mysqli_fetch_array($fet_subj))
	  {
	  
	  $class = $rowsubj['class_id'];
	  $fet_period=mysqli_query($con,"select  * from class where class_id='$class'");
      $fetperiod=mysqli_fetch_array($fet_period);
	  
	  $sub = $rowsubj['subject_id'];
	  $fet_subj=mysqli_query($con,"select  * from subject where subject_id='$sub'");
	  $rowsub=mysqli_fetch_array($fet_subj);
	 
	 
	  $cid = $rowsubj['chapter_id'];
	  $sub=mysqli_query($con,"select  * from add_chapter where id='$cid'");
      $subrow=mysqli_fetch_array($sub);
	  ?>
      	
     <tr>
	 <td><?php echo $i; ?></td>
	 <td><?php echo $rowsubj['class_id'] ?></td>
      <td><?php echo $rowsubj['subject_id'] ?></td>
	 <td> <?php echo $rowsubj['chapter_id']; ?></td>
	 <td> <?php echo $rowsubj['topic']; ?></td>
     <td> <?php echo $rowsubj['tdec']; ?></td>
	 <td> <?php echo $rowsubj['day']; ?></td>
     <td> <?php echo $rowsubj['sdate']; ?></td>
	<?php /*?> <td> <?php echo $rowsubj['edate']; ?></td><?php */?>
     <td> <?php echo $rowsubj['rmk']; ?></td>
      <?php /*?><td> 
	  <?php 
	  if($rowsubj['status']=='Active')
	  {
	  ?>
	  <a href="<?php echo $var."ac&&aid=".$rowsubj['id']; ?>" style="color:#006633">  Active </a>
	  <?php }else {?>
	   <a href="<?php echo $var."ac&&nid=".$rowsubj['id']; ?>" style="color:#FF0000">  Inactive </a>
	    <?php }?>
	   
	  
	  </td><?php */?>
	 <td>
	    
          <a href="<?php echo $var."topic&&did=".$rowsubj['id']; ?>" onClick="return confirmation();">Delete</a> ||
		
	     <a href="<?php echo $var."etopic&&eid=".$rowsubj['id']; ?>" target="_blank">Edit</a>
		
	  
	    </td>
      
     </tr>
	<?php	
      $i++;
	}
	
	}
    ?>
	
	
</table>
           
         </div>
      
                 </div>
                   </form>
                  
				<!-- End Box -->					   
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  