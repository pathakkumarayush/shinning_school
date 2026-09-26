
<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}
.col_6{ width:58.5%; height:520px; background-color:#FFFFFF; margin-left:15px; float:left; margin-top:10px;}
.col_4{ width:40%; height:520px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;}
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
<?php
if(!empty($_SESSION['umsg']))
{
  unset($_SESSION['umsg']);
}
require_once("../db.php");

if(isset($_POST['submit']))
{
 if(empty($_POST['fee']) && empty($_POST['class']) )
 {
  $error_msg="Field Marked with * are mandatory";
 }
//$error_msg.=validate1($_POST['fee'],"Computer Fee",1,0,0,0,0,0,0);
//$error_msg.=validate1($_POST['class'],"class",1,0,0,0,0,0,0);
if(empty($error_msg))
{ 	
foreach($_POST['class'] as $class)
{
$sel=mysqli_query($con,"select class from admission where session='".$_SESSION['session']."' and class='$class' and school='".$_SESSION['uid']."'");

if(mysqli_num_rows($sel)<1)
{	
$queryw=mysqli_query($con,"insert into admission(class,session,fee,school) values('$class','".$_SESSION['session']."','".$_POST['fee']."','".$_SESSION['uid']."')") or die(mysqli_error());
$msg="Inserted Sucessfully";
}
else
{
 $err="Admission Fee Already Exist";
}

}
$_SESSION['sumsg']="Inserted Sucessfully";
}
}
if(!empty($_GET['id']))
{

$selrc=mysqli_query($con,"select * from admission where id='".$_GET['id']."'");	
$rowselrec=mysqli_fetch_array($selrc);	
	}
if(isset($_POST['submit1']))
{
$queryupdate=mysqli_query($con,"update admission set fee='".$_POST['fee']."' where id='".$_POST['id']."'") or die(mysqli_error());	

?>
<script type="text/javascript">
	  window.location = "<?php echo $var."admission_fee&&uid=update Sucessfully"; ?>";
	</script>
 <?php
}
?>
<?php
 if(!empty($_GET['did']))
 {
	  
	 $del2=mysqli_query($con,"delete from admission where id='".$_GET['did']."'"); 
     
 ?>
  <script type="text/ecmascript">
	  window.location = "<?php echo $var."admission_fee&&dmsg=Deleted Sucessfully"; ?>";
	</script>
 
 <?php
 }
?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Field from Fee Card")) { 
        return false;
    }
    
} 
</script>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Class Setting/setting.png" /><a href="./?pageid=setting_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Admission Fee</h2>
</div>
<div class="col_4">
<div class="form-style-2-heading">Enter Admission Fee</div>
 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
         <?php
     if(!empty($_GET['uid']) && empty($err) && empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['uid']; ?></div>
		  <?php
		   }
	       ?>
           
     <?php
     if(!empty($_GET['dmsg']) && empty($msg) && empty($err))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['dmsg']; ?></div>
		  <?php
		   }
	       ?>
    <?php
	          if(!empty($error_msg))
			{
			?>
			 <div class="error" style="width:250px; height:auto; border-radius:5px" ><?php echo $error_msg ;?></div>
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
	         if(!empty($err))
			{
			?>				
						<div class="error" style="width:250px; height:auto; border-radius:5px"><?php echo $err;  ?></div>
		<?php  } ?>

		<?php				
           if(!empty($_GET['id']))
           {
      ?>
        
        
     <table border="0" style="margin:10px 0px 0px 20px">
                         <tr>
           <tr>
               <td>Class<span>*</span></td>
               <td><input type="text" name="class" value="<?php echo $rowselrec['class']; ?>" readonly></td>
          </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            <tr>
            <td>Exam Fee</td>
            <td><input type="text" name="fee" style="width:100px" value="<?php echo $rowselrec['fee'];  ?>"></td>
          </tr>
          <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr> 
          <tr>
            <td><input type="hidden" name="id" value="<?php echo $rowselrec['id']; ?>"></td>
            <td><input  type="submit" name="submit1"  value="submit" style="width:100px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
     
        <?php
		   }
		   else
		   {
		   ?>
          
       <table border="0" style="margin:40px 0px 0px 20px">
           
           <tr>
            <td>Class<span>*</span><br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td>
               <td>
               <div style="height:100px; overflow:scroll; border:#CCCCCC 1px solid">
               <?php
			    $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."' ");
			    while($rowclass=mysqli_fetch_array($class))
				{
			  ?>
             
                <input type="checkbox" name="class[]" value="<?php echo $rowclass['class'];?>" ><?php echo $rowclass['class'];?><br>
              <?php
				}
				?>
                </div>
                </td>
          </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
                        
           
            <tr>
            <td>Admission Fee</td>
            <td><input type="text" name="fee" class="tb5" style="width:100px" onKeyPress="return isNumberKey(event)"></td>
          </tr>
          <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
          </tr> 
          <tr>
            <td></td>
            <td><input  type="submit" name="submit"  value="submit" style="width:100px; margin-bottom:10px" /></td>
          </tr>
         
          </table>
      
          <?php
		   }
           ?>
         
</div>
<div class="col_6">
<div class="form-style-2-heading">Admission Fee Information</div>
<div class="box-head" style="margin-top:-20px;">
<h2 class="left">Classwise Admission Fee</h2>
</div>
<div class="table" style="border:#FF0000 0px solid; height:440px; overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr style="background:#EAECFD; color:#000">
          <td>Id</td>
          <td>Class</td>
          <td>Fee</td>
          <td>Session</td>
         <td>Action</td>
       </tr>
       <?php
        $i=1;
		$memo1=mysqli_query($con,"Select distinct(class) FROM `class` where school='".$_SESSION['uid']."'");
	    while($meta = mysqli_fetch_array($memo1))
	   {
	     $class=$meta['class'].$meta['class_section'];
		   $selrc=mysqli_query($con,"select * from admission where class='$class' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");	      $num=mysqli_num_rows($selrc);
          $selstruc=mysqli_fetch_array($selrc); 

	  	?>
   <tr>  
	   <td><?php echo $i; ?></td>  
       <td><?php echo $meta['class']; ?></td> 
       <td><?php echo $selstruc['fee']; ?></td>
       <td><?php echo $selstruc['session']; ?></td>  
       <td><?php if($num>0) {  ?> <a href="<?php echo $var."admission_fee&&id=".$selstruc['id'];?>" style="color:#FF0000">edit</a>/<a href="<?php echo $var."admission_fee&&did=".$selstruc['id'];?>" onClick="return confirmation();" style="color:#FF0000">Delete</a> <?php } ?></td>  
    </tr>
    <?php
    $i++;
	}
	?>
	
	</table>
         </div>

  </form>

</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

   <script src="js/jquery-1.8.3.min.js"></script>
   <script type="text/javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="js/DT_bootstrap.js"></script>
   <script src="js/dynamic-table.js"></script>
