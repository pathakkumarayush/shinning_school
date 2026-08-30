<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}
.col_6{ width:58.5%; height:520px; background-color:#FFFFFF; margin-left:15px; float:left; margin-top:10px;}
.col_4{ width:40%; height:520px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;}
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
     background: #FF8500;
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
 function validate()
{
 if( document.myForm.class.value == "-1" )
   {
     alert("Please Select Class");
     return false;
   }
   else
   {
	return true; 
	}
}
</script>
<?php
  if(!empty($_GET['did']))
    {
	  $delete=mysqli_query($con,"delete from class where class_id='".$_GET['did']."'");
	}
?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this class")) { 
        return false;
    }
    
} 
</script>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Class Setting/setting.png" /><a href="./?pageid=setting_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Class</h2>
 <a href="./?pageid=teacher_class" style="color:#009966; margin-top:7px; font-size:18px; float:right">Add Class In Teacher</a>
 
 <a href="./?pageid=teacher_classs" style="color:#CC0000; margin-top:7px; font-size:18px; float:right; margin-right:20px;">Add Subject In Teacher</a>
</div>
<div class="col_4">
<div class="form-style-2-heading">Enter Class </div>
 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
   <table cellspacing="10">
<tr>
<td>School : </td>
<td><?php echo $_SESSION['uid']; ?></td>
</tr>
<tr>
<td>Class : </td>
<td><select name="class" class="select" style="width:220px;"> 
 <option value="">Select Class</option>
<option>Nursery</option>
<option>LKG</option>
<option>UKG</option>
<option>I</option>
<option>II</option>
<option>III</option>
<option>IV</option>
<option>V</option>
<option>VI</option>
<option>VII</option>
<option>VIII</option>
<option>IX</option>
<option>X</option>
<option>XI</option>
<option>XII</option>
<option>XI Commerce</option>
<option>XI Arts</option>
<option>XI Science</option>
<option>XII Commerce</option>
<option>XII Arts</option>
<option>XII Science</option>

</select>
</td>
</tr>
<!--<tr>
<td>Section</td>
<td><select name="section" class="select"> 
<option>Select Section</option>
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
<option>E</option>
<option>F</option>
<option>G</option>
<option>H</option>
<option>I</option>
<option>j</option>
</select>
</td>
<tr>-->
<tr>
   <td>No Of Periods<span>*</span></td>
  <td><input type="text" name="nperiod"  class="tb5" /></td>
</tr>
<td></td><td><input type="submit" name="addclass"></td>
</tr>
</table>
    </form>

</div>
<div class="col_6">
<div class="form-style-2-heading">Class Information</div>
<table class="table table-bordered" id="sample_1" style="font-size:12px; font-weight:bold; ">
              <thead style="background-color:#009933; color:#FFFFFF;border:1px #993300 solid;">
              <tr style="background-color:#009933;color:#FFFFFF">
                  <th>No.</th>
                  <th>Class</th>
				
				  <th>Periods</th>
                  <th>Delete</th>
               </tr>
			  
			  
              </thead>
			  
              <tbody>
	<?php
    $memo=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
	$i=1;
	while($row=mysqli_fetch_array($memo))
	{
		?>
                 <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $row['class'] ?></td>
                  <td><?php echo $row['no_of_periods'] ?></td>
                  <td><a style="color:#CC0033" href="<?php echo $var."add_class"."&&did=".$row['class_id']; ?>" onClick="return confirmation();">Delete</a></td>
			     </tr>
              
            
    <?php
	 $i++;
	}
	?>
          </tbody>
          </table>
</div>
<br clear="all" />
</div>
<br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" />
</div>
</div>
<br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" />
   <script src="js/jquery-1.8.3.min.js"></script>
   <script type="text/javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="js/DT_bootstrap.js"></script>
   <script src="js/dynamic-table.js"></script>
<?php
    if(isset($_POST["addclass"]))
    {

    if($_POST["section"]=="Select Section")
	  {
	    $result=mysqli_query($con,"select * from class where class='".$_POST["class"]."' and  school='".$_SESSION['uid']."' ")or die(mysqli_error());
	  }
	  else
	  {
	$result=mysqli_query($con,"select * from class where class='".$_POST["class"]."' and class_section='".$_POST["section"]."' and school='".$_SESSION['uid']."' ")or die(mysqli_error());
	}
	if($row=mysqli_num_rows($result)>1)
	{
		?>
        <script type="text/javascript">
		alert("This class is already exists");
		</script>
        <?php
	}
	else
	{
	if($_POST["section"]=="Select Section")
	  {
	   $_POST["section"]="";
	  }
	mysqli_query($con,"insert into class(class,class_section,school,no_of_periods) values('".$_POST["class"]."','".$_POST["section"]."','".$_SESSION['uid']."','".$_POST['nperiod']."')");
	
	
	$msg="Inserted Successfully";
	}
}
?>