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
                    filename: "Due Fee List("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>
		<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
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
.button{
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

</style>
<?php
  if(isset($_POST["send"]))
  {
    foreach($_POST['due'] as $k=>$d)
	{
  
   $sub="Fee Due Message";
   $nmsg="Fee For the month ".$d." has been due please pay the amount as soon as possible.";	
	$session=$_POST["ses"];
	$page=1;
	$r=sms($_SESSION["uid"],$k,$sub,$nmsg,'Yes',$session,$page);
	
	}
	
    
  }
?>
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<script language="javascript">
function checkAll()
{
if (myform.allbox.checked==true)
	for(i=0; i<document.myform.elements.length;i++)
	{
		document.myform.elements[i].checked=true;
	}
else
{
	for (i=0; i<document.myform.elements.length;i++)
	{
		document.myform.elements[i].checked=false;
	}
}
}
</script>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/FEE Management/feehome.png" /><a href="./?pageid=fee_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Due Fee List</h2></center>
</div>
<div class="col_4">

<form method="post" name="myform" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      			
						
		
	
       
            <div class="box-head" style=" font-size:18px">
					 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."due_student"."&&divid=1"; ?>">Fee Due Session Wise</a>&nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."due_student"."&&divid=2"; ?>">Fee Due Class Wise</a>
						</div>
         
       
         
        <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
         
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px; text-transform:uppercase;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        <tr>
   <td>Select Session</td><td><select name="session" class="select">
             <option value="-1">Select Session</option>
            
           
           <?php  for($i=2021;$i<=2025;$i++)
			  {  ?>
            <?php $j=$i; $j++;  $k=$i."-".$j; ?>
            <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
            <?php } ?>
            
           </select></td>
           <td><input type="submit" name="search2" value="Submit" style="width:80px"></td>   
          </tr>
        </table><br>
        </div>
        
        <?php
		 }
		 ?>
         <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
	   ?>
         
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        <tr>
   <td>Select Session</td><td><select name="session" class="select" style="width:150px;"> 
             <option value="-1">Select Session</option>
            
           
           <?php  for($i=2021;$i<=2025;$i++)
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
                <td>Class<span class="textfieldRequiredMsg">*</span></td>
              <?php
                $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:150px;">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class'].$rclass['class_section']; ?>"  ><?php echo $rclass['class'].$rclass['class_section']; ?></option>
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
		   <td></td>
           <td><input type="submit" name="search" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
		<br>
        </div>
        
        <?php
		 }
		 if(isset($_POST['search2']))
	{
		 ?>

		   <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/duelist.php?ses=<?php echo $_POST['session'];  ?>')"><input type="button" value="Print List " style="width:200px;float:left" ></a>
		   <div class="table" style="border:#006633 20px solid; height:220px; margin:0px 0px 0px 0px">
                <?php
				}
				?>
				  <?php
		 
		 if(isset($_POST['search']))
	{
		 ?>

		   <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/duelist.php?ses=<?php echo $_POST['session']."&class=".$_POST['class'];  ?>')"><input type="button" value="Print List " style="width:200px;float:left" ></a>
		   <div class="table" style="border: #006633 20px solid; height:220px; margin:0px 0px 0px 0px">
                <?php
				}
				
				
		    $sch=mysqli_query($con,"select * from school");
			$rowsch=mysqli_fetch_array($sch);
			$rowsch['school_name'];
             
			  ?>
			 <br />
			 <h2 align="center" style="margin-top:10px; color:#006633;text-transform:uppercase; font-weight:bold;"><?php echo $rowsch['school_name'];?></h2>
		
			<h2 align="center" style="margin-top:10px; color:#006633;text-transform:uppercase; font-weight:bold;">Session: <?php echo $_POST['session'];?></h2>
				   <br /> 	
        <table id="tbl_exm" width="100%" border="1" cellspacing="0" cellpadding="0">
	
		<tr style="font-weight:bold">
	    <td><input type='checkbox' value='on' id='chkall' name='allbox' onclick='checkAll();'/></td>
		<td>Admission No</td>
        <td>Student Name</td>
        <td>Class</td>
        <td>Session</td>
		<td>Total Amount</td>
		
       </tr>
       <?php
       
	$i=1;
	if(isset($_POST['search2']))
	{
	//while($studrow=mysqli_fetch_array($search))
	
	 
			  $search=mysqli_query($con,"select * from student where student_session='".$_POST['session']."'");
				  
			  $num=mysqli_num_rows($search);
				} 
				if(isset($_POST['search']))
	{
	//while($studrow=mysqli_fetch_array($search))
	
	  
			   $search=mysqli_query($con,"select * from student where student_session='".$_POST['session']."' and student_class='".$_POST['class']."'");
				  
			   $num=mysqli_num_rows($search);
				}  
			    if($num>0)
				{
				 while($studrow=mysqli_fetch_array($search))
				 {
	                $search1=mysqli_query($con,"select * from fee_detail where session='".$_POST['session']."' and sch='".$studrow['student_scholar']."' order by id desc limit 1");
					
			       while($numr=mysqli_fetch_array($search1))
				   { 
	          if($numr['due']>0)
			  {
	?>	
    <tr style="color:#335599">
    <td><input type="checkbox" name='formDoor[]' value="<?php echo $studrow['student_id']; ?>"  id='chk<?php echo $i; ?>' /></td>
    <td><?php echo ucwords($studrow['student_scholar']);?></td>
	 <td><?php echo ucwords($studrow['student_name']);?></td>
	 <td><?php echo ucwords($studrow['student_class']);?></td>
	 <td><?php echo ucwords($studrow['student_session']);?></td>
     <td><?php echo $numr['due']; ?>
	  <input  type="hidden" name="due[<?php echo $studrow['student_id']; ?>]" value="<?php echo $numr['month']."  Rs".$numr['due']; ?>"  style="width:80px"  />
	 <input type="hidden" name="ses" value="<?php echo  $_POST['session']; ?>">
	 
	 </td>
	
    </tr>
    <?php
    $i++;
	}
	}
	}
	}
	else
	   {
	   ?>
      <td style="color:#990066"><?php echo "No Record"; ?></td>
	   <?php
	   }
	?>
	 <tr>
	     <td colspan="6">
	    
	   <input type="submit" name="send" value="Send Message">
	   
	   <button type="button" class="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel</button></td>
	   </td>
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

  