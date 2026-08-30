<html>
<head>
<script language="javascript">
function download_report()
{
window.location='report.xls';
}
</script>
<script type="text/javascript">
        function popitup(url) 
        {
         newwindow=window.open(url,'name','height=635,width=723');
         if (window.focus) {newwindow.focus()}
         return false;
       }
</script>
<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
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
:-ms-input-placeholder 
{
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
#div1{ display:none;}
#div2{ display:none;}
.rad{
    vertical-align: middle;
}
.none{
	display: none;
}
.inline_block{
	display: inline-block;
}
</style>
</head>
<body alink="#00FF66" link="#00CC00">


<div class="full_div">
        <br clear="all" />
        <div class="left_sect"><img src="images/Student Detail/home.png" /><a href="./?pageid=rep">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
        <img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Class Wise Strength Reports</h2>
        </div>
        <div class="col_4">
        <div style="font-size:12px; font-weight:bold; color:#000; margin:10px 0px 10px 0px; border:#FF0000 0px solid;">
	  <?php /*?> <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/pds/school/clstcaste.php?ses=<?php echo $_SESSION['session'];  ?>')">     <input type="button" value="PRINT" style="width:150px; margin-left:80PX;  position:absolute"></a><?php */?>
    <div id="printablediv" style="width: 100%;">
        <div class="table" style="border:#006633 30px solid; height:880px;overflow:scroll;">
         <h2 style="color:#000000;"><center>Shining Public Hr. Sec. School Raisen (M.P.)</center></h2>
        
        <br>
         <h2 style="color:#000000;font-weight: bold;"><center>Class Wise Strength Reports</center></h2>
         <br>
        <table id="std_Details" width="100%" border="1" cellspacing="1" cellpadding="0">
     
        <tr style="font-weight:bold" align="center">
		
        <td>Class </td>
		<td>Section</td>
		<td>Total</td>
		<td>All Total</td>
		
        </tr>
         
		 
		
	    <?php
	    $nur=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='NURSERY A' and  status='0' ");
		$rownur=mysqli_fetch_array($nur);
		$tnura = $rownur['count(student_class)'];
		
	    $nurb=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='NURSERY B' and  status='0' ");
		$rownurb=mysqli_fetch_array($nurb);
		$tnurb = $rownurb['count(student_class)'];
		?>
		 <tr>
		<td align="center">NURSERY</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $tnura; ?></td>
        <td align="center" rowspan="2"><?php $tnur = $tnura+$tnurb; echo $tnur;  ?></td>
		</tr>
		
		<tr>
		<td align="center">NURSERY</td>
		<td align="center">B</td>
		<td align="center"><?php  echo $tnurb; ?></td>
      
		</tr>
		
		
		<tr>
	    <?php
	    $lkg=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='LKG A' and  status='0' ");
		$rowlkg=mysqli_fetch_array($lkg);
		$tlkg = $rowlkg['count(student_class)'];
		
		$lkg31=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='LKG B' and  status='0' ");
		$rowlkg31=mysqli_fetch_array($lkg31);
		$tlkg31 = $rowlkg31['count(student_class)'];
		?>
		<td align="center">LKG</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $tlkg; ?></td>
        <td align="center" rowspan="2"><?php $lkg = $tlkg+$tlkg31;  echo $lkg; ?></td>
		</tr>
		
		<tr>
		<td align="center">LKG</td>
		<td align="center">B</td>
		<td align="center"><?php  echo $tlkg31; ?></td>
      
		</tr>
		 
		 
        <tr>
	    <?php
	    $ukg1=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='UKG A' and  status='0' ");
		$rowukg1=mysqli_fetch_array($ukg1);
		$tukg1 = $rowukg1['count(student_class)'];
		
		$ukg2=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='UKG B' and  status='0' ");
		$rowukg2=mysqli_fetch_array($ukg2);
		$tukg2 = $rowukg2['count(student_class)'];
		?>
		<td align="center">UKG</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $tukg1; ?></td>
        <td align="center" rowspan="2"><?php $ukg = $tukg1+$tukg2;  echo $ukg; ?></td>
		</tr>
		
		<tr>
		<td align="center">UKG</td>
		<td align="center">B</td>
        <td align="center"><?php   echo $tukg2; ?></td>
        </tr>
		
		
		
	    <tr>
	    <?php
	    $q1=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='I A' and  status='0' ");
		$rowq1=mysqli_fetch_array($q1);
		$tq1 = $rowq1['count(student_class)'];
		
		$q2=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='I B' and  status='0' ");
		$rowq2=mysqli_fetch_array($q2);
		$tq2 = $rowq2['count(student_class)'];
		?>
		<td align="center">1st</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $tq1; ?></td>
        <td align="center" rowspan="2"><?php $ttq1 = $tq1+$tq2;  echo $ttq1; ?></td>
		</tr>
		
		<tr>
		<td align="center">1st</td>
		<td align="center">B</td>
        <td align="center"><?php   echo $tq2; ?></td>
        </tr>
		
		<tr>
	    <?php
	    $q3=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='II A' and  status='0' ");
		$rowq3=mysqli_fetch_array($q3);
		$tq3 = $rowq3['count(student_class)'];
		
		$q4=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='II B' and  status='0' ");
		$rowq4=mysqli_fetch_array($q4);
		$tq4 = $rowq4['count(student_class)'];
		?>
		<td align="center">2nd</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $tq3; ?></td>
        <td align="center" rowspan="2"><?php $ttq2 = $tq3+$tq4;  echo $ttq2; ?></td>
		</tr>
		
		<tr>
		<td align="center">2nd</td>
		<td align="center">B</td>
        <td align="center"><?php   echo $tq4; ?></td>
        </tr>
		
	      
		
		<tr>
	    <?php
	    $q5=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='III A' and  status='0' ");
		$rowq5=mysqli_fetch_array($q5);
		$tq5 = $rowq5['count(student_class)'];
		
		$q6=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='III B' and  status='0' ");
		$rowq6=mysqli_fetch_array($q6);
		$tq6 = $rowq6['count(student_class)'];
		?>
		<td align="center">3rd</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $tq5; ?></td>
        <td align="center" rowspan="2"><?php $ttq3 = $tq5+$tq6;  echo $ttq3; ?></td>
		</tr>
		
		<tr>
		<td align="center">3rd</td>
		<td align="center">B</td>
        <td align="center"><?php   echo $tq6; ?></td>
        </tr>
		
		
		<tr>
	    <?php
	    $q7=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='IV A' and  status='0' ");
		$rowq7=mysqli_fetch_array($q7);
		$tq7 = $rowq7['count(student_class)'];
		
		$q8=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='IV B' and  status='0' ");
		$rowq8=mysqli_fetch_array($q8);
		$tq8 = $rowq8['count(student_class)'];
		?>
		<td align="center">4th</td>
		<td align="center">A</td>
		<td align="center"><?php echo $tq7; ?></td>
        <td align="center" rowspan="2"><?php $ttq4 = $tq7+$tq8;  echo $ttq4; ?></td>
		</tr>
		
		<tr>
		<td align="center">4th</td>
		<td align="center">B</td>
        <td align="center"><?php echo $tq8; ?></td>
        </tr>
		
		
		<tr>
	    <?php
	    $q9=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='V A' and  status='0' ");
		$rowq9=mysqli_fetch_array($q9);
		$tq9 = $rowq9['count(student_class)'];
		
		$q10=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='V B' and  status='0' ");
		$rowq10=mysqli_fetch_array($q10);
		$tq10 = $rowq10['count(student_class)'];
		?>
		<td align="center">5th</td>
		<td align="center">A</td>
		<td align="center"><?php echo $tq9; ?></td>
        <td align="center" rowspan="2"><?php $ttq5 = $tq9+$tq10;  echo $ttq5; ?></td>
		</tr>
		
		<tr>
		<td align="center">5th</td>
		<td align="center">B</td>
        <td align="center"><?php echo $tq10; ?></td>
        </tr>
		
		<tr>
	    <?php
	    $q11=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='VI A' and  status='0' ");
		$rowq11=mysqli_fetch_array($q11);
		$tq11 = $rowq11['count(student_class)'];
		
		$q12=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='VI B' and  status='0' ");
		$rowq12=mysqli_fetch_array($q12);
		$tq12 = $rowq12['count(student_class)'];
		?>
		<td align="center">6th</td>
		<td align="center">A</td>
		<td align="center"><?php echo $tq11; ?></td>
        <td align="center" rowspan="2"><?php $ttq6 = $tq11+$tq12;  echo $ttq6; ?></td>
		</tr>
		
		<tr>
		<td align="center">6th</td>
		<td align="center">B</td>
        <td align="center"><?php echo $tq12; ?></td>
        </tr>
		
		<tr>
	    <?php
	    $q13=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='VII A' and  status='0' ");
		$rowq13=mysqli_fetch_array($q13);
		$tq13 = $rowq13['count(student_class)'];
		
		$q14=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='VII B' and  status='0' ");
		$rowq14=mysqli_fetch_array($q14);
		$tq14 = $rowq14['count(student_class)'];
		?>
		<td align="center">7th</td>
		<td align="center">A</td>
		<td align="center"><?php echo $tq13; ?></td>
        <td align="center" rowspan="2"><?php $ttq7 = $tq13+$tq14;  echo $ttq7; ?></td>
		</tr>
		
		<tr>
		<td align="center">7th</td>
		<td align="center">B</td>
        <td align="center"><?php echo $tq14; ?></td>
        </tr>
		
		<tr>
	    <?php
	    $q15=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='VIII A' and  status='0' ");
		$rowq15=mysqli_fetch_array($q15);
		$tq15 = $rowq15['count(student_class)'];
		
		$q16=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='VIII B' and  status='0' ");
		$rowq16=mysqli_fetch_array($q16);
		$tq16 = $rowq16['count(student_class)'];
		
		$q32=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='VIII C' and  status='0' ");
		$rowq32=mysqli_fetch_array($q32);
		$tq32 = $rowq32['count(student_class)'];
		?>
		<td align="center">8th</td>
		<td align="center">A</td>
		<td align="center"><?php echo $tq15; ?></td>
        <td align="center" rowspan="3"><?php $ttq8 = $tq15+$tq16+$tq32;  echo $ttq8; ?></td>
		</tr>
		
		<tr>
		<td align="center">8th</td>
		<td align="center">B</td>
        <td align="center"><?php echo $tq16; ?></td>
        </tr>
		
		<tr>
		<td align="center">8th</td>
		<td align="center">C</td>
        <td align="center"><?php echo $tq32; ?></td>
        </tr>
		
		
		<tr>
	    <?php
	    $q17=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='IX A' and  status='0' ");
		$rowq17=mysqli_fetch_array($q17);
		$tq17 = $rowq17['count(student_class)'];
		
		$q18=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='IX B' and  status='0' ");
		$rowq18=mysqli_fetch_array($q18);
		$tq18 = $rowq18['count(student_class)'];
		
		$q30=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='IX C' and  status='0' ");
		$rowq30=mysqli_fetch_array($q30);
		$tq30 = $rowq30['count(student_class)'];
		?>
		<td align="center">9th</td>
		<td align="center">A</td>
		<td align="center"><?php echo $tq17; ?></td>
        <td align="center" rowspan="3"><?php $ttq9 = $tq17+$tq18+$tq30;  echo $ttq9; ?></td>
		</tr>
		
		<tr>
		<td align="center">9th</td>
		<td align="center">B</td>
        <td align="center"><?php echo $tq18; ?></td>
        </tr>  
		
		<tr>
		<td align="center">9th</td>
		<td align="center">C</td>
        <td align="center"><?php echo $tq30; ?></td>
        </tr>  
		
		<tr>
	    <?php
	    $q19=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='X A' and  status='0' ");
		$rowq19=mysqli_fetch_array($q19);
		$tq19 = $rowq19['count(student_class)'];
		
		$q20=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='X B' and  status='0' ");
		$rowq20=mysqli_fetch_array($q20);
		$tq20 = $rowq20['count(student_class)'];
		
		$q21=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='X C' and  status='0' ");
		$rowq21=mysqli_fetch_array($q21);
		$tq21 = $rowq21['count(student_class)'];
		?>
		<td align="center">10th</td>
		<td align="center">A</td>
		<td align="center"><?php echo $tq19; ?></td>
        <td align="center" rowspan="3"><?php $ttq10 = $tq19+$tq20+$tq21;  echo $ttq10; ?></td>
		</tr>
		
		<tr>
		<td align="center">10th</td>
		<td align="center">B</td>
        <td align="center"><?php echo $tq20; ?></td>
        </tr> 
		
		<tr>
		<td align="center">10th</td>
		<td align="center">C</td>
        <td align="center"><?php echo $tq21; ?></td>
        </tr>   
       
	   
	   <tr>
	    <?php
	    $q22=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='XI Maths' and  status='0' ");
		$rowq22=mysqli_fetch_array($q22);
		$tq22 = $rowq22['count(student_class)'];
		
		$q23=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='XI Bio' and  status='0' ");
		$rowq23=mysqli_fetch_array($q23);
		$tq23 = $rowq23['count(student_class)'];
		
		$q24=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='XI Com.' and  status='0' ");
		$rowq24=mysqli_fetch_array($q24);
		$tq24 = $rowq24['count(student_class)'];
		?>
		<td align="center">11th</td>
		<td align="center">Maths</td>
		<td align="center"><?php echo $tq22; ?></td>
        <td align="center" rowspan="3"><?php $ttq11 = $tq22+$tq23+$tq24;  echo $ttq11; ?></td>
		</tr>
		
		<tr>
		<td align="center">11th</td>
		<td align="center">Bio</td>
        <td align="center"><?php echo $tq23; ?></td>
        </tr> 
		
		<tr>
		<td align="center">11th</td>
		<td align="center">Comm.</td>
        <td align="center"><?php echo $tq24; ?></td>
        </tr>   
	   
	   
	   <tr>
	    <?php
	    $q25=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='XII Math' and  status='0' ");
		$rowq25=mysqli_fetch_array($q25);
		$tq25 = $rowq25['count(student_class)'];
		
		$q26=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='XII Bio' and  status='0' ");
		$rowq26=mysqli_fetch_array($q26);
		$tq26 = $rowq26['count(student_class)'];
		
		$q27=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='XII Com.' and  status='0' ");
		$rowq27=mysqli_fetch_array($q27);
		$tq27 = $rowq27['count(student_class)'];
		
		$q28=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='XII Math Bio' and  status='0' ");
		$rowq28=mysqli_fetch_array($q28);
		$tq28 = $rowq28['count(student_class)'];
		
		$q29=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and student_class='XII Bio Math' and  status='0' ");
		$rowq29=mysqli_fetch_array($q29);
		$tq29 = $rowq29['count(student_class)'];
		?>
		<td align="center">12th</td>
		<td align="center">Maths</td>
		<td align="center"><?php echo $tq25; ?></td>
        <td align="center" rowspan="5"><?php $ttq12 = $tq25+$tq26+$tq27+$tq28+$tq29;  echo $ttq12; ?></td>
		</tr>
		
		<tr>
		<td align="center">12th</td>
		<td align="center">Bio</td>
        <td align="center"><?php echo $tq26; ?></td>
        </tr> 
		
		<tr>
		<td align="center">12th</td>
		<td align="center">Comm.</td>
        <td align="center"><?php echo $tq27; ?></td>
        </tr> 
		
		<tr>
		<td align="center">12th</td>
		<td align="center">Math Bio</td>
        <td align="center"><?php echo $tq28; ?></td>
        </tr>
		
		<tr>
		<td align="center">12th</td>
		<td align="center">Bio Math</td>
        <td align="center"><?php echo $tq29; ?></td>
        </tr>     
		
		<tr>
		<td align="center" colspan="3">TOTAL STR.</td>
		
		<td align="center"><?php echo $ttq12+$ttq11+$ttq10+$ttq9+$ttq8+$ttq7+$ttq6+$ttq5+$ttq4+$ttq3+$ttq2+$ttq1+$ukg+$lkg+$tnur; ?></td>
        </tr>     
	   
		
        <td colspan="16">
<!-- <a href="javascript:void(0);" onClick="javascript:download_report();" style="font-size:16px;">Download Excel Report</a> -->
<input type="button" onClick="tableToExcel('testTable', 'Student Details Report')" value="Export to Excel">
<?php
require_once("db.php");
require_once("excelwriter.class.php");
session_start();
$excel=new ExcelWriter("report.xls");
if($excel==false)   
echo $excel->error;

$myArr=array("S.No.","Admission No","Student Name","Student Father","Student Class","Mobile","Caste","Address");
$excel->writeLine($myArr);

$qry=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and caste='".$_POST['caste']."' and  status='0' order by student_class Asc");

if($qry!=false)
{
$i=1;
while($res=mysqli_fetch_array($qry))
{
$myArr=array($i,$res['student_scholar'],$res['student_name'],$res['student_fname'],$res['student_class'],$res['student_contactno'],$res['caste'],$res['student_address']);
$excel->writeLine($myArr);
$i++;
}
}
?>
   </td>
</table>


</div>
</div>
        </div>
                                 
</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
<script type="text/javascript">
    function printData()
{
   var divToPrint=document.getElementById("printablediv");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>
<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById('std_Details')
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>
