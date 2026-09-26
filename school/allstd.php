<html>
<head>
<meta charset="UTF-8">
</head>
<body>
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
    $page=1;
	$cont = $_POST['formDoor'];
	//$cont = $_POST['formDoor'];
	foreach($cont as $cont1)
	{
	$cont1;
	$session=$_SESSION['session'];
	$r=sms($con,$_SESSION["uid"],$cont1,$_REQUEST["txtsub"],$_REQUEST["txtmsg"],'Yes',$session,$page);
	}
	?>
<script type="text/javascript">
alert("Message Sent Successfully");
</script>	
	<?php
}
?>


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
<div class="left_sect"><img src="images/short-code-sms.png" /><a href="./?pageid=sent_message">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/Sms-icon.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Send Message - All Student</h2>
</div>
<div class="col_4" style="margin-top:0px; " >	
				
		
 <form method="post" name="myform" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      
   
  <br><br>
            <div class="box-head" style="width:1127px">
						 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."allstd"."&&divid=1"; ?>">All Student</a>
						</div>
        
       
  <div id="savedDiv" style="border:#F00 0px solid; width:250px; margin-top:40px; float:right; margin-right:20px">
  Subject<br/>
  <input type="text" name="txtsub" readonly="readonly" id="suba" style="width:95%;" /><br/><br/>
  Message<br/>
  <div style="width:95%; height:100px; border:1px solid black" id="msg" >
  </div>

   </div> 
   

   

    <div style="border:#FF0000 0px solid; margin:230px -250px 0px 0px; width:250px; float:right">
    <input type="button" onClick="gets('msg'); display('sub1','none'); display('sub2','inline');" value="view Message" name="sendall" />
    <textarea name="txtmsg" style="width:95%; height:100px; border:1px solid black" id="mm" readonly="readonly"></textarea>
    <input type="submit" id="sub1" value="Send Message" name="send" disabled="disabled" /> 
    <input type="submit" id="sub2" value="Send Message" name="send" style="display:none;" /> 
  
  
    <br/>
    <br/>
   <input type="text" id="m_1" style="border: 1px solid black; height:70px; margin-left: auto; width: 250px;">
    </div> 
	   
    <input type='checkbox' value='on' id='chkall' name='allbox' onclick='checkAll();' style="margin-left:20px"/><b>Select All Student</b>
    <?php
	$sec="";
	
	   $res=mysqli_query($con,"select * from class where school='".$_SESSION["schoolname"]."'")or die(mysqli_error());
	
	
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
            <span class='clasec' onClick="getSecstud('<?php echo $_REQUEST["class"]; ?>','<?php echo $sec_temp; ?>')">Section &nbsp;<?php echo $sec_temp; ?></span>
            <?php
		}
	}
	?>
   </td></tr>
   <tr valign="top"><td style="border:none;">
   
     
    <div id="secstud">
   
	<?php
	$i=0;
	
	$res_all=mysqli_query($con,"select * from class where  school='".$_SESSION["uid"]."'")or die(mysqli_error());
	
	
	while($row_all=mysqli_fetch_array($res_all))
	{
		$i++;
		?>
		<p style="margin-left:20px; color:#CC0000"><?php echo $row_all["class"].$row_all["class_section"]; ?></p>
		
		<?php
		if(!empty($row_all['class_section']))
	{	
	
	$qry=mysqli_query($con,"select * from student where student_class='".$row_all['class']."' and student_section='".$row_all['class_section']."' and student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
	
   }
	else
	   {
	    $sec1="";
        $qry=mysqli_query($con,"select * from student where student_class='".$row_all['class']."' and  student_section='$sec1' and  student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
  
 
  }
  ?>
   <table border="0" cellpadding="5" cellspacing="0" style=" margin-left:20px; border-radius:5px; margin-right:20px; " width="700" >
   <tr style="background-color:#6699FF; line-height:25px; color:#FFFFFF ">
   <td align="center">
   </td><td>&nbsp;Student Name</td><td>&nbsp;Father Name</td><td>&nbsp;Student Contact</td>
   </tr>
   <?php
    while($row=mysqli_fetch_array($qry))
	{
	?>
		
  
        <tr <?php if($i%2==0){echo "bgcolor='#E0FADC'";} ?>>
        <td align="center"><input type="checkbox" name='formDoor[]' value="<?php echo $row["student_id"]; ?>"  id='chk<?php echo $i; ?>' /></td>
        <td style=" font-weight:bold"><?php echo  $row["student_name"]; ?></td>
        <td><?php echo  $row["student_fname"]; ?></td>
	    <td><?php echo  $row["student_contactno"]; ?></td>
		
        </tr>
	<?php
	}
	?>
		</table> 
        <?php
	
	}
	?>
         </div>
      
   
	
	   <td>

<div id="mindiv" style="width:400px; height:30px; z-index:9999; bottom:0px; right:0px; position:fixed; padding:3px;">

<div style="background-color:#990033; color:white; width:99%; padding:9px; box-shadow:0 0 10px #0073E6;">
My Messages
<img src="images/clos.png" onClick="display('savedmsg','none'); display('mindiv','none');" width="18" style="cursor:pointer; float:right; margin-right:10px;" />
<img src="images/MaximizeOver.gif" style="float:right; margin-right:5px; cursor:pointer;" onClick="display('mindiv','none'); display('savedmsg','inline');" />
</div>

</div>

<div id="savedmsg" style="width:400px; height:250px; background-color:white; border:1px solid silver; z-index:9999; bottom:0px; right:0px; position:fixed; padding:3px; display:none;">

<div style="background-color:#990033; color:white; width:97%; padding:5px;">
My Messages
<img src="images/clos.png" onClick="display('savedmsg','none'); display('mindiv','none');" width="18" style="cursor:pointer; float:right;" />
<img src="images/RestoreDownOver.gif" style="float:right; margin-right:5px; cursor:pointer;" onClick="display('mindiv','inline'); display('savedmsg','none');" />
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
	  $res_saved=mysqli_query($con,"select * from msg where school='".$_SESSION['uid']."'")or die(mysqli_error());
	  while($row_saved=mysqli_fetch_array($res_saved))
	  {
		  ?>
          <span onClick="getSavedmsg('msg','<?php echo $row_saved["id"]; ?>');" class="mout" onMouseOver="this.className='mover';" onMouseOut="this.className='mout';">
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
			  <span onClick="getSavedmsg('sendmsg','<?php echo $row_msg["id"]; ?>');" class="mout" onMouseOver="this.className='mover';" onMouseOut="this.className='mout';">
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
 
    <br/>
   
</td>          
                   </form>					
        
     
	 
			     	</div>
					</div>
			</div>
<br clear="all" />
</div>
<br clear="all" />
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
	
	else if(subs=="Information Message")
	{
	    var m_1=document.getElementById('m_1').value;
		mymsg ="This is to inform you that "+m_1+" ";
	}
	
	else if(subs=="Attendance")
	{
	mymsg = "Your ward NAME was absent today without prior notice. Please send your ward with requisition letter.";
	}
	
	else if(subs=="Wishing Message")
	{
		var m_1=document.getElementById('m_1').value;
		var m_2=document.getElementById('m_2').value;
		
		mymsg =""+m_1+" wishes a very happy "+m_2+"";
		
		
	}
	
	else if(subs=="long absent")
	{
		var d_1=document.getElementById('d_1').value;
	
		mymsg = "Your child NAME is unauthorized long absent in since " + d_1 + ". Kindly meet the Principal soon.";
		         
	}
	
	
	else if(subs=="Holiday Message")
	{
	    var m_1=document.getElementById('m_1').value;
		var d_1=document.getElementById('d_1').value;
		mymsg ="This is to inform you that the school will remain closed on " + m_1 + " on account of " + d_1 + ".";
	}
	
	
	else if(subs=="Holiday Message 1")
	{
		var t_1=document.getElementById('t_1').value;
		var t_2=document.getElementById('t_2').value;
		var d_1=document.getElementById('d_1').value;
		mymsg = "School will remain closed from " + t_1 + " To " + t_2 + " on account of " + d_1 + "";
	}
	
	
	else if(subs=="Parents teacher meeting")
	{
		var t_1=document.getElementById('t_1').value;
		var t_2=document.getElementById('t_2').value;
		mymsg = "Kindly attend the Parent-Teacher Meeting scheduled on " + t_1 + " from " + t_2 + "";
	} 
	
	
	else if(subs=="fees for the month")
	{
		var m_1=document.getElementById('m_1').value;
	    mymsg = "NAME fees for the month of "+m_1+" has not been paid yet. Kindly clear the dues to avoid higher late fine";
	}
	
	else if(subs=="fees for the month 1")
	{
		var m_1=document.getElementById('m_1').value;
		var m_2=document.getElementById('m_2').value;
		var d_1=document.getElementById('d_1').value;
		mymsg = "You are requested to pay the school fees for the "+m_1+" of "+m_2+" before, " + d_1 + ". Ignore if already paid.";
	}
	
	
	else if(subs=="Coming to school late")
	{
	mymsg = "Your child NAME has been found coming to school late. Kindly ensure that he always comes in time";
	}
	
	else if(subs=="bad behavior")
	{
		var d_1=document.getElementById('d_1').value;
		var d_2=document.getElementById('d_2').value;
		mymsg = "the behavior of NAME has been found grossly in disciplined on "+d_1+". Kindly come to school with your child on "+d_2+"";
	}
	
	else
	{
		mymsg="not set";
	}
	 document.getElementById('mm').textContent=mymsg;
}
</script>
<script src="jquery-1.8.3.min.js"></script>
<script src="jquery.limitText.js"></script>
<script type="text/javascript">
     $(document).ready(function () {
        $('#m_1').limitText();
     });
</script>
<script src="https://www.google.com/jsapi" type="text/javascript">
    </script>
    <script language="javascript" type="text/javascript">
        google.load("elements", "1", { packages: "transliteration" });
 
        function onLoad() {
            var options = {
                //Source Language
                sourceLanguage: google.elements.transliteration.LanguageCode.ENGLISH,
                // Destination language to Transliterate
                destinationLanguage: [google.elements.transliteration.LanguageCode.HINDI],
                shortcutKey: 'ctrl+g',
                transliterationEnabled: true
            };
 
            var control = new google.elements.transliteration.TransliterationControl(options);
            control.makeTransliteratable(['m_1']);
 
        }
        google.setOnLoadCallback(onLoad);
</script>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>

