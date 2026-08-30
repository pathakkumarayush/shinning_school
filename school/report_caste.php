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
	   <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/pds/school/clstcaste.php?ses=<?php echo $_SESSION['session'];  ?>')">     <input type="button" value="PRINT" style="width:150px; margin-left:80PX;  position:absolute"></a>
    <div id="printablediv" style="width: 100%;">
        <div class="table" style="border:#006633 30px solid; height:880px;overflow:scroll;">
         <h2 style="color:#000000;"><center>SMT. PREMA DEVI KHARYA ENGLISH SCHOOL</center></h2>
        
        <br>
         <h2 style="color:#000000;font-weight: bold;"><center>Caste Wise Strength Reports</center></h2>
         <br>
        <table id="std_Details" width="100%" border="1" cellspacing="1" cellpadding="0">
     
        <tr style="font-weight:bold" align="center">
		<td style="width:60px;">Sr No.</td>
        <td>Class </td>
		<td>Section</td>
		<td>GEN</td>
		<td>OBC</td>
		<td>SC</td>
		<td>ST</td>
		<td>MINOR.</td>
        <td>Strength</td>
		<td>Total</td>
        </tr>
         
        <tr>
		<td>01</td>
		
		
		  <?php
	    $qgn1=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='L.K.G. A' and  status='0' order by student_class Asc");
		$rowgn1=mysqli_fetch_array($qgn1);
		$gnrow1 = $rowgn1['count(student_class)'];
		
		$qobc1=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='L.K.G. A' and  status='0' order by student_class Asc");
		$rowobc1=mysqli_fetch_array($qobc1);
		$obcrow1 = $rowobc1['count(student_class)'];
		
		$qsc1=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='L.K.G. A' and  status='0' order by student_class Asc");
		$rowsc1=mysqli_fetch_array($qsc1);
		$scrow1 = $rowsc1['count(student_class)'];
		
	    $qst1=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='L.K.G. A' and  status='0' order by student_class Asc");
		$rowst1=mysqli_fetch_array($qst1);
		$strow1 = $rowst1['count(student_class)'];
		
		 $qm1=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='L.K.G. A' and  status='0' order by student_class Asc");
		$rowm1=mysqli_fetch_array($qm1);
		$mrow1 = $rowm1['count(student_class)'];
		
		
		$qgn2=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='L.K.G. B' and  status='0' order by student_class Asc");
		$rowgn2=mysqli_fetch_array($qgn2);
		$gnrow2 = $rowgn2['count(student_class)'];
		
		$qobc2=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='L.K.G. B' and  status='0' order by student_class Asc");
		$rowobc2=mysqli_fetch_array($qobc2);
		$obcrow2 = $rowobc2['count(student_class)'];
		
		$qsc2=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='L.K.G. B' and  status='0' order by student_class Asc");
		$rowsc2=mysqli_fetch_array($qsc2);
		$scrow2 = $rowsc2['count(student_class)'];

		
		 $qst2=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='L.K.G. B' and  status='0' order by student_class Asc");
		$rowst2=mysqli_fetch_array($qst2);
		$strow2 = $rowst2['count(student_class)'];
		
		
		 $qm2=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='L.K.G. B' and  status='0' order by student_class Asc");
		$rowm2=mysqli_fetch_array($qm2);
		$mrow2 = $rowm2['count(student_class)'];
		
		$tm2 = $gnrow2+$obcrow2+$scrow2+$strow2+$mrow2;
		?>
		
		
		<td align="center">L.K.G.</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $gnrow1; ?></td>
        <td align="center"><?php  echo $obcrow1; ?></td>
		<td align="center"><?php  echo $scrow1; ?></td>
        <td align="center"><?php  echo $strow1; ?></td>
		<td align="center"><?php  echo $mrow1; ?></td>
      
		<td align="center"><?php  echo $tm1 = $gnrow1+$obcrow1+$scrow1+$strow1+$mrow1;?></td>
		
		<td align="center" rowspan="3"><?php $tm_lkg = $tm1+$tm2;  echo $tm_lkg; ?></td>
		</tr>
		
		<tr>
		<td>02</td>
		<td align="center">L.K.G.</td>
		<td align="center">B</td>
        <td align="center"><?php   echo $gnrow2; ?></td>
        <td align="center"><?php  echo $obcrow2; ?></td>
		<td align="center"><?php  echo $scrow2; ?></td>
        <td align="center"><?php  echo $strow2; ?></td>
		<td align="center"><?php  echo $mrow2; ?></td>
		<td align="center"><?php  echo $tm2 ;?></td>
		</tr>
		
		<tr style="color:#FF0000">
		<td>Total </td>
		<td align="center"></td>
		<td align="center"></td>
        <td align="center"><?php   $tmgn1 = $gnrow1+$gnrow2; echo $tmgn1; ?></td>
        <td align="center"><?php   $tmobc1 = $obcrow1+$obcrow2; echo $tmobc1;?></td>
		<td align="center"><?php   $tmsc1 = $scrow1+$scrow2; echo $tmsc1;?></td>
		<td align="center"><?php   $tmst1 = $strow1+$strow2; echo $tmst1;?></td>
		<td align="center"><?php   $tmm1 = $mrow1+$mrow2; echo $tmm1;?></td>
		<td align="center"><?php   $all_lkg = $tmgn1+$tmobc1+$tmsc1+$tmst1+$tmm1; echo $all_lkg; ?></td>
		</tr>
	      
		
		   
        <tr>
		<td>03</td>
		
		
		  <?php
	    $qgn3=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='U.K.G. A' and  status='0' order by student_class Asc");
		$rowgn3=mysqli_fetch_array($qgn3);
		$gnrow3 = $rowgn3['count(student_class)'];
		
		$qobc3=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='U.K.G. A' and  status='0' order by student_class Asc");
		$rowobc3=mysqli_fetch_array($qobc3);
		$obcrow3 = $rowobc3['count(student_class)'];
		
		$qsc3=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='U.K.G. A' and  status='0' order by student_class Asc");
		$rowsc3=mysqli_fetch_array($qsc3);
		$scrow3 = $rowsc3['count(student_class)'];
		
	    $qst3=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='U.K.G. A' and  status='0' order by student_class Asc");
		$rowst3=mysqli_fetch_array($qst3);
		$strow3 = $rowst3['count(student_class)'];
		
		 $qm3=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='U.K.G. A' and  status='0' order by student_class Asc");
		$rowm3=mysqli_fetch_array($qm3);
		$mrow3 = $rowm3['count(student_class)'];
		
		
		$qgn4=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='U.K.G. B' and  status='0' order by student_class Asc");
		$rowgn4=mysqli_fetch_array($qgn4);
		$gnrow4 = $rowgn4['count(student_class)'];
		
		$qobc4=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='U.K.G. B' and  status='0' order by student_class Asc");
		$rowobc4=mysqli_fetch_array($qobc4);
		$obcrow4 = $rowobc4['count(student_class)'];
		
		$qsc4=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='U.K.G.. B' and  status='0' order by student_class Asc");
		$rowsc4=mysqli_fetch_array($qsc4);
		$scrow4 = $rowsc4['count(student_class)'];

		
		 $qst4=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='U.K.G. B' and  status='0' order by student_class Asc");
		$rowst4=mysqli_fetch_array($qst4);
		$strow4 = $rowst4['count(student_class)'];
		
		
		 $qm4=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='U.K.G. B' and  status='0' order by student_class Asc");
		$rowm4=mysqli_fetch_array($qm4);
		$mrow4 = $rowm4['count(student_class)'];
		
		$tm4 = $gnrow4+$obcrow4+$scrow4+$strow4+$mrow4;
		?>
		
		
		<td align="center">U.K.G.</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $gnrow3; ?></td>
        <td align="center"><?php  echo $obcrow3; ?></td>
		<td align="center"><?php  echo $scrow3; ?></td>
        <td align="center"><?php  echo $strow3; ?></td>
		<td align="center"><?php  echo $mrow3; ?></td>
      
		<td align="center"><?php  echo $tm3 = $gnrow3+$obcrow3+$scrow3+$strow3+$mrow3;?></td>
		
		<td align="center" rowspan="3"><?php $tm_ukg = $tm3+$tm4;  echo $tm_ukg; ?></td>
		</tr>
		
		<tr>
		<td>04</td>
		<td align="center">U.K.G.</td>
		<td align="center">B</td>
        <td align="center"><?php   echo $gnrow4; ?></td>
        <td align="center"><?php  echo $obcrow4; ?></td>
		<td align="center"><?php  echo $scrow4; ?></td>
        <td align="center"><?php  echo $strow4; ?></td>
		<td align="center"><?php  echo $mrow4; ?></td>
		<td align="center"><?php  echo $tm4 ;?></td>
		</tr>
		
		<tr style="color:#FF0000">
		<td>Total </td>
		<td align="center"></td>
		<td align="center"></td>
        <td align="center"><?php   $tmgn3 = $gnrow3+$gnrow4; echo $tmgn3; ?></td>
        <td align="center"><?php   $tmobc3 = $obcrow3+$obcrow4; echo $tmobc3;?></td>
		<td align="center"><?php   $tmsc3 = $scrow3+$scrow4; echo $tmsc3;?></td>
		<td align="center"><?php   $tmst3 = $strow3+$strow4; echo $tmst3;?></td>
		<td align="center"><?php   $tmm3 = $mrow3+$mrow4; echo $tmm3;?></td>
		<td align="center"><?php   $all_ukg = $tmgn3+$tmobc3+$tmsc3+$tmst3+$tmm3; echo $all_ukg; ?></td>
		</tr>
	      
	      
		
	   
	         
        <tr>
		<td>05</td>
		
		  <?php
	    $qgn5=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='I A' and  status='0' order by student_class Asc");
		$rowgn5=mysqli_fetch_array($qgn5);
		$gnrow5 = $rowgn5['count(student_class)'];
		
		$qobc5=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='I A' and  status='0' order by student_class Asc");
		$rowobc5=mysqli_fetch_array($qobc5);
		$obcrow5 = $rowobc5['count(student_class)'];
		
		$qsc5=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='I A' and  status='0' order by student_class Asc");
		$rowsc5=mysqli_fetch_array($qsc5);
		$scrow5 = $rowsc5['count(student_class)'];
		
	    $qst5=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='I A' and  status='0' order by student_class Asc");
		$rowst5=mysqli_fetch_array($qst5);
		$strow5 = $rowst5['count(student_class)'];
		
		 $qm5=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='I A' and  status='0' order by student_class Asc");
		$rowm5=mysqli_fetch_array($qm5);
		$mrow5 = $rowm5['count(student_class)'];
		
		
		$qgn6=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='I B' and  status='0' order by student_class Asc");
		$rowgn6=mysqli_fetch_array($qgn6);
		$gnrow6 = $rowgn6['count(student_class)'];
		
		$qobc6=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='I B' and  status='0' order by student_class Asc");
		$rowobc6=mysqli_fetch_array($qobc6);
		$obcrow6 = $rowobc6['count(student_class)'];
		
		$qsc6=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='I B' and  status='0' order by student_class Asc");
		$rowsc6=mysqli_fetch_array($qsc6);
		$scrow6 = $rowsc6['count(student_class)'];

		
		 $qst6=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='I B' and  status='0' order by student_class Asc");
		$rowst6=mysqli_fetch_array($qst6);
		$strow6 = $rowst6['count(student_class)'];
		
		
		 $qm6=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='I B' and  status='0' order by student_class Asc");
		$rowm6=mysqli_fetch_array($qm6);
		$mrow6 = $rowm6['count(student_class)'];
		
		$tm6 = $gnrow6+$obcrow6+$scrow6+$strow6+$mrow6;
		?>
		
		
		<td align="center">I</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $gnrow5; ?></td>
        <td align="center"><?php  echo $obcrow5; ?></td>
		<td align="center"><?php  echo $scrow5; ?></td>
        <td align="center"><?php  echo $strow5; ?></td>
		<td align="center"><?php  echo $mrow5; ?></td>
      
		<td align="center"><?php  echo $tm5 = $gnrow5+$obcrow5+$scrow5+$strow5+$mrow5;?></td>
		
		<td align="center" rowspan="3"><?php $tm_I = $tm5+$tm6;  echo $tm_I; ?></td>
		</tr>
		
		<tr>
		<td>06</td>
		<td align="center">I</td>
		<td align="center">B</td>
        <td align="center"><?php   echo $gnrow6; ?></td>
        <td align="center"><?php  echo $obcrow6; ?></td>
		<td align="center"><?php  echo $scrow6; ?></td>
        <td align="center"><?php  echo $strow6; ?></td>
		<td align="center"><?php  echo $mrow6; ?></td>
		<td align="center"><?php  echo $tm6 ;?></td>
		</tr>
		
		<tr style="color:#FF0000">
		<td>Total </td>
		<td align="center"></td>
		<td align="center"></td>
        <td align="center"><?php   $tmgn5 = $gnrow5+$gnrow6; echo $tmgn5; ?></td>
        <td align="center"><?php   $tmobc5 = $obcrow5+$obcrow6; echo $tmobc5;?></td>
		<td align="center"><?php   $tmsc5 = $scrow5+$scrow6; echo $tmsc5;?></td>
		<td align="center"><?php   $tmst5 = $strow5+$strow6; echo $tmst5;?></td>
		<td align="center"><?php   $tmm5 = $mrow5+$mrow6; echo $tmm5;?></td>
		<td align="center"><?php   $all_I = $tmgn5+$tmobc5+$tmsc5+$tmst5+$tmm5; echo $all_I; ?></td>
		</tr>
	      
	   
	   
	   
	      
        <tr>
		<td>07</td>
		
		
		  <?php
	    $qgn7=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='II A' and  status='0' order by student_class Asc");
		$rowgn7=mysqli_fetch_array($qgn7);
		$gnrow7 = $rowgn7['count(student_class)'];
		
		$qobc7=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='II A' and  status='0' order by student_class Asc");
		$rowobc7=mysqli_fetch_array($qobc7);
		$obcrow7 = $rowobc7['count(student_class)'];
		
		$qsc7=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='II A' and  status='0' order by student_class Asc");
		$rowsc7=mysqli_fetch_array($qsc7);
		$scrow7 = $rowsc7['count(student_class)'];
		
	    $qst7=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='II A' and  status='0' order by student_class Asc");
		$rowst7=mysqli_fetch_array($qst7);
		$strow7 = $rowst7['count(student_class)'];
		
		 $qm7=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='II A' and  status='0' order by student_class Asc");
		$rowm7=mysqli_fetch_array($qm7);
		$mrow7 = $rowm7['count(student_class)'];
		
		
		$qgn8=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='II B' and  status='0' order by student_class Asc");
		$rowgn8=mysqli_fetch_array($qgn8);
		$gnrow8 = $rowgn8['count(student_class)'];
		
		$qobc8=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='II B' and  status='0' order by student_class Asc");
		$rowobc8=mysqli_fetch_array($qobc8);
		$obcrow8 = $rowobc8['count(student_class)'];
		
		$qsc8=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='II B' and  status='0' order by student_class Asc");
		$rowsc8=mysqli_fetch_array($qsc8);
		$scrow8 = $rowsc8['count(student_class)'];

		
		 $qst8=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='II B' and  status='0' order by student_class Asc");
		$rowst8=mysqli_fetch_array($qst8);
		$strow8 = $rowst8['count(student_class)'];
		
		
		 $qm8=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='II B' and  status='0' order by student_class Asc");
		$rowm8=mysqli_fetch_array($qm8);
		$mrow8 = $rowm8['count(student_class)'];
		
		$tm8 = $gnrow8+$obcrow8+$scrow8+$strow8+$mrow8;
		?>
		
		
		<td align="center">II</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $gnrow7; ?></td>
        <td align="center"><?php  echo $obcrow7; ?></td>
		<td align="center"><?php  echo $scrow7; ?></td>
        <td align="center"><?php  echo $strow7; ?></td>
		<td align="center"><?php  echo $mrow7; ?></td>
      
		<td align="center"><?php  echo $tm7 = $gnrow7+$obcrow7+$scrow7+$strow7+$mrow7;?></td>
		
		<td align="center" rowspan="3"><?php $tm_II = $tm7+$tm8;  echo $tm_II; ?></td>
		</tr>
		
		<tr>
		<td>08</td>
		<td align="center">II</td>
		<td align="center">B</td>
        <td align="center"><?php  echo $gnrow8; ?></td>
        <td align="center"><?php  echo $obcrow8; ?></td>
		<td align="center"><?php  echo $scrow8; ?></td>
        <td align="center"><?php  echo $strow8; ?></td>
		<td align="center"><?php  echo $mrow8; ?></td>
		<td align="center"><?php  echo $tm8 ;?></td>
		</tr>
		
		<tr style="color:#FF0000">
		<td>Total </td>
		<td align="center"></td>
		<td align="center"></td>
        <td align="center"><?php  $tmgn7 = $gnrow7+$gnrow8; echo $tmgn7; ?></td>
        <td align="center"><?php  $tmobc7 = $obcrow7+$obcrow8; echo $tmobc7;?></td>
		<td align="center"><?php  $tmsc7 = $scrow7+$scrow8; echo $tmsc7;?></td>
		<td align="center"><?php  $tmst7 = $strow7+$strow8; echo $tmst7;?></td>
		<td align="center"><?php  $tmm7 = $mrow7+$mrow8; echo $tmm7;?></td>
		<td align="center"><?php  $all_II= $tmgn7+$tmobc7+$tmsc7+$tmst7+$tmm7; echo $all_II; ?></td>
		</tr>
	      
	
	  
			
	    
	      
        <tr>
		<td>09</td>
		
		
		  <?php
	    $qgn9=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='III A' and  status='0' order by student_class Asc");
		$rowgn9=mysqli_fetch_array($qgn9);
		$gnrow9 = $rowgn9['count(student_class)'];
		
		$qobc9=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='III A' and  status='0' order by student_class Asc");
		$rowobc9=mysqli_fetch_array($qobc9);
		$obcrow9 = $rowobc9['count(student_class)'];
		
		$qsc9=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='III A' and  status='0' order by student_class Asc");
		$rowsc9=mysqli_fetch_array($qsc9);
		$scrow9 = $rowsc9['count(student_class)'];
		
	    $qst9=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='III A' and  status='0' order by student_class Asc");
		$rowst9=mysqli_fetch_array($qst9);
		$strow9 = $rowst9['count(student_class)'];
		
		 $qm9=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='III A' and  status='0' order by student_class Asc");
		$rowm9=mysqli_fetch_array($qm9);
		$mrow9 = $rowm9['count(student_class)'];
		
		
		 $qgn10=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='III B' and  status='0' order by student_class Asc");
		$rowgn10=mysqli_fetch_array($qgn10);
		$gnrow10 = $rowgn10['count(student_class)'];
		
		$qobc10=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='III B' and  status='0' order by student_class Asc");
		$rowobc10=mysqli_fetch_array($qobc10);
		$obcrow10 = $rowobc10['count(student_class)'];
		
		$qsc10=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='III B' and  status='0' order by student_class Asc");
		$rowsc10=mysqli_fetch_array($qsc10);
		$scrow10 = $rowsc10['count(student_class)'];
		
	    $qst10=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='III B' and  status='0' order by student_class Asc");
		$rowst10=mysqli_fetch_array($qst10);
		$strow10 = $rowst10['count(student_class)'];
		
		 $qm10=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='III B' and  status='0' order by student_class Asc");
		$rowm10=mysqli_fetch_array($qm10);
		$mrow10 = $rowm10['count(student_class)'];
		
		$tm10 = $gnrow10+$obcrow10+$scrow10+$strow10+$mrow10;
		
		
		$qgn11=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='III C' and  status='0' order by student_class Asc");
		$rowgn11=mysqli_fetch_array($qgn11);
		$gnrow11 = $rowgn11['count(student_class)'];
		
		$qobc11=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='III C' and  status='0' order by student_class Asc");
		$rowobc11=mysqli_fetch_array($qobc11);
		$obcrow11 = $rowobc11['count(student_class)'];
		
		$qsc11=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='III C' and  status='0' order by student_class Asc");
		$rowsc11=mysqli_fetch_array($qsc11);
		$scrow11 = $rowsc11['count(student_class)'];

		
		 $qst11=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='III C' and  status='0' order by student_class Asc");
		$rowst11=mysqli_fetch_array($qst11);
		$strow11 = $rowst11['count(student_class)'];
		
		
		 $qm11=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='III C' and  status='0' order by student_class Asc");
		$rowm11=mysqli_fetch_array($qm11);
		$mrow11 = $rowm11['count(student_class)'];
		
		$tm11 = $gnrow11+$obcrow11+$scrow11+$strow11+$mrow11;
		?>
		
		
		<td align="center">III</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $gnrow9; ?></td>
        <td align="center"><?php  echo $obcrow9; ?></td>
		<td align="center"><?php  echo $scrow9; ?></td>
        <td align="center"><?php  echo $strow9; ?></td>
		<td align="center"><?php  echo $mrow9; ?></td>
      
		<td align="center"><?php  echo $tm9 = $gnrow9+$obcrow9+$scrow9+$strow9+$mrow9;?></td>
		
		<td align="center" rowspan="3"><?php $tm_III = $tm9+$tm10+$tm11;  echo $tm_III; ?></td>
		</tr>
		
		<tr>
		<td>10</td>
		<td align="center">III</td>
		<td align="center">B</td>
        <td align="center"><?php  echo $gnrow10; ?></td>
        <td align="center"><?php  echo $obcrow10; ?></td>
		<td align="center"><?php  echo $scrow10; ?></td>
        <td align="center"><?php  echo $strow10; ?></td>
		<td align="center"><?php  echo $mrow10; ?></td>
		<td align="center"><?php  echo $tm10 ;?></td>
		</tr>
		
		<tr>
		<td>11</td>
		<td align="center">III</td>
		<td align="center">C</td>
        <td align="center"><?php  echo $gnrow11; ?></td>
        <td align="center"><?php  echo $obcrow11; ?></td>
		<td align="center"><?php  echo $scrow11; ?></td>
        <td align="center"><?php  echo $strow11; ?></td>
		<td align="center"><?php  echo $mrow11; ?></td>
		<td align="center"><?php  echo $tm11 ;?></td>
		</tr>
		
		<tr style="color:#FF0000">
		<td>Total </td>
		<td align="center"></td>
		<td align="center"></td>
        <td align="center"><?php  $tmgn9 = $gnrow9+$gnrow10+$gnrow11; echo $tmgn9; ?></td>
        <td align="center"><?php  $tmobc9 = $obcrow9+$obcrow10+$obcrow11; echo $tmobc9;?></td>
		<td align="center"><?php  $tmsc9 = $scrow9+$scrow10+$scrow11; echo $tmsc9;?></td>
		<td align="center"><?php  $tmst9 = $strow9+$strow10+$strow11; echo $tmst9;?></td>
		<td align="center"><?php  $tmm9 =  $mrow9+$mrow10+$mrow11; echo $tmm9;?></td>
		<td align="center"><?php  $all_III= $tmgn9+$tmobc9+$tmsc9+$tmst9+$tmm9; echo $all_III; ?></td>
		</tr>
	 
		
		    
			
			
			

		<tr>
		<td>12</td>
		  <?php
	    $qgn12=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='IV A' and  status='0' order by student_class Asc");
		$rowgn12=mysqli_fetch_array($qgn12);
		$gnrow12 = $rowgn12['count(student_class)'];
		
		$qobc12=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='IV A' and  status='0' order by student_class Asc");
		$rowobc12=mysqli_fetch_array($qobc12);
		$obcrow12 = $rowobc12['count(student_class)'];
		
		$qsc12=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='IV A' and  status='0' order by student_class Asc");
		$rowsc12=mysqli_fetch_array($qsc12);
		$scrow12 = $rowsc12['count(student_class)'];
		
	    $qst12=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='IV A' and  status='0' order by student_class Asc");
		$rowst12=mysqli_fetch_array($qst12);
		$strow12 = $rowst12['count(student_class)'];
		
		 $qm12=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='IV A' and  status='0' order by student_class Asc");
		$rowm12=mysqli_fetch_array($qm12);
		$mrow12 = $rowm12['count(student_class)'];
		
		
		$qgn13=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='IV B' and  status='0' order by student_class Asc");
		$rowgn13=mysqli_fetch_array($qgn13);
		$gnrow13 = $rowgn13['count(student_class)'];
		
		$qobc13=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='IV B' and  status='0' order by student_class Asc");
		$rowobc13=mysqli_fetch_array($qobc13);
		$obcrow13 = $rowobc13['count(student_class)'];
		
		$qsc13=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='IV B' and  status='0' order by student_class Asc");
		$rowsc13=mysqli_fetch_array($qsc13);
		$scrow13 = $rowsc13['count(student_class)'];

		
		 $qst13=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='IV B' and  status='0' order by student_class Asc");
		$rowst13=mysqli_fetch_array($qst13);
		$strow13 = $rowst13['count(student_class)'];
		
		
		 $qm13=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='IV B' and  status='0' order by student_class Asc");
		$rowm13=mysqli_fetch_array($qm13);
		$mrow13 = $rowm13['count(student_class)'];
		
		$tm13 = $gnrow13+$obcrow13+$scrow13+$strow13+$mrow13;
		?>
		
		
		<td align="center">IV</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $gnrow12; ?></td>
        <td align="center"><?php  echo $obcrow12; ?></td>
		<td align="center"><?php  echo $scrow12; ?></td>
        <td align="center"><?php  echo $strow12; ?></td>
		<td align="center"><?php  echo $mrow12; ?></td>
      
		<td align="center"><?php  echo $tm12 = $gnrow12+$obcrow12+$scrow12+$strow12+$mrow12;?></td>
		
		<td align="center" rowspan="3"><?php $tm_IV = $tm12+$tm13;  echo $tm_IV; ?></td>
		</tr>
		
		<tr>
		<td>13</td>
		<td align="center">IV</td>
		<td align="center">B</td>
        <td align="center"><?php  echo $gnrow13; ?></td>
        <td align="center"><?php  echo $obcrow13; ?></td>
		<td align="center"><?php  echo $scrow13; ?></td>
        <td align="center"><?php  echo $strow13; ?></td>
		<td align="center"><?php  echo $mrow13; ?></td>
		<td align="center"><?php  echo $tm13 ;?></td>
		</tr>
		
		<tr style="color:#FF0000">
		<td>Total </td>
		<td align="center"></td>
		<td align="center"></td>
        <td align="center"><?php  $tmgn12 = $gnrow12+$gnrow13; echo $tmgn12; ?></td>
        <td align="center"><?php  $tmobc12 = $obcrow12+$obcrow13; echo $tmobc12;?></td>
		<td align="center"><?php  $tmsc12 = $scrow12+$scrow13; echo $tmsc12;?></td>
		<td align="center"><?php  $tmst12 = $strow12+$strow13; echo $tmst12;?></td>
		<td align="center"><?php  $tmm12 = $mrow12+$mrow13; echo $tmm12;?></td>
		<td align="center"><?php  $all_IV= $tmgn12+$tmobc12+$tmsc12+$tmst12+$tmm12; echo $all_IV; ?></td>
		</tr>
		
		
	    <tr>
		<td>14</td>
		
		
		  <?php
	    $qgn14=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='V A' and  status='0' order by student_class Asc");
		$rowgn14=mysqli_fetch_array($qgn14);
		$gnrow14 = $rowgn14['count(student_class)'];
		
		$qobc14=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='V A' and  status='0' order by student_class Asc");
		$rowobc14=mysqli_fetch_array($qobc14);
		$obcrow14 = $rowobc14['count(student_class)'];
		
		$qsc14=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='V A' and  status='0' order by student_class Asc");
		$rowsc14=mysqli_fetch_array($qsc14);
		$scrow14 = $rowsc14['count(student_class)'];
		
	    $qst14=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='V A' and  status='0' order by student_class Asc");
		$rowst14=mysqli_fetch_array($qst14);
		$strow14 = $rowst14['count(student_class)'];
		
		 $qm14=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='V A' and  status='0' order by student_class Asc");
		$rowm14=mysqli_fetch_array($qm14);
		$mrow14 = $rowm14['count(student_class)'];
		
		
		$qgn15=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='V B' and  status='0' order by student_class Asc");
		$rowgn15=mysqli_fetch_array($qgn15);
		$gnrow15 = $rowgn15['count(student_class)'];
		
		$qobc15=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='V B' and  status='0' order by student_class Asc");
		$rowobc15=mysqli_fetch_array($qobc15);
		$obcrow15 = $rowobc15['count(student_class)'];
		
		$qsc15=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='V B' and  status='0' order by student_class Asc");
		$rowsc15=mysqli_fetch_array($qsc15);
		$scrow15 = $rowsc15['count(student_class)'];

		
		 $qst15=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='V B' and  status='0' order by student_class Asc");
		$rowst15=mysqli_fetch_array($qst15);
		$strow15 = $rowst15['count(student_class)'];
		
		
		 $qm15=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='V B' and  status='0' order by student_class Asc");
		$rowm15=mysqli_fetch_array($qm15);
		$mrow15 = $rowm15['count(student_class)'];
		
		$tm15 = $gnrow15+$obcrow15+$scrow15+$strow15+$mrow15;
		?>
		
		
		<td align="center">V</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $gnrow14; ?></td>
        <td align="center"><?php  echo $obcrow14; ?></td>
		<td align="center"><?php  echo $scrow14; ?></td>
        <td align="center"><?php  echo $strow14; ?></td>
		<td align="center"><?php  echo $mrow14; ?></td>
      
		<td align="center"><?php  echo $tm14 = $gnrow14+$obcrow14+$scrow14+$strow14+$mrow14;?></td>
		
		<td align="center" rowspan="3"><?php $tm_V = $tm14+$tm15;  echo $tm_V; ?></td>
		</tr>
		
		<tr>
		<td>15</td>
		<td align="center">V</td>
		<td align="center">B</td>
        <td align="center"><?php  echo $gnrow15; ?></td>
        <td align="center"><?php  echo $obcrow15; ?></td>
		<td align="center"><?php  echo $scrow15; ?></td>
        <td align="center"><?php  echo $strow15; ?></td>
		<td align="center"><?php  echo $mrow15; ?></td>
		<td align="center"><?php  echo $tm15 ;?></td>
		</tr>
		
		<tr style="color:#FF0000">
		<td>Total </td>
		<td align="center"></td>
		<td align="center"></td>
        <td align="center"><?php  $tmgn14 = $gnrow14+$gnrow15; echo $tmgn14; ?></td>
        <td align="center"><?php  $tmobc14 = $obcrow14+$obcrow15; echo $tmobc14;?></td>
		<td align="center"><?php  $tmsc14 = $scrow14+$scrow15; echo $tmsc14;?></td>
		<td align="center"><?php  $tmst14 = $strow14+$strow15; echo $tmst14;?></td>
		<td align="center"><?php  $tmm14 = $mrow14+$mrow15; echo $tmm14;?></td>
		<td align="center"><?php  $all_V= $tmgn14+$tmobc14+$tmsc14+$tmst14+$tmm14; echo $all_V; ?></td>
		</tr>
	    
		
		
		
		
	    <tr>
		<td>16</td>
		
		
		  <?php
	    $qgn16=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='VI A' and  status='0' order by student_class Asc");
		$rowgn16=mysqli_fetch_array($qgn16);
		$gnrow16 = $rowgn16['count(student_class)'];
		
		$qobc16=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='VI A' and  status='0' order by student_class Asc");
		$rowobc16=mysqli_fetch_array($qobc16);
		$obcrow16 = $rowobc16['count(student_class)'];
		
		$qsc16=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='VI A' and  status='0' order by student_class Asc");
		$rowsc16=mysqli_fetch_array($qsc16);
		$scrow16 = $rowsc16['count(student_class)'];
		
	    $qst16=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='VI A' and  status='0' order by student_class Asc");
		$rowst16=mysqli_fetch_array($qst16);
		$strow16 = $rowst16['count(student_class)'];
		
		 $qm16=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='VI A' and  status='0' order by student_class Asc");
		$rowm16=mysqli_fetch_array($qm16);
		$mrow16 = $rowm16['count(student_class)'];
		
		
		$qgn17=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='VI B' and  status='0' order by student_class Asc");
		$rowgn17=mysqli_fetch_array($qgn17);
		$gnrow17 = $rowgn17['count(student_class)'];
		
		$qobc17=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='VI B' and  status='0' order by student_class Asc");
		$rowobc17=mysqli_fetch_array($qobc17);
		$obcrow17 = $rowobc17['count(student_class)'];
		
		$qsc17=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='VI B' and  status='0' order by student_class Asc");
		$rowsc17=mysqli_fetch_array($qsc17);
		$scrow17 = $rowsc17['count(student_class)'];

		
		 $qst17=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='VI B' and  status='0' order by student_class Asc");
		$rowst17=mysqli_fetch_array($qst17);
		$strow17 = $rowst17['count(student_class)'];
		
		
		 $qm17=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='VI B' and  status='0' order by student_class Asc");
		$rowm17=mysqli_fetch_array($qm17);
		$mrow17 = $rowm17['count(student_class)'];
		
		$tm17 = $gnrow17+$obcrow17+$scrow17+$strow17+$mrow17;
		?>
		
		
		<td align="center">VI</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $gnrow16; ?></td>
        <td align="center"><?php  echo $obcrow16; ?></td>
		<td align="center"><?php  echo $scrow16; ?></td>
        <td align="center"><?php  echo $strow16; ?></td>
		<td align="center"><?php  echo $mrow16; ?></td>
      
		<td align="center"><?php  echo $tm16 = $gnrow16+$obcrow16+$scrow16+$strow16+$mrow16;?></td>
		
		<td align="center" rowspan="3"><?php $tm_VI = $tm16+$tm17;  echo $tm_VI; ?></td>
		</tr>
		
		<tr>
		<td>17</td>
		<td align="center">VI</td>
		<td align="center">B</td>
        <td align="center"><?php  echo $gnrow17; ?></td>
        <td align="center"><?php  echo $obcrow17; ?></td>
		<td align="center"><?php  echo $scrow17; ?></td>
        <td align="center"><?php  echo $strow17; ?></td>
		<td align="center"><?php  echo $mrow17; ?></td>
		<td align="center"><?php  echo $tm17 ;?></td>
		</tr>
		
		<tr style="color:#FF0000">
		<td>Total </td>
		<td align="center"></td>
		<td align="center"></td>
        <td align="center"><?php  $tmgn16 = $gnrow16+$gnrow17; echo $tmgn16; ?></td>
        <td align="center"><?php  $tmobc16 = $obcrow16+$obcrow17; echo $tmobc16;?></td>
		<td align="center"><?php  $tmsc16 = $scrow16+$scrow17; echo $tmsc16;?></td>
		<td align="center"><?php  $tmst16 = $strow16+$strow17; echo $tmst16;?></td>
		<td align="center"><?php  $tmm16 = $mrow16+$mrow17; echo $tmm16;?></td>
		<td align="center"><?php  $all_VI= $tmgn16+$tmobc16+$tmsc16+$tmst16+$tmm16; echo $all_VI; ?></td>
		</tr>


         
		 
        
	    <tr>
		<td>18</td>
		
		
		  <?php
	    $qgn18=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='VII A' and  status='0' order by student_class Asc");
		$rowgn18=mysqli_fetch_array($qgn18);
		$gnrow18 = $rowgn18['count(student_class)'];
		
		$qobc18=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='VII A' and  status='0' order by student_class Asc");
		$rowobc18=mysqli_fetch_array($qobc18);
		$obcrow18 = $rowobc18['count(student_class)'];
		
		$qsc18=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='VII A' and  status='0' order by student_class Asc");
		$rowsc18=mysqli_fetch_array($qsc18);
		$scrow18 = $rowsc18['count(student_class)'];
		
	    $qst18=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='VII A' and  status='0' order by student_class Asc");
		$rowst18=mysqli_fetch_array($qst18);
		$strow18 = $rowst18['count(student_class)'];
		
		 $qm18=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='VII A' and  status='0' order by student_class Asc");
		$rowm18=mysqli_fetch_array($qm18);
		$mrow18 = $rowm18['count(student_class)'];
		
		
		$qgn19=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='VII B' and  status='0' order by student_class Asc");
		$rowgn19=mysqli_fetch_array($qgn19);
		$gnrow19 = $rowgn19['count(student_class)'];
		
		$qobc19=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='VII B' and  status='0' order by student_class Asc");
		$rowobc19=mysqli_fetch_array($qobc19);
		$obcrow19 = $rowobc19['count(student_class)'];
		
		$qsc19=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='VII B' and  status='0' order by student_class Asc");
		$rowsc19=mysqli_fetch_array($qsc19);
		$scrow19 = $rowsc19['count(student_class)'];

		
		 $qst19=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='VII B' and  status='0' order by student_class Asc");
		$rowst19=mysqli_fetch_array($qst19);
		$strow19 = $rowst19['count(student_class)'];
		
		
		 $qm19=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='VII B' and  status='0' order by student_class Asc");
		$rowm19=mysqli_fetch_array($qm19);
		$mrow19 = $rowm19['count(student_class)'];
		
		$tm19 = $gnrow19+$obcrow19+$scrow19+$strow19+$mrow19;
		?>
		
		
		<td align="center">VII</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $gnrow18; ?></td>
        <td align="center"><?php  echo $obcrow18; ?></td>
		<td align="center"><?php  echo $scrow18; ?></td>
        <td align="center"><?php  echo $strow18; ?></td>
		<td align="center"><?php  echo $mrow18; ?></td>
      
		<td align="center"><?php  echo $tm18 = $gnrow18+$obcrow18+$scrow18+$strow18+$mrow18;?></td>
		
		<td align="center" rowspan="3"><?php $tm_VII = $tm18+$tm19;  echo $tm_VII; ?></td>
		</tr>
		
		<tr>
		<td>19</td>
		<td align="center">VII</td>
		<td align="center">B</td>
        <td align="center"><?php  echo $gnrow19; ?></td>
        <td align="center"><?php  echo $obcrow19; ?></td>
		<td align="center"><?php  echo $scrow19; ?></td>
        <td align="center"><?php  echo $strow19; ?></td>
		<td align="center"><?php  echo $mrow19; ?></td>
		<td align="center"><?php  echo $tm19 ;?></td>
		</tr>
		
		<tr style="color:#FF0000">
		<td>Total </td>
		<td align="center"></td>
		<td align="center"></td>
        <td align="center"><?php  $tmgn18 = $gnrow18+$gnrow19; echo $tmgn18; ?></td>
        <td align="center"><?php  $tmobc18 = $obcrow18+$obcrow19; echo $tmobc18;?></td>
		<td align="center"><?php  $tmsc18 = $scrow18+$scrow19; echo $tmsc18;?></td>
		<td align="center"><?php  $tmst18 = $strow18+$strow19; echo $tmst18;?></td>
		<td align="center"><?php  $tmm18 = $mrow18+$mrow19; echo $tmm18;?></td>
		<td align="center"><?php  $all_VII= $tmgn18+$tmobc18+$tmsc18+$tmst18+$tmm18; echo $all_VII; ?></td>
		</tr>
	
	
	   
	  	 
        
	    <tr>
		<td>20</td>
		  <?php
	    $qgn20=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='VIII A' and  status='0' order by student_class Asc");
		$rowgn20=mysqli_fetch_array($qgn20);
		$gnrow20 = $rowgn20['count(student_class)'];
		
		$qobc20=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='VIII A' and  status='0' order by student_class Asc");
		$rowobc20=mysqli_fetch_array($qobc20);
		$obcrow20 = $rowobc20['count(student_class)'];
		
		$qsc20=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='VIII A' and  status='0' order by student_class Asc");
		$rowsc20=mysqli_fetch_array($qsc20);
		$scrow20 = $rowsc20['count(student_class)'];
		
	    $qst20=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='VIII A' and  status='0' order by student_class Asc");
		$rowst20=mysqli_fetch_array($qst20);
		$strow20 = $rowst20['count(student_class)'];
		
		 $qm20=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='VIII A' and  status='0' order by student_class Asc");
		$rowm20=mysqli_fetch_array($qm20);
		$mrow20 = $rowm20['count(student_class)'];
		
		
		$qgn21=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='VIII B' and  status='0' order by student_class Asc");
		$rowgn21=mysqli_fetch_array($qgn21);
		$gnrow21 = $rowgn21['count(student_class)'];
		
		$qobc21=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='VIII B' and  status='0' order by student_class Asc");
		$rowobc21=mysqli_fetch_array($qobc21);
		$obcrow21 = $rowobc21['count(student_class)'];
		
		$qsc21=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='VIII B' and  status='0' order by student_class Asc");
		$rowsc21=mysqli_fetch_array($qsc21);
		$scrow21 = $rowsc21['count(student_class)'];

		
		 $qst21=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='VIII B' and  status='0' order by student_class Asc");
		$rowst21=mysqli_fetch_array($qst21);
		$strow21 = $rowst21['count(student_class)'];
		
		
		 $qm21=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='VIII B' and  status='0' order by student_class Asc");
		$rowm21=mysqli_fetch_array($qm21);
		$mrow21 = $rowm21['count(student_class)'];
		
		$tm21 = $gnrow21+$obcrow21+$scrow21+$strow21+$mrow21;
		?>
		
		
		<td align="center">VIII</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $gnrow20; ?></td>
        <td align="center"><?php  echo $obcrow20; ?></td>
		<td align="center"><?php  echo $scrow20; ?></td>
        <td align="center"><?php  echo $strow20; ?></td>
		<td align="center"><?php  echo $mrow20; ?></td>
      
		<td align="center"><?php  echo $tm20 = $gnrow20+$obcrow20+$scrow20+$strow20+$mrow20;?></td>
		
		<td align="center" rowspan="3"><?php $tm_VII = $tm20+$tm21;  echo $tm_VII; ?></td>
		</tr>
		
		<tr>
		<td>21</td>
		<td align="center">VIII</td>
		<td align="center">B</td>
        <td align="center"><?php  echo $gnrow21; ?></td>
        <td align="center"><?php  echo $obcrow21; ?></td>
		<td align="center"><?php  echo $scrow21; ?></td>
        <td align="center"><?php  echo $strow21; ?></td>
		<td align="center"><?php  echo $mrow21; ?></td>
		<td align="center"><?php  echo $tm21 ;?></td>
		</tr>
		
		<tr style="color:#FF0000">
		<td>Total </td>
		<td align="center"></td>
		<td align="center"></td>
        <td align="center"><?php  $tmgn20 = $gnrow20+$gnrow21; echo $tmgn20; ?></td>
        <td align="center"><?php  $tmobc20 = $obcrow20+$obcrow21; echo $tmobc20;?></td>
		<td align="center"><?php  $tmsc20 = $scrow20+$scrow21; echo $tmsc20;?></td>
		<td align="center"><?php  $tmst20 = $strow20+$strow21; echo $tmst20;?></td>
		<td align="center"><?php  $tmm20 = $mrow20+$mrow21; echo $tmm20;?></td>
		<td align="center"><?php  $all_VIII= $tmgn20+$tmobc20+$tmsc20+$tmst20+$tmm20; echo $all_VIII; ?></td>
		</tr>
	
	    	
		   
		 	 
        
	    <tr>
		<td>22</td>
		
		
		  <?php
	    $qgn22=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='IX A' and  status='0' order by student_class Asc");
		$rowgn22=mysqli_fetch_array($qgn22);
		$gnrow22 = $rowgn22['count(student_class)'];
		
		$qobc22=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='IX A' and  status='0' order by student_class Asc");
		$rowobc22=mysqli_fetch_array($qobc22);
		$obcrow22 = $rowobc22['count(student_class)'];
		
		$qsc22=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='IX A' and  status='0' order by student_class Asc");
		$rowsc22=mysqli_fetch_array($qsc22);
		$scrow22 = $rowsc22['count(student_class)'];
		
	    $qst22=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='IX A' and  status='0' order by student_class Asc");
		$rowst22=mysqli_fetch_array($qst22);
		$strow22 = $rowst22['count(student_class)'];
		
		 $qm22=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='IX A' and  status='0' order by student_class Asc");
		$rowm22=mysqli_fetch_array($qm22);
		$mrow22 = $rowm22['count(student_class)'];
		
		
		$qgn23=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='IX B' and  status='0' order by student_class Asc");
		$rowgn23=mysqli_fetch_array($qgn23);
		$gnrow23 = $rowgn23['count(student_class)'];
		
		$qobc23=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='IX B' and  status='0' order by student_class Asc");
		$rowobc23=mysqli_fetch_array($qobc23);
		$obcrow23 = $rowobc23['count(student_class)'];
		
		$qsc23=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='IX B' and  status='0' order by student_class Asc");
		$rowsc23=mysqli_fetch_array($qsc23);
		$scrow23 = $rowsc23['count(student_class)'];

		
		 $qst23=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='IX B' and  status='0' order by student_class Asc");
		$rowst23=mysqli_fetch_array($qst23);
		$strow23 = $rowst23['count(student_class)'];
		
		
		 $qm23=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='IX B' and  status='0' order by student_class Asc");
		$rowm23=mysqli_fetch_array($qm23);
		$mrow23 = $rowm23['count(student_class)'];
		
		$tm23 = $gnrow23+$obcrow23+$scrow23+$strow23+$mrow23;
		?>
		
		
		<td align="center">IX</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $gnrow22; ?></td>
        <td align="center"><?php  echo $obcrow22; ?></td>
		<td align="center"><?php  echo $scrow22; ?></td>
        <td align="center"><?php  echo $strow22; ?></td>
		<td align="center"><?php  echo $mrow22; ?></td>
      
		<td align="center"><?php  echo $tm22 = $gnrow22+$obcrow22+$scrow22+$strow22+$mrow22;?></td>
		
		<td align="center" rowspan="3"><?php $tm_IX = $tm22+$tm23;  echo $tm_IX; ?></td>
		</tr>
		
		<tr>
		<td>23</td>
		<td align="center">IX</td>
		<td align="center">B</td>
        <td align="center"><?php  echo $gnrow23; ?></td>
        <td align="center"><?php  echo $obcrow23; ?></td>
		<td align="center"><?php  echo $scrow23; ?></td>
        <td align="center"><?php  echo $strow23; ?></td>
		<td align="center"><?php  echo $mrow23; ?></td>
		<td align="center"><?php  echo $tm23 ;?></td>
		</tr>
		
		<tr style="color:#FF0000">
		<td>Total </td>
		<td align="center"></td>
		<td align="center"></td>
        <td align="center"><?php  $tmgn22 = $gnrow22+$gnrow23; echo $tmgn22; ?></td>
        <td align="center"><?php  $tmobc22 = $obcrow22+$obcrow23; echo $tmobc22;?></td>
		<td align="center"><?php  $tmsc22 = $scrow22+$scrow23; echo $tmsc22;?></td>
		<td align="center"><?php  $tmst22 = $strow22+$strow23; echo $tmst22;?></td>
		<td align="center"><?php  $tmm22 = $mrow22+$mrow23; echo $tmm22;?></td>
		<td align="center"><?php  $all_IX= $tmgn22+$tmobc22+$tmsc22+$tmst22+$tmm22; echo $all_IX; ?></td>
		</tr>
	  
		   
  
         
		 
		 
	      
        <tr>
		<td>24</td>
		  <?php
	    $qgn24=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='X A' and  status='0' order by student_class Asc");
		$rowgn24=mysqli_fetch_array($qgn24);
		$gnrow24 = $rowgn24['count(student_class)'];
		
		$qobc24=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='X A' and  status='0' order by student_class Asc");
		$rowobc24=mysqli_fetch_array($qobc24);
		$obcrow24 = $rowobc24['count(student_class)'];
		
		$qsc24=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='X A' and  status='0' order by student_class Asc");
		$rowsc24=mysqli_fetch_array($qsc24);
		$scrow24 = $rowsc24['count(student_class)'];
		
	    $qst24=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='X A' and  status='0' order by student_class Asc");
		$rowst24=mysqli_fetch_array($qst24);
		$strow24 = $rowst24['count(student_class)'];
		
		 $qm24=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='X A' and  status='0' order by student_class Asc");
		$rowm24=mysqli_fetch_array($qm24);
		$mrow24 = $rowm24['count(student_class)'];
		
		
		 $qgn25=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='X B' and  status='0' order by student_class Asc");
		$rowgn25=mysqli_fetch_array($qgn25);
		$gnrow25 = $rowgn25['count(student_class)'];
		
		$qobc25=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='X B' and  status='0' order by student_class Asc");
		$rowobc25=mysqli_fetch_array($qobc25);
		$obcrow25 = $rowobc25['count(student_class)'];
		
		$qsc25=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='X B' and  status='0' order by student_class Asc");
		$rowsc25=mysqli_fetch_array($qsc25);
		$scrow25 = $rowsc25['count(student_class)'];
		
	    $qst25=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='X B' and  status='0' order by student_class Asc");
		$rowst25=mysqli_fetch_array($qst25);
		$strow25 = $rowst25['count(student_class)'];
		
		 $qm25=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='X B' and  status='0' order by student_class Asc");
		$rowm25=mysqli_fetch_array($qm25);
		$mrow25 = $rowm25['count(student_class)'];
		
		$tm25 = $gnrow25+$obcrow25+$scrow25+$strow25+$mrow25;
		
		
		$qgn26=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='X C' and  status='0' order by student_class Asc");
		$rowgn26=mysqli_fetch_array($qgn26);
		$gnrow26 = $rowgn26['count(student_class)'];
		
		$qobc26=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='X C' and  status='0' order by student_class Asc");
		$rowobc26=mysqli_fetch_array($qobc26);
		$obcrow26 = $rowobc26['count(student_class)'];
		
		$qsc26=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='X C' and  status='0' order by student_class Asc");
		$rowsc26=mysqli_fetch_array($qsc26);
		$scrow26 = $rowsc26['count(student_class)'];

		
		 $qst26=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='X C' and  status='0' order by student_class Asc");
		$rowst26=mysqli_fetch_array($qst26);
		$strow26 = $rowst26['count(student_class)'];
		
		
		 $qm26=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='X C' and  status='0' order by student_class Asc");
		$rowm26=mysqli_fetch_array($qm26);
		$mrow26 = $rowm26['count(student_class)'];
		
		$tm26 = $gnrow26+$obcrow26+$scrow26+$strow26+$mrow26;
		?>
		
		
		<td align="center">X</td>
		<td align="center">A</td>
		<td align="center"><?php  echo $gnrow24; ?></td>
        <td align="center"><?php  echo $obcrow24; ?></td>
		<td align="center"><?php  echo $scrow24; ?></td>
        <td align="center"><?php  echo $strow24; ?></td>
		<td align="center"><?php  echo $mrow24; ?></td>
      
		<td align="center"><?php  echo $tm24 = $gnrow24+$obcrow24+$scrow24+$strow24+$mrow24;?></td>
		
		<td align="center" rowspan="4"><?php $tm_X = $tm24+$tm25+$tm26;  echo $tm_X; ?></td>
		</tr>
		
		<tr>
		<td>25</td>
		<td align="center">X</td>
		<td align="center">B</td>
        <td align="center"><?php  echo $gnrow25; ?></td>
        <td align="center"><?php  echo $obcrow25; ?></td>
		<td align="center"><?php  echo $scrow25; ?></td>
        <td align="center"><?php  echo $strow25; ?></td>
		<td align="center"><?php  echo $mrow25; ?></td>
		<td align="center"><?php  echo $tm25 ;?></td>
		</tr>
		
		<tr>
		<td>26</td>
		<td align="center">X</td>
		<td align="center">C</td>
        <td align="center"><?php  echo $gnrow26; ?></td>
        <td align="center"><?php  echo $obcrow26; ?></td>
		<td align="center"><?php  echo $scrow26; ?></td>
        <td align="center"><?php  echo $strow26; ?></td>
		<td align="center"><?php  echo $mrow26; ?></td>
		<td align="center"><?php  echo $tm26 ;?></td>
		</tr>
		
		<tr style="color:#FF0000">
		<td>Total </td>
		<td align="center"></td>
		<td align="center"></td>
        <td align="center"><?php  $tmgn24 = $gnrow24+$gnrow25+$gnrow26; echo $tmgn24; ?></td>
        <td align="center"><?php  $tmobc24 = $obcrow24+$obcrow25+$obcrow26; echo $tmobc24;?></td>
		<td align="center"><?php  $tmsc24 = $scrow24+$scrow25+$scrow26; echo $tmsc24;?></td>
		<td align="center"><?php  $tmst24 = $strow24+$strow25+$strow26; echo $tmst24;?></td>
		<td align="center"><?php  $tmm24 =  $mrow24+$mrow25+$mrow26; echo $tmm24;?></td>
		<td align="center"><?php  $all_X= $tmgn24+$tmobc24+$tmsc24+$tmst24+$tmm24; echo $all_X; ?></td>
		</tr>
		 
		 
		 
	     
		 
	      
        <tr>
		<td>27</td>
		  <?php
	    $qgn27=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='XI PCM' and  status='0' order by student_class Asc");
		$rowgn27=mysqli_fetch_array($qgn27);
		$gnrow27 = $rowgn27['count(student_class)'];
		
		$qobc27=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='XI PCM' and  status='0' order by student_class Asc");
		$rowobc27=mysqli_fetch_array($qobc27);
		$obcrow27 = $rowobc27['count(student_class)'];
		
		$qsc27=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='XI PCM' and  status='0' order by student_class Asc");
		$rowsc27=mysqli_fetch_array($qsc27);
		$scrow27 = $rowsc27['count(student_class)'];
		
	    $qst27=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='XI PCM' and  status='0' order by student_class Asc");
		$rowst27=mysqli_fetch_array($qst27);
		$strow27 = $rowst27['count(student_class)'];
		
		 $qm27=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='XI PCM' and  status='0' order by student_class Asc");
		$rowm27=mysqli_fetch_array($qm27);
		$mrow27 = $rowm27['count(student_class)'];
		
		
		 $qgn28=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='XI PCB' and  status='0' order by student_class Asc");
		$rowgn28=mysqli_fetch_array($qgn28);
		$gnrow28 = $rowgn28['count(student_class)'];
		
		$qobc28=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='XI PCB' and  status='0' order by student_class Asc");
		$rowobc28=mysqli_fetch_array($qobc28);
		$obcrow28 = $rowobc28['count(student_class)'];
		
		$qsc28=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='XI PCB' and  status='0' order by student_class Asc");
		$rowsc28=mysqli_fetch_array($qsc28);
		$scrow28 = $rowsc28['count(student_class)'];
		
	    $qst28=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='XI PCB' and  status='0' order by student_class Asc");
		$rowst28=mysqli_fetch_array($qst28);
		$strow28 = $rowst28['count(student_class)'];
		
		 $qm28=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='XI PCB' and  status='0' order by student_class Asc");
		$rowm28=mysqli_fetch_array($qm28);
		$mrow28 = $rowm28['count(student_class)'];
		
		$tm28 = $gnrow28+$obcrow28+$scrow28+$strow28+$mrow28;
		
		
		$qgn29=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='XI COMM' and  status='0' order by student_class Asc");
		$rowgn29=mysqli_fetch_array($qgn29);
		$gnrow29 = $rowgn29['count(student_class)'];
		
		$qobc29=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='XI COMM' and  status='0' order by student_class Asc");
		$rowobc29=mysqli_fetch_array($qobc29);
		$obcrow29 = $rowobc29['count(student_class)'];
		
		$qsc29=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='XI COMM' and  status='0' order by student_class Asc");
		$rowsc29=mysqli_fetch_array($qsc29);
		$scrow29 = $rowsc29['count(student_class)'];

		
		 $qst29=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='XI COMM' and  status='0' order by student_class Asc");
		$rowst29=mysqli_fetch_array($qst29);
		$strow29 = $rowst29['count(student_class)'];
		
		
		 $qm29=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='XI COMM' and  status='0' order by student_class Asc");
		$rowm29=mysqli_fetch_array($qm29);
		$mrow29 = $rowm29['count(student_class)'];
		
		$tm29 = $gnrow29+$obcrow29+$scrow29+$strow29+$mrow29;
		?>
		
		
		<td align="center">XI</td>
		<td align="center">PCM</td>
		<td align="center"><?php  echo $gnrow27; ?></td>
        <td align="center"><?php  echo $obcrow27; ?></td>
		<td align="center"><?php  echo $scrow27; ?></td>
        <td align="center"><?php  echo $strow27; ?></td>
		<td align="center"><?php  echo $mrow27; ?></td>
      
		<td align="center"><?php  echo $tm27 = $gnrow27+$obcrow27+$scrow27+$strow27+$mrow27;?></td>
		
		<td align="center" rowspan="4"><?php $tm_XI = $tm27+$tm28+$tm29;  echo $tm_XI; ?></td>
		</tr>
		
		<tr>
		<td>28</td>
		<td align="center">XI</td>
		<td align="center">PCB</td>
        <td align="center"><?php  echo $gnrow28; ?></td>
        <td align="center"><?php  echo $obcrow28; ?></td>
		<td align="center"><?php  echo $scrow28; ?></td>
        <td align="center"><?php  echo $strow28; ?></td>
		<td align="center"><?php  echo $mrow28; ?></td>
		<td align="center"><?php  echo $tm28 ;?></td>
		</tr>
		
		<tr>
		<td>29</td>
		<td align="center">XI</td>
		<td align="center">COMM</td>
        <td align="center"><?php  echo $gnrow29; ?></td>
        <td align="center"><?php  echo $obcrow29; ?></td>
		<td align="center"><?php  echo $scrow29; ?></td>
        <td align="center"><?php  echo $strow29; ?></td>
		<td align="center"><?php  echo $mrow29; ?></td>
		<td align="center"><?php  echo $tm29 ;?></td>
		</tr>
		
		<tr style="color:#FF0000">
		<td>Total </td>
		<td align="center"></td>
		<td align="center"></td>
        <td align="center"><?php  $tmgn27 = $gnrow27+$gnrow28+$gnrow29; echo $tmgn27; ?></td>
        <td align="center"><?php  $tmobc27 = $obcrow27+$obcrow28+$obcrow29; echo $tmobc27;?></td>
		<td align="center"><?php  $tmsc27 = $scrow27+$scrow28+$scrow29; echo $tmsc27;?></td>
		<td align="center"><?php  $tmst27 = $strow27+$strow28+$strow29; echo $tmst27;?></td>
		<td align="center"><?php  $tmm27 =  $mrow27+$mrow28+$mrow29; echo $tmm27;?></td>
		<td align="center"><?php  $all_XI= $tmgn27+$tmobc27+$tmsc27+$tmst27+$tmm27; echo $all_XI; ?></td>
		</tr>
		 
	    
		
		    
        <tr>
		<td>30</td>
		  <?php
	    $qgn30=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='XII PCM' and  status='0' order by student_class Asc");
		$rowgn30=mysqli_fetch_array($qgn30);
		$gnrow30 = $rowgn30['count(student_class)'];
		
		$qobc30=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='XII PCM' and  status='0' order by student_class Asc");
		$rowobc30=mysqli_fetch_array($qobc30);
		$obcrow30 = $rowobc30['count(student_class)'];
		
		$qsc30=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='XII PCM' and  status='0' order by student_class Asc");
		$rowsc30=mysqli_fetch_array($qsc30);
		$scrow30 = $rowsc30['count(student_class)'];
		
	    $qst30=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='XII PCM' and  status='0' order by student_class Asc");
		$rowst30=mysqli_fetch_array($qst30);
		$strow30 = $rowst30['count(student_class)'];
		
		 $qm30=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='XII PCM' and  status='0' order by student_class Asc");
		$rowm30=mysqli_fetch_array($qm30);
		$mrow30 = $rowm30['count(student_class)'];
		
		
		 $qgn31=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='XII PCB' and  status='0' order by student_class Asc");
		$rowgn31=mysqli_fetch_array($qgn31);
		$gnrow31 = $rowgn31['count(student_class)'];
		
		$qobc31=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='XII PCB' and  status='0' order by student_class Asc");
		$rowobc31=mysqli_fetch_array($qobc31);
		$obcrow31 = $rowobc31['count(student_class)'];
		
		$qsc31=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='XII PCB' and  status='0' order by student_class Asc");
		$rowsc31=mysqli_fetch_array($qsc31);
		$scrow31 = $rowsc31['count(student_class)'];
		
	    $qst31=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='XII PCB' and  status='0' order by student_class Asc");
		$rowst31=mysqli_fetch_array($qst31);
		$strow31 = $rowst31['count(student_class)'];
		
		 $qm31=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='XII PCB' and  status='0' order by student_class Asc");
		$rowm31=mysqli_fetch_array($qm31);
		$mrow31 = $rowm31['count(student_class)'];
		
		$tm31 = $gnrow31+$obcrow31+$scrow31+$strow31+$mrow31;
		
		
		$qgn32=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='GENERAL' and student_class='XII COMM' and  status='0' order by student_class Asc");
		$rowgn32=mysqli_fetch_array($qgn32);
		$gnrow32 = $rowgn32['count(student_class)'];
		
		$qobc32=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='OBC' and student_class='XII COMM' and  status='0' order by student_class Asc");
		$rowobc32=mysqli_fetch_array($qobc32);
		$obcrow32 = $rowobc32['count(student_class)'];
		
		$qsc32=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='SC' and student_class='XII COMM' and  status='0' order by student_class Asc");
		$rowsc32=mysqli_fetch_array($qsc32);
		$scrow32 = $rowsc32['count(student_class)'];

		
		 $qst32=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='ST' and student_class='XII COMM' and  status='0' order by student_class Asc");
		$rowst32=mysqli_fetch_array($qst32);
		$strow32 = $rowst32['count(student_class)'];
		
		
		 $qm32=mysqli_query($con,"select count(student_class) from student where student_session='".$_SESSION['session']."' and caste='Minority' and student_class='XII COMM' and  status='0' order by student_class Asc");
		$rowm32=mysqli_fetch_array($qm32);
		$mrow32 = $rowm32['count(student_class)'];
		
		$tm32 = $gnrow32+$obcrow32+$scrow32+$strow32+$mrow32;
		?>
		
		
		<td align="center">XI</td>
		<td align="center">PCM</td>
		<td align="center"><?php  echo $gnrow30; ?></td>
        <td align="center"><?php  echo $obcrow30; ?></td>
		<td align="center"><?php  echo $scrow30; ?></td>
        <td align="center"><?php  echo $strow30; ?></td>
		<td align="center"><?php  echo $mrow30; ?></td>
      
		<td align="center"><?php  echo $tm30 = $gnrow30+$obcrow30+$scrow30+$strow30+$mrow30;?></td>
		
		<td align="center" rowspan="4"><?php $tm_XII = $tm30+$tm31+$tm32;  echo $tm_XII; ?></td>
		</tr>
		
		<tr>
		<td>31</td>
		<td align="center">XI</td>
		<td align="center">PCB</td>
        <td align="center"><?php  echo $gnrow31; ?></td>
        <td align="center"><?php  echo $obcrow31; ?></td>
		<td align="center"><?php  echo $scrow31; ?></td>
        <td align="center"><?php  echo $strow31; ?></td>
		<td align="center"><?php  echo $mrow31; ?></td>
		<td align="center"><?php  echo $tm31 ;?></td>
		</tr>
		
		<tr>
		<td>32</td>
		<td align="center">XI</td>
		<td align="center">COMM</td>
        <td align="center"><?php  echo $gnrow32; ?></td>
        <td align="center"><?php  echo $obcrow32; ?></td>
		<td align="center"><?php  echo $scrow32; ?></td>
        <td align="center"><?php  echo $strow32; ?></td>
		<td align="center"><?php  echo $mrow32; ?></td>
		<td align="center"><?php  echo $tm32 ;?></td>
		</tr>
		
		<tr style="color:#FF0000">
		<td>Total </td>
		<td align="center"></td>
		<td align="center"></td>
        <td align="center"><?php  $tmgn30 = $gnrow30+$gnrow31+$gnrow32; echo $tmgn30; ?></td>
        <td align="center"><?php  $tmobc30 = $obcrow30+$obcrow31+$obcrow32; echo $tmobc30;?></td>
		<td align="center"><?php  $tmsc30 = $scrow30+$scrow31+$scrow32; echo $tmsc30;?></td>
		<td align="center"><?php  $tmst30 = $strow30+$strow31+$strow32; echo $tmst30;?></td>
		<td align="center"><?php  $tmm30 =  $mrow30+$mrow31+$mrow32; echo $tmm30;?></td>
		<td align="center"><?php  $all_XII= $tmgn30+$tmobc30+$tmsc30+$tmst30+$tmm30; echo $all_XII; ?></td>
		</tr>
		
		 
		   
        
		
		
		
		
		
	
	
		

	
		
		<tr style="color:#009966; font-weight:bold;">
		<td align="center" colspan="9">Total All Strength</td>
        <td align="center"><?php $ta = $all_lkg+$all_ukg+$all_I+$all_II+$all_III+$all_IV+$all_V+$all_VI+$all_VII+$all_VIII+$all_IX+$all_X+$all_XI+$all_XII;  echo $ta; ?></td>
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
