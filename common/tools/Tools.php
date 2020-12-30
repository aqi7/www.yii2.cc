<?php
namespace common\tools;
class Tools 
{
	 public static function getLastWeekDate($date=null){
		if(empty($date)){
			$date=date('Y-m-d');
		}
		$first=1; //$first =1 表示每周星期一为开始日期 0表示每周日为开始日期
		$w=date('w',strtotime($date));  //获取当前周的第几天 周日是 0 周一到周六是 1 - 6
		$now_start=date('Y-m-d',strtotime("$date -".($w ? $w - $first : 6).' days')); //获取本周开始日期，如果$w是0，则表示周日，减去 6 天
		$now_end=date('Y-m-d',strtotime("$now_start +6 days"));  //本周结束日期
		$last_start=date('Y-m-d',strtotime("$now_start - 7 days"));  //上周开始日期
		$last_end=date('Y-m-d',strtotime("$now_start - 1 days"));  //上周结束日期
		$weekDate['last_start']=$last_start;
		$weekDate['last_end'] = $last_end;
		$weekDate['now_start']=$last_start;
		$weekDate['now_end'] = $now_end;
		return $weekDate;
	}
}


