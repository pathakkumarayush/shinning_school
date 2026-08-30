<?php
$msg ="";
session_start();
include('db.php');
/*$cls = $_POST['cls'];*/
$idm = $_POST['idm'];
/*$teach = $_POST['teacher'];
$des = $_POST['des'];*/
$month = $_POST['month'];
$attend = $_POST['attend'];
$sess = $_SESSION['session'];
$w_d = $_POST['working'];

/*echo $w_d.",".$sess.",".$month;
exit();*/
for ($i=0; $i<count($_POST['idm']); $i++) {
	$absent = $attend[$i];
	$working_days = $w_d;
	/*echo $idm[$i]."->".$teach[$i];*/
	/*echo "insert into tech_absent(tid,desig,month,abs,ses)values('$idm[$i]','$des[$i]','$month[$i]','$attend[$i]','$sess')";*/
	$res = mysqli_query($con,"UPDATE `tech_absent` SET `abs`='$attend[$i]',`wd`='$w_d' WHERE tid='$idm[$i]' AND month='$month' AND ses='$sess'");

$worked = $working_days-$absent;
	$srch_tch_bsc= mysqli_query($con,"SELECT basic,hra,da,conv,ta,pf_per,epf_per,esic_per,esi_per,current_salary,teacher_name,it_per,pf,esi,esino,tech_val,tech_type,tds,allow,lwf_deduct,other_deduct,adjs,act_pf,pay_mode,designation_id FROM teacher WHERE teacher_id='$idm[$i]' and teacher_session='".$_SESSION['session']."'");
		$check_sal =mysqli_fetch_assoc($srch_tch_bsc);
		$teacher_name = $check_sal['teacher_name'];
		$designation_id = $check_sal['designation_id'];
		$tech_val = $check_sal['tech_val'];
		$teacher_type = $check_sal['tech_type'];
		$current_salary = $check_sal['current_salary'];
		$basic = $check_sal['basic'];
		$act_pf = $check_sal['act_pf'];
		$mode = $check_sal['pay_mode'];

		$adjs_deduct = $check_sal['adjs'];
		$tds_deduct = $check_sal['tds'];
		$pt_deduct = $check_sal['allow'];
		$lwf_deduct = $check_sal['lwf_deduct'];
		$other_deduct = $check_sal['other_deduct'];

		$pf_type = $check_sal['pf'];
		$esi_type = $check_sal['esi'];
		$esi_number = $check_sal['esino'];
		$pf_per = $check_sal['pf_per'];
		$epf_per = $check_sal['epf_per'];
		$esic_per = $check_sal['esic_per'];
		$esi_per = $check_sal['esi_per'];
		$act_hra = $check_sal['hra'];
		$act_da = $check_sal['da'];
		$act_ta = $check_sal['ta'];
		$act_cla = $check_sal['conv'];
		$it_per = $check_sal['it_per'];
		$basic_salary = round($check_sal['basic'])/round($working_days)*round($worked);
		$adjustment = round($check_sal['adjs'])/round($working_days)*round($worked);
		$da = round($check_sal['da'])/round($working_days)*round($worked);
		$hra = round($check_sal['hra'])/round($working_days)*round($worked);
		$cla = round($check_sal['conv'])/round($working_days)*round($worked);
		$ta = round($check_sal['ta'])/round($working_days)*round($worked);
		$total_amt = round($basic_salary) + round($da) + round($hra) + round($cla) + round($ta) + round($adjustment);

if($total_amt > 15000 && $act_pf == "No")
{
$salf='15000';
$salf_pf = '15000';
}
else if($total_amt > 15000 && $act_pf == "Yes")
{
$salf=round($total_amt);
$salf_pf = '15000';
}
else
{
$salf=round($total_amt);
$salf_pf = $salf;
}

if($attend==0)
{
$tot_pf= round($salf * $pf_per/100);
}
else
{
$tot_pf= round($salf * $pf_per/100);
}

if($attend==0)
{
$tot_epf= round($salf_pf * $epf_per/100);
}
else
{
$tot_epf= round($salf_pf * $epf_per/100);
}

$tot_esic= round($total_amt * $esic_per/100);
$tot_esi= round($total_amt * $esi_per/100);

$grand_total_to_show = round($tot_esic) + round($tot_epf) + round($basic_salary) + round($ta) + round($da) + round($cla) + round($hra) + round($adjustment);
$tot_pf_esi = round($tot_esi+$tot_pf);
$payable_amount = round($total_amt) - round($tot_esi + $tot_pf + $tds_deduct + $pt_deduct + $lwf_deduct + $other_deduct);

/*echo "Name-".$teacher_name."--Total[".round($total_amt)."]--Total to Show[".$grand_total_to_show."]--TDS[".$tds_deduct."]-- PT[".$pt_deduct."]--Payable[".$payable_amount."]";*/

$query=mysqli_query($con,"UPDATE teacher_sal SET teacher='".$idm[$i]."',teacher_name='".$teacher_name."',sal_rec='".round($payable_amount)."',cur_sal='".$current_salary."',cl='0',absent='".$absent."',pf_ded='".round($tot_pf)."',pf_per='".$pf_per."',month='".$month."',session='".$_SESSION['session']."',workingd='".$working_days."',esi='".$tot_esi."',esi_per='".$esi_per."',hra='".round($hra)."',act_hra='".round($act_hra)."',conv='".round($cla)."',act_conv='".round($act_cla)."',it_pt='".round($tot_pf_esi)."',act_itpt='".$it_per."',basic='".round($basic_salary)."',act_basic='".round($basic)."',adv='0',dect='".$lwf_deduct."',cla='0',st='".$teacher_type."',allow='0',ac_allow='0',pf_type='".$pf_type."',retcmon='0',esic_per='".$esic_per."',esic='".round($tot_esic)."',epf='".round($tot_epf)."',da='".$act_da."',da_c='".round($da)."',ta='".$act_ta."',ta_c='".round($ta)."',adjs='".round($adjs_deduct)."',adjs_c='".round($adjustment)."',ptd='".$pt_deduct."',tds='".$tds_deduct."',gsalry='".round($total_amt)."',gtsal='".round($grand_total_to_show)."',esi_type='".$esi_type."',act_working_days='".$worked."',other_deduct='".$other_deduct."',tno='".$designation_id."',esino='".$esi_number."',mode='".$mode."' WHERE teacher='$idm[$i]' AND month='$month' AND session='$sess'");
	if($query){
		$msg = "Salary Updated! You can check salary Details here <a href='?pageid=salarydetail&&divid=3' target='_blank'>Salary Details</a>";
	}
	else{
		$msg = "Something Went Wrong!";
	}

}

echo $msg;
?>
