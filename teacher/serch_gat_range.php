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
<div class="left_sect"><img src="images/g_pass.png" /><a href="./?pageid=get_pass_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/gp.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">
 <a href="./?pageid=get_pass_home" style="text-decoration:none">Get Pass</a> ->Today Get Pass Details</a></h2>
 
</div>
<div class="col_4" style="margin-top:0px;min-height:330px;">    
                 <div class="box-head" style="margin-top:20px; font-size:18px">
			  <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."serch_gat_today"?>">Today  </a>&nbsp;||&nbsp;
			  <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."serch_gat" ?>">Search By Date</a>	&nbsp;||&nbsp;
			    <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."serch_gat_range"?>">Search By Date Range</a>
			     
			</div>
				 
				 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
				   <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
                    <table style="margin:30px 0px 0px 70px; font-size:14px; width:400px">
        
		       <tr> 
		        <td>From</td>
		        <td><input type="text" name="from"  class="tb5" style="width:220px">yyyy-mm-dd</td>
		  </tr></td>
		  
		  <tr> 
		        <td>To</td>
		        <td><input type="text" name="to"  class="tb5" style="width:220px">yyyy-mm-dd</td>
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
				   
			</form>
			     <table width="99%" border="1" cellspacing="0" cellpadding="0" style=" font-size:14px; margin-left:5px;">
		      <tr style="height:30px; background-color: #006633; color:#FFFFFF">
			  <th>Visitor Name</th>
			  <th>Meeting Purpose</th>
			  <th>Meet With</th>
              <th>Mobile</th>
			  <th>Address</th>
			  <th>Vehicle</th>
              <th>Vehicle Type</th>
			  <th>Vehicle No</th>
			  <th>Date</th>
			  <th>Time</th>
			 
			  <th>Out Date Time</th>
			  </tr>
				   
				   <?php
				 
				   if(isset($_POST['search']))
				   {
				   
				     function formatMoney($number, $fractional=false) {
                    if ($fractional) {
                     $number = sprintf('%.2f', $number);
                       }
                      while (true) {
                      $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                     if ($replaced != $number) {
                     $number = $replaced;
                        } else {
                      break;
                       }
                       }
                    return $number;
                     }		
				   
				   
				   $a=$_POST['from'];
                   $b=$_POST['to'];
				   
				   
				   $search=mysqli_query($con,"select * from enquiry_pass where dob BETWEEN '$a' AND '$b'");
			
			       $i=1;
			       while($studrow=mysqli_fetch_array($search))
			       {
				   ?>
				    <tr>
			   
				 
				  <td align="center"><?php echo $studrow['name']; ?></td>
				 
				  <td align="center"><?php echo $studrow['fname']; ?></td>
				  <td align="center"><?php echo $studrow['mname']; ?></td>
				  <td align="center"><?php echo $studrow['mobile']; ?></td>
				  <td align="center"><?php echo $studrow['address']; ?></td>
				  <td align="center"><?php echo $studrow['gender']; ?></td>
				  <td align="center"><?php echo $studrow['aclass']; ?></td>
				  <td align="center"><?php echo $studrow['city']; ?></td>
				  
				  <td align="center"><?php echo date("d-m-Y",strtotime($studrow['dob'])); ?></td>
				   <td align="center"><?php echo $studrow['pclass']; ?></td>
				  <td align="center"><?php echo $studrow['percentage']; ?></td>
			      </tr>
				    <?php
                    $i++;
			         }
			        ?>	
			
		
				  
				   <?php
				   }
				   
				   ?>
				   
				   
				   	 </table>
				   
				   
				   <br />
				  </div>
			
 
<br clear="all" />
</div>
<br clear="all" />
<br clear="all" />
</div>
</div>				   
          