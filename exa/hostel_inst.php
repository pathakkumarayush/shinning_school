
<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}

.col_4{ width:100%; height:900px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
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
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Record")) { 
        return false;
    }
    
} 
</script>
<?php
if(!empty($_GET['did']))
{ 

$del=mysqli_query($con,"delete from instdetail where class='".$_GET['did']."' and session='".$_SESSION['session']."'"); 
}



 if(isset($_POST['submit']))
 {
 

$b= count($_POST['month']);
 
  $a= array_sum($_POST['inst']);
 
 $classq=mysqli_query($con,"select * from instdetail where  class='".$_POST['class']."' and session='".$_SESSION['session']."'");
 if(mysqli_num_rows($classq)<1)
 {
 if($_POST['no_inst']==$b)
 {
 if($a==$_POST['amnt'])
 {
 foreach($_POST['inst'] as $i=>$v)
 {
 $insttype= "Instalment".$i;
 $query=mysqli_query($con,"insert into instdetail (class,inst_type,amnt,session) values('".$_POST['class']."','$insttype','$v','".$_SESSION['session']."')");
}
  foreach($_POST['month'] as $m=>$v)
  {
    $insttype= "Instalment".$m;
  $upd=mysqli_query($con,"update instdetail set month='$v' where class='".$_POST['class']."' and inst_type='$insttype'");
  }
  
    $msg="Inserted Successfully";
}
else
   {
     $msg="Invalid Instalments ";
   }
   }
   else
     {
	   $msg="Invalid Month ";
	 }
}
else
   {
     $msg="Instalment Already Created For This Class";
   
   }

 }

?>
<script type="text/javascript">
function check(var a)
{
alert("hello");

}

</script>

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
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/FEE Management/fee_str.png" /><a href="./?pageid=fee_str">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Define Instalment</h2>
</div>
<div class="col_4">
<div class="form-style-2-heading">Enter Instalment</div>
<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onSubmit="return(validate());">
                  
      
	       <div class="table" style="border:#FF0000 0px solid; height:220px; margin-top:40px;">
		   <?php
	          
			 if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		  <?php
		   }
	       ?>
		 
		 <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        
		     
			   <tr>
                <td>Class<span class="textfieldRequiredMsg">*</span></td>
              <?php
                $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
				
			  ?>
            <td><select name="class1" class="styled">
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
		   <td></td>
           <td><input type="submit" name="search" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
		<?php
		  if(!empty($_POST['class1']))
		  {
		?>
	
	<table>
<tr>
<td><b>Sr.No</b></td>
<td><b>Class</b></td>
<td><b>Amount</b></td>
<td><b>Instalment</b></td>
<?php

$selrc=mysqli_query($con,"select * from definefee where  session='".$_SESSION['session']."' and class='".$_POST['class1']."'");


$rowselrec=mysqli_fetch_array($selrc);
for($i=1;$i<$rowselrec['no_of_inst'];$i++)
{
?>
<td></td>
<?php
}
?>
<td><b>Month</b></td>
</tr>
 <?php
	
$i=1;
$selrc1=mysqli_query($con,"select * from definefee where  session='".$_SESSION['session']."' and class='".$_POST['class1']."'");

while($rowselrec=mysqli_fetch_array($selrc1))	
{

?>
<tr>
<td><?php echo $i;   ?></td>
<td><?php echo $rowselrec['class'];    ?></td>
<td><?php echo $rowselrec['amnt'];    ?></td>
<?php
for($i=1;$i<=$rowselrec['no_of_inst'];$i++)
{
?>
<td><input type="text" name="inst[<?php echo $i;  ?>]" placeholder="Instalment<?php echo $i;  ?>"     onblur="check("a");"></td>
<td><select name="month[<?php echo $i; ?>]"  class="select">
                   <option value="Select Month">Select Month</option>
                   <option value="July">July</option>
                   <option value="August">August</option>
                   <option value="September">September</option>
                   <option value="October">October</option>
                   <option value="November">November</option>
                   <option value="December">December</option>
                   <option value="January">January</option>
                   <option value="February">February</option>
                   <option value="March">March</option>
                   <option value="April">April</option>
                   <option value="May">May</option>
                   <option value="June">June</option>
                      </select></td>
<?php
}
?>
 <td><input type="hidden" name="class" value="<?php echo $rowselrec['class']; ?>">
     <input type="hidden" name="amnt" value="<?php echo $rowselrec['amnt']; ?>">
	   <input type="hidden" name="no_inst" value="<?php echo $rowselrec['no_of_inst'];    ?>">
 
 </td>
<tr>					  
 <td><input type="submit" name="submit" value="Submit"></td>    
   </tr>             
</tr>
<?php
$i++;
}
?>

</table>
    <?php
	  }
	?>

 <div class="box-head" style="margin:50px 0px 0px 0px; background-color:#006633" >
						<h2 class="left">Instalment detail</h2>
				   </div>
<div class="table" style="border:#FF0000 0px solid; height:520px; overflow:scroll">
					
				 
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Class</td>
       
        <td>Instalment</td>
        
        <td>Delete</td>
        </tr>
       <?php
        $memo=mysqli_query($con,"select distinct(class) from instdetail where session='".$_SESSION['session']."' ");
		
		$i=1;
	while($rowmemo=mysqli_fetch_array($memo))
	{
	  $memo1=mysqli_query($con,"select * from instdetail where session='".$_SESSION['session']."' and class='".$rowmemo['class']."' ");
	  
	?>	
    <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
    <td><?php echo ucwords($rowmemo['class']);?></td>
   
    <td>
	      <?php while($r_month=mysqli_fetch_array($memo1))
		        {
				  echo "<b>".ucwords($r_month['inst_type'])."</b> : ".$r_month['amnt']."&nbsp; in ".$r_month['month']."&nbsp;";
				} 
		      ?>     
	
	</td> 
  
    <td><a style="color:#CC0033" href="<?php echo $var."define_inst"."&&did=".$rowmemo['class']; ?>" onClick="return confirmation();">Delete</a></td>
    </tr>
    <?php
    $i++;
	}
	?>
	
	</table>
				 
				 
				 
				 
				   </div>
           </form>
<div class="form-style-2-heading"></div>



</div>
<br clear="all" />
<br clear="all" />
<br clear="all" />

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  