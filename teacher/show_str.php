
<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}

.col_4{ width:100%; height:900px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
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
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<?php
       $month=array("April","July","August","September","October","November","December","January","February","March");
       ?>
	   <?php
	   
				 
		    $selrc=mysqli_query($con,"select * from fee_structure where class='".$_POST['class']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
			
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);
	   ?>
		  		  
<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	color: #000000;
}
-->
</style>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/FEE Management/fee_str.png" /><a href="./?pageid=fee_str">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Show Fee Structure</h2>
</div>
<div class="col_4">


<div class="form-style-2-heading"></div>

<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
                    
     
   
         
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        <tr>
		<td>
		  <?php
		    
			    $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
			   ?>
        <select name="class" class="select" style="width:125px" >
              
			   <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class']; ?>"  <?php if($rclass['class']==$_POST['class']) { ?> selected="selected" <?php } ?>  ><?php echo $rclass['class'].$rclass['class_section']; ?></option>
            <?php
				 }
			?>
            
            </select>
			<input type="submit" name="submit" value="submit" style="width:100px">
			</td>
			
			
			</tr>
			
			
			
        </table><br>
        </div>
        
        <div class="box-head" style="background-color:#009933;">
						Fee structure For Class <?php echo $_POST['class'];  ?>
			     </div>
   
		
		<table class="table table-bordered" id="sample_1" style="font-size:12px;">
              <thead style="background-color:#009933; color:#FFFFFF">
              <tr style="background-color:#009933;color:#FFFFFF">
                  <th>No.</th>
                  <th>Month</th>
                  <th>fee Structure</th>
                  <th>Total Fee</th>
               </tr>
			 </thead>
			<tbody>
			   <?php
       $i=1;
	     
	    foreach($month as $m)
		{
		$val1=0;
	?>	
               <tr style="color:#335599">
    <td><?php echo $i; ?></td>
	<?php
	   $inst=mysqli_query($con,"select * from instdetail  where class='".$_POST['class']."' and session='".$_SESSION['session']."' and month='".$m."'");	
    
	   $rowinst=mysqli_fetch_array($inst);
	
	  $selrc=mysqli_query($con,"select * from fee_structure where class='".$_POST['class']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
		 
		 
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);
	  
	    $val2=0;
	?>
	<td><?php 
	$count1=0;
	if(!empty($rowconmonth2['combinemonth']))
	{
	  
	  $count1=count($rowconmonth2['combinemonth']);
	 $count1=$count1+1;
	 echo ucwords($m).",".ucwords($rowconmonth2['combinemonth']);
	}
	else 
	{
	echo ucwords($m); 
	}
	
	?></td>
	<td>
	   <?php echo $rowinst['inst_type']."=".$rowinst['amnt'];      
	   $val1+=$rowinst['amnt'];
	   ?>
	   	<?php
	          
	           foreach($a as $v)
		   {
		     list($header, $val) = split('[=]', $v);
             $check=mysqli_query($con,"select * from fee_memo where label_name='$header' and  session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and feetype='$m'");
 

			  if(mysqli_num_rows($check)>0)
			 {
			 
			      
		?>
		
							<?php
							      echo ",".ucwords($header)."=".$val; 
								   $val1+=$val;
							    
							  ?>
										   
							  <?php
							      
							  }
							}
							
                            ?>
	</td> 
	
	    <td><?php echo $val1; ?></td>
		
		
		
		
        </tr>
              
            
    <?php
	 $i++;
	}
	?>
          </tbody>
          </table>
		
		
		
      <br><br>
           <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('http://localhost/manorama/school/printStructure.php?id=<?php echo $_POST['class']; ?>')"><input type="button" value="Print " style="width:200px; margin-left:100px" ></a>      
                  </form>

</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

   <script src="js/jquery-1.8.3.min.js"></script>
   <script type="text/javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="js/DT_bootstrap.js"></script>
   <script src="js/dynamic-table.js"></script>
 