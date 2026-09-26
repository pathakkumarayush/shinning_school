<?php
setcookie("user", "Alex Porter", time()-3600);
//$_COOKIE['user']="user";
echo $_COOKIE['user']; 
?>