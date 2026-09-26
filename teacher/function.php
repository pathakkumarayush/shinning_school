<?php
ob_start();
ini_set("display_errors", 1);
ini_set("track_errors", 1);
ini_set("html_errors", 1);
error_reporting(E_ALL);
global $base_url;
//session_start();
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

// connecting database=>>>>


function connection()
{	
$con = mysqlii_connect("localhost","campus","camp@info%_321","svm");
return($con);
}

$con = connection();

global $con;
//== !!!!<<<<

function checksessionid($for="")
{
//session_start();
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}


if(!isset($_SESSION['userid']))
{
	  $_SESSION['userid'] = ""; 
	redirect("index.php");
	
	
}
else
{
//session variable for global usage
$userid = $_SESSION['userid'];

return($userid);
}
}



function redirect($url)
{
	Header("location:".$url);	
	
}




//logout==>>
function logout($for="")
{
session_destroy();

redirect($for."index.php");
}

//define navigations of page
function navigation($p)
{
    global $con;

$base_url="https://iilmt.org.in/";
    $filename = "pages/$p.php";
//echo $filename;exit;
    if (file_exists($filename)) {
    include_once "pages/$p.php";
    }
    else
    {
        echo '<div class="site-content"> <h3 class="alert alert-danger">The Page You Are Looking For Does Not Exists</h3></div>';
    }


}




//insert via array--->>>>>
function insertarray($table,$array)
{
global $con;
$columns= implode(",", array_keys($array));
$value= implode("','", $array);
$add="'";
$value=$add.$value.$add;

 echo "insert into $table ($columns) VALUES ($value)";
//mysqlii_set_charset('utf8');
 mysqlii_set_charset($con, 'utf8');
$sql=mysqlii_query($con,"insert into $table ($columns) VALUES ($value)");
//echo mysqlii_error($con);
return mysqlii_insert_id($con);
	
}

//insert array ends<<<<<<


//insert via array--->>>>>
function updatearray($table,$array,$where)
{
global $con;

$value="";
foreach($array as $key=>$val)
        {
            $value.=$key."='".$val."',";
        
        }

//echo "update $table set ".rtrim($value,",")." where ".$where;
 mysqlii_set_charset($con, 'utf8');
 $sql=mysqlii_query($con,"update $table set ".rtrim($value,",")." where ".$where);
//echo mysqlii_error($con);
return mysqlii_insert_id($con);
	
}

//insert array ends<<<<<<

// Update >>>>>>

function update($table,$string)
{
global $con;
//echo "update $table set $string";exit;
$sql = mysqlii_query($con,"update $table set $string");

$abc=mysqlii_error($con);
#echo $abc;

return($sql);
}
// ======== Update Ends!!! =============


// Count Num Rows==>>>>>>

function countnum($table)
{
global $con;

$sql = mysqlii_query($con,"select * from $table");

$num = mysqlii_num_rows($sql);


return($num);


}// countnum ends!!<<<<<<




//  Fetch long =>>>>>

function fetchall($table,$select='*')
{
echo "select ".$select." from $table";
global $con; 
//mysqli_set_charset($con, 'utf8');
$sql = mysqli_query($con,$con,"select ".$select." from $table");
$ab = array();
while($row = mysqli_fetch_assoc($sql))
{
$ab[]=$row;
}
return($ab);

}
// ===============Fetch Ends!!!<<<<<<


// SMS Gateway Function->>>
function sendsms2($mobile,$msg)
{

$senderid='AITSOO';
$apikey = '553a2e6da0bd0';

$msg = urlencode($msg);

$url = "http://softsms.in/app/smsapi/index.php?key=$apikey&type=text&contacts=$mobile&senderid=$senderid&msg=$msg";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result=curl_exec($ch);
curl_close($ch);

}
//SMS Gateway  Ends!!--<<<<<<<<<<


#>>>>> delete >>>>>>>>>>>>>

function del($string)
{
	global $con;
	$d=mysqlii_query($con,"delete from $string");
	
	return(mysqlii_error($con));
}

# Delete Ends!!<<<<<<<<<<<<<


#post-->>>>>>>>>>>>>>>>>>>
function post($name, $lev=0)
{
	if(isset($_POST["$name"]))
	{
		global $con;
		$nn=mysqlii_real_escape_string($con, $_POST["$name"]);
		if($nn!='')
		{
			return($nn);
		}
		elseif($lev==1)
		{
			die("Invalid Parameter Passed in Field");
		}
	}
	elseif($lev==1)
	{
		die("Invalid Name");
//		trigger_error("Blank value passed in field");
	}
}



#post ENDS!!<<<<<<<<<<<<<<<<<

//include header of the template

function includehead($for="")
{
   
     global $con;
   

$base_url="http://iilmt.org.in/";
	     	include_once $for."head.php";

    
    
    

}

//include footer of the template
function includefoot($for="")
{
  
$base_url="http://iilmt.org.in/";
   	     include_once $for."foot.php";
	
}



function getuserdetail($user,$detail)
{
global $con;
$sql = mysqlii_query($con,"select $detail from user where username='$user'");
$row = mysqlii_fetch_assoc($sql);
return($det = $row["$detail"]);

}


function getdetail($table,$detail)
{
global $con;
$sql = mysqlii_query($con,"select * from $table");
$row = mysqlii_fetch_assoc($sql);
$det = (isset($row["$detail"]))?$row["$detail"]:'';
return($det);

}


function fetchdata($table, $where=array())
{
    global $con;

    $query='';
    if(count($where))
    {
        foreach($where as $key=>$val)
        {
            $query.=$key."='".$val."' and ";
        
        }
        $query=(!empty($query))?"where ".rtrim($query," and "):"";
    
    }
//  echo "select * from $table ".$query;
    $sql = mysqlii_query($con,"select * from $table ".$query);
    $ab = array();

    while($row = mysqlii_fetch_array($sql))
    {
        $ab[]=$row;
    }
    return($ab);
}

function fetchdata1($table, $where=array())
{
    global $con;

    $query='';
    if(count($where))
    {
        foreach($where as $key=>$val)
        {
            $query.=$key."='".$val."' OR ";
        
        }
        $query=(!empty($query))?"where ".rtrim($query," OR  "):"";
    
    }
  //echo "select * from $table ".$query;
    $sql = mysqlii_query($con,"select * from $table ".$query);
    $ab = array();

    while($row = mysqlii_fetch_array($sql))
    {
        $ab[]=$row;
    }
    return($ab);
}
//exist or not

function dataexist($table, $where)
{
    $query='';
    foreach($where as $key=>$val)
    {
        $query.=$key."='".$val."' and ";
        
    }
    $query=(!empty($query))?"where ".rtrim($query," and "):"";
    
    global $con;
   // echo    "select * from $table ".$query ;
$sql = mysqlii_query($con,"select * from $table ".$query);
return mysqlii_num_rows($sql);
    
}

function uploadmultifiles($file,$target='./uploads/')
{  
    //var_dump($_FILES[$file]);exit;
    $FILES=$filename=array();
    for($i=0;$i<count($_FILES[$file]['name']);$i++)
    {
        
     $FILES[$i]['name']= $_FILES[$file]['name'][$i];  
       $FILES[$i]['type']= $_FILES[$file]['type'][$i];  
         $FILES[$i]['tmp_name']= $_FILES[$file]['tmp_name'][$i];  
           $FILES[$i]['error']= $_FILES[$file]['error'][$i];  
            $FILES[$i]['size']= $_FILES[$file]['size'][$i];  
    }
    
    $i=0;
    foreach( $FILES as $val)
    {
		$tname=explode(".",$val['name']);
        $newname = $tname[0].time().".".$tname[1];
        $filename[$i]['file']='./uploads/'.$newname;
         $filename[$i]['type']=$val['type'];
        $target_file = './uploads/' . basename($val['name']);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        echo $imageFileType;
      /*  if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPEG" && $imageFileType != "mp4" ) {
            echo "Sorry, only JPG, JPEG, PNG & mp4 files are allowed.";
            return $uploadOk = 0;
        }*/
        move_uploaded_file($val['tmp_name'],$target.$newname);
        $i++;
    }
    return $filename;
  
}


function uploadimg($file,$target='./uploads/')
{
    $filename=array();
   
        $newname = $_FILES[$file]['name'];
        $filename='./uploads/'.$newname;
       
        $target_file = './upload/' . basename($_FILES[$file]['name']);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if($imageFileType != "doc" && $imageFileType != "docx"   ) {
            echo "Sorry, only Doc, Docx";
            return $uploadOk = 0;
        }
		move_uploaded_file($_FILES[$file]['tmp_name'],$target.$newname);
       
    return $filename;
  
}

function includeside($for="")
{
	  global $con;
   

	     	include_once $for."sidebar.php";

    
}


function intotable2($table, $url)
{
	global $con;
	$stu=array();
	$sql = "SHOW COLUMNS FROM $table";
	$result = mysqlii_query($con,$sql);
	
	while($row = mysqlii_fetch_array($result))
	{
		//removing 'date' from array bcoz its timestamp and here it will receive blank value if allowed to pass.
		if($row['Field']!='date')
		{
			if($row['Field']=='company_logo' )
			{
				$ar = $row['Field'];
				$stu["$ar"]= $url;
	
			}
			else
			{
				$ar = $row['Field'];
				if(isset($_POST["$ar"]))
				{
				$stu["$ar"]=mysqlii_real_escape_string($con, $_POST["$ar"]);
				}
			}
		}
	}
	
	$columns= implode(",", array_keys($stu));
	$value= implode("','", $stu);
	$add="'";
	$value=$add.$value.$add;

	$sql=mysqlii_query($con,"insert into $table ($columns) VALUES ($value)");
	return(mysqlii_error($con));

}
?>