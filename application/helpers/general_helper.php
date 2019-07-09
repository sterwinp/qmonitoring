<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * General Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Muthu
 */

// ------------------------------------------------------------------------

if ( ! function_exists('Print_array'))
{
	/**
	 * Print_array
	 * 
	 * This function is use to print the array in a understandable formate. 
	 * Like, key => val
	 *
	 * @param	string
	 * @param	array
	 * @param	mixed
	 * @return	mixed	depends on what the array contains
	 */
	function print_array($array, $exit = 0)
	{
		if(is_array($array)){
			echo "<pre>";
			print_r($array);
			echo "</pre>";
		}else if(is_object($array)){
			echo "This is Object";
		}else{
			echo "This function is use to print Array!!";
		}
		if( $exit 	==	1 )
		{
			exit();
		}
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('encode_json'))
{
	/**
	 * encode_json
	 * 
	 * This function is use to print the array in a understandable formate. 
	 * Like, key => val
	 *
	 * @param	string
	 * @param	array
	 * @param	mixed
	 * @return	mixed	depends on what the array contains
	 */
	function encode_json($array)
	{
		if(is_array($array)){
			return json_encode($array);
		}

		return FALSE;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('remove_prefix'))
{
    /**
     * remove_prefix
     *
     * This function is use to print the array in a understandable formate.
     * Like, key => val
     *
     * @param    string
     * @param    array
     * @param    mixed
     * @return    mixed    depends on what the array contains
     */
    function remove_prefix($array)
    {
        if(is_array($array))
        {
            $return_data = $a = array();
            foreach ($array as $key => $value)
            {
                if( is_array($value) )
                {
                    $return_data[$key] = remove_prefix($value);
                }
                else
                {
                    $return_data[ (strpos($key, "_") ? substr($key, (strpos($key, "_") + 1)) : $key)] = $value;
                }
            }
        }

        return $return_data;
    }


}



// ------------------------------------------------------------------------



// ------------------------------------------------------------------------




// ------------------------------------------------------------------------



// ------------------------------------------------------------------------




// ------------------------------------------------------------------------


if ( ! function_exists('inputvalidation'))
{
    /**
     * find user device 
     *
     * This function is use to identify the user devices
     *
     * @param    user_agent
     * out_put like mobile or tablet or computer
     */
    function inputvalidation( $data )
    {
        if( is_array( $data ) )
        {
            $validData  =   array();
            foreach ($data as $key => $value) 
            {
                $validData[ inputvalidation( $key ) ]   =   inputvalidation( $value );
            }
            return $validData;
        }
        else
        {
            //remove tag in input text
            $data = preg_replace( '/(<([^>]+)>)/', "", trim( $data ) );
            $validData = trim( htmlspecialchars( stripslashes( /*mysql_escape_string*/( $data ) ) ) );
            return $validData;
        }
    }

}

// require_once APPPATH.'third_party/php/Logger.php';
// Logger::configure(APPPATH.'third_party/config.xml');
// $logger = Logger::getLogger('LOG');
// $logger->info("Log4php initiated...");