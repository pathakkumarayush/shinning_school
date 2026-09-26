
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
	border-radius:4px;
	width:150px;
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

</style>

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/FEE Management/feehome.png" />
<a href="./?pageid=total_fee">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Fee Collection By class</h2>
</div>
<div class="col_4">
<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      	<div class="box-head" style="font-size:18px">
			<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."feecollectionby_class"."&&divid=2"; ?>">Total Collection By Class</a>&nbsp;||&nbsp;
				<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."feecollectionby_class1"; ?>">Total Collection By Class</a>
			   
			</div>
         
             <?php
		    //student by scholar number
	         if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		     {
	         ?>
         
             <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
			
             <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        
		     <tr> 
		     <td>Class</td>
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
		     </tr></td>
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
		     ?>
             </form>


<div style="width:1107px; border:20px #006633 solid; height:400px; overflow:scroll;">
              <div id="dvContainer">
			 <?php       
			 if(isset($_POST['search']))
	         {	
			 ?>
			<table style="width:100%; border:1px #FFFFFF solid;" cellpadding="0" cellspacing="0" border="1"> 
			<tr style="line-height:30px; background-color: #006633; color:#FFFFFF"><th>Sr No</th><th>Class</th><th>Student</th><th>Father</th><th>Total Fee</th>
			<th>Total Pay Fee</th><th>Total Dues</th></tr>
			<?php
			$query = "SELECT student, SUM(fee_deposit) FROM fee_detail where class='".$_POST['class']."' GROUP BY student"; 
	 
            $result = mysqli_query($con,$query) or die(mysqli_error());
		     $i=1;
            while($row = mysqli_fetch_array($result)){
			?>
			<tr style="line-height:25px;"> 
			<td><center><?php  echo $i; ?></center></td>
			<td><center><?php echo $_POST['class']; ?></center></td>
			<td><center><?php 
			$search=mysqli_query($con,"select * from student where student_id = '".$row['student']."' ");
		    $studrow=mysqli_fetch_array($search);
			echo $studrow['student_name'].$studrow['student_id']; ?></center>
			</td>
			
			<td><center><?php 
			$search=mysqli_query($con,"select * from student where student_id = '".$row['student']."' ");
		    $studrow=mysqli_fetch_array($search);
			echo $studrow['student_fname']; ?></center>
			</td>
			
		    <td>
			<center><?php
			$search1=mysqli_query($con,"select * from definefee where class='".$_POST['class']."'");
		    $studrow1=mysqli_fetch_array($search1);
			echo $totalfee = $studrow1['amnt']; ?>
			</center></td>
			
			<td><center><?php echo $totalfeepay = $row['SUM(fee_deposit)']; ?></center></td>
			<td><center><?php echo $due = $totalfee - $totalfeepay;  ?></center></td>
			</tr>
			<?php  $i++; }?>
			</table>
			<?php }?>
			</div>
			<input type="button" value="Print" id="btnPrint" />
			</div>

</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  