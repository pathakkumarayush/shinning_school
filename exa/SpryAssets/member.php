<div style="width:160px; min-height:450px; position:static; float:left; margin-left:7px; margin-top:7px; border:#CCCCCC solid 1px; border-radius:5px; ">
   
     <?php require "left.php" ; ?>
     
    </div>
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
<?php

if(isset($_REQUEST["txtmsg"]))
{
    $page=1;
	$cont = $_POST['formDoor'];
	$r=sms($_SESSION["uid"],$cont,$_REQUEST["txtsub"],$_REQUEST["txtmsg"],$page,'Yes');
	/*
	foreach($cont as $contacts)
	{
	if($contacts==""){}
		else
		{
			$spcont=explode(",",$contacts);
			foreach($spcont as $cont1)
			{
				if($cont1==""){}
				else
				{
					$r=sms($_SESSION["uid"],$cont1,$_REQUEST["txtsub"],$_REQUEST["txtmsg"],'Yes');
				}
			}
		}
	
	}
	
	echo $r."<br/>";
	//$N = count($cont);
	/* for($j=0; $j < $N; $j++)
	{
		$r=sms($_SESSION["uname"],$cont[$j],$_REQUEST["txtsub"],$_REQUEST["txtmsg"],'Yes');
		echo $cont[$j];
		echo $r."<br/>";
	} */
	
}

?>
 <script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
 
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<div style="width:1000px; min-height:450px; position:static; float:right; margin-right:7px; margin-top:7px; border:#CCCCCC solid 1px; border-radius:5px;">
<form method="post" action="#" name="myform">
<table width="200px" >
<tr valign="top">
<td width="80">
<?php
if(isset($_REQUEST["class"]))
{
	?>
    <table cellpadding="0" cellspacing="0" border="0" style="border:none;">
    <tr valign="bottom"><td style="border:none;">
    <?php
	?>
    Students Of Class <b><?php echo $_REQUEST["class"].$_REQUEST['section']; ?></b><br/><br/>
 	<span class='clasec' onclick="window.location='./?pageid=member&class=<?php echo $_REQUEST["class"]; ?>'">ALL</span>
    <?php
	$sec="";
	if(!empty($_REQUEST['section']))
	{
	   $res=mysqli_query($con,"select * from student where student_class='".$_REQUEST["class"]."' and student_section='".$_REQUEST['section']."'  and student_school='".$_SESSION["schoolname"]."' and student_session='".$_SESSION['session']."'")or die(mysqli_error());
	
	}
	else
	{
	$res=mysqli_query($con,"select * from student where student_class='".$_REQUEST["class"]."' and student_school='".$_SESSION["schoolname"]."' and student_session='".$_SESSION['session']."'")or die(mysqli_error());
    }
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
    <table border="1" cellpadding="5" cellspacing="0" style=" margin-left:20px; border-radius:5px; margin-right:20px; " width="700" >
    <tr style="background-color:#6699FF; color:#000;"><td align="center">
   <input type='checkbox' value='on' id='chkall' name='allbox' onclick='checkAll();'/>
    </td><td>&nbsp;Sr.No</td><td>&nbsp;Name</td><td>&nbsp;Email</td><td>&nbsp;Contact</td></tr>
	<?php
	$i=0;
	if(!empty($_REQUEST['section']))
	{
	  $res_all=mysqli_query($con,"select * from student where student_class='".$_REQUEST["class"]."' and student_section='".$_REQUEST["section"]."' and student_school='".$_SESSION["uid"]."' and student_session='".$_SESSION['session']."'")or die(mysqli_error());
	
	}
	else
	 {
	$res_all=mysqli_query($con,"select * from student where student_class='".$_REQUEST["class"]."' and student_school='".$_SESSION["uid"]."' and student_session='".$_SESSION['session']."'")or die(mysqli_error());
	}
	while($row_all=mysqli_fetch_array($res_all))
	{
		$i++;
		?>
        <tr <?php if($i%2==0){echo "bgcolor='#E0FADC'";} ?>>
        <td align="center"><input type="checkbox" name='formDoor[]' value="<?php echo $row_all["uid"]; ?>"  id='chk<?php echo $i; ?>' /></td>
        <td>&nbsp;<?php echo $i; ?></td>
        <td>&nbsp;<?php echo $row_all["student_name"]; ?></td>
        <td>&nbsp;<?php echo $row_all["student_email"]; ?></td>
        <td>&nbsp;<?php echo $row_all["student_contactno"]; ?></td>
        </tr>
        <?php
	}
	?></table>  
    </div>  
    </td></tr>
    </table>   
    <?php
}
?>
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
      <li class="TabbedPanelsTab" tabindex="0">Wishing Messages</li>
      <li class="TabbedPanelsTab" tabindex="0">Academic Messages</li>
   </ul>
    <div class="TabbedPanelsContentGroup">
      <div class="TabbedPanelsContent">
      <?php
	  $res_saved=mysqli_query($con,"select * from msg where school='".$_SESSION['schoolname']."'")or die(mysqli_error());
	  while($row_saved=mysqli_fetch_array($res_saved))
	  {
		  ?>
          <span onclick="getSavedmsg('msg','<?php echo $row_saved["id"]; ?>');" class="mout" onmouseover="this.className='mover';" onmouseout="this.className='mout';">
          <?php echo $row_saved["sub"]; ?>
          </span>
          <?php
	  }
	  ?>
      </div>
      <div class="TabbedPanelsContent">
        <?php
	  $send_sub="";
	  $res_saved=mysqli_query($con,"select * from sendmsg where sender='".$_SESSION["schoolname"]."'")or die(mysqli_error());
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
		mymsg="<?php echo $_SESSION["uname"]; ?> will remain closed from " + d_1 + " To " + d_2 + " on account of " + m_1;
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
		mymsg = "<?php echo $_SESSION["uname"]; ?> Parents teacher meeting will be held from " + t_1 + " TO " + t_2 + " on " + d_1 + ".";
	}
	else if(subs=="child is absent")
	{
		var d_1=document.getElementById('d_1').value;
		mymsg = "Your child NAME is absent in <?php echo $_SESSION["uname"]; ?> since "+d_1+". kindly inform the school regarding reasons for the same.";
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
		mymsg = "the behavior of NAME has been found grossly in disciplined on "+d_1+". Kindly come to school with your child on "+d_2+" positively.";
	}
	else if(subs=="Invite for auditions")
	{
		var d_1=document.getElementById('d_1').value;
		var d_2=document.getElementById('d_2').value;
		var m_1=document.getElementById('m_1').value;
		mymsg = "the auditions for "+m_1+" competition in Baby's day out "+d_1+" will be held on "+d_2+". Interested contestants should give their names by DATE.";
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
		mymsg = "please ensure that your child NAME always comes to school in proper uniform.";
	}
	else if(subs=="student coming to school late")
	{
		mymsg = "your child NAME has been found coming to school late. Kindly ensure that he always comes in time.";
	}
	else if(subs=="long absent")
	{
		var d_1=document.getElementById('d_1').value;
		var d_2=document.getElementById('d_2').value;
		mymsg = "child NAME is unauthorized long absent in <?php echo $_SESSION["uname"]; ?> since "+d_1+". Kindly meet the Principal along with fine before "+d_2+",failing which his name will be struck off";
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
		mymsg = "Bhopal Academy Co-ed HR. Sec. School wishes a very happy " + m_1 + ".";
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
		mymsg = "भारी बारीश के कारण दिनांक ०८-०८-२०१२ ,बुधवार को शाळा में अवकाश रहेगा!";
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
		mymsg = "<?php echo $_SESSION["uname"]; ?>Wishing you a very happy new year.";
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
		
		mymsg ="Bhopal Academy Christmas Holidays from d_1 to d_2 For std 1 to 12 and tomorrow will be  half day.";
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