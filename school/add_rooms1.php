<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Room")) { 
        return false;
    }
    
} 
</script>
<?php
   if(!empty($_GET['did']))
   {
     $upd=mysqli_query($con,"delete from add_rooms where  room_id	='".$_GET['did']."' ");
     $msg="Deleted Successfully";
   
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
<div class="left_sect"><img src="images/Hostel/Hostel.png" style="width:500px; height:100px;"/><a href="./?pageid=hostel_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/icon-hostel.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">
 <a href="./?pageid=hostel_home" style="text-decoration:none">Hostel</a> ->Hostel Details</a></h2>
 <a style="float:right; padding:7px; background-color:#006666; margin-right:10px; margin-top:8px; color:#FFFFFF; text-decoration:none; border-radius:4px;" href="<?php echo $var."add_rooms";   ?>">Add Room</a>
</div>
<div class="col_4" style="margin-top:0px;">
                


             <form action="" method="post" enctype="multipart/form-data">
  
<table cellspacing="10">
<?php
   $hostel=mysqli_query($con,"select * from add_hostel where school='".$_SESSION['uid']."'");
  
?>

<tr>
<td>Hostel Name :<label style="color:#FF0000">*</label> </td>
<td><select name="name" class="select" onchange="get_rooms(this.value)" style="width:220px;">
    <option value="-1">Select Hostel</option>
  <?php
     while($room_hostel=mysqli_fetch_array($hostel))
	 {
  ?>
   <option value="<?php echo $room_hostel['id'];  ?>" <?php if($room_hostel['id']==$_SESSION['hostelid']) { ?> selected="selected" <?php } ?>><?php echo $room_hostel['host_name'];  ?></option>
  <?php
  }
  ?>
   </select></td>
</tr>
<tr>
<td></td><td><input type="submit" name="add" value="submit"></td>
</tr>
</table>

</form>
       <?php
   $hostel=mysqli_query($con,"select * from add_hostel where school='".$_SESSION['uid']."' and id='".$_POST['name']."'");
   $r_host=mysqli_fetch_array($hostel);
?>
              <div class="box-head">
						<h2 class="left">Currently Available Room in <?php echo ucwords($r_host['host_name']);  ?></h2>
						
					</div>
         <div class="table" style="border:#FF0000 0px solid; height:400px; overflow:scroll">
          <div id="room">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr bgcolor="#fff">
    <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Sr.No</b></td>
	<td height="30" align="center "  bgcolor="#6699FF" ><b style="color:#000">Room Number</b></td>
	<td height="30" align="center "  bgcolor="#6699FF" ><b style="color:#000">Floor Number</b></td>
	<td height="30" align="center "  bgcolor="#6699FF" ><b style="color:#000">Students Per Room</b></td>
    <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Availability</b></td>
	<td align="center "  bgcolor="#6699FF" ><b style="color:#000">Rent</b></td>
	<td align="center "  bgcolor="#6699FF" ><b style="color:#000">Update</b></td>
	<td align="center "  bgcolor="#6699FF" ><b style="color:#000">Delete</b></td>
        
		<!-- <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Update</b></td> -->
</tr>
<?php $i=1;
$exa=mysqli_query($con,"select * from add_rooms where school='".$_SESSION["uid"]."' and hostel_id='".$_POST['name']."'");
while($hostel=mysqli_fetch_array($exa))
{
  ?>
		
		<tr <?php if($j%2==1) {?>  bgcolor="#E0FADC"<?php } ?>>
        <td height="30" align="center "><?php echo $i; ?></td>
		<td align="center "><?php echo $hostel["room_no"]; ?></td>
			<td align="center "><?php echo $hostel["fllor_no"]; ?></td>
        <td align="center "><?php echo $hostel["No_of_bed"]; ?></td>
		<td align="center "><?php echo $hostel["status"]; ?></td>
		<td align="center "><?php echo $hostel["rent"]; ?></td>
		<td align="center "><a href="<?php echo $var."add_rooms&id=".$hostel["room_id"];   ?>">Update</a></td>
		<td align="center "><a href="<?php echo $var."add_rooms1&did=".$hostel["room_id"];   ?>" onclick="confirmation();">Delete</a></td>
                
				 <!--<td align="center "><a style="text-decoration:none;" href="./?pageid=examination1&examinationid=<?php //echo $exa1["examination_id"]; ?>">Update</a></td>-->
        </tr>
        <?php $i=$i+1; $j=&$i;  ?>
		<?php 
		
		} ?>
        
</table>
		  </div>
           
         </div>
					
							<!-- End Box -->
			</div>
 
<br clear="all" />
</div>
<br clear="all" />
<br clear="all" />
</div>
</div>