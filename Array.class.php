<?php
##############################################################################################################
# 
# Collection of array functions
# Main purpose and function of this class is to display an array or object in a human readable format
# Methods in this class include
#	"display_heirarchy" - Displays the PHP array or object in a human readable format
#	"convert_object_to_array" - Converts a PHP object to an array
#
# Author: Todd D. Webb
# Contact: DukeOfMarshall@gmail.com
#
# Sites
#	http://www.dukeofmarshall.com
#	http://blog.dukeofmarshall.com
#	http://www.techwerks.tv
#	http://www.soundbytes.biz
#
##############################################################################################################

class Array_Functions {
	public $number_of_tabs 	= 3; # The default number of tabs to use when branching out
	private $counter 		= 0; # The counter to use for the number of tab iterations to use on the current branch
	
	public $display_square_brackets 	= TRUE; 
	public $display_squiggly_brackets 	= FALSE;
	public $display_parenthesis 		= FALSE;
	
	public $display_apostrophe	= TRUE;
	public $display_quotes		= FALSE;
	
	public function __construct(){
	}
	
	/**
	 * Displays the array in an organized heirarchy and even does so recursively
	 * 
	 * $array ARRAY - The array to display in a heirarchy
	 * 
	 * $key_bookends STRING - The character to place on either side of the array key when printed
	 * @@ square - Displays a set of square brackets around the key (DEFAULT)
	 * @@ squiggly - Displays a set of squiggly brackets around the key
	 * @@ parenthesis - Displays a set of parenthesis around the key
	 * @@ FALSE - Turns off the display of bookends around the array key
	 * 
	 * $key_padding STRING - The padding to use around the array key with printed
	 * @@ quotes - Pads the array key with double quotes when printed
	 * @@ apostrophe - Pads the array key with apostrophes when printed (DEFAULT)
	 * @@ FALSE - Turns off the display of padding around the array key
	 * 
	 * $number_of_tabs_to_use INT - The number of tabs to use when a sub array within the array creates a branch in the heirarchy
	 * 
	 */
	public function display_hierarchy($array, $key_bookends = '', $key_padding = '', $number_of_tabs_to_use = ''){
		# Convert the input to a JSON and then back to an array just to make sure we know what we're working with
		$array = $this->convert_object_to_array($array);
		
		# Test for JSON and if so, decode it to an associative array
		if(gettype($array) != 'array'){
			if(substr($array, 0, 1) == '{' || substr($array, 1, 1) == '{'){
				$array = json_decode($array, TRUE);
			}
		}
		
		# If the $array variable is still not an array, then error out.
		# We're not going to fool around with your stupidity
		if(gettype($array) != 'array'){
			echo 'Value submitted was '.strtoupper(gettype($array)).' instead of ARRAY or OBJECT. Only arrays or OBJECTS are allowed Terminating execution.';
			exit();
		}
		
		# Establish the bookend variables
		if($key_bookends != '' || !$key_bookends){
			if(strtolower($key_bookends) == 'square'){
				$this->display_square_brackets 		= TRUE;
				$this->display_squiggly_brackets 	= FALSE;
				$this->display_parenthesis 			= FALSE;
			}elseif(strtolower($key_bookends) == 'squiggly'){
				$this->display_square_brackets 		= TRUE;
				$this->display_squiggly_brackets 	= TRUE;
				$this->display_parenthesis 			= FALSE;
			}elseif(strtolower($key_bookends) == 'parenthesis'){
				$this->display_square_brackets 		= FALSE;
				$this->display_squiggly_brackets 	= FALSE;
				$this->display_parenthesis 			= TRUE;
			}elseif(!$key_bookends){
				$this->display_square_brackets 		= FALSE;
				$this->display_squiggly_brackets 	= FALSE;
				$this->display_parenthesis 			= FALSE;
			}
		}
		
		
		# Establish the padding variables
		if($key_padding != '' || !$key_padding){
			if(strtolower($key_padding) == 'apostrophe'){
				$this->display_apostrophe 	= TRUE;
				$this->display_quotes 		= FALSE;
			}elseif(strtolower($key_padding) == 'quotes'){
				$this->display_apostrophe 	= FALSE;
				$this->display_quotes 		= TRUE;
			}elseif(!$key_padding){
				$this->display_apostrophe 	= FALSE;
				$this->display_quotes 		= FALSE;
			}
		}		
		
		# Establish variable for the number of tabs
		if(isset($number_of_tabs_to_use) && $number_of_tabs_to_use != ''){
			$this->number_of_tabs = $number_of_tabs_to_use;
		}
		
		foreach($array as $key => $value){
			$this->insert_tabs();
			
			if(is_array($value)){
				echo $this->display_padding($key)." => {<BR>";
				
				$this->counter++;
				$this->display_hierarchy($value);
				$this->counter--;
				$this->insert_tabs();
				echo '} <BR>';
			}else{
				echo $this->display_padding($key)." => ".$value.'<BR>';
			}
		}
	}
	
	# Inserts tab spaces for sub arrays when a sub array triggers a branch in the heirarchy
	# Helps to make the display more human readable and easier to understand
	private function insert_tabs(){
		for($i=1; $i<=$this->counter; $i++){
			for($x=1; $x<=$this->number_of_tabs; $x++){
				echo '&emsp;';
			}
		}
	}
	
	# Takes a PHP object and converts it to an array
	# Works with single dimension and multidimensional arrays
	public function convert_object_to_array($object){
		$object = json_decode(json_encode($object), TRUE);
		return $object;
	}
	
	# Sets the displayed padding around the array keys when printed on the screen
	public function display_padding($value){
		$default_container = "['VALUE_TO_REPLACE']";
		
		$value = str_replace("VALUE_TO_REPLACE", $value, $default_container);
		
		if($this->display_square_brackets){
		}elseif($this->display_squiggly_brackets){
			$value = str_replace('[', '{', $value);
			$value = str_replace(']', '}', $value);
		}elseif($this->display_parenthesis){
			$value = str_replace('[', '(', $value);
			$value = str_replace(']', ')', $value);
		}else{
			$value = str_replace('[', '', $value);
			$value = str_replace(']', '', $value);
		}
		
		if($this->display_apostrophe){
		}elseif($this->display_quotes){
			$value = str_replace("'", '"', $value);
		}else{
			$value = str_replace("'", '', $value);
		}
		
		return $value;
	}
}

?>
