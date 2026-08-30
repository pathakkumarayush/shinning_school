
 
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Store")) { 
        return false;
    }
    
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
 <a href="./?pageid=inventry_home" style="text-decoration:none">Inventory</a> ->Stock Details</a>
 
 
 <a href="./?pageid=service" style="color:#FFFFFF;float:right; margin-right:0px; background-color: #CC0000; margin-top:-5px; padding:6px; font-size:18px">Service Details</a>
 <a href="./?pageid=purchase_detail" style="color:#FFFFFF;float:right; margin-left:300px; background-color: #009999; margin-top:-5px; padding:6px; font-size:18px">Purchase Details</a>
 </h2>
</div>
<div class="col_4" style="margin-top:0px; min-height:335px;" >
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onSubmit="return(validate());">
                
  <br><br>
            <div class="box-head">
						<h2 class="left">Purchase Details</h2>
				   </div>
           <div class="table" style="border:#FF0000 0px solid; height:320px; overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	   <td>Sr</td>
       <td>Item</td>
	   <td>Type</td>
       <td>Supplier</td>
	   <td>Invoice No.</td>
	   <td>Amount</td>
	   <td>Due</td>
	   <td>Date</td>
		
        </tr>
       <?php
        $memo=mysqli_query($con,"select * from purchase where type='stock' order by id desc");
		
		$i=1;
	while($rowmemo=mysqli_fetch_array($memo))
	{
	  
	?>	
    <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
    <td><?php echo $rowmemo['item']; ?></td>
    <td><?php echo ucwords($rowmemo['type']);  ?></td>
	<td><?php echo $rowmemo['supplier'];  ?></td>  
	<td><?php echo ucwords($rowmemo['ino']);  ?> </td> 
     <td><?php echo ucwords($rowmemo['amount']);  ?> </td>
	   <td><?php echo ucwords($rowmemo['due']);  ?> </td>
    <td> <?php echo date("d-m-Y",strtotime($rowmemo['date']));  ?></td>
  
    </tr>
    <?php
    $i++;
	}
	?>
	
	</table>
         </div>
      
                 
                  </form>
                    <!-- Box Head -->
						</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>