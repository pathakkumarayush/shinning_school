<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }
      //-->
</SCRIPT>
 
<html> 
    <body>
        <form action="url" method="get/post">
            <input id="txtChar" onKeyPress="return isNumberKey(event)" type="text" name="txtChar" />
			  <input id="txtChar1" onKeyPress="return isNumberKey(event)" type="text" name="txtChar" />
            <input type="submit" name="submit" value="Submit" />
        </form>
    </body>
</html>