<?php
// --------------------------------------------
// | The EP-Dev Whois script        
// |                                           
// | Copyright (c) 2003-2006 EP-Dev.com :           
// | This program is distributed as free       
// | software under the GNU General Public     
// | License as published by the Free Software 
// | Foundation. You may freely redistribute     
// | and/or modify this program.               
// |                                           
// --------------------------------------------


/* ------------------------------------------------------------------ */
//	Global Class
//  Initializes and organizes all classes of the whois script as well
//	as general functions that may be used by multiple classes.
//	Date: 4/2/2006
/* ------------------------------------------------------------------ */

class EP_Dev_Whois_Global
{
	var $DOMAINS;
	var $ENGINE;
	var $DISPLAY;
	var $USER;
	var $CACHE;
	var $IMAGE;
	var $EMAILIMAGE;
	var $SECURITYIMAGE;

	var $TEMPLATES;
	var $CONFIG;

	var $ERROR;
	var $LOG;

	function EP_Dev_Whois_Global($absolute_path=null)
	{
		// +------------------------------
		//	Load templates
		// +------------------------------
		$this->ERROR = new EP_Dev_Whois_Error($this);


		// +------------------------------
		//	Load configuration
		// +------------------------------

		// include file
		$this->includeFile("config/config.php", $absolute_path);

		// initialize
		$this->CONFIG = new EP_Dev_Whois_Config();

		// set absolute path (if necessary)
		if (!empty($absolute_path) && $this->CONFIG->SCRIPT['absolute_path'] == "")
		{
			$this->CONFIG->SCRIPT['absolute_path'] = $absolute_path;
		}


		// +------------------------------
		//	Load templates
		// +------------------------------

		// include file
		$this->includeFile("config/template.php");

		// initialize
		$config = new EP_Dev_Whois_Templates();

		// assign to local member variables
		$this->TEMPLATES = $config->TEMPLATES;

		// destroy config object
		unset($config);


		// +------------------------------
		//	Load Display Class
		// +------------------------------

		// include file
		$this->includeFile($this->CONFIG->FILES['file']['display']);

		// initialize
		$this->DISPLAY = new EP_Dev_Whois_Display($this);


		// +------------------------------
		//	Load Domain Configuration
		// +------------------------------

		// include file
		$this->includeFile($this->CONFIG->FILES['file']['domains']);

		// initialize
		$this->DOMAINS = new EP_Dev_Whois_Domains($this);


		// +------------------------------
		//	Load Whois Engine
		// +------------------------------

		// include file
		$this->includeFile($this->CONFIG->FILES['file']['engine']);


		// +------------------------------
		//	Load User Class
		// +------------------------------

		// include file
		$this->includeFile($this->CONFIG->FILES['file']['user']);

		// initialize
		$this->USER = new EP_Dev_Whois_User($this, "EP_Dev_Whois_");


		// +------------------------------
		//	Load Cache Class
		// +------------------------------

		// include file
		$this->includeFile($this->CONFIG->FILES['file']['cache']);

		// initialize
		$this->CACHE = new EP_Dev_Whois_Cache($this);


		// +------------------------------
		//	Load Log Class
		// +------------------------------

		// include file
		$this->includeFile($this->CONFIG->FILES['file']['logs']);

		// initialize
		$this->LOG = new EP_Dev_Whois_Logs($this);


		// +------------------------------
		//	Load Image Class
		// +------------------------------

		// include file
		$this->includeFile($this->CONFIG->FILES['file']['image']);

		// initialize
		$this->IMAGE = new EP_Dev_Whois_Image($this);


		// +------------------------------
		//	Load Email Image Class
		// +------------------------------

		// include file
		$this->includeFile($this->CONFIG->FILES['file']['emailimage']);

		// initialize
		$this->EMAILIMAGE = new EP_Dev_Whois_EMAILImage($this);


		// +------------------------------
		//	Load Security Image Class
		// +------------------------------

		// include file
		$this->includeFile($this->CONFIG->FILES['file']['securityimage']);

		// initialize
		$this->SECURITYIMAGE = new EP_Dev_Whois_SecurityImage($this);


		// +------------------------------
		//	Reload All Cores (PHP < 5.x)
		// +------------------------------
		/* (old, should be fixed)
		$this->ERROR->reloadCore($this);
		$this->DOMAINS->reloadCore($this);
		$this->DISPLAY->reloadCore($this);
		$this->USER->reloadCore($this);
		$this->LOG->reloadCore($this);
		$this->CACHE->reloadCore($this);
		// again for error
		$this->ERROR->reloadCore($this);
		*/
	}


	/* ------------------------------------------------------------------ */
	//	Include File
	//	Includes file found in $path. Verbose error if not $silent
	/* ------------------------------------------------------------------ */
	
	function includeFile($file, $path = null, $silent = false)
	{
		// load default path if not path given
		if ($path === null && is_object($this->CONFIG))
		{
			$path = $this->CONFIG->SCRIPT['absolute_path'];

			// detect path if empty
			if (empty($path))
				$path = dirname(__FILE__) . "/";
		}

		$fileExists = file_exists($path . $file);

		// silently return false if error
		if (!$fileExists && $silent)
		{
			return false;
		}

		// error and error if verbose
		elseif (!$fileExists)
		{
			$this->ERROR->stop("bad_include: {$path}{$file}");
			return false;
		}

		// assume success
		else
		{
			include_once($path . $file);

			return true;
		}
	}


	/* ------------------------------------------------------------------ */
	//	Whois Request
	//	Generates new whois request object and returns resource identifier.
	/* ------------------------------------------------------------------ */
	
	function whoisRequest($domain, $ext)
	{
		// error if extension not available
		if (!in_array($ext, $this->DOMAINS->getAllExtensions()))
			$this->ERROR->stop("bad_extension:::{$ext}");

		// return new whois request object
		return new EP_Dev_Whois_Engine($domain, $ext, $this);
	}


	/* ------------------------------------------------------------------ */
	//	Convert Currency
	//	Converts number into a formatted currency string
	/* ------------------------------------------------------------------ */
	
	function currencyConvert($number)
	{
		/*
		Acceptable values here: "us", "uk", "eu", "custom:s:d:ds:ts".
		EX: Setting it to = "us" will output 10 as $10.00
			Setting it to = "uk" will output 10 as �10.00
			Setting it to = "eu" will output 10 as �10,00
			Using the custom is as follows: "custom:sign:decimals:decimal sign:thousands sign".
			Thus, if we decided to custom set UK currency (this is just example, please use "uk")
				then it would look like "custom:�:2:.:," as a custom setting. This allows for one
				to setup the whois script to use any currency.
		*/

		// ensure number is type double
		$number = floatval($number);

		// if currency format available, format number
		if (!empty($this->CONFIG->BUYMODE['CONFIG']['currency_format']))
		{
			switch($this->CONFIG->BUYMODE['CONFIG']['currency_format'])
			{
				case "us": $converted_string = "\$".number_format($number, 2);
					break;

				case "uk": $converted_string = "&pound;".number_format($number, 2);
					break;
				
				case "eu": $converted_string = "&euro;".number_format($number, 2, ",",".");
					break;
				
				default :
						$values = explode(":", $this->CONF['currency']);
						$converted_string = $values[1].number_format($number, $values[2], $values[3], $values[4]);
			}
		}

		// return number of no format available
		else
		{
			$converted_string = $number;
		}

		// return formatted number with prepended currency string
		return ($this->CONFIG->BUYMODE['CONFIG']['currency_string'] . $converted_string);
	}
}



/* ------------------------------------------------------------------ */
//	Error Handle Class
//  Handles errors of script
/* ------------------------------------------------------------------ */

class EP_Dev_Whois_Error
{
	var $CORE;

	function EP_Dev_Whois_Error(&$global)
	{
		$this->reloadCore($global);
	}


	function reloadCore(&$global)
	{
		$this->CORE =& $global;
	}


	/* ------------------------------------------------------------------ */
	//	Stop with $code
	//  Dies with error ouput
	/* ------------------------------------------------------------------ */

	function stop($code)
	{
		$this->kill($this->go($code));
	}


	/* ------------------------------------------------------------------ */
	//	Go $code
	//  Returns textual error based on $code
	/* ------------------------------------------------------------------ */
	
	function go($error_code)
	{
		// support for error variables
		$code = explode(":::", $error_code);

		if (isset($this->CORE->CONFIG->SCRIPT['ERRORS'][$code[0]]))
			$return_text = $this->CORE->CONFIG->SCRIPT['ERRORS'][$code[0]];
		else
			$return_text = $this->CORE->CONFIG->SCRIPT['ERRORS']['default'];


		// match all var data
		$number_matched = preg_match_all("/\[\[DATA-([0-9]+)\]\]/", $return_text, $matches);

		// replace with error data
		for($i=0; $i<$number_matched; $i++)
		{
			// only if variable exists
			if (isset($code[$matches[1][$i]]))
			{
				$return_text = str_replace("[[DATA-{$matches[1][$i]}]]", $code[$matches[1][$i]], $return_text);
			}
		}

		return $return_text;
	}


	/* ------------------------------------------------------------------ */
	//	Kill with $error
	//  dies with textual $error
	/* ------------------------------------------------------------------ */
	
	function kill($error)
	{
		// +------------------------------
		//	So, you want to modify the error function? Good idea! No one likes
		//	the fact that this script exits and stops your other good PHP code.
		//	I have incorporated some secret options below that you can use. If 
		//	you are using PHP 4, enable the $trigger_error variable below and 
		//	setup your own error handler (check php.net).
		//
		//	If you are using PHP 5, enable the $throw_exception variable and 
		//	use the try { } catch() { } syntax to catch these errors. You will
		//	also need to uncomment the throw new... line
		//
		//	In any case, the error triggered is ep_dev_whois__error .
		// +------------------------------


		// +------------------------------
		//	Trigger Error (PHP 4.x and 5.x)
		//	Allows for more error control if using
		//	a custom error handler.
		// +------------------------------
		$trigger_error = false;

		// +------------------------------
		//	Throw Exception (PHP 5.x)
		//	Throws an exception that can be 
		//	caught and handled within code.
		// +------------------------------
		$throw_exception = false;


		if (is_object($this->CORE->DISPLAY))
		{
			$this->CORE->DISPLAY->constructPage("error", "", "");
			$this->CORE->DISPLAY->customParse("error", $error);
			$this->CORE->DISPLAY->displayPage();
		}
		else
		{
			echo "ERROR: " . $error;
		}

		
		if ($trigger_error)
		{
			trigger_error("ep_dev_whois__error", E_USER_ERROR);
		}
		elseif ($throw_exception)
		{
			//throw new Exception("ep_dev_whois__error");
		}
		else
		{
			die();
		}
	}
}