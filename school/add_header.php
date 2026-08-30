
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
<script type="text/javascript">
 function validate()
{
 if( document.myForm.txtclass.value == "-1" )
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
<?php
 if(!empty($_GET['did']))
 {
	
	
	 $del2=mysqli_query($con,"delete from definefee where id='".$_GET['did']."'"); 
 $msg="Deleted Successfully";  
 
 }

if(isset($_POST['submit']))
{
 if(empty($_POST['inst']))
 {
   $err="Field Marked With * Are Mandatory";
 }
if(empty($_POST['amnt']))
 {
   $err="Field Marked With * Are Mandatory";
 }

 
if(empty($err))
{ 	
$sel=mysqli_query($con,"select Class from definefee where class='".$_POST['txtclass']."'  and session='".$_SESSION['session']."'");
if(mysqli_num_rows($sel)<1)
{

$queryw=mysqli_query($con,"insert into definefee(class,amnt,no_of_inst,session,transport_inst) values('".$_POST['txtclass']."','".$_POST['amnt']."','".$_POST['inst']."','".$_SESSION['session']."','".$_POST['inst_transport']."')") or die(mysqli_error());
$_SESSION['sumsg']="Inserted Sucessfully";
for($i=1;$i<=$_POST['inst'];$i++)
{
 $inst="Instalment".$i;
 $quru=mysqli_query($con,"insert into instalment(class,instalment,session) values('".$_POST['txtclass']."','".$inst."','".$_SESSION['session']."')");

}


$msg="Inserted Successfully";
}
else
{
 $err="Duplicate Entry";
}
}
}

if(isset($_POST['Update']))
{

$queryupdate=mysqli_query($con,"update definefee set amnt='".$_POST['amnt']."',no_of_inst='".$_POST['inst']."',transport_inst='".$_POST['inst_transport']."' where id='".$_GET['id']."'") or die(mysqli_error());	
$msg="Updated Successfully";
}
?>
<?php

 if(!empty($_GET['id']))
{

$selrc=mysqli_query($con,"select * from definefee  where id='".$_GET['id']."'");	
$rowselrec=mysqli_fetch_array($selrc);	
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
<div class="left_sect"><img src="images/FEE Management/fee_str.png" /><a href="./?pageid=fee_str">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Define Fee</h2>
<a href="./?pageid=pay_fee" style="color:#FFFFFF;  margin-top:5px; text-decoration:none; padding:10px; float:right; font-weight:bold; background-color:rgb(40, 134, 41)">Pay Fee</a>
</div>
<div class="col_4">
<div class="form-style-2-heading">Enter Fee</div>
 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onSubmit="return(validate());">
                
       
	     <?php
      if(!empty($msg))
	  {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg; ?></div>
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
        
        
      <table border="0" style="font-size:14px">
          <tr>
            
           <td>Select Class </td>
           <td><?php echo $rowselrec['class'];   ?></td>
              		
         </tr>
          </tr>
         <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Amount<span>*</span></td>
            <td>
             <input type="text" class="tb5" name="amnt"  value="<?php echo $rowselrec['amnt'];   ?>"  id="txtname"  />
             </td>
          </tr>
	   
	   
	      <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
          <tr>
            <td>No Of Instalment<span>*</span></td>
            <td>
             <input type="text" class="tb5" name="inst" id="txtname" value="<?php echo $rowselrec['no_of_inst']; ?>" />
             </td>
          </tr>
           <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
          <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Instalment For Transport Fee</td>
            <td>
             <input type="text" class="tb5" name="inst_transport"   id="txtname" value="<?php echo $rowselrec['transport_inst']; ?>" />
             </td>
          </tr>
	   
	      <tr>
            <td></td>
            <td><input  type="submit" name="Update"  value="Submit" style="width:100px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
     
        <?php
		   }
		   else
		   {
		   ?>
          
        <table border="0" style=" margin-left:20px; font-size:18px">
          <tr>
            
           <td>Select Class <label style="color:#FF0000">*</label></td>
           <td>
               <?php 
		   if(isset($_GET["upstudid"]))
		   {
			echo $rowstud['student_class'];  
            }
			else
			   {
		  ?>
		     <select name="txtclass" class="select" style="width:220px;"  onchange="showSection(this.value)">
             
	       <option value="-1">Select Class</option>
              
               <?php
        $res=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION["uid"]."'");
        while($rows=mysqli_fetch_array($res))
        {
            echo "<option>".$rows["class"]."</option>";
        } 
        ?>
             </select>
          <?php
		     }
			 ?>
		   </td>
         </tr>
          </tr>
         <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Amount<span>*</span></td>
            <td>
             <input type="text" class="tb5" name="amnt"   id="txtname"  />
             </td>
          </tr>
	   
	   
	      <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
          <tr>
            <td>No Of Instalment<span>*</span></td>
            <td>
             <input type="text" class="tb5" name="inst" id="txtname" value="<?php echo $rowselrec['label_name']; ?>" />
             </td>
          </tr>
		    <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Instalment For <br />Transport Fee</td>
            <td>
             <input type="text" class="tb5" name="inst_transport"   id="txtname"  />
             </td>
          </tr>
		  
           <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
          <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
          <tr>
            <td></td>
            <td><input  type="submit" name="submit"  value="Submit" style="width:100px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
      
        <?php
		   }
            ?>
			 </form>

</div>
<div class="col_6">
<div class="form-style-2-heading">Fee Information</div>
<table class="table table-bordered" id="sample_1" style="font-size:12px; font-weight:bold; ">
              <thead style="background-color:#009933; color:#FFFFFF;border:1px #993300 solid;">
              <tr style="background-color:#009933;color:#FFFFFF">
                  <th>Sr</th>
                 <th>Class</th>
                 <th>Amount</th>
                 <th>No Of Instalment</th>
                 <th>Edit</td>
                 <th>Delete</th>
               </tr>
			  
			  
              </thead>
			  
              <tbody>
			  <?php
              $memo=mysqli_query($con,"select * from definefee where session='".$_SESSION['session']."' and session='".$_SESSION['session']."'");
		
		      $i=1;
	          while($rowmemo=mysqli_fetch_array($memo))
	          {
	          ?>	
             <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
    <td><?php echo ucwords($rowmemo['class']);?></td>
    <td><?php echo $rowmemo['amnt'];?></td>
    <td><?php echo $rowmemo['no_of_inst'];?></td> 
    <td><a style="color:#CC0033" href="<?php echo $var."add_header"."&&id=".$rowmemo['id']; ?>">Edit</a></td>
    <td><a style="color:#CC0033" href="<?php echo $var."add_header"."&&did=".$rowmemo['id']."&dclass=".$rowmemo['class']; ?>" onClick="return confirmation();">Delete</a></td>
    </tr>
              
            
    <?php
	 $i++;
	}
	?>
          </tbody>
          </table>
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
<?php
    if(isset($_POST["addclass"]))
    {

    if($_POST["section"]=="Select Section")
	  {
	    $result=mysqli_query($con,"select * from class where class='".$_POST["class"]."' and  school='".$_SESSION['uid']."' ")or die(mysqli_error());
	  }
	  else
	  {
	$result=mysqli_query($con,"select * from class where class='".$_POST["class"]."' and class_section='".$_POST["section"]."' and school='".$_SESSION['uid']."' ")or die(mysqli_error());
	}
	if($row=mysqli_num_rows($result)>1)
	{
		?>
        <script type="text/javascript">
		alert("This class is already exists");
		</script>
        <?php
	}
	else
	{
	if($_POST["section"]=="Select Section")
	  {
	   $_POST["section"]="";
	  }
	mysqli_query($con,"insert into class(class,class_section,school,no_of_periods) values('".$_POST["class"]."','".$_POST["section"]."','".$_SESSION['uid']."','".$_POST['nperiod']."')");
	
	
	$msg="Inserted Successfully";
	}
}
?>