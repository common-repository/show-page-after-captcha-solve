<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

# Format date
if( !function_exists('wl_format_date') ){
	function wl_format_date( $date, $new_format = 'Y-m-d' ){

		return date($new_format, strtotime($date)); 
	}
}

# Set the TimeZone

if( !function_exists("wt_now_date_time") ){
	function wt_now_date_time($format = "Y-m-d h:m:d", $timeZone = "Europe/Amsterdam" ){
		
		date_default_timezone_set($timeZone);
		$wt_now_date_time = date($format);

		return  $wt_now_date_time;
	}
}


if(!function_exists('pr')){
    function pr($data, $die = false){
        echo "<pre>";
        print_r($data);
        echo "</pre>";

        if($die){
            die();
        }
    }
}

if( !function_exists( "wl_get_two_date_from_range" ) ){
	function wl_get_two_date_from_range($range, $seperator = "-"){
		
		$res = explode($seperator, $range);

		return array(
			"start" => $res[0]."-".$res[1]."-".$res[2],
			"end" 	=> $res[3]."-".$res[4]."-".$res[5],
		);
	}
}

if( !function_exists( "wl_get_name" ) ){
	function wl_get_name( $field_name){

		global $wl_rt_lan;

		if( isset($field_name[$wl_rt_lan]) ){

			return $field_name[$wl_rt_lan];
		}
	}
}

if( !function_exists( "wl_get_date_range" ) ){
	function wl_get_date_range($start, $end, $format = 'Y-m-d') {
	    $array = array();
	    $interval = new DateInterval('P1D');

	    $realEnd = new DateTime($end);
	    $realEnd->add($interval);

	    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

	    foreach($period as $k => $date) { 
	        $array[] = $date->format($format); 
	    }

	    return $array;
	}
}

/**
 * 
 * @package my_time_exist_in_betwn_two_time
 * check if a time exist
 * between two time
 * ex: 10.00Am - 10.00PM
 * 01.00 Pm Is exist between
 * the Two time
 * @return true | false
 *
 */

if( !function_exists( "my_time_exist_in_betwn_two_time" ) ){

	function my_time_exist_in_betwn_two_time( $check_time, $first_time, $last_time  )
	{
		
		$check_time =  DateTime::createFromFormat('H:i', $check_time);
		$first_time = DateTime::createFromFormat('H:i', $first_time);
		$last_time 	= DateTime::createFromFormat('H:i', $last_time);

		if ($check_time >= $first_time && $check_time <= $last_time)
		{
		   return true;
		}

		return false;

	}
}


if( !function_exists( "wl_from_verify_nonce" ) ){
	function wl_from_verify_nonce( $nonce_name,  $nonce_verify_name ){
		
		if( isset( $_POST[$nonce_name] ) &&  wp_verify_nonce($_POST[$nonce_name], $nonce_verify_name) )
		{
			return $_POST;
		}else{
			return false;
		}

	}
}


/**
 *
 * wl_get_req_veri_nonce
 * get nonce verify and return data as array
 * Example: 
 * $data_id    = $v->id;
 * $action_url = "?page=restaurant-add&id=$data_id&action=";
 * wp_nonce_url( $action_url."rt_edit" );
 * 
 * @return false or
 * return 
 * array('action', 'id')
 * 
*/

if( !function_exists("wl_get_req_nonce_verify") ){

	function wl_get_req_nonce_verify(){
		
		if( isset( $_GET['action'] ) && isset( $_GET['_wpnonce'] ) && isset($_GET['id']) ){

		    if( wp_verify_nonce( $_GET['_wpnonce'] ) ){
		        
		        $my_get = array();
		    	foreach( $_GET as $k => $v ){
		    		$my_get["$k"] = $v;
		    	}

		    	return $my_get;
		    }
		}

		return false;

	}

}

if( !function_exists( "wl_join_to_one_array_need_json" ) ){
	function wl_join_to_one_array_need_json($two_dimenstion_arr, $need_json = false)
	{
		$date_range_arr_join = array();

		if( $two_dimenstion_arr  ){
		  foreach( $two_dimenstion_arr as $k => $v ){
		    foreach($v as $vv){
		      $date_range_arr_join[] = $vv;
		    }
		  }
		}

		if( $need_json ){
			$date_range_arr_join = json_encode( $date_range_arr_join );
		}

		return $date_range_arr_join;
	}
	
}

/**
 *
 * @author arafat.dml@gmail.com
 * @package wl_remove_duplicate_from_multi_dimensional_arr
 * 
 * It will remove duplicate from multi dimensional arry
 * and @return Unique data 
 *
 */



if( !function_exists('wl_remove_duplicate_from_multi_dimensional_arr') ){

	function wl_remove_duplicate_from_multi_dimensional_arr( $multi_arr ){

		$unique_multi_dim_arr = array_map("unserialize", array_unique(array_map("serialize", $multi_arr)));

		return $unique_multi_dim_arr;
	}

}

if( !function_exists('is_ssl') )
{
	function is_ssl() {
		if ( isset( $_SERVER['HTTPS'] ) ) {
			if ( 'on' === strtolower( $_SERVER['HTTPS'] ) ) {
				return true;
			}

			if ( '1' == $_SERVER['HTTPS'] ) {
				return true;
			}
		} elseif ( isset( $_SERVER['SERVER_PORT'] ) && ( '443' == $_SERVER['SERVER_PORT'] ) ) {
			return true;
		}
		return false;
	}
}


// debug
// $str = "2022-04-1 - 2022-04-30";
// $res = wl_get_two_date_from_range($str);
// // pr( $res ); 
// $res = wl_get_date_range($res['start'], $res['end']);

// $res_arr = json_encode($res);

// pr($res_arr);

// die();

// end debug