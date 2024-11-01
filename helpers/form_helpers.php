<?php

if(!function_exists("spacs_form_main_div")){
	function spacs_form_main_div(){
		return '<div class="float_left containers top-20">';
	}
}

if(!function_exists("spacs_form_main_div_end")){
	function spacs_form_main_div_end(){
		return '</div>';
	}
}

if(!function_exists("spacs_form_heading")){
	function spacs_form_heading($html_tag = false, $heading = ''){
		$use_heading = '';

		esc_html( $html_tag );

		if( $html_tag ){
			$use_heading .= "<$html_tag>".$heading."</$html_tag>";
		}
		return $use_heading;
	}
}

if( !function_exists("spacs_form_open") ){
	function spacs_form_open($action='', $method='POST', $enctype='false', $id='', $class='contact', $new_window = false)
	{
		if( $enctype ){
			$enctype = "multipart/form-data";
		}

		if( $new_window ){
			$new_window = "target='_blank'";
		}

		return "<form action='{$action}' method='{$method}' enctype='{$enctype}' id='{$id}' class='{$class}' $new_window>\n";
	}
}

if( !function_exists("spacs_form_close") ){

	function spacs_form_close(){
		return "</from>\n";
	}

}

if( !function_exists("spacs_form_submit") ){
	function spacs_form_submit($name, $cls='')
	{
		$use_class = "btn btn_color submit_btn ";
		if( $cls ){
			$use_class .= $cls;
		}
		$class = "class='{$use_class}'";

		$input = "<input type='submit' $name  tabindex='1' $class> \n";

		return $input;
	}
}

if( !function_exists("spacs_form_file") ){
	function spacs_form_file($name, $is_required = '', $is_label_name = '')
	{
		# we will store the html here
		$input = '';
		$name_field  = "name='".$name."'"; 
		$value       = "value ='". $value . "'";
		$label_for   = "for = '".$name."'";
		
		# label Name
		$label_name  = ucwords( str_replace("_", " ", $name) );
		if( $is_label_name ){
		    $label_name  = $is_label_name;
		}

		# require
		$required = "";
		if( $is_required ){
		    $required = "required='true'";
		}
		
		$input .=  "<label $label_for><strong>$label_name<strong></label> \n";
		$input .= "<input type='text' $name_field $required tabindex='1'> \n";

		return $input;
	}
}

if( !function_exists("spacs_form_input") ){
	function spacs_form_input($name, $value = '', $is_required = '', $is_label_name = '', $is_place_holder = '')
	{
	    # we will store the html here
	    $input = '';
	    $name_field  = "name='".$name."'"; 
	    $value       = "value ='". $value . "'";
	    $label_for   = "for = '".$name."'";
	    
	    # label Name
	    $label_name  = ucwords( str_replace("_", " ", $name) );
	    if( $is_label_name ){
	        $label_name  = $is_label_name;
	    }

	    
	    # place_holder
	    $place_holder = "placeholder ='". str_replace("_", " ", $name) . "'";

	    if($is_place_holder){
	        $place_holder = "placeholder ='". $is_place_holder . "'";
	    }

	    # require
	    $required = "";
	    if( $is_required ){
	        $required = "required='true'";
	    }
	    
	    $input .=  "<label $label_for><strong>$label_name<strong></label> <br/> \n";
	    $input .= "<input type='text' $name_field  $place_holder $value $required tabindex='1'> \n";

	    return $input;

	}
}

if( !function_exists("spacs_form_input_email") ){
	function spacs_form_input_email($name, $value = '', $is_required = '', $is_label_name = '', $is_place_holder = '')
	{
	    # we will store the html here
	    $input = '';
	    $name_field  = "name='".$name."'"; 
	    $value       = "value ='". $value . "'";
	    $label_for   = "for = '".$name."'";
	    
	    # label Name
	    $label_name  = ucwords( str_replace("_", " ", $name) );
	    if( $is_label_name ){
	        $label_name  = $is_label_name;
	    }

	    
	    # place_holder
	    $place_holder = "placeholder ='". str_replace("_", " ", $name) . "'";

	    if($is_place_holder){
	        $place_holder = "placeholder ='". $is_place_holder . "'";
	    }

	    # require
	    $required = "";
	    if( $is_required ){
	        $required = "required='true'";
	    }
	    
	    $input .=  "<label $label_for><strong>$label_name<strong></label> <br/> \n";
	    $input .= "<input type='email' $name_field  $place_holder $value $required tabindex='1'> \n";

	    return $input;

	}
}

if( !function_exists( "spacs_form_input_number" ) ){
	function spacs_form_input_number($name, $value = '', $is_required = '', $is_label_name = '', $is_place_holder = '')
	{
	    # we will store the html here
	    $input = '';
	    $name_field  = "name='".$name."'"; 
	    $value       = "value ='". $value . "'";
	    $label_for   = "for = '".$name."'";
	    
	    # label Name
	    $label_name  = ucwords( str_replace("_", " ", $name) );
	    if( $is_label_name ){
	        $label_name  = $is_label_name;
	    }

	    
	    # place_holder
	    $place_holder = "placeholder ='". str_replace("_", " ", $name) . "'";

	    if($is_place_holder){
	        $place_holder = "placeholder ='". $is_place_holder . "'";
	    }

	    # require
	    $required = "";
	    if( $is_required ){
	        $required = "required='true'";
	    }
	    
	    $input .=  "<label $label_for><strong>$label_name<strong></label> \n";
	    $input .= "<input type='number' $name_field  $place_holder $value $required tabindex='1'> \n";

	    return $input;

	}
}


if( !function_exists("spacs_form_date_range") ){

	function spacs_form_date_range($name, $value = '', $is_required = '', $is_label_name = '', $is_place_holder = '')
	{

	    # we will store the html here
	    $input = '';
	    $name_field  = "name='".$name."'"; 
	    $value       = "value ='". $value . "'";
	    $label_for   = "for = '".$name."'";
	    
	    # label Name
	    $label_name  = ucwords( str_replace("_", " ", $name) );
	    if( $is_label_name ){
	        $label_name  = $is_label_name;
	    }

	    
	    # place_holder
	    $place_holder = "placeholder ='". str_replace("_", " ", $name) . "'";

	    if($is_place_holder){
	        $place_holder = "placeholder ='". $is_place_holder . "'";
	    }

	    # require
	    $required = "";
	    if( $is_required ){
	        $required = "required='true'";
	    }

	    $class = "class='date_range_picker'";
	    
	    $input .=   "<label $label_for><strong>$label_name<strong></label> \n";
	    $input .=  "<input type='text' $name_field  $class $place_holder $value $required tabindex='1'> \n";

	    return $input;

	}

}


if( !function_exists("spacs_form_textarea") ){
	function spacs_form_textarea( $name, $value = '', $is_required = '', $is_label_name = '', $is_place_holder = '' )
	{
	    # we will store the html here
	    $input = '';
	    $name_field  = "name='".$name."'"; 
	    if($value){
	        $value       = $value;
	    }else{
	        $value = NULL;
	    }
	    
	    $label_for   = "for = '".$name."'";
	    
	    # label Name
	    $label_name  = ucwords( str_replace("_", " ", $name) );
	    if( $is_label_name ){
	        $label_name  = $is_label_name;
	    }

	    # require
	    $required = "";
	    if( $is_required ){
	        $required = "required='true'";
	    }

	    
	    # place_holder
	    $place_holder = "placeholder ='". str_replace("_", " ", $name) . "'";

	    if($is_place_holder){
	        $place_holder = "placeholder ='". $is_place_holder . "'";
	    }

	    $input .=   "<label $label_for><strong>$label_name<strong></label> \n";
	    $input .= "<textarea  $name_field  $place_holder $required tabindex='1'>$value</textarea> \n";

	    return $input;

	}
}


if( !function_exists("spacs_form_option") ){

	function spacs_form_option( $name, $options = array(), $value = '', $is_required = '', $is_label_name = '', $is_place_holder = '' ){

	    # we will store the html here
	    $input = '<div>';
	    $name_field  = "name='".$name."'"; 
	    $label_for   = "for = '".$name."'";
	    
	    # label Name
	    $label_name  = ucwords( str_replace("_", " ", $name) );
	    if( $is_label_name ){
	        $label_name  = $is_label_name;
	    }


	    # require
	    $required = "";
	    if( $is_required ){
	        $required = "required='true'";
	    }
	    
	    $input .=  "<label $label_for><strong>$label_name<strong></label> <br/>\n";
	    $input .= "<select $name_field $required tabindex='1'>\n";
	    // $input .= "<option value=''>--select one--</option>\n";

	    if($options){
	        foreach($options as $k => $option){
	            if($k == $value){
	                $input .= "<option value='".$k."' selected>".$option."</option>\n";
	            }else{
	                $input .= "<option value='".$k."'>".$option."</option>\n";  
	            }
	           
	        }
	    }
	    $input .= "</select> </div>\n";

	    return $input;

	}

}

if( !function_exists("spacs_form_radio") ){
	function spacs_form_radio($name, $value = '', $is_required = '', $is_label_name = '')
	{

	    # we will store the html here
	    $input = '';
	    $name_field  = "name='".$name."'";
	    $value       = "value ='". $value . "'";
	    $label_for   = "for = '".$name."'";
	    
	    # label Name
	    $label_name  = ucwords( str_replace("_", " ", $name) );
	    if( $is_label_name ){
	        $label_name  = $is_label_name;
	    }

	    # require
	    $required = "";
	    if( $is_required ){
	        $required = "required='true'";
	    }
	    
	    $input .=   "<label $label_for><strong>$label_name<strong></label> \n";
	    $input .=  "<input type='radio' $name_field $value $required tabindex='1'> \n";

	    return $input;
	}
}

if( !function_exists("spacs_form_checkbox") ){
	function spacs_form_checkbox($name, $value = '', $is_required = '', $is_label_name = '')
	{
	    # we will store the html here
	    $input = '';
	    $name_field  = "name='".$name."'";
	    $value       = "value ='". $value . "'";
	    $label_for   = "for = '".$name."'";
	    
	    # label Name
	    $label_name  = ucwords( str_replace("_", " ", $name) );
	    if( $is_label_name ){
	        $label_name  = $is_label_name;
	    }

	    # require
	    $required = "";
	    if( $is_required ){
	        $required = "required='true'";
	    }
	    
	    $input .=   "<label $label_for><strong>$label_name<strong></label> \n";
	    $input .=  "<input type='checkbox' $name_field $value $required tabindex='1'> \n";

	    return $input;
	}
}
