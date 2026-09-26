<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 
<script>
jQuery(function($){
  $('#from').datepicker({ dateFormat: 'yy-mm-dd' });
  $('#to').datepicker({ dateFormat: 'dd-mm-yy' });
   $('#too').datepicker({ dateFormat: 'dd-mm-yy' });
  $("#date_from_btn").click(function() { 
   $("#date_from").datepicker( "show" );
  });
  $("#date_to_btn").click(function() { 
   $("#date_to").datepicker( "show" );
  });
    });
</script>
<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}
.col_6{ width:99%; height:1150px; background-color:#FFFFFF; margin-left:9px; float:left; margin-top:10px;}
.col_4{ width:40%; height:1150px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;}
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
     background: #006633;
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
    background: #006633;
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
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<style>
    .box{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }
    
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/FEE Management/feehome.png" /><a href="./?pageid=venq">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Registration Fee Form</h2></center>
</div>
<?php
$res_stud=mysqli_query($con,"select * from student where id='".$_GET['id']."'")or die(mysqli_error());
$rowstud=mysqli_fetch_array($res_stud);
?>
<div class="col_6">
<div class="form-style-2-heading" style="font-style:normal; background-color:#006633; color:#FFFFFF;">Registration Fee</div>

    <?php
	 if(isset($_POST['submit']))
     {
	 $da = date("d-m-Y");
	 
	 if($_POST['conn']=='Yes')
	 {
	 $pamt = $_POST['fee']-$_POST['con'];
	 }else{
	 $pamt = $_POST['fee'];
	 }
	 $query=mysqli_query($con,"insert into reg_fee(rno,rcno,sname,fname,class,amt,date,session,ftype,cno,dat,bank,ne_no,ndat,sdat,sw_no,mobile,con,conn,rk,pamt)
	 values('".$_POST['rno']."','".$_POST['rcno']."','".$_POST['sname']."','".$_POST['fname']."','".$_POST['class']."','".$_POST['fee']."','".$_POST['from']."','".$_POST['ses']."','".$_POST['ftype']."','".$_POST['cno']."','".$_POST['to']."','".$_POST['bank']."','".$_POST['ne_no']."','".$_POST['too']."','".$_POST['sdat']."','".$_POST['sw_no']."','".$_POST['mobile']."','".$_POST['con']."','".$_POST['conn']."','".$_POST['rk']."','$pamt') ");
     $insertid=mysqli_insert_id();
	
	?>
<script type="text/javascript">
alert('Insert Successfully')
window.location="<?php echo $var."regfeee&rno=$insertid";  ?>";
</script>
	
	<?php
	}
	?>


<?php
if(!empty($_GET['rno']))
{
?>

<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/regreceiptr.php?id=<?php echo $_GET['rno']; ?>')">
<input type="button" value="Print Receipt" style="width:200px; margin-left:0px; margin-top:15px; background-color:#FF8500;">
</a>

<?php
}
?>
<br />
<form method="post" name="myForm" action="#" enctype="multipart/form-data" style="font-weight:bold;"  onsubmit="return(validate());">
    <table border="0" style="margin:20px 0px 0px 40px; width:750PX;">
    <tr>
	     <?php
		  $maxid=mysqli_query($con,"select max(id) from reg_fee");
		   $rowid=mysqli_fetch_array($maxid);
		   $rowid['max(id)']+1; 
		  ?>
	<td>&nbsp;&nbsp;RECEIPT NO<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="rcno" class="tb5" value="<?php echo $rowid['max(id)']+1; ?>" readonly="readonly"  required></td>
	
	
	<td>&nbsp;&nbsp;Admission No<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="rno" class="tb5" value="<?php echo $rowstud['student_scholar']; ?>" readonly="readonly" required></td>
	</tr>
	
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
	<td>&nbsp;&nbsp;STUDENT NAME<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="sname" class="tb5" value="<?php echo $rowstud['student_name']; ?>" readonly="readonly"  required></td>
	<td>&nbsp;&nbsp;CLASS<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="class" class="tb5" value="<?php echo $rowstud['student_class']; ?>" readonly="readonly"  required></td>
    </td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
    <td>&nbsp;&nbsp;FATHER'S NAME<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="fname" class="tb5" value="<?php echo $rowstud['student_fname']; ?>" readonly="readonly"  required></td>
	
	<td>&nbsp;&nbsp;MOBILE NO.<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="mobile" class="tb5" value="<?php echo $rowstud['student_contactno']; ?>" readonly="readonly"  required></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr> 
	<td>&nbsp;&nbsp;FEE AMOUNT<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="fee"  class="tb5" value="2000" required></td>
	
	<td>&nbsp;&nbsp;CONCESSION<span style="color:#FF0000">*</span></td>
    <td>
	<select name="conn" class="select" id="ddlPassport" style="width:150px;" required/>
	<option value="No">No</option>
	<option value="Yes">Yes</option>
	</select></td>
	</tr>
	
	<tr id="dvPassport" style="display: none">
	<td>&nbsp;&nbsp;AMOUNT</td>
	<td><input type="text" name="con"  class="tb5"></td>
    <td>&nbsp;&nbsp;REMARK</td>
	<td>
    <input type="text" id="txtPassportNumber" name="rk" class="tb5"/>
    </td>
	</tr>
	
	
	
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr> 
	<td>&nbsp;&nbsp;DATE<span style="color:#FF0000">*</span></td>
	
    <td>
	 <input required name="from" type="text"  readonly id="from" style=" width:200px;" class="tb5" required>
       <a href="javascript:" id="date_from_btn"></a>
	
	</td>

    <td>&nbsp;&nbsp;SESSION<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="ses"  class="tb5" value="<?php echo $_SESSION['session']; ?>" readonly="readonly"  required></td>
	</tr>
	
	
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr> 
	<td>&nbsp;&nbsp;PAYMENT TYPE<span style="color:#FF0000">*</span></td>
    <td colspan="3">
	
	    <label><input type="radio" name="ftype" value="Cash" checked="checked">Cash</label>
        <label><input type="radio" name="ftype" value="Cheque">Cheque</label>
        <label><input type="radio" name="ftype" value="Neft">Neft/Rtgs/Imps</label>
		<label><input type="radio" name="ftype" value="Swipe">Swipe</label>
	
	<div class="Cheque box"><input type="text" name="cno" placeholder='Cheque no' style="width:150px;" />
	<input type="text" name="to" id="to" placeholder='Date' style="width:150px;"/>
	<a href="javascript:" id="date_from_btn"></a>
	<select name="bank" class="select" style="width:200px;">
	<option value="">Select Bank</option>
	<?php
    $res1=mysqli_query($con,"select distinct(branch) from state");
    while($rowss=mysqli_fetch_array($res1))
    {
	?>
    <option value="<?php echo $rowss["branch"]; ?>"> <?php echo $rowss["branch"]; ?>
    </option>
    <?php
	}  
    ?>
	</select>
	</div>
    <div class="Neft box"><input type="text" name="ne_no" placeholder='Transaction Id' style="width:150px;"/><br />
	<input type="text" name="too" id="too" placeholder='Date' style="width:150px;"/>
	<a href="javascript:" id="date_from_btn"></a></div>
	<!--<div class="Swipe box"><input type="text" name="sw_no" placeholder='Transaction Id' style="width:150px;"/><br />
	<input type="text" name="sdat"  placeholder='Date' style="width:150px;"/></div>-->
	
	
	</td>
	</tr>
	
	
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
	 <td>&nbsp;&nbsp;</td> 
     <td style="font-size:16px"><input type="submit" name="submit" value="Submit Fee" style="font-size:16px"></td>
	<td>&nbsp;&nbsp;</td> 
    <td></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	</table>
	
	
	
	

	
	</form>
	<script src="js/jquery-1.8.3.min.js"></script>
   <script type="text/javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="js/DT_bootstrap.js"></script>
   <script src="js/dynamic-table.js"></script>

   <script type="text/javascript">
        $(function () {
            $("#ddlPassport").change(function () {
                if ($(this).val() == "Yes") {
                    $("#dvPassport").show();
                } else {
                    $("#dvPassport").hide();
                }
            });
        });
    </script>

</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

 
   
		
  
  