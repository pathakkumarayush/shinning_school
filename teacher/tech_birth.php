<script type="text/javascript">
function popitup(url) {
	newwindow=window.open(url,'name','height=535,width=623');
	if (window.focus) {newwindow.focus()}
	return false;
}
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

<style>
.clasec
{
	width:100px;
	height:20px;
	text-align:center;
	vertical-align:middle;
	padding:5px;
	color:#000;
	line-height:2;
	font-weight:bold;
	float:left;
	overflow:hidden;
	cursor:pointer;
	background-color:#E8E8E8;
	border:1px solid silver;
	margin:1px;
}
.mover
{
	 box-shadow:0 0 10px #808080;
	 cursor:pointer; border:1px solid silver; display:block; padding:5px; margin:4px; color:#0057AE;
}
.mout
{
	 cursor:poincter; border:1px solid silver; display:block; padding:5px; margin:4px; color:#0057AE;
}
</style>

<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do you want to delete this Student")) { 
        return false;
    }
    }
</script> 

<?php

if(isset($_REQUEST["txtmsg"]))
{
	
	$page=2;
	$cont = $_POST['formDoor'];
	//$cont = $_POST['formDoor'];
	foreach($cont as $cont1)
	{
	
    $session=$_SESSION['session'];
	$r=sms($_SESSION["uid"],$cont1,$_REQUEST["txtsub"],$_REQUEST["txtmsg"],'Yes',$session,$page);
	}
	?>
<script type="text/javascript">
alert("Message Sent Successfully");
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
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:-25px">
				  <img src="b.gif" style="width:200px; height:120px;" />
                 
                
				   <div style="border:#900 2px solid; margin-top:10px"></div>
				     <span style="float:right; color:#FFFFFF"><a href="./?pageid=messagehome" style="color:#FFFFFF">Back</a></span>
            <a href="<?php echo $var."sent_message";  ?>">Back</a>             
							
		<?php
		   if((empty($_GET['tid'])))
		   {
		?>			
				    
	   <form method="post" name="myform" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      
   
  <br><br>
            <div class="box-head" style="width:950px">
						 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="#">All Staff</a>
						</div>
        
       
       <div id="savedDiv" style="border:#F00 0px solid; width:250px; margin-top:40px; float:right; margin-right:-280px">
  Subject<br/>
  <input type="text" name="txtsub" readonly="readonly" id="suba" style="width:95%;" /><br/><br/>
  Message<br/>
  <div style="width:95%; height:100px; border:1px solid black" id="msg" >
  </div>

   </div> 
   

   

    <div style="border:#FF0000 0px solid; margin:220px -280px 0px 0px; width:250px; float:right">
  <input type="button" onclick="gets('msg'); display('sub1','none'); display('sub2','inline');" value="view Message" name="sendall" />
   <textarea name="txtmsg" style="width:95%; height:100px; border:1px solid black" id="mm" readonly="readonly"></textarea>
    <input type="submit" id="sub1" value="Send Message" name="send" disabled="disabled" /> 
    <input type="submit" id="sub2" value="Send Message" name="send" style="display:none;" /> 
		</div> 
	   
		   <div class="table" style="border:#FFCCCC 0px solid; height:480px; width:530px; margin:20px 0px 0px 0px">
        
 
   </td></tr>
   <tr valign="top"><td style="border:none;">
   
     
    <div id="secstud">
    <table border="0" cellpadding="5" cellspacing="0" style=" margin-left:20px; overflow:scroll; border-radius:5px; margin-right:20px; " width="700" >
    <tr style="background-color:#6699FF; color:#000;"><td align="center">
   <input type='checkbox' value='on' id='chkall' name='allbox' onclick='checkAll();'/>
    </td><td>&nbsp;Sr.No.</td><td>&nbsp;Name</td><td>&nbsp;Email</td><td>&nbsp;Contact</td></tr>
	<?php
	$i=0;

	$tres_all=mysqli_query($con,"select * from teacher where teacher_session='".$_SESSION['session']."'")
	 or die(mysqli_error());
	  
	    while($row_all=mysqli_fetch_array($tres_all))
	    {
		$i++;
		
		 $d = $row_all['teacher_dob']; 
		 date_default_timezone_set('Asia/Kolkata');  
         $birth = date("d-m", strtotime("$d"));
         $bday = date("d-m");
		?>
	    <?php if($birth==$bday){ ?>
        <tr <?php if($i%2==0){} ?>>
        <td align="center"><input type="checkbox" name='formDoor[]' value="<?php echo $row_all["teacher_id"]; ?>"  id='chk<?php echo $i; ?>' /></td>
        <td>&nbsp;<?php echo $row_all["teacher_id"]; ?></td>
        <td>&nbsp;<?php echo $row_all["teacher_name"]; ?></td>
        <td>&nbsp;<?php echo $row_all["teacher_email"]; ?></td>
        <td>&nbsp;<?php echo $row_all["contact"]; ?></td>
        </tr>
		<?php }?>
        <?php
	}
	?></table>  
    </div>
      
   
	
	   <td>

<div id="mindiv" style="width:400px; height:30px; z-index:9999; bottom:0px; right:0px; position:fixed; padding:3px;">

<div style="background-color:#990033; color:white; width:99%; padding:9px; box-shadow:0 0 10px #0073E6;">
My Messages
<img src="images/clos.png" onclick="display('savedmsg','none'); display('mindiv','none');" width="18" style="cursor:pointer; float:right; margin-right:10px;" />
<img src="images/MaximizeOver.gif" style="float:right; margin-right:5px; cursor:pointer;" onclick="display('mindiv','none'); display('savedmsg','inline');" />
</div>

</div>

<div id="savedmsg" style="width:400px; height:250px; background-color:white; border:1px solid silver; z-index:9999; bottom:0px; right:0px; position:fixed; padding:3px; display:none;">

<div style="background-color:#990033; color:white; width:97%; padding:5px;">
My Messages
<img src="images/clos.png" onclick="display('savedmsg','none'); display('mindiv','none');" width="18" style="cursor:pointer; float:right;" />
<img src="images/RestoreDownOver.gif" style="float:right; margin-right:5px; cursor:pointer;" onclick="display('mindiv','inline'); display('savedmsg','none');" />
</div>

<div style="width:395px; height:230px; overflow:auto; margin-top:7px; background:white; position:absolute;">

  <div id="TabbedPanels1" class="TabbedPanels">
    <ul class="TabbedPanelsTabGroup">
      <li class="TabbedPanelsTab" tabindex="0">Academic Messages</li>
      <!--<li class="TabbedPanelsTab" tabindex="0">Sent Messages</li>-->
   </ul>
    <div class="TabbedPanelsContentGroup">
      <div class="TabbedPanelsContent">
      <?php
	  $res_saved=mysqli_query($con,"select * from teacher_sms where school='".$_SESSION['uid']."'")or die(mysqli_error());
	  while($row_saved=mysqli_fetch_array($res_saved))
	  {
		  ?>
          <span onclick="getSavedmsg('teacher_sms','<?php echo $row_saved["id"]; ?>');" class="mout" onmouseover="this.className='mover';" onmouseout="this.className='mout';">
          <?php echo $row_saved["sub"]; ?>
          </span>
          <?php
	  }
	  ?>
      </div>
      <?php /*?><div class="TabbedPanelsContent">
        <?php
	  $send_sub="";
	  $res_saved=mysqli_query($con,"select * from sendmsg where sender='".$_SESSION["uid"]."'")or die(mysqli_error());
	  while($row_saved=mysqli_fetch_array($res_saved))
	  {
		  $send_sub.=$row_saved["sub"].'`';
	  }
	  $split_sub=explode('`',$send_sub);
	  $uni_sub=array_unique($split_sub);
	  foreach($uni_sub as $temp_sub)
	  {
		  if($temp_sub=="")
		  {
		  }
		  else
		  {
			  $res_msg=mysqli_query($con,"select * from sendmsg where sub='".$temp_sub."'")or die(mysqli_error());
			  $row_msg=mysqli_fetch_array($res_msg);
				?>
			  <span onclick="getSavedmsg('sendmsg','<?php echo $row_msg["id"]; ?>');" class="mout" onmouseover="this.className='mover';" onmouseout="this.className='mout';">
			  <?php echo $temp_sub; ?>
			  </span>
			  <?php
		  }
	  }
	  ?>
      </div><?php */?>
    </div>
  </div>
  
  
</div>
</div>
<!--<img src="images/add.png" style="float:right; margin-right:10px; margin-bottom:5px; cursor:pointer; display:none;" onclick="window.location='./?pageid=new_msg';" />-->
 
    <br/>
   
</td>          
                   </form>					
        
   <?php
      }
	  else
	     {

       $student=mysqli_query($con,"select * from student where student_school='".$_SESSION["uid"]."' and student_session='".$_SESSION['session']."'and status='1'");
  

   ?>
        <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      
   
 
            <div class="box-head" style="width:950px; margin-top:20px">
						 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="#">Tc Student</a>
						</div>
            <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <div style="width:1000px; min-height:450px; position:static; float:right; margin-right:7px; margin-top:7px; border:#CCCCCC solid 1px; border-radius:5px;">
<form method="post" action="#" name="myform" enctype="multipart/form-data">
<table width="200px" >
<tr valign="top">
<td width="80">
<?php

	?>
    <table cellpadding="0" cellspacing="0" border="0" style="border:none;">
    <tr valign="bottom"><td style="border:none;">
    <?php
	?>
    Messages By Class <br/><br/>
 	
    <?php
	$sec="";
	
	   $res=mysqli_query($con,"select * from class where school='".$_SESSION["uid"]."'")or die(mysqli_error());
	
	
	while($row=mysqli_fetch_array($res))
	{
		$sec.=$row["student_section"]."`";
	}
	$sec_exp=explode('`',$sec);
	$sec_uni=array_unique($sec_exp);
	foreach($sec_uni as $sec_temp)
	{
		if($sec_temp=="")
		{
			
		}
		else
		{
			?>
            <span class='clasec' onclick="getSecstud('<?php echo $_REQUEST["class"]; ?>','<?php echo $sec_temp; ?>')">Section &nbsp;<?php echo $sec_temp; ?></span>
            <?php
		}
	}
	?>
   </td></tr>
   <tr valign="top"><td style="border:none;">
   
     
    <div id="secstud">
      
    </div>  
    </td></tr>
    </table>   
   
</td>
<td>

<div id="mindiv" style="width:400px; height:30px; z-index:9999; bottom:0px; right:0px; position:fixed; padding:3px;">

<div style="background-color:#0073E6; color:white; width:99%; padding:9px; box-shadow:0 0 10px #0073E6;">
My Messages
<img src="images/clos.png" onclick="display('savedmsg','none'); display('mindiv','none');" width="18" style="cursor:pointer; float:right; margin-right:10px;" />
<img src="images/MaximizeOver.gif" style="float:right; margin-right:5px; cursor:pointer;" onclick="display('mindiv','none'); display('savedmsg','inline');" />
</div>

</div>

<div id="savedmsg" style="width:400px; height:250px; background-color:white; border:1px solid silver; z-index:9999; bottom:0px; right:0px; position:fixed; padding:3px; display:none;">

<div style="background-color:#0073E6; color:white; width:97%; padding:5px;">
My Messages
<img src="images/clos.png" onclick="display('savedmsg','none'); display('mindiv','none');" width="18" style="cursor:pointer; float:right;" />
<img src="images/RestoreDownOver.gif" style="float:right; margin-right:5px; cursor:pointer;" onclick="display('mindiv','inline'); display('savedmsg','none');" />
</div>

<div style="width:395px; height:230px; overflow:auto; margin-top:7px; background:white; position:absolute;">

  <div id="TabbedPanels1" class="TabbedPanels">
    <ul class="TabbedPanelsTabGroup">
      <li class="TabbedPanelsTab" tabindex="0">Academic Messages</li>
      <li class="TabbedPanelsTab" tabindex="0">Sent Messages</li>
   </ul>
    <div class="TabbedPanelsContentGroup">
      <div class="TabbedPanelsContent">
      <?php
	  $res_saved=mysqli_query($con,"select * from msg where school='".$_SESSION['schoolname']."'")or die(mysqli_error());
	  while($row_saved=mysqli_fetch_array($res_saved))
	  {
		  ?>
          <span onclick="getSavedmsg('teacher_sms','<?php echo $row_saved["id"]; ?>');" class="mout" onmouseover="this.className='mover';" onmouseout="this.className='mout';">
          <?php echo $row_saved["sub"]; ?>
          </span>
          <?php
	  }
	  ?>
      </div>
      <div class="TabbedPanelsContent">
        <?php
	  $send_sub="";
	  $res_saved=mysqli_query($con,"select * from sendmsg where sender='".$_SESSION["uid"]."'")or die(mysqli_error());
	  while($row_saved=mysqli_fetch_array($res_saved))
	  {
		  $send_sub.=$row_saved["sub"].'`';
	  }
	  $split_sub=explode('`',$send_sub);
	  $uni_sub=array_unique($split_sub);
	  foreach($uni_sub as $temp_sub)
	  {
		  if($temp_sub=="")
		  {
		  }
		  else
		  {
			  $res_msg=mysqli_query($con,"select * from sendmsg where sub='".$temp_sub."'")or die(mysqli_error());
			  $row_msg=mysqli_fetch_array($res_msg);
				?>
			  <span onclick="getSavedmsg('sendmsg','<?php echo $row_msg["id"]; ?>');" class="mout" onmouseover="this.className='mover';" onmouseout="this.className='mout';">
			  <?php echo $temp_sub; ?>
			  </span>
			  <?php
		  }
	  }
	  ?>
      </div>
    </div>
  </div>
  
  
</div>
</div>
<!--<img src="images/add.png" style="float:right; margin-right:10px; margin-bottom:5px; cursor:pointer; display:none;" onclick="window.location='./?pageid=new_msg';" />-->
  <div id="savedDiv" style="border:#F00 0px solid; width:250px; margin-top:40px">
  Subject<br/>
  <input type="text" name="txtsub" readonly="readonly" id="suba" style="width:95%;" /><br/><br/>
  Message<br/>
  <div style="width:95%; height:100px; border:1px solid black" id="msg">
  </div>

   </div>  <input type="button" onclick="gets('msg'); display('sub1','none'); display('sub2','inline');" value="view Message" name="sendall" />
   
    <br/>
   <table border="0" id="divhindi" style="height:200px; border:1px solid #ccc; display:none;">
   <tr><td>
   <?php
	///$res_msghin=mysqli_query($con,"select * from msg where sub='holiday message in hindi for rain'")or die(mysqli_error());
	//$row_msghin=mysqli_fetch_array($res_msghin);
	//echo $row_msghin["msg"];
	?>		
   </td></tr>
   </table>
    <br/>
    
   <textarea name="txtmsg" style="width:95%; height:100px; border:1px solid black" id="mm" readonly="readonly"></textarea>
    <input type="submit" id="sub1" value="Send Message" name="send" disabled="disabled" /> 
    <input type="submit" id="sub2" value="Send Message" name="send" style="display:none;" /> 
    <br/>
   
</td>

</tr></table>
</form>
</div>
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
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
      

           <tr>
             <td>Student Id</td>
             <td><input type="text" name="studentid" class="tb5" style="width:110px"></td>
            
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
          <table  style="margin:30px 0px 0px 70px; font-size:14px; width:400px">
    

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
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:300px">
     

         <tr>
                <td>Class<span class="textfieldRequiredMsg"></span></td>
              <?php
                $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:125px" onchange="showSection(this.value)">
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
			  <td><div id="txtHint1"></div></td>
           <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
		  </tr>
        </table><br>
        </div>
       <?php
		 }
		  ?>
		  
		
      
                 
                   </form>        
   <?php
    }
   ?>			   
			   
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
<script type="text/javascript">
function gets(s)
{
	var mymsg="";
	var subs=document.getElementById('suba').value;
	if(subs=="school closed")
	{
		var d_1=document.getElementById('d_1').value;
		var d_2=document.getElementById('d_2').value;
		var m_1=document.getElementById('m_1').value;
		mymsg="School will remain closed from " + d_1 + " To " + d_2 + " on account of " + m_1;
	}
	else if(subs=="school celebration")
	{
		var d_1=document.getElementById('d_1').value;
		var m_2=document.getElementById('m_2').value;
		var m_1=document.getElementById('m_1').value;
		mymsg = m_1 + " celebration is scheduled on " + d_1 + ". Please send " + m_2;
	}
	else if(subs=="Parents teacher meeting")
	{
		var t_1=document.getElementById('t_1').value;
		var t_2=document.getElementById('t_2').value;
		var m_1=document.getElementById('m_1').value;
		var d_1=document.getElementById('d_1').value;
		mymsg = "<?php echo $_SESSION["uname"]; ?> Parents teacher meeting will be held from " + t_1 + " TO " + t_2 + " on " + d_1 + " in " + m_1 + " branch";
	}
	else if(subs=="Parents teacher meeting in school")
	{
		var t_1=document.getElementById('t_1').value;
		var t_2=document.getElementById('t_2').value;
		var d_1=document.getElementById('d_1').value;
		mymsg = "Parents teacher meeting will be held on  "+ t_1+" at " + t_2 + " to "+ d_1+".";
	}
	else if(subs=="child is absent")
	{
		var d_1=document.getElementById('d_1').value;
		mymsg = "Your child Name is absent "+d_1+".";
	}
	else if(subs=="not done homework")
	{
		var m_1=document.getElementById('m_1').value;
		mymsg = "Your child NAME has not done homework in "+m_1+" Please take care.";
	}
	else if(subs=="new competition")
	{
		var m_1=document.getElementById('m_1').value;
		var d_1=document.getElementById('d_1').value;
		mymsg = m_1+ " competition is scheduled on "+d_1+". Please prepare your child NAME for the same.";
	}
	else if(subs=="fees for the month")
	{
		var m_1=document.getElementById('m_1').value;
		mymsg = "NAME fees for the month of "+m_1+" has not been paid yet. Kindly clear the dues to avoid higher late fine.";
	}
	else if(subs=="selected for assembly speech")
	{
		var m_1=document.getElementById('m_1').value;
		var d_1=document.getElementById('d_1').value;
		var d_2=document.getElementById('d_2').value;
		mymsg = "NAME has been selected for assembly speech in "+m_1+" category on "+d_1+". Please prepare him/her for pre audition on "+d_2+".";
	}
	else if(subs=="regarding your child")
	{
		var m_1=document.getElementById('m_1').value;
		mymsg = "Please send "+m_1+" regarding your child NAME.";
	}
	else if(subs=="book not return")
	{
		var d_1=document.getElementById('d_1').value;
		mymsg = "The library book issued by your child NAME has not been returned yet, due return date being "+d_1+". Please return the book immediately to avoid higher fin";
	}
	else if(subs=="bad behavior")
	{
		var d_1=document.getElementById('d_1').value;
		var d_2=document.getElementById('d_2').value;
		mymsg = "Your child behaviour "+d_1+". Kindly come to school with your child on "+d_2+".";
	}
	else if(subs=="Invite for auditions")
	{
	    var m_1=document.getElementById('m_1').value;
		
		var d_2=document.getElementById('d_2').value;
		mymsg = "The auditions for "+m_1+" competition will be held on "+d_2+". Interested contestants should give their names by DATE.";
	}
	else if(subs=="the costume fee")
	{
		var d_1=document.getElementById('d_1').value;
		var m_2=document.getElementById('m_2').value;
		var m_1=document.getElementById('m_1').value;
		mymsg = "the costume fee for "+m_1+" in Baby s day out is Rs "+m_2+". Kindly pay the same latest by "+d_1+".";
	}
	else if(subs=="weekly test")
	{
		mymsg = "The weekly test/ Term exam for SUBJECT will be held on DATE.";
	}
	else if(subs=="student not in proper uniform")
	{
		mymsg = "Your child Name not coming in proper uniform.Please ensure that your child always comes to school in proper uniform.";
	}
	else if(subs=="student coming to school late")
	{
		mymsg = "your child NAME has been found coming to school late. Kindly ensure that he always comes in time.";
	}
	else if(subs=="long absent")
	{
		var d_1=document.getElementById('d_1').value;
		
		mymsg = "Your child NAME is unauthorized long absent in <?php echo $_SESSION["uname"]; ?> since "+d_1+". Kindly meet the Principal soon.";
	}
	else if(subs=="weekly exam date")
	{
		var d_1=document.getElementById('d_1').value;
		var m_1=document.getElementById('m_1').value;
		var m_2=document.getElementById('m_2').value;
		mymsg = "NAME GOT "+m_1+" in weekly test/ Term exam for "+m_2+" held on "+d_1+".";
	}
	else if(subs=="Welcome Message for Existing Parents")
	{
		var d_1=document.getElementById('d_1').value;
		mymsg = "<?php echo $_SESSION["uname"]; ?> welcomes you to a new world of digital education from new session. You will know about your child regularly through text &voice sms, and online assignments. Admissions are open. New session commences from " + d_1 + " Dont miss opening day celebration.Happy vacations";
	}
	else if(subs=="Welcome Message for Non-Existing Parents")
	{
		var t_1=document.getElementById('t_1').value;
		var t_2=document.getElementById('t_2').value;
		var m_1=document.getElementById('m_1').value;
		mymsg = "Thank you for showing interest in <?php echo $_SESSION["uname"]; ?> for the education of your child. <?php echo $_SESSION["uname"]; ?> is fully digitalized now with smart classrooms and online web based platforms to ensure that your child receives nothing but the best.Admissions are open. Contact us from " + t_1 + " to " + t_2 + " on " + m_1;
	}
	else if(subs=="Holiday Message")
	{
		var m_1=document.getElementById('m_1').value;
		mymsg = "Tommorrow will be holiday, on account of " + m_1 + ".";
	}
	else if(subs=="Wishing Message")
	{
		var m_1=document.getElementById('m_1').value;
		mymsg = "Wish you a very " + m_1 + ".";
	}
	else if(subs=="management- teachers meeting")
	{
		var t_1=document.getElementById('t_1').value;
		var t_2=document.getElementById('t_2').value;
		var d_1=document.getElementById('d_1').value;
		var m_1=document.getElementById('m_1').value;
		mymsg = "<?php echo $_SESSION["uname"]; ?> management- teachers meeting will be held from " + t_1 + " TO " + t_2 + " on " + d_1 + " in " + m_1 + " branch.";
	}
	else if(subs=="management- teachers meeting in school")
	{
		var t_1=document.getElementById('t_1').value;
		var t_2=document.getElementById('t_2').value;
		var d_1=document.getElementById('d_1').value;
		mymsg = "<?php echo $_SESSION["uname"]; ?> management- teachers meeting will be held from " + t_1 + " TO " + t_2 + " on " + d_1 + ".";
	}
	else if(subs=="holiday message in hindi for rain")
	{
		mymsg = "???? ????? ?? ???? ?????? ??-??-???? ,?????? ?? ???? ??? ????? ?????!";
		document.getElementById('divhindi').style.display='inline';
		document.getElementById('mm').style.display='none';
	}
	else if(subs=="Winter Timing")
	{
		var t_1=document.getElementById('t_1').value;
		var t_2=document.getElementById('t_2').value;
		var d_1=document.getElementById('d_1').value;
		mymsg = "<?php echo $_SESSION["uname"]; ?> winter dress and winter timings shall be applicable from " + d_1 + ".Reporting time: " + t_1 + ".Dep. Time:" + t_2 + ".";
	}
	else if(subs=="Diwali Wishing Message")
	{
		mymsg = "<?php echo $_SESSION["uname"]; ?> wish you a very Happy Diwali.<?php echo $_SESSION["uname"]; ?> ki or se Deepotsav Ki Hardik Shubhkamnaaye.";
	}
	else if(subs=="detail for  mynetschool.com")
	{
		mymsg = "dear studname your detail for mynet school is username = m_1 pwddetail is m_2.";
	}
	else if(subs=="new year wishing message")
	{
	    var d_1=document.getElementById('d_1').value; 
		mymsg = "Wish you a very happy new year "+d_1+".";
	}
	else if(subs=="school reopen")
	{
		
		mymsg ="School will reopen from 17-06-2013 with usual timing and transport.Please ensure punctuality and regularity.";
	}
	else if(subs=="school reopen for teachers")
	{
		
		mymsg ="All New And Old teachers should attend the school meeting sheduled from 8am on 08-06-2013 at Sarvadharam branch of milestone public schhol.";
	}
	else if(subs=="promotional1")
	{
		
		mymsg ="Aap apane bachcho ko garmi ki chhutiyo me kitabo se jude rahane ki salah dete rahe. 15 june 2013 se school shuru hoga.";
	}
   else if(subs=="promotional2")
	{
		
		mymsg ="Rc School Barhi aapke bachcho ke liye ek matra school hai jo shiksha ke sath sansakar bhi deta hai.";
	}
	 else if(subs=="Promotional3")
	{
		
		mymsg ="Milestone admission fee is waived off till 25-06-2013.Hurry to avail this special offer and experience a real life oriented,smart class education .";
	}
	 else if(subs=="winter holidays")
	{
		
		mymsg ="1.Holiday for Nursery to Class 2 due to extreme cold from 9.jan.2013 to till further notice. 2.School timing for class 3 to 12 will be 8:55 AM to 2:00 PM from 9.jan.2013 to further notice.Recess time 12:00 to 12:20 pm 3. SCHOOL OFFICE WILL BE OPEN AS USUALL DAILY.";
	}
   else if(subs=="Christmas Wishing Message")
	{
		
		mymsg ="Bhopal Academy Christmas Holidays from d_1 to d_2.";
	}
	 else if(subs=="Child Information")
	{
		var m_1=document.getElementById('m_1').value;
		var d_1=document.getElementById('d_1').value;
		mymsg ="Your ward "+m_1+" has gone with "+d_1+" from school today.";
	}
    else if(subs=="Welcome Message Btm")
	{
		mymsg ="we are pleased to inform you that brigadier trivedi memorial school is going to be hi tech from 2013-2014 session.Now your child will get advanced computer education from Smart Education delhi.You will also get information about Your ward via sms.";  
	}
	  else if(subs=="Welcome Message Grace")
	{
		mymsg ="we are pleased to inform you that Grace Convent School Sabalgarh is going to be hi tech from 2013-2014 session.Now your child will get advanced computer education from Smart Education delhi.You will also get information about Your ward via sms.";   
	}
	else if(subs=="Welcome Message Takshila")
	{
		mymsg ="we are pleased to inform you that Takshashila Vidhyapeeth Sabalgarh is going to be hi tech from 2013-2014 session.Now your child will get advanced computer education from Smart Education delhi.You will also get information about Your ward via sms.";  
	}
	else if(subs=="school reopen message")
	{
	   
		var d_1=document.getElementById('d_1').value;	
		mymsg ="School will reopen from "+d_1+"  with usual timing .Please ensure punctuality and regularity.";
	}
	else if(subs=="diary and book checking")
	{
	    var d_1=document.getElementById('d_1').value;	
		mymsg ="Diary Shedule and book set checking done on "+d_1+"";
	}
	else if(subs=="Test Copies Submitted")
	{
	    var d_1=document.getElementById('d_1').value;	
		mymsg ="Test Copies to be submitted on "+d_1+".";
	}
	else if(subs=="Unit Test")
	{
	    var d_2=document.getElementById('d_2').value;
	    var d_1=document.getElementById('d_1').value;	
		mymsg ="Your child "+d_2+" Unit test will begin from "+d_1+".";
	}
	else if(subs=="Scholarship paper Tc Submission")
	{
	    var d_1=document.getElementById('d_1').value;	
		mymsg ="Please submit scholarship paper and Tc on "+d_1+".";
	}
	else if(subs=="Test copiies Distribution")
	{
	    var d_1=document.getElementById('d_1').value;	
		mymsg ="There will be a test copies distribution for your  child  on "+d_1+".";
	}
	else if(subs=="Test Copies Return")
	{
	    var d_1=document.getElementById('d_1').value;	
		mymsg ="Your child has to return test copies on "+d_1+".";
	}
	else if(subs=="Activities Message")
	{
	    var d_1=document.getElementById('d_1').value;
		var d_2=document.getElementById('d_2').value;	
		mymsg ="School having "+d_1+" on "+d_2+".";
	}
	else if(subs=="Unit test over")
	{
	    var d_2=document.getElementById('d_2').value; 
	    var d_1=document.getElementById('d_1').value;
	  mymsg ="Your child "+d_2+" unit test is over on "+d_1+".";
	}
	else if(subs=="exam begining")
	{
	    var d_1=document.getElementById('d_1').value;
		var d_2=document.getElementById('d_2').value;
	  mymsg ="Your child "+d_1+" exam is starting  from "+d_2+".";
	}
	else if(subs=="exam end")
	{
	    var d_1=document.getElementById('d_1').value;
		var d_2=document.getElementById('d_2').value;
	  mymsg ="your child "+d_1+" exam finishes on "+d_2+".";
	}
	else if(subs=="festival holidays")
	{
	    var d_1=document.getElementById('d_1').value;
		var d_2=document.getElementById('d_2').value;
		var m_1=document.getElementById('m_1').value;
	  mymsg =" "+m_1+" holidays  begins from "+d_1+" to "+d_2+".";
	}
	else if(subs=="Result Declaration")
	{
	    var d_1=document.getElementById('d_1').value;
		var d_2=document.getElementById('d_2').value;
		var m_1=document.getElementById('m_1').value;
	  mymsg =" There will be a result declaration  on  "+m_1+"  between "+d_1+" to "+d_2+".";
	}
	
	else if(subs=="Teacher meeting")
	{
	     		var m_1=document.getElementById('m_1').value;
	            var d_1=document.getElementById('d_1').value;
		        var d_2=document.getElementById('d_2').value;
  
	  mymsg ="There will be a teacher meeting on "+m_1+" from "+d_1+" to "+d_2+"";
	}
	else if(subs=="Test Paper Preparation")
	{
	  var m_1=document.getElementById('m_1').value;
	  mymsg =" You have to submit a test paper on "+m_1+".";
	}
	else if(subs=="Exam Paper")
	{
	    var m_1=document.getElementById('m_1').value;
	  mymsg ="You have to submit a exam paper on "+m_1+".";
	}
	
	else if(subs=="Information Message")
	{
	    var m_1=document.getElementById('m_1').value;
		mymsg =""+m_1+".";
	}
	
	
	
	else
	{
		mymsg="not set";
	}
	 document.getElementById('mm').textContent=mymsg;
}
</script>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>