<script type="text/javascript">
 function validate()
{
 if( document.myForm.feetype.value == "-1" )
   {
     alert( "Please Select Feetype" );
     return false;
   }
   else
   {
	return true; 
	}
}
</script>
<?php
session_start();
if(!empty($_SESSION['sumsg']))
{
  unset($_SESSION['sumsg']);
}
if(!empty($_SESSION['umsg']))
{
  unset($_SESSION['umsg']);
}
require_once("../db.php");

if(isset($_POST['Register']))
{
 if(empty($_POST['dept']))
 {
   $err="Field Marked with * Are Mandatory";
 }
 
if(empty($err))
{ 	
$sel=mysqli_query($con,"select name from department where name='".$_POST['dept']."'");
if(mysqli_num_rows($sel)<1)
{

$queryw=mysqli_query($con,"insert into  department(name) values('".$_POST['dept']."')") or die(mysqli_error());
/*
$id=mysqli_insert_id();
$textn="t".$id;
$queryw=mysqli_query($con,"update fee_memo set textbox='$textn' where id='$id' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'") or die(mysqli_error());
$field=$_POST['t_name'];
$field=substr($field,0,4);
$field=$field.$id;
$insert=mysqli_query($con,"ALTER TABLE  `fee_detail` ADD  `$field` VARCHAR( 100 )  NULL ");
$insert1=mysqli_query($con,"ALTER TABLE `fee_structure` ADD `$field` VARCHAR( 100 )  NULL ");
*/
$_SESSION['sumsg']="Inserted Sucessfully";
}
else
{
 $err="Store Already Exist";
}
}
}
if(!empty($_GET['id']))
{

$selrc=mysqli_query($con,"select * from department where id='".$_GET['id']."'");	
$rowselrec=mysqli_fetch_array($selrc);	
	}
if(isset($_POST['update']))
{

$queryupdate=mysqli_query($con,"update department set name='".$_POST['dept']."' where id='".$_POST['id']."'") or die(mysqli_error());	
?>
 <script type="text/ecmascript">
	  window.location = "<?php echo $var."department&uid=Update Sucessfully"; ?>";
	</script>
<?php
}
?>
<?php
 if(!empty($_GET['did']))
 {
	/*
	 $sel3=mysqli_query($con,"select label_name from fee_memo where id='".$_GET['did']."'");
	 $r_sel=mysqli_fetch_array($sel3);
	 $name=substr($r_sel['label_name'],0,4);
	 $name=$name.$_GET['did'];
	 $dcl1=mysqli_query($con,"ALTER TABLE  `fee_detail` DROP `$name`"); 
	 */
	 $del2=mysqli_query($con,"delete from department where id='".$_GET['did']."'"); 
   ?>	
  <script type="text/ecmascript">
	  window.location = "<?php echo $var."addstore&dmsg=Deleted Sucessfully"; ?>";
	</script>
 
 <?php
	 /*
	 $dcl1=mysqli_query($con,"ALTER TABLE  `fee_structure` DROP `$name`");

 */
 }
?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Department")) { 
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
<div class="left_sect"><img src="images/Inventory/inven.png" /><a href="./?pageid=inventry_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/inv.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">
 <a href="./?pageid=inventry_home" style="text-decoration:none">Inventory</a> -> Add Department</a></h2>
</div>
<div class="col_4" style="margin-top:0px; min-height:335px;" >
			
				
                    
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onSubmit="return(validate());">
                
       
	     <?php
      if(!empty($_GET['dmsg']) && empty($err) && empty($_SESSION['sumsg']))
	  {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['dmsg']; ?></div>
		  <?php
		   }	
	 if(!empty($_GET['uid']) && empty($err) && empty($_SESSION['sumsg']))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['uid']; ?></div>
		  <?php
		   }
	       ?>
   
    <?php
	          
			 if(!empty($_SESSION['sumsg']) && empty($err))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_SESSION['sumsg'];   ?></div>
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
        
        
        <table border="0" style="margin:80px 0px 0px 20px; font-size:18px">
          <tr>
            <td>Department Name<span>*</span></td>
            <td><input type="text" class="tb5" name="dept" style="width:250px"  id="txtname" value="<?php echo $rowselrec['name']; ?>" />
           </td>
          </tr>
          
          
           <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
          <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
          <tr>
            <td></td>
            <td><input  type="submit" name="update"  value="Update" style="width:100px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
     
        <?php
		   }
		   else
		   {
		   ?>
          
        <table border="0" width="600" style="margin:20px 0px 0px 20px; font-size:18px">
            
            <tr>
            <td>Department Name<span>*</span></td>
            <td>
              <input type="text" name="dept" class="tb5" style="width:250px"  id="txtname" />
             </td>
          </tr>
		  <tr>
		      <td>&nbsp;</td>
			    <td>&nbsp;</td>
		  </tr>
           
       <tr>
            <td></td>
            <td><input  type="submit" name="Register"  value="Add" style="width:100px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
      
        <?php
		   }
            ?>
            <br><br>
            <div class="box-head">
						<h2 class="left">Currently Available Department</h2>
				   </div>
           <div class="table" style="border:#FF0000 0px solid; height:290px; overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
        <td>department Name</td>
    
        <td>Edit</td>
        <td>Delete</td>
        </tr>
       <?php
        $memo=mysqli_query($con,"select * from department");
		
		$i=1;
	while($rowmemo=mysqli_fetch_array($memo))
	{
	  
	?>	
    <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
    <td><?php echo ucwords($rowmemo['name']); ?></td>
    <td><a style="color:#CC0033" href="<?php echo $var."department"."&&id=".$rowmemo['id']; ?>">Edit</a></td>
    <td><a style="color:#CC0033" href="<?php echo $var."department"."&&did=".$rowmemo['id']; ?>" onClick="return confirmation();">Delete</a></td>
    </tr>
    <?php
    $i++;
	}
	?>
	
	</table>
         </div>
      
                 
                  </form>
                  
				<!-- End Box -->
			</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>