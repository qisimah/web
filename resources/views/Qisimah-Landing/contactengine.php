<?php
require_once('ip2locationlite.class.php');

$locate = new ip2location_lite();
$locate->setKey('3c7b1944163849bb45adcd8e58697283eeef45e8e757f93821a769d8771a7079');
$location = $locate->getCity(get_client_ip());

$EmailFrom	 = "enquire@qisimah.com";
$EmailTo	 = "qisimah@gmail.com";
$Subject	 = "Interested in Qisimah";
$Name		 = trim( stripslashes( $_POST[ 'name' ] ) );
$Telephone	 = trim( stripslashes( $_POST[ 'telephone' ] ) );
$Email		 = trim( stripslashes( $_POST[ 'email' ] ) );
$Message	 = trim( stripslashes( $_POST[ 'message' ] ) );

// validation
$validationOK = true;
if ( !$validationOK ) {
	print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
	exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Telephone: ";
$Body .= $Telephone;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Location: ";
$Body .= $location['cityName'].', '.$location['regionName'].' - '.$location['countryName'];
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

// send email
$success = mail( $EmailTo, $Subject, $Body, "From: <$EmailFrom>" );
$success = mail( 'braasig@gmail.com', $Subject, $Body, "From: <$EmailFrom>" );

// redirect to success page
if ( $success ) {
	print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.html\">";
} else {
	print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}


// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
