<script type="text/javascript">
function getalldata(schvar)
{
	
        var strURL='findalldata.php?schvar='+schvar;
		var req = getXMLHTTP();
		
		if (req) 
		{
			
			req.onreadystatechange = function() 
			{
				if (req.readyState == 4) 
				{
					// only if 'OK'
					if (req.status == 200) 
					{						
						document.getElementById('divsearch').innerHTML = req.responseText;						
					} else 
					{
						
					}
				}				
			}			
			req.open('GET', strURL, true);
			req.send(null);
	   }	
}
</script>
<script type="text/javascript">
 function validate()
{
 if( document.myForm.store.value == "-1" )
   {
     alert( "Please Select Category" );
     return false;
   }
   else
   {
	return true; 
	}
}
</script>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Store")) { 
        return false;
    }
    
} 
</script>
<?php
   if(isset($_POST['submit']))
   {
   if(empty($_POST['name']) || empty($_POST['store']) ||  empty($_POST['item'])  || empty($_POST['type']) || empty($_POST['amount']) || empty($_POST['date']))
   {
    $err="Field Marked With * are Mandatory";
   }
   if(empty($err))
   {
      
	$v3=array();
    foreach($_POST['item'] as $k=>$v)
    {
    $i=$k."=".$v;
    $arr=array_push($v3,$i);
	$item=mysqli_query($con,"select * from additem where item='$k'");
    $r_item=mysqli_fetch_array($item);
    $val=$r_item['quantity']+$v;
	$val1=$r_item['quantity'];
    $update=mysqli_query($con,"update additem set quantity='$val',old='$val1' where item='$k'");
	}
	
    $item=implode(",",$v3);
    $query=mysqli_query($con,"insert into purchase(categories,item,supplier,date,address,type,amount,due) values('".$_POST['store']."','$item','".$_POST['name']."','".$_POST['date']."','".$_POST['add']."','".$_POST['type']."','".$_POST['amount']."','".$_POST['due']."')");
	
	
   
   $msg="Inserted Successfully";
 }
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
div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Inventory/inven.png" /><a href="./?pageid=inventry_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/inv.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">
 <a href="./?pageid=inventry_home" style="text-decoration:none">Inventory</a> -> Purchase Item</a></h2>
</div>
<div class="col_4" style="margin-top:0px; min-height:335px;" >



                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onSubmit="return(validate());">
                
       
	   
		  <?php
		   	
	 if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg; ?></div>
		  <?php
		   }
	       ?>
   
  
        <?php
	         if(!empty($err))
			{
			?>				
						<div class="error" style="width:250px; height:auto; border-radius:5px"><?php echo $err;  ?></div>
		<?php  } ?>
	           <br>
            <div class="box-head">
						<h2 class="left">Purchase Detail</h2>
				   </div>
				    <form method="post" enctype="multipart/form-data">  
           <table width="600" border="0" cellspacing="0" cellpadding="0" style=" margin-left:50px; margin-top:20px; font-size:14px">
		<tr>
		<td>Supplier Name<span style="color:#FF0000">*</span></td>
		<td><input type="text" name="name" class="tb5" onkeyup="getalldata(this.value)" style="width:217px;">
		    </td>
		 <div id="divsearch" style="position:absolute; right:60px; border:#FF0000 2px solid"></div>
	</tr>
	<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
		<tr>
		<td>select category<span style="color:#FF0000">*</span></td>
       <td>
			<?php
			  $store=mysqli_query($con,"select * from addstore");
			?>
              <select name="store" class="select" onchange="get_item1(this.value)" style="width:237px;">
			  <option value="-1">Select Category</option>
			  <?php
			    while($r_store=mysqli_fetch_array($store))
				{
				?>
				<option value="<?php echo $r_store['id'];  ?>"><?php echo $r_store['store'];  ?></option>
				<?php
				}
			  ?>
			  
			  </select>
			  
             </td>
   	  
	    </tr>
		<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
		<tr>
			<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
		<td></td>
		    <td><div id="txtHint3"></div></td>
		
		</tr>
		
		<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
		<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	  <tr>
		<td>Type</td>
		<td>
	       <select name="type" class="select" style="width:237px;">
		    <option value="purchase">Purchase</option>
		    <option value="Service">Service</option>
		   </select>	
		</td>
	</tr>

		<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
		<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
		<tr>
		<td>Address</td>
		<td><textarea name="add" rows="2" cols="25"></textarea></td>  
		</tr>
		<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
		<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	   
	   <tr>
		<td>Amount<span style="color:#FF0000">*</span></td>
		<td><input type="text" name="amount" class="tb5" style="width:217px;"></td>
	</tr>
	<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
		<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
      <tr>
		<td>Due</td>
		<td><input type="text" name="due" class="tb5" style="width:217px;"></td>
	</tr>
	<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
		<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	  <tr>
		<td>Date<span style="color:#FF0000">*</span></td>
		<td><input type="text" name="date" class="tb5" id="inputField" style="width:217px;"></td>
	</tr>
	<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
		<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	 <td><input type="submit" name="submit" value="submit" style="width:150px"></td>
	</tr>
	
	</table>
       </form>
           <div class="table" style="border:#FF0000 0px solid; height:220px; margin:40px 0px 0px 0px ">
       
      </div>
                 
                  </form>
                    <!-- Box Head -->
					</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>