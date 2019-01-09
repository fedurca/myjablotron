<?php
/* 
 * Class MyJablotron - JA100
 * Michal Hajek <michal@hajek.net>
 * 27.1.2018
 */

include('myjablotron.class.php');

define('MY_COOKIE_FILE', '/tmp/cookies.txt'); // curl store cookies

$config = parse_ini_file("config.ini");
$MyUsername = $config['username'];
$MyPassword = $config['password'];
$MyPIN = $config['pin'];

$debug = $config['debug'];
$localsource = $config['localsource'];

$ja100 = new MyJablotron($MyUsername, $MyPassword, $localsource);

$ja100->debug($debug, 'php://stdout'); // print curl response to STDOUT

if($ja100->login() == true) {
	/*
	 *  Login success
	 */

	/* 
	 * Get section on all keyboards
	 */
	// $arrayOutput = $ja100->getKeyboards();
	// print_r($arrayOutput);

	/* 
	 * Get status of section name STATE_3 - lock or unlock
	 */
	// $lock = $ja100->checkStatusSection('STATE_3');
	// var_dump($lock); // true => lock, false => unlock

	/*
	 * Lock section name STATE_3
	 */
	// $success = $ja100->lock('STATE_3', $MyPIN);
	// var_dump($success);

	/*
	 * Lock bypass section name STATE_3
	 */
	// $success = $ja100->lockBypass('STATE_3', $MyPIN);
	// var_dump($success);
	
	/*
	 * Unlock section name STATE_3
	 */
	// $success = $ja100->unlock('STATE_3', $MyPIN);
	// var_dump($success);

	/*
	 * Get PGM output
	 */
	// $arrayPGM = $ja100->getPGM();
	// print_r($arrayPGM);

	/*
	 * Send signal to PGM output (open or close garage doors)
	 */
	// $success = $ja100->sendPGMSignal('PGM_1', $MyPIN);
	// var_dump($success);
	
	/*
	 * Get history
	 */
	$arrayOutput = $ja100->getEnergy();
	print_r($arrayOutput);
	
	echo $arrayOutput[0]['total'];
}
else {
	/*
	 * Login fail  
	 */
	echo $ja100->getErrors()[0]."\n";
	exit(1);
}


?>
