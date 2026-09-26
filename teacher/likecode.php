<?php
session_start();
?>
<?php
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
header("Location: index.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Best Couple Matrimonial</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Marital Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<!--<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>-->
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<!----font-Awesome----->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome----->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>

  <script type="text/javascript" src="js/jssor.slider.min.js"></script>
    <!-- use jssor.slider.debug.js instead for debug -->
    <script>
        jssor_1_slider_init = function() {
            
            var jssor_1_SlideoTransitions = [
              [{b:5500,d:3000,o:-1,r:240,e:{r:2}}],
              [{b:-1,d:1,o:-1,c:{x:51.0,t:-51.0}},{b:0,d:1000,o:1,c:{x:-51.0,t:51.0},e:{o:7,c:{x:7,t:7}}}],
              [{b:-1,d:1,o:-1,sX:9,sY:9},{b:1000,d:1000,o:1,sX:-9,sY:-9,e:{sX:2,sY:2}}],
              [{b:-1,d:1,o:-1,r:-180,sX:9,sY:9},{b:2000,d:1000,o:1,r:180,sX:-9,sY:-9,e:{r:2,sX:2,sY:2}}],
              [{b:-1,d:1,o:-1},{b:3000,d:2000,y:180,o:1,e:{y:16}}],
              [{b:-1,d:1,o:-1,r:-150},{b:7500,d:1600,o:1,r:150,e:{r:3}}],
              [{b:10000,d:2000,x:-379,e:{x:7}}],
              [{b:10000,d:2000,x:-379,e:{x:7}}],
              [{b:-1,d:1,o:-1,r:288,sX:9,sY:9},{b:9100,d:900,x:-1400,y:-660,o:1,r:-288,sX:-9,sY:-9,e:{r:6}},{b:10000,d:1600,x:-200,o:-1,e:{x:16}}]
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>

    <style>
        
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('img/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 22 css */
        /*
        .jssora22l                  (normal)
        .jssora22r                  (normal)
        .jssora22l:hover            (normal mouseover)
        .jssora22r:hover            (normal mouseover)
        .jssora22l.jssora22ldn      (mousedown)
        .jssora22r.jssora22rdn      (mousedown)
        */
        .jssora22l, .jssora22r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 58px;
            cursor: pointer;
            background: url('img/a22.png') center center no-repeat;
            overflow: hidden;
        }
        .jssora22l { background-position: -10px -31px; }
        .jssora22r { background-position: -70px -31px; }
        .jssora22l:hover { background-position: -130px -31px; }
        .jssora22r:hover { background-position: -190px -31px; }
        .jssora22l.jssora22ldn { background-position: -250px -31px; }
        .jssora22r.jssora22rdn { background-position: -310px -31px; }
    </style>


</head>
<body>
<!-- ============================  Navigation Start =========================== -->
<?php

echo "My sess id ".session_id();
echo "<br>";
$u = $_SESSION["TEXTUSERID"];
$r = $_SESSION["ROLE"];
$q = strcmp($r,"admin");
?>
Welcome <?php echo $u?> as <?php echo $r?>
 <div class="navbar navbar-inverse-blue navbar">
    <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
      <div class="navbar-inner">
        <div class="container">
           <div class="navigation">
             <!--<nav id="colorNav">
			   <ul>
				<li class="green">
					<a href="#" class="icon-home"></a>
					<ul>
						<li><a href="login.php">Login</a></li>
					    <li><a href="register.php">Register</a></li>
					    <li><a href="index.php">Logout</a></li>
					</ul>
				</li>
			   </ul>
             </nav>-->
           </div>
           <a class="brand" href="yourview.php"><img src="images/logo.png" alt="logo"></a>
           <div class="pull-right">
          	<nav class="navbar nav_bottom" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header nav_2">
		      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#"></a>
		   </div> 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
            <?php if($q==0){?>
		        <ul class="nav navbar-nav nav_1">
		            <li><a href="index.php">Home</a></li>
		            <li><a href="about.php">About</a></li>
		    		<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Matches<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="matches.php">New Matches</a></li>
		                <li><a href="viewed-profile.php">Who Viewed my Profile</a></li>
		                <li><a href="viewed-not_contacted.php">Viewed & not Contacted</a></li>
		                <li><a href="members.php">Premium Members</a></li>
		                <li><a href="shortlisted.php">Shortlisted Profile</a></li>
		              </ul>
		            </li>
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="search.php">Regular Search</a></li>
		                <li><a href="profile.php">Recently Viewed Profiles</a></li>
		                <li><a href="search-id.php">Search By Profile ID</a></li>
		                <li><a href="faq.php">Faq</a></li>
		              </ul>
		            </li>
		            <li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Messages<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="inbox.php">Inbox</a></li>
		                <li><a href="inbox.php">New</a></li>
		                <li><a href="inbox.php">Accepted</a></li>
		                <li><a href="sent.php">Sent</a></li>
		                <li><a href="upgrade.php">Upgrade</a></li>
		              </ul>
		            </li>
		            <li class="last"><a href="contact.php">Contacts</a></li>
                    <li class="last"><a href="logout.php?logout">LogOut</a></li>
                    <?php }else{
	?>
    <ul class="nav navbar-nav nav_1">
    <li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Matches<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="matches.php">New Matches</a></li>
		                <li><a href="viewed-profile.php">Who Viewed my Profile</a></li>
		                <li><a href="viewed-not_contacted.php">Viewed & not Contacted</a></li>
		                <li><a href="members.php">Premium Members</a></li>
		                <li><a href="shortlisted.php">Shortlisted Profile</a></li>
		              </ul>
		            </li>
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="search.php">Regular Search</a></li>
		                <li><a href="profile.php">Recently Viewed Profiles</a></li>
		                <li><a href="search-id.php">Search By Profile ID</a></li>
		                <li><a href="faq.php">Faq</a></li>
		              </ul>
		            </li>
		            <li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Messages<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="inbox.php">Inbox</a></li>
		                <li><a href="inbox.php">New</a></li>
		                <li><a href="inbox.php">Accepted</a></li>
		                <li><a href="sent.php">Sent</a></li>
		                <li><a href="upgrade.php">Upgrade</a></li>
		              </ul>
		            </li>
		            <li class="last"><a href="contact.php">Contacts</a></li>
                    <li class="last"><a href="logout.php?logout">LogOut</a></li>

                    <?php
	}?>
		        </ul>
		     </div><!-- /.navbar-collapse -->
		    </nav>
		   </div> <!-- end pull-right -->
          <div class="clearfix"> </div>
        </div> <!-- end container -->
      </div> <!-- end navbar-inner -->
    </div> <!-- end navbar-inverse-blue -->
	<br clear="all">
	<br clear="all">
    	<?php

$res=mysqli_query($con,"SELECT * FROM user_res WHERE id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);
?>
    <div class="inner-box col-lg-12">
        <div class="col-lg-2">
           <p style="color:green; font-weight:600; margin:10px 0px 0px 30px; font-size:16px;">[Logged in <?php echo $userRow['uid'];?>]</p>
            <div class="yellow-box">
               <h5 class="bold">My Account</h5>
               <ul>
                  <li class="a"><a href="viewmy_profile.php" class="a"><img src="images/hrtimg.png" class="icon"/>View My Profile</a></li>
                  <li class="a"><a href="edit_profile.php" class="a"><img src="images/hrtimg.png" class="icon"/>Edit My Profile</a></li>
                  <li class="a"><a href="delete_profile.php" class="a"><img src="images/hrtimg.png" class="icon"/>Delete My Profile</a></li>
               </ul>
               
                <h5 class="bold">My Search</h5>
               <ul>
                  <li class="a"><a href="quick_search.php" class="a"><img src="images/hrtimg.png" class="icon"/>Quick Search</a></li>
                  <li class="a"><a href="#" class="a"><img src="images/hrtimg.png" class="icon"/>Advanced Search</a></li>
                  <li class="a"><a href="#" class="a"><img src="images/hrtimg.png" class="icon"/>Occupational Search</a></li>
                  <li class="a"><a href="#" class="a"><img src="images/hrtimg.png" class="icon"/>Members ID Search</a></li>
                  
                 
               </ul>
               
                <h5 class="bold">My Messages</h5>
               <ul>
                  <li class="a"><a href="#" class="a"><img src="images/hrtimg.png" class="icon"/>Interests Received</a></li>
                  <li class="a"><a href="#" class="a"><img src="images/hrtimg.png" class="icon"/>Message Received</a></li>
                 
               </ul>
               
                <h5 class="bold">My Photo</h5>
               <ul>
                  <li class="a"><a href="#" class="a"><img src="images/hrtimg.png" class="icon"/>Manage My photo</a></li>
                 
               </ul>
                  
                <h5 class="bold">My Horoscope</h5>
               <ul>
                  <li class="a"><a href="#" class="a"><img src="images/hrtimg.png" class="icon"/>Manage Horoscope</a></li>
                 
               </ul>
                 <h5 class="bold">My Membership</h5>
               <ul>
                  <li class="a"><a href="#" class="a"><img src="images/hrtimg.png" class="icon"/>My Membership</a></li>
                  <li class="a"><a href="#" class="a"><img src="images/hrtimg.png" class="icon"/>My Orders</a></li>
                 
               </ul>
               
            </div>
        </div>
         <div class="col-lg-10" style="margin-top:40px;">
           <div class="box" id="box">
		   <div  class="col-lg-12" >
		    <?php
            
            if(isset($_GET['id']))
            {
            $id=$_GET['id'];
			$uid= $userRow['uid'];
            $queryl = "insert into likeuser(uid_reciver,uid_sender)values('$id','$uid')";
			mysqli_query($con,$queryl);
			header("Location:view_full.php");
		    }
			
		   ?>
		   </div>
		   <br clear="all">
		   <hr>
             <p class="box-head">Basic Information</p>
             <table width="305" border="0" class="t1">
               <tr>
                 <td width="118">Name :</td>
                 <td width="31" rowspan="8">&nbsp;</td>
                 <td width="95"><?php echo $userRow['fname'];?>&nbsp;&nbsp;<?php echo $userRow['lname'];?></td>
               </tr>
               <tr>
                 <td>Gender :</td>
                 <td><?php echo $userRow['gender'];?></td>
               </tr>
               <tr>
                 <td>Date Of Birth :</td>
                 <td><?php echo $userRow['dob'];?></td>
               </tr>
               <tr>
                 <td>Marital status :</td>
                 <td><?php echo $userRow['maritalstatus'];?></td>
               </tr>
               <tr>
                 <td>Mother tongue:</td>
                 <td><?php echo $userRow['mothert'];?></td>
               </tr>
               <tr>
                 <td>Religion :</td>
                 <td><?php echo $userRow['religion'];?></td>
               </tr>
               <tr>
                 <td>Caste :</td>
                 <td><?php echo $userRow['cast'];?></td>
               </tr>
              
             </table>
             
           <hr style="color:#08AAFF; border:1px solid #08AAFF; width:100%; margin:25px 0px 25px 0px;">
           
            <p class="box-head">Eduction and Occupation</p>
             <table width="431" border="0" class="t1">
               <tr>
                 <td width="156">Eduction :</td>
                 <td width="33" rowspan="8">&nbsp;</td>
                 <td width="228"><?php echo $userRow['education'];?></td>
               </tr>
             
               <tr>
                 <td>Occupation :</td>
                 <td><?php echo $userRow['occupation'];?></td>
               </tr>
               <tr>
                 <td>Annual income:</td>
                 <td>Rs. <?php echo $userRow['annualincom'];?></td>
               </tr>
             
             </table>
             
           <hr style="color:#08AAFF; border:1px solid #08AAFF; width:100%; margin:25px 0px 25px 0px; ">
            
            
             <p class="box-head">Physical Attributes</p>
             <table width="398" border="0" class="t1">
             
               <tr>
                 <td>Height :</td>
                 <td><?php echo $userRow['height'];?></td>
               </tr>
              
                <tr>
                 <td>Smoke :</td>
                 <td><?php echo $userRow['smoking'];?></td>
               </tr>
                <tr>
                 <td>Drink :</td>
                 <td><?php echo $userRow['drinking'];?></td>
               </tr>
			   <tr>
                 <td>Food Type :</td>
                 <td><?php echo $userRow['food'];?></td>
               </tr>
             </table>
             
           <hr style="color:#08AAFF; border:1px solid #08AAFF; width:100%; margin:25px 0px 25px 0px; ">
           
            <p class="box-head">Family Details</p>
             <table width="425" border="0" class="t1">
               <tr>
                 <td width="200">Family Type :</td>
                 <td width="41" rowspan="8">&nbsp;</td>
                 <td width="170"><?php echo $userRow['ftype'];?></td>
               </tr>
               <tr>
                 <td>Mother occupation :</td>
                 <td><?php echo $userRow['food'];?></td>
               </tr>
               
              <tr>
                 <td>Mother occupation :</td>
                 <td><?php echo $userRow['food'];?></td>
               </tr>
               
              
             </table>
          
             
             
           <hr style="color:#08AAFF; border:1px solid #08AAFF; width:100%; margin:25px 0px 25px 0px; ">
           
             <p class="box-head">Contact Details</p>
               
              <table width="431" border="0" class="t1">
               <tr>
                 <td width="156">Mobile:</td>
                 <td><?php echo $userRow['mob'];?></td>
               </tr>
			   <tr>
                 <td width="156">Phone:</td>
                 <td><?php echo $userRow['phone'];?></td>
               </tr>
			   
			    <tr>
                 <td width="156">Emai:</td>
                 <td><?php echo $userRow['email'];?></td>
               </tr>
			   
			   <tr>
                 <td width="156">Address1:</td>
                 <td><?php echo $userRow['add1'];?></td>
               </tr>
			   
			   <tr>
                 <td width="156">Address2:</td>
                 <td><?php echo $userRow['add2'];?></td>
               </tr>
              </table>
             
            
            
             </div>
         
      </div>
    </div>
    
    
    </body>
 </html>
    
    
    
    
    
    
    
    
    
    
    