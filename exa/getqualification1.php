 <script language="javascript" type="text/javascript" src="../js/datetimepicker.js"></script>					
<input name="txtdom2" id="demo3" type="text" class="tb5" value="<?php  if($_POST) echo $_POST['txtdom2'];  if(isset($_GET["uptachid"])){echo $row1["teacher_doj"];} ?>" size="40" />
  <a href="javascript:NewCal('demo3','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;" /></a>
