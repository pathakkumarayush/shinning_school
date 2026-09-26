<html>
<head>
</head>
<body alink="#00FF66" link="#00CC00">
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

</style>
<style>
#resultTable{
	border-bottom: 7px solid #9BAFF1;
    border-collapse: collapse;
    border-top: 7px solid #9BAFF1;
    font-family: "Lucida Sans Unicode","Lucida Grande",Sans-Serif;
    font-size: 14px;
    margin: 20px;
    text-align: center;
    width: 1100px;
}
#resultTable th{
	background: none repeat scroll 0 0 #B9C9FE;
    border-left: 1px solid #9BAFF1;
    border-right: 1px solid #9BAFF1;
    color: #003399;
    font-size: 15px;
    font-weight: bold;
    padding: 8px;
}
#resultTable td {
    background: none repeat scroll 0 0 #E8EDFF;
    border-left: 1px solid #AABCFE;
    border-right: 1px solid #AABCFE;
    color: #666699;
    padding: 8px;
}

</style>
<script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>St. Saviour  Her. Sec. School</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
<script type="text/javascript">
$(function() {
$(".delbutton").click(function(){
//Save the link in a variable called element
var element = $(this);
//Find the id of the link that was clicked
var del_id = element.attr("id");
//Built a url to send
var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete this Record?"))
{
 $.ajax({
   type: "GET",
   url: "deleted1.php",
   data: info,
   success: function(){
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
<div class="full_div">
        <br clear="all" />
        <div class="left_sect"><img src="images/Examination/exa.png" style="width:500px; height:80px;" />
		<a href="./?pageid=exam_home">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
        <img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Discipline</h2>
		<a href="./?pageid=view_co_sch" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">View Details</a>
        </div>
        <div class="col_4">
         
		<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
        <br><br>
        <div class="box-head" style="width:1121px;margin-top:-30px;"></div>				
        <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 70px; font-size:14px; width:300px">
        <tr>
        <td>Class<span class="textfieldRequiredMsg"></span></td>
        <?php
        $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
		?>
        <td><select name="class" class="select" style="width:150px" onChange="showSection(this.value)">
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
		<td>Exam</td>
		<?php
        $classexa=mysqli_query($con,"select distinct(examination_name) from examinationa");
		?>
		<td><select name="exam" class="select" style="width:150px">
        <option value="-1">Select Exam</option>
        <?php
		while($rowexa=mysqli_fetch_array($classexa))
		{
		?>
        <option value="<?php echo $rowexa['examination_name']; ?>"  ><?php echo $rowexa['examination_name']; ?></option>
        <?php
		}
		?>
        </select>
        </td>
		<!-- <td><div id="txtHint1"></div></td>-->
        <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
		</tr>
        </table>
		</form>
		<br>
        </div>
        <div class="table" style="min-height:480px; width:1087px;">
         <?php
	     if(isset($_POST['search4']))
		 {
		
		 $search=mysqli_query($con,"select * from discipline1 where class='".$_POST['class']."' and exam='".$_POST['exam']."'");
         ?>
		 <form action="" method="post">
		 <br> <br>
		 <table cellpadding="1" cellspacing="1" id="resultTable" border="1" style="margin-top:-2px;">
		 <tr style="color:#FFFFFF; background-color:#006699">
		 <th>STUDENT NAME</th><th style="width:50px;">CLASS</th>
		 <th>Term</th><th>Regularity & Punctuality</th><th>Sincerity</th><th>Behaviour & Values</th> <th>Respe. for Rules & Regu.</th><th>Attitude Towards Teach.</th>
		 <th>Att. Tow. Sch.-mates</th><th>Att. Towards Soc.</th><th>Att. Tow. Nation</th>
		 <th></th>
		 
		 </tr>
		 <?php
         $i=1;
	     while($studrow=mysqli_fetch_array($search))
		 {
		 $searchs=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' and  student_session='".$_SESSION['session']."'");
	     $studrows=mysqli_fetch_array($searchs);
		 ?>	
		 <tr style="min-height:30px; color:#000000" class="record">
		 <td><?php echo $studrows['student_name']; ?></td>
		 <td><?php echo $studrow['class']; ?></td>
		 <td><?php echo $studrow['exam']; ?></td>
		 <td><?php echo $studrow['regularity']; ?></td>
		 <td><?php echo $studrow['sincerity']; ?></td>
		 <td><?php echo $studrow['beha']; ?></td>
		 <td><?php echo $studrow['rrr']; ?></td>
		 <td><?php echo $studrow['att']; ?></td>
		 <td><?php echo $studrow['atsm']; ?></td>
		 <td><?php echo $studrow['ats']; ?></td>
		 <td><?php echo $studrow['atn']; ?></td>
		 <?php echo '<td><div align="center"><a href="#" id="'.$studrow['id'].'" class="delbutton" title="Click To Delete">Delete</a></div></td>'; ?>
		 </tr>
		 <?php 
		 $i++; 
		 }
	     ?>
	     </table>
		 </form>
		 <?php } ?>
         </div>
         </div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
	