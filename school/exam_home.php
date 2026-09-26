<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Examination/exa.png" /><a href="index.php"><img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="shell_one"><a href="./?pageid=add_exam"><img src="images/Examination/Add Exam.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=add_term"><img src="images/Examination/term.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=exam_timetable"><img src="images/Examination/Create Time Table.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=sendmsg"><img src="images/Examination/Result.png" /></a> </div>

<?php 
if($_SESSION['session']=='2024-2025')
{
?>
<div class="shell_one"><a href="./?pageid=printmarksheetannual24"><img src="images/Examination/Marksheet.png" /></a> </div>
<?php 
}
else if($_SESSION['session']=='2025-2026')
{
?>
<div class="shell_one"><a href="./?pageid=printmarksheetannual25"><img src="images/Examination/Marksheet.png" /></a> </div>
<?php 
}
else
{
?>
<div class="shell_one"><a href="./?pageid=printmarksheetannual"><img src="images/Examination/Marksheet.png" /></a> </div>
<?php 
}
?>
<div class="shell_one"><a href="./?pageid=sendmsgn"><img src="images/Examination/Results.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=sendmsgT"><img src="VTM.png" /></a> </div>
<!--<div class="shell_one"><a href="./?pageid=combine_exam"><img src="images/Examination/comm.png" /></a> </div>-->

<!--<div class="shell_one"><a href="./?pageid=co-scholastic"><img src="images/co_areas.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=discipline"><img src="images/dici.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=discipline1"><img src="di.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=attendance"><img src="rra.png" /></a> </div>-->
<div class="shell_one"><a href="./?pageid=health"><img src="images/adds.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=healthh"><img src="images/ccao.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=healthhh"><img src="images/soa.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=ATT"><img src="images/AR.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=copy_collection"><img src="images/CC.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=qg_index"><img src="images/EP.png" /></a> </div>
<!--<div class="shell_one"><a href="./?pageid=discipline"><img src="images/ls.png" /></a> </div>-->
<!--<div class="shell_one"><a href="./?pageid=discipline_attitute"><img src="images/atti.png" /></a> </div>-->

<!--<div class="shell_one"><a href="./?pageid=addsub"><img src="images/Time Table/Add Subject.png" /></a> </div>-->

<!--<div class="shell_one"><a href="./?pageid=1CLS"><img src="images/1CL.png" /></a> </div>-->

<!--<div class="shell_one"><a href="./?pageid=np"><img src="images/np.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=ns"><img src="ns.png" /></a> </div>-->
<br clear="all" />
</div>
<br clear="all" />
<br clear="all" />
</div>
</div>
