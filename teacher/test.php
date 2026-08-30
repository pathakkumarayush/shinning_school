<?php
/*
$date1 = strtotime('2013-07-25');
$date2 = strtotime('2013-08-29');
$months = 0;

while (($date1 = strtotime('+1 MONTH', $date1)) <= $date2)
    $months++;

echo $months;


function lastday($month = '', $year = '') {
   if (empty($month)) {
      $month = date('m');
   }
   if (empty($year)) {
      $year = date('Y');
   }
   $result = strtotime("{$year}-{$month}-01");
   $result = strtotime('-1 second', strtotime('+1 month', $result));
   return date('Y-m-d', $result);
}
echo lastday("July","2013");
*/

//first example
$first_day_this_month = date('Y-m-01'); 
//output -: 2013-08-01
$month_last_date = date('Y-m-t',strtotime($first_day_this_month));
//output -: 2013-08-31

//second example
function MonthfirstDay($month = '', $year = '')
{
    if (empty($month)) {
      $month = date('m');
   }
   if (empty($year)) {
      $year = date('Y');
   }
   $first_date = strtotime("{$year}-{$month}-01");
   return date('Y-m-d', $first_date);//will result like 2013-08-01
} 

function Monthlastday($month = '', $year = '') {
   if (empty($month)) {
      $month = date('m');
   }
   if (empty($year)) {
      $year = date('Y');
   }
   $first_date = strtotime("{$year}-{$month}-01");
   $result = strtotime('-1 second', strtotime('+1 month',$first_date));
   return date('Y-m-d', $result); //will return like 2013-08-31
}

//third example
//echo date('t',strtotime('today'));
//print last date of current month

//forth example

//print last date of March 2010

//get last date of next month
//echo date('t',strtotime('next month'));

//echo Monthlastday("July","2013");
$d= date('m', strtotime('last month'));
echo date('t-m-Y',strtotime($d)); //month/day/year
?>