<style type="text/css">
span.customStyleSelectBox { font-size:14px; font-weight:bold; background-color:#f0dea4; color:#7c7c7c; padding:5px 7px; border:1px solid #e7dab0; -moz-border-radius: 5px; -webkit-border-radius: 5px;border-radius: 5px 5px; line-height: 11px; } span.customStyleSelectBox.changed { background-color: #f0dea4; } .customStyleSelectBoxInner { background:url(images/arrow.gif) no-repeat center right; }

body{
  
}
.info, .success, .warning, .error, .validation {
    border: 0px solid;
    margin: 10px 0px;
    padding:15px 10px 15px 50px;
    background-repeat: no-repeat;
    background-position: 10px center;
}
.info {
    color: #00529B;
    background-color: #BDE5F8;
    background-image: url('info.png');
}
.success {
    color: #4F8A10;
    background-color:#FFD9FF;
    background-image:url('success.png');
}
.warning {
    color: #9F6000;
    background-color: #FEEFB3;
    background-image: url('warning.png');
	font-family:"Courier New", Courier, monospace
}
.error {
    color: #D8000C;
	background:#FFD9FF;
   background-image: url('error.png');
   border-radius:15px;
}
.sms_l{width:135px;margin-top:10px; height:22px;margin-left:20px; background-color:#CC0000; border:4px #FFFFFF solid;}
.sms_l:hover{ background-color:#009933;}
.sms_l a{text-decoration:none; margin-top:3px; margin-left:10px;position:absolute; font-size:14px; color:#FFFFFF}
.sms_l a:hover{font-size:15px; font-weight:bold;}
.sms_ll{width:135px;margin-top:10px; height:22px;margin-left:5px; background-color:#009933; border:4px #FFFFFF solid;}
.sms_ll:hover{ background-color:#CC0000;}
.sms_ll a{text-decoration:none; margin-top:3px; margin-left:10px;position:absolute; font-size:14px; color:#FFFFFF}
.sms_lll{width:300px;margin-top:10px; height:22px;margin-left:5px; }
.sms_lll a{text-decoration:none; margin-top:3px; margin-left:10px;position:absolute; font-size:14px; color:#FFFFFF}
</style>
<script type="text/javascript">
    $(document).ready(function($) {
             //Set maxlength of all the textarea (call plugin)
             $().maxlength();
    })
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
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/hww.png" /><a href="./?pageid=home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/Sms-icon.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Send Homework</h2>

<a href="./?pageid=viewh" style="float:right; margin-right:10px; margin-top:11px; font-size:18px;">View Homework</a>
</div>
<div class="col_4" style="margin-top:0px; " >	
				
	
<?php 
if (isset($_POST["addhwork"])) {

    $errors = [];

    // Validate required fields
    if (empty($_POST["class"])) {
        $errors[] = "Class is required.";
    }
    if (empty($_POST["homwork"])) {
        $errors[] = "Homework description is required.";
    }
    if (empty($_POST["datefrom"]) || empty($_POST["dateto"])) {
        $errors[] = "Date range is required.";
    }

    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf'];
        $maxSize = 5 * 1024 * 1024; // Allow upload up to 5MB
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowedTypes)) {
            $errors[] = "Only JPG, JPEG, PNG, and PDF files are allowed.";
        }

        if ($_FILES['image']['size'] > $maxSize) {
            $errors[] = "File size must be less than 5MB.";
        }

        if ($_FILES['image']['error'] !== 0) {
            $errors[] = "File upload error.";
        }

        if (empty($errors)) {
            $uploadDir = "homework/";
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Sanitize and preserve original file name
            $originalName = basename($_FILES['image']['name']);
            $originalName = preg_replace("/[^a-zA-Z0-9.\-_]/", "_", $originalName);
            $targetPath = $uploadDir . $originalName;
            $tempPath = $_FILES['image']['tmp_name'];

            // Process based on file type
            if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                // Compress image and save to targetPath
                if (compressImage($tempPath, $targetPath, 60)) {
                    $image = $originalName;
                } else {
                    $errors[] = "Failed to compress image.";
                }

            } elseif ($ext === 'pdf') {
                // Move file and compress PDF
                if (move_uploaded_file($tempPath, $targetPath)) {
                    if (compressPDF($targetPath, $targetPath)) {
                        $image = $originalName;
                    } else {
                        $errors[] = "PDF compression failed.";
                    }
                } else {
                    $errors[] = "Failed to upload PDF.";
                }
            }
        }
    }

    if (empty($errors)) {
        $qry = "INSERT INTO homework(class_id, assign_by, homwork, school, datefrom, dateto, image, subject_id)
                VALUES (
                    '".mysqli_real_escape_string($con, $_POST["class"])."',
                    '".mysqli_real_escape_string($con, $_SESSION['userid'])."',
                    '".mysqli_real_escape_string($con, $_POST["homwork"])."',
                    '".mysqli_real_escape_string($con, $_SESSION['uid'])."',
                    '".mysqli_real_escape_string($con, $_POST['datefrom'])."',
                    '".mysqli_real_escape_string($con, $_POST['dateto'])."',
                    '".mysqli_real_escape_string($con, $image)."',
					'".mysqli_real_escape_string($con, $_POST['sub'])."'
                )";
        mysqli_query($con, $qry);
        echo "<script>alert('Homework sent successfully'); window.location='" . $var . "homeworkadd';</script>";
    } else {
        foreach ($errors as $err) {
            echo "<script>alert('$err');</script>";
        }
    }
}

// ---------- Image Compression Function ----------
function compressImage($sourcePath, $destinationPath, $quality = 60) {
    $info = getimagesize($sourcePath);
    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($sourcePath);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($sourcePath);
        // Convert to JPEG to reduce size
        $white = imagecreatetruecolor(imagesx($image), imagesy($image));
        $bg = imagecolorallocate($white, 255, 255, 255);
        imagefill($white, 0, 0, $bg);
        imagecopy($white, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
        $image = $white;
    } else {
        return false;
    }
    return imagejpeg($image, $destinationPath, $quality);
}

// ---------- PDF Compression using Ghostscript ----------
function compressPDF($source, $destination) {
    $cmd = "gs -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/screen ".
           "-dNOPAUSE -dQUIET -dBATCH -sOutputFile=" . escapeshellarg($destination) . " " . escapeshellarg($source);
    exec($cmd, $output, $return);
    return ($return === 0);
}
?>




<br />
<div style="width:990px;">
				  
				  <div class="sms_lll" style="float:left">
				   <h2 style="color: #006633; margin-left:50px; font-size:18px; ">Add Home Work &nbsp; &nbsp;</h2>
				  </div>
				 
				  
				  </div>

<br clear="all" />

<div>
<form action="" name="form" method="post" enctype="multipart/form-data">
<div style="margin-left:20px;"><br />
<table border="0" cellspacing="10" width="550" style="margin-left:100px;">
<tr>
<td>School :- </td>
<td><?php echo $_SESSION['uid']; ?></td>
</tr>

<tr>
<td>Assign By :-</td>
<td> <?php
				 $tech=mysqli_query($con,"select * from  teacher where uid='".$_SESSION['uid']."'");
				 $techrow=mysqli_fetch_array($tech);
				 
                 ?>
			    <span style="color:#000; font-weight:bold;" <strong><?php echo isset($techrow['teacher_name']) ? ucwords($techrow['teacher_name']) : ''; ?></strong></span></td>
</tr>

<tr>
<td>Class :- </td>
<td>
<script>
function getsubject(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getsubject.php?q="+str,true);
xmlhttp.send();
}
</script>
<select  style="width:220px;" name="class" class="select">
               <?php 
		   if(isset($_SESSION["type"]) && $_SESSION["type"] == 'school')
		   {
			  
              $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
        while($class1=mysqli_fetch_array($class)) { ?>
              
               <option value="<?php echo $class1['class']; ?>" <?php if($class1['class']==$class1['class']) { ?> selected="selected" <?php } ?> ><?php echo $class1["class"].$class1["class_section"]; ?></option>
               <?php
		   } }
		   else
		   {
			?>
               <option>Select</option>
               <?php 
			 ?>
               <?php
        $res=mysqli_query($con,"select * from class_teacher where teacher='".$_SESSION['uid']."'");
        while($rows=mysqli_fetch_array($res))
        { ?>
            <option value="<?php echo $rows["class"]; ?>"><?php echo $rows["class"]; ?></option>
       <?php  } }
        ?>
             </select>
  </td>
</tr>

<tr>
<td>Subject :- </td>
<td><input type="text" name="sub" class="" /></td>
</tr>


<tr>
<td>Homework :-  <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td>
<td><textarea maxlength="180" rows="5" cols="28" name="homwork" > </textarea></td>
</tr>
  
   <tr>
           <td>Upload Image</td>
           <td><input name="image"  id="image1" type="file" size="40" style="width:200px" /> </td>
         </tr>

 <tr>
           <td>Date From</td>
           <td><input name="datefrom"  id="demo1" type="text" value="<?php if($_POST) echo $_POST['txtdob']; if(isset($_GET["upstudid"])){echo $row_stud["student_dob"];} ?>"  size="40" style="width:200px" /><a href="javascript:NewCal('demo1','ddmmmyyyy')" ><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style="margin-top:-1.5px; position:absolute;" > </a></td>
         </tr>
<tr>
           <td>Date To	</td>
           <td><input name="dateto"  id="demo2" type="text"  size="40" style="width:200px" /><a href="javascript:NewCal('demo2','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style="margin-top:-1.5px; position:absolute;" ></a></td>
         </tr>

<tr>
<td>&nbsp;</td>
<td><input type="submit" name="addhwork" value="Submit"  /></td>
</tr>

</table>

</div>
</form>
</div>
<br />




			     	</div>
					</div>
			</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>		



