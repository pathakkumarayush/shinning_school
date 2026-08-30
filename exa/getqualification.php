 
 <tr class="table" >
          <td>&nbsp;</td>
          <td></td>
          <td>&nbsp;</td>
          <td><select name="pstgrd"  >
            <?php
			  if($_GET['q']=="postgraguate")
			  {
			?>
			<option value="M.B.A" >M.B.A</option>
            <option value="M.C.A" >M.C.A</option>
            <option value="M.tech" >M.tech</option>
            <option value="M.com" >M.com</option>
             <?php
			 }
			 ?>
            <?php
			  if($_GET['q']=="graguate")
			  {
			?>  
              <option value="B.A" >B.A</option>
              <option value="B.E/B-tech" >B.E/B-tech</option>
              <option value="B.com" >B.com</option>
              <option value="B.sc" >B.sc</option>
              <option value="B.C.A" >B.C.A</option>
              <option value="B.b.a" >B.B.A</option>
            <?php
			  }
			?>
			</select></td>
        </tr>