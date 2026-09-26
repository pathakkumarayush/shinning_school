<?php
session_start();
require_once("../db.php");
$var="https://smarterponline.com/shining/exa/?pageid=";
//$var="http://localhost/shining/school/?pageid=";
require_once("mesage.php");
if(!isset($_SESSION['uid']))
{
header("Location:../index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
<script type="text/javascript" src="datetimepicker.js"></script>
 <link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%d-%m-%Y"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
	};
</script>
<style type="text/css">
span.customStyleSelectBox { font-size:14px; font-weight:bold; background-color:#f0dea4; color:#7c7c7c; padding:5px 7px; border:1px solid #e7dab0; -moz-border-radius: 5px; -webkit-border-radius: 5px;border-radius: 5px 5px; line-height: 11px; } span.customStyleSelectBox.changed { background-color: #f0dea4; } .customStyleSelectBoxInner { background:url(images/arrow.gif) no-repeat center right; }

body{
    font-family:Arial, Helvetica, sans-serif; 
    font-size:13px;
	background-color:rgba(195, 188, 188, 0.49);
}
.info, .success, .warning, .error, .validation {
    border: 0px solid;
    margin: 10px 0px;
    padding:15px 10px 15px 50px;
    background-repeat: no-repeat;
    background-position: 10px center;
}
.info {
    color: #00529B;
    background-color: #BDE5F8;
    background-image: url('info.png');
}
.success {
    color: #4F8A10;
    background-color:#FFD9FF;
    background-image:url('success.png');
}
.warning {
    color: #9F6000;
    background-color: #FEEFB3;
    background-image: url('warning.png');
	font-family:"Courier New", Courier, monospace
}
.error {
    color: #D8000C;
	background:#FFD9FF;
   background-image: url('error.png');
   border-radius:15px;
}
#notification_count {
padding: 3px 7px 3px 7px;
background: #cc0000;
color: #ffffff;
font-weight: bold;
margin-left:-10px;
border-radius: 9px;
position: absolute;
margin-top: -15px;
font-size: 13px;
}
</style>
<script type="text/javascript" src="datetimepicker.js"></script>
<script type="text/javascript">
function getXMLHTTP() 
{ //fuction to return the xml http object
		var xmlhttp=false;	
		try
		{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	
		{		
			try
			{			
				xmlhttp= new ActiveXObject('Microsoft.XMLHTTP');
			}
			catch(e)
			{
				try
				{
					xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
				}
				catch(e1)
				{
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
}


function showdata(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
     location.reload();
    }
  }
xmlhttp.open("GET","getdata.php?q="+str,true);
xmlhttp.send();
}



function showUser(stdname,std_id,str,divid)
{
if(str=="")
{
	  
  document.getElementById(divid).innerHTML="";
  return;
  }
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById(divid).innerHTML=xmlhttp.responseText;
    }
  }
var ap="";
var mySplitResult = str.split(",");
for(i = 0; i < mySplitResult.length; i++){
	//var datas=mySplitResult[i];
	if(i==0)
	{
		var sss=mySplitResult[i].split("-");
	 	ap+=sss[0]+"-"+document.getElementById(sss[1]).value;
	}
	else
	{
		var sss=mySplitResult[i].split("-");
	 	ap+="*"+sss[0]+"-"+document.getElementById(sss[1]).value;
	}
} 


xmlhttp.open("GET","findtotal.php?q="+ap+"&stdname="+stdname+"&std_id="+std_id,true);
xmlhttp.send();
}



function showdata1(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
     location.reload();
    }
  }
xmlhttp.open("GET","getdata.php?r="+str,true);
xmlhttp.send();
}

function showdata3(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    
    }
  }
   location.reload();
xmlhttp.open("GET","getdata.php?s="+str,true);
xmlhttp.send();
}

function showdata4(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    
    }
  }
   location.reload();
xmlhttp.open("GET","getdata6.php?t="+str,true);
xmlhttp.send();
}

function showSection(str)
{

if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getsection.php?q="+str,true);
xmlhttp.send();
}
function getstudent(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","showstudent.php?q="+str,true);
xmlhttp.send();
}
function showMonth(str)
{

if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getmonth.php?q="+str,true);
xmlhttp.send();
}

function showStudent(str)
{

if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    location.reload();
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","getstudent.php?id="+str,true);
xmlhttp.send();

}

function showStudent3(str)
{

if (str=="")
  {
  document.getElementById("txtHint2").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
    }
  }
 
xmlhttp.open("GET","getstudent.php?id2="+str,true);
xmlhttp.send();
}

function showStudent_21(str)
{

if (str=="")
  {
  document.getElementById("txtHint2").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }
 
xmlhttp.open("GET","getstudent_21.php?id="+str,true);
xmlhttp.send();
}





function getvehcle(str)
{

if (str=="")
  {
  document.getElementById("txtHint3").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
     document.getElementById("txtHint3").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","getvehcle.php?id="+str,true);
xmlhttp.send();
}

function getvehcle(str)
{

if (str=="")
  {
  document.getElementById("txtHint35").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
     document.getElementById("txtHint35").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","getvehcle1.php?id="+str,true);
xmlhttp.send();
}

function get_rooms(str)
{

if (str=="")
  {
  document.getElementById("room").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("room").innerHTML=xmlhttp.responseText;
	location.reload();
    }
  }
xmlhttp.open("GET","get_rooms.php?id="+str,true);
xmlhttp.send();
}
function getrooms(str)
{

if (str=="")
  {
  document.getElementById("room").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("room").innerHTML=xmlhttp.responseText;

    }
  }
xmlhttp.open("GET","showrooms.php?id="+str,true);
xmlhttp.send();
}

function showStudent12(str)
{

if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get_hostel_student.php?id="+str,true);
xmlhttp.send();
}

function showStudent14(str)
{

if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get_transport_student.php?id="+str,true);
xmlhttp.send();
}




function showtcStudent(str)
{

if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","tcstudent.php?id="+str,true);
xmlhttp.send();
}

function display(id,visib)
{

	document.getElementById(id).style.display=visib;
}
function getSavedmsg(tbl,id)
{
	
		var strURL='findsavedmsg.php?tbl='+tbl+'&id='+id;
		var req = getXMLHTTP();
		
		if (req) 
		{
			
			req.onreadystatechange = function() 
			{
				if (req.readyState == 4) 
				{
					if (req.status == 200) 
					{						
						document.getElementById('savedDiv').innerHTML=req.responseText;						
					} else 
					{
						
					}
				}				
			}			
			req.open('GET', strURL, true);
			req.send(null);
	   }	
}

function getinst(str)
{

if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getinst.php?id="+str,true);
xmlhttp.send();
}
function get_item1(str)
{

if (str=="")
  {
  document.getElementById("txtHint3").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint3").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get_item1.php?id="+str,true);
xmlhttp.send();
}

function get_item(str)
{

if (str=="")
  {
  document.getElementById("txtHint3").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint3").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get_item.php?id="+str,true);
xmlhttp.send();
}


</script>

<?php
require_once("meta.php");
?>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
	
	<div class="header_logo">
	<a href="index.php"><img src="sn.png" /></a>
	</div>
	<div class="header_menu">
	<div id="top-navigation">
				  <?php
				 
            
                  if( ($_SESSION['usertype']=="exa"))
                 {
				 $tech=mysqli_query($con,"select * from  teacher where uid='".$_SESSION['userid']."'");
				 $techrow=mysqli_fetch_array($tech);
				 
                 ?>
			    <span style="color:#116549">Welcome <strong><?php echo ucwords($techrow['teacher_name']); ?></strong></span>
				
				<span>|</span>
				<a href="<?php echo $var."profilesetting";  ?>" style="color:#116549">Change Password</a>
				<?php
				}
				else if($_SESSION['usertype']=="student")
				{
				  $student=mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."' and student_school='".$_SESSION['uid']."'");
				
				  
				  $row=mysqli_fetch_array($student);
				 echo "<b>Welcome</b> &nbsp;<b>".ucwords($row['student_name'])."</b>";
				}
				?>
				<span>|</span>
				
				<a href="logout.php?logout" style="color:#116549">Logout</a>
				<br /><br />
				
				
				
  <a href="<?php echo $var."home"; ?>" style="font-size:13px; width:100px;" >
<img src="hm.png" style=" margin-top:4px;" />
 </a>
 
 <span style="color:#116549; font-size:14px;">Session:<?php echo $_SESSION['session']; ?></span>

 
			</div>
	
	</div>
	<br clear="all" />
	</div>	
</div>
<br clear="all" /> 
<!-- End Header -->
<style type="text/css">
	body{ 
		font-family:Tahoma, Geneva, sans-serif;
		
	}
	.content{
		width:900px;
		margin:0 auto;
	}
	#searchid
	{
		width:500px;
		border:solid 1px #000;
		padding:10px;
		font-size:14px;
	}
	#result
	{
		position:absolute;
		width:500px;
		padding:10px;
		display:none;
		margin-top:-1px;
		border-top:0px;
		overflow:hidden;
		border:1px #CCC solid;
		background-color: white;
	}
	.show
	{
		padding:10px; 
		border-bottom:1px #999 dashed;
		font-size:15px; 
		height:75px;
	}
	.show:hover
	{
		background:#4c66a4;
		color:#FFF;
		cursor:pointer;
	}
</style>
<style>
#col_one{width:23%;height:170px;margin-top:20px; float:left; border-bottom: 4px #FFFFFF solid;border-top: 4px #FFFFFF solid;box-shadow: 0 8px 6px -6px black;}

#col_two{width:23%;height:170px;margin-top:20px; margin-left:2%; float:left;border-bottom: 4px #FFFFFF solid;border-top: 4px #FFFFFF solid;box-shadow: 0 8px 6px -6px black;
}

@media only screen and (min-width:150px) and (max-width:700px) {
.shell {
    width:100%;
    
}
#contents{margin-left:5px; width:90%;}
#col_one{width:100%;height:200px;border:2px #FF0000 solid;margin-top:20px; float:left; background-color:#CCCCCC;border-radius:5px; margin-left:5px;}
#col_two{width:100%;height:200px;border:2px #FF0000 solid;margin-top:20px; float:left;background-color:#CCCCCC; margin-left:5px; border-radius:5px;}

#top-navigation {
    float:left;
    white-space: nowrap;
    color: #FFF;
    padding-top: 15px;
	margin-left:10px;
}
#sddm li a {
    display: block;
    margin: 0px 1px 0px 0px;
    padding: 4px 10px;
    width: 58px;
    background: none repeat scroll 0% 0% #FD0000;
    color: #FFF;
    text-align: center;
    text-decoration: none;
}
#ses{ margin-top:15px;}
}
</style>
<script type="text/javascript">
$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
	$.ajax({
	type: "POST",
	url: "search.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$("#result").html(html).show();
	}
	});
}return false;    
});

jQuery("#result").live("click",function(e){ 
	var $clicked = $(e.target);
	var $name = $clicked.find('.name').html();
	var decoded = $("<div/>").html($name).text();
	$('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
	var $clicked = $(e.target);
	if (! $clicked.hasClass("search")){
	jQuery("#result").fadeOut(); 
	}
});
$('#searchid').click(function(){
	jQuery("#result").fadeIn();
});
});
</script>
<!-- End Header -->
<?php /*?><div class="content" style="margin-top:100px; margin-bottom: -70px; ">
<input type="text" class="search" id="searchid" placeholder="Search for Student" /><br /> 
<div id="result">
</div>
</div><?php */?>
<!-- Container -->

<?php
  
	if(isset($_GET["pageid"]))
	{
		$page=$_GET["pageid"];
		include $page.".php";
	}
	else
	{
		include "home.php";
	}
?>
<!-- End Container -->

<!-- Footer -->
<div>
<?php
require_once("includes/footer.php");
?>
<!-- End Footer -->
	
</body>
</html>