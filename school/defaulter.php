<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script src="jquery.table2excel.js"></script>
<script type="text/javascript">
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: ''});
               }); 
               //download Excel
               $("#excel").click(function(){
                var file_name = $("#cls").val()+'__'+$("#exm").val()+'__'+$("#ses").val();
                  $("#tbl_exm").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Defaulter Fee List("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>
		<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
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
.button{
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
<table id="tbl_exm" width="100%" border="1" cellspacing="0" cellpadding="0">
			 <tr align="center">
		
		 <td colspan="7">
		 <span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">Shining Public Hr. Sec. School Raisen (M.P.)</span><br />
         <span align="center" style="margin-top:9px; color:#006633;font-weight:bold;">FEE DEFAULTER - Session: <?php echo $_GET['ses']; ?></span><br />
		
		
		</td>
		 
		 
	
		</tr>	
			  			  
		<tr style="font-weight:bold; color:#000000">
	    <td align="center">Sr</td>
		<td align="center">Admission No</td>
		<td>Student Name</td>
        <td align="center">Class</td>
        <td align="center">Instalment</td>  
		<td align="center">Amount</td>     
	    <td align="center">Session</td>
	    </tr>
       <?php
       session_start();
	   require_once("../db.php");
	$i=1;
	
				if(isset($_GET['class']))
	{
	//while($studrow=mysqli_fetch_array($search))
	
	  
			   $search=mysqli_query($con,"select * from student where student_session='".$_GET['ses']."' and student_class='".$_GET['class']."' and status='0'  order by student_name ASC");
				  
			   $num=mysqli_num_rows($search);
			
				
			    if($num>0)
				{
				 while($studrow=mysqli_fetch_array($search))
				 {
	              
	  $instd=mysqli_query($con,"select * from instdetail where session='".$_GET['ses']."' and month='".$_GET['month']."' and class='".$_GET['class']."'");
		$rowinst=mysqli_fetch_array($instd);
				   // $search1=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'   and student='".$studrow['student_id']."' and month='".$_POST['month1']."'");
				  $num4=0;
					$distinctmonth=mysqli_query($con,"select distinct(month) from fee_detail where student='".$studrow['student_id']."' and session='".$_GET['ses']."'");
					$num4=mysqli_num_rows($distinctmonth);
						
			//$explode2=array();
	$j=0;
			if($num4>0)
			{
			
			while($rowdistinctmonth=mysqli_fetch_array($distinctmonth))
			{
			    
				  $ex4=explode(",",$rowdistinctmonth['month']);
				 
				   if(in_array($_GET['month'], $ex4)) 
				  {
				     
                      $numchk=0; 
                     break;
				  }
		          else
				    {
					  
					  $numchk=1;
					
					}
			}	 
			}
			else
			   {
			      
				  $numchk=1;
			   }
			
			
			if(($numchk==1))
			{
				
	?>	
     <tr style="color:#000000">
     <td align="center"><?php echo $i;  ?></td>
	 <td align="center"><?php echo $studrow['student_scholar'];?></td>
     <td><?php  echo ucwords($studrow['student_name']);?></td>
	 <td align="center"><?php echo ucwords($studrow['student_class']);?></td>
	 <td align="center"><?php echo $rowinst['inst_type']; ?></td>
     <td align="center"><?php echo $rowinst['amnt'];?></td>
	 <td align="center"><?php echo ucwords($studrow['student_session']);?></td>
     
    </tr>
    <?php
    $i++;
	$num4="";
	$numchk="";
	 } 
	}
	}
	}
	
	else
	   {
	   ?>
      <td style="color:#990066"><?php echo "No Record"; ?></td>
	   <?php
	   }
	?>
	
	 <tr>
	     <td colspan="7">
	    
	   
	   
	   <button type="button" class="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel</button></td>
	   </td>
	  </tr>
	</table>