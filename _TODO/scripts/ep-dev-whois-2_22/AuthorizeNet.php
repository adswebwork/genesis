<?php

/*** USAGE ****************************************************************/
/*
  $trans = new ex_trans_AuthorizeNet(transaction mode, user data,
                                     transaction data [, debug]);
                               
  $trans->doTrans();    // run the transaction
  $trans->getStatus();  // get the status of the transaction
  $trans->getMessage(); // get the message about the transaction
  $trans->dumpTrans();  // debugging dump of the transaction

  transaction mode is one of the following:

    EX_TRANS_AUTHORIZENET_AUTHCAPTURE for auth-capture transactions
    EX_TRANS_AUTHORIZENET_AUTHONLY for authorize-only transactions
    EX_TRANS_AUTHORIZENET_PRIORAUTHCAPTURE for prior authorized transactions
    EX_TRANS_AUTHORIZENET_CAPTUREONLY for capture funds only transactions
    EX_TRANS_AUTHORIZENET_CREDIT to issue credits (REQUIRES PASSWORD)
    EX_TRANS_AUTHORIZENET_VOID to issue void (REQUIRES PASSWORD)

  * denotes required field
  + denotes recommended field

  user data is an associative array that can contain the following fields:

    * first_name = First name of customer.
    * last_name = Last name of customer.
      company = Company name.
    + addr_1 = First address line for AVS.
    + city = City for AVS.
    + state = State for AVS.
    + zip = Zipcode for AVS.
      country = Country on card for AVS.
      fax = Fax number for AVS.
    + phone = Phone number for AVS.
    * custid = Unique customer ID.
	
  transaction data is an associative array that can contain the following:

    * amount = amount to charge.
    * ccnum = card number.
    * descr = transaction description.
    * ccexp = expiration date in mmyy, mm/yy, or mm/yyyy format
    * userid = Authorizenet username
      invoice = invoice number for transaction.

  getStatus returns one of the following values:

    EX_TRANS_FAILURE  = Failure during transaction
    EX_TRANS_DECLINED = Transaction was declined
    EX_TRANS_APPROVED = Transaction was approved
    EX_TRANS_NOTRUN   = Transaction has not been run
 
 */

/**************************************************************************/
/*** CONSTANTS ************************************************************/
/* operation type constants, determines the operation to preform */

define("EX_TRANS_AUTHORIZENET_AUTHCAPTURE", 1);
define("EX_TRANS_AUTHORIZENET_AUTHONLY", 2);
define("EX_TRANS_AUTHORIZENET_PRIORAUTHCAPTURE", 3);
define("EX_TRANS_AUTHORIZENET_CAPTUREONLY", 4);
define("EX_TRANS_AUTHORIZENET_CREDIT", 5);
define("EX_TRANS_AUTHORIZENET_VOID", 6);

/* pass in this constant as the fourth constructor to enable test mode
   for the transaction */

define("EX_TRANS_AUTHORIZENET_TESTMODE", 1);

/* define the constants indicating success/failure */

define("EX_TRANS_FAILURE", 3);
define("EX_TRANS_DECLINED", 2);
define("EX_TRANS_APPROVED", 1);
define("EX_TRANS_NOTRUN", -1);

/**************************************************************************/
/*** CLASSES **************************************************************

/* begin ex_trans_AuthorizeNet */
class ex_trans_AuthorizeNet
{

  /* store the configuration array */

  var $config = array("curl" => "/usr/bin/curl");

  /* hold the authorization mode */
  var $authorize_mode;

  /* hold the user_data associative array */
  var $user_data;

  /* hold the transaction data associative array */
  var $trans_data;

  /* hold the testing flag */
  var $testing;
  
  /* hold the authresult */
  var $auth_result = -1;

  /*****
   * ex_trans_AuthorizeNet constructor(mode, userdata, transdata [, debug])
   *
   * creates a new authorize.net transaction
   */

  function ex_trans_AuthorizeNet($mode, $user_data, $trans_data, $debug=0)
  {
    /* set initial values */
    $this->mode = $mode;
    $this->user_data = $user_data;
    $this->trans_data = $trans_data;
    $this->testing = $debug;
  } /* end constructor ex_trans_AuthorizeNet */

  /*****
   * string convertUserData()
   *
   * converts all relevant, supplied information into a query string
   * suitable for curl
   */

  function convertUserData()
  {

    /* output string is empty initially */
    $output = "";

    /* go ahead and hold the user data */
    $userdata = $this->user_data;

    /* hold the keys in the user data */
    $keys = array_keys($userdata);

    /* loop through the keys */
    foreach($keys as $key)
    {

      /* switch on the keys */
      switch ($key)
      {
        case "first_name":
          $output .= "&x_First_Name=" . $this->scrub($userdata[$key]);
        break;

        case "last_name":
          $output .= "&x_Last_Name=" . $this->scrub($userdata[$key]);
        break;

        case "addr_1":
          $output .= "&x_Address=" . $this->scrub($userdata[$key]);
        break;

        case "city":
          $output .= "&x_City=" . $this->scrub($userdata[$key]);
        break;

        case "company":
          $output .= "&x_Company=" . $this->scrub($userdata[$key]);
        break;

        case "country":
          $output .= "&x_Country=" . $this->scrub($userdata[$key]);
        break;

        case "fax":
          $output .= "&x_Fax=" . $this->scrub($userdata[$key]);
        break;

        case "phone":
          $output .= "&x_Phone=" . $this->scrub($userdata[$key]);
        break;

        case "state":
          $output .= "&x_State=" . $this->scrub($userdata[$key]);
        break;

        case "zip":
          $output .= "&x_Zip=" . $this->scrub($userdata[$key]);
        break;

        case "custid":
          $output .= "&x_Cust_ID=" . $this->scrub($userdata[$key]);
        break;

      } /* end switch */

    } /* end foreach */

    return $output;

  } /* end convertUserData() */

  /*****
   * string convertTransData()
   *
   * converts all relevant transaction data into the string suitable for
   * curl
   */

  function convertTransData()
  {

    /* output string is initially blank */
    $output = "";
    /* grab the transdata information and the keys */

    $transdata = $this->trans_data;
    $keys = array_keys($transdata);

    /* loop through the keys */
    foreach($keys as $key)
    {
      /* switch on the keys */
      switch ($key)
      {

        case "amount":
          $output .= "&x_Amount=" . $this->scrub($transdata[$key]);
        break;

        case "ccnum":
          $output .= "&x_Card_Num=" . $this->scrub($transdata[$key]);
        break;

        case "descr":
          $output .= "&x_Description=" . $this->scrub($transdata[$key]);
        break;

        case "ccexp":
          $output .= "&x_Exp_Date=" . $this->scrub($transdata[$key]);
        break;

        case "invoice":
          $output .= "&x_Invoice_Num=" . $this->scrub($transdata[$key]);
        break; 

      } /* end switch */

    } /* end foreach */

    return $output;

  } /* convertTransData() */

  /*****
   * mixed scrub($data)
   *
   * scrubs the data for inclusion in the URL, subbed out here so additional
   * authorize-specific munging can be included later
   */

  function scrub($data)
  {
    return addslashes($data); 
  } /* end scrub() */

  /*****
   * void doTrans()
   *
   * Runs the authorize.net transaction
   */

  function doTrans()
  {

   /* get the information ready for curl */

    $config = $this->config;
    $transdata = $this->convertTransData();
    $userdata = $this->convertUserData();
    $authnetid = $this->trans_data['userid'];
    $authnetkey = $this->trans_data['tran_key'];
//echo "------------" . $authnetkey . "<br/><br/><br/>";
    /* make sure we set the transaction mode */
    switch($this->mode)
    {
      case EX_TRANS_AUTHORIZENET_AUTHCAPTURE:
        $mode = "AUTH_CAPTURE";
      break;

      case EX_TRANS_AUTHORIZENET_AUTHONLY:
        $mode = "AUTH_ONLY";
      break;

      case EX_TRANS_AUTHORIZENET_CAPTUREONLY:
        $mode = "CAPTURE_ONLY";
      break;

      case EX_TRANS_AUTHORIZENET_CREDIT:
        $mode = "CREDIT";
      break;

      case EX_TRANS_AUTHORIZENET_VOID:
        $mode = "VOID";
      break;

      case EX_TRANS_AUTHORIZENET_PRIORAUTHCAPTURE:
        $mode = "PRIOR_AUTH_CAPTURE";
      break;

    } /* end switch */

    /* enable or disable testing/debugging */

    if ($this->testing == 1)
    {
      $testreq = "TRUE";
    }
    else
    {
      $testreq = "FALSE";
    }

    /* run the Curl, storing results in the authResult */

    exec($config['curl'] . " -d 'x_ADC_Delim_Data=TRUE&x_ADC_URL=FALSE&" .
    "x_Customer_IP=". $GLOBALS['HTTP_SERVER_VARS']['REMOTE_ADDR'] .
    "&x_Method=CC&x_Version=3.1&x_Type=$mode&x_Test_Request=$testreq" .
    "&x_tran_key=$authnetkey&x_login=$authnetid" . $transdata . $userdata .
    "' https://secure.authorize.net/gateway/transact.dll", $ret);

    $this->auth_result = split("\,", $ret[0]);

  } /* end doTrans */

  /*****
   * string dumpTrans()
   *
   * dump out the transaction result
   */

  function dumpTrans()
  {
    /* check to see if we have been run */
    if ($this->auth_result == -1)
      return "WARNING: Transaction has not been executed!";

    /* prefix output */
    $output = "<pre>\n";

    /* loop through output */
    for ($idx = 0; $idx < sizeof($this->auth_result); $idx++)
    {
      $output .= "auth_ret[$idx] => '" . $this->auth_result[$idx] . "'\n";
    }

    /* end output */
    $output .= "\n</pre>";

    /* return */
    return $output; 

  } /* end dumpTrans() */

  /*****
   * string getMessage()
   *
   * gets the message associated with the transaction
   */

  function getMessage()
  {
    if ($this->getStatus() != EX_TRANS_NOTRUN && $this->auth_result != -1)
    {
      return $this->auth_result[3];
    }
    else
    {
      return "WARNING: Transaction has not been executed";
    }
  } /* end getMessage() */

 /*****
   * string getReciept()
   *
   * returns a string describing the transaction, suitable for adding to
   * note fields in databases
   */

  function getReciept()
  {
    $data = $this->auth_result;

    if ($this->getStatus() == EX_TRANS_NOTRUN)
      $output = "Transaction has not been executed.";
    else
    {
      $output = "Transaction ID: " . $data[6] . "\n";
      $output = "Reciept Date: " . date("D M j G:i:s T Y") . "\n";
      $output .= "Response Code (Subcode): " . $data[0] . "(" . $data[1] .
         ")\n";
      $output .= "Reason Code: " . $data[2] . "(" . $data[3] . ")\n";
      $output .= "Amount: " . $data[9] . "\n";
      $output .= "Auth/AVS Code: " . $data[4] . "/" . $data[5] . "\n";
      $output .= "MD5 Hash: " . $data[37] . "\n";
    }

    return $output;
      
  } /* end getReciept() */

  /*****
   * int getStatus()
   *
   * returns the global indicatin the status of the transaction
   */
  function getStatus()
  {
    if ($this->auth_result == -1)
    {
      return EX_TRANS_NOTRUN;
    }
    if ($this->auth_result[0] == 1)
    {
      return EX_TRANS_APPROVED;
    }
    elseif ($this->auth_result[0] == 2)
    {
      return EX_TRANS_DECLINED;
    }
    elseif ($this->auth_result[0] == 3)
    {
      return EX_TRANS_FAILURE;
    }
    else
    {
      return EX_TRANS_FAILURE;
    }
  } /* end isValid() */

} /* end class ex_trans_AuthorizeNet */

/**************************************************************************/

/* $Id: excerpo-authorizenet.php,v 1.1 2001/12/17 18:29:54 jchum Exp $ */
?>
