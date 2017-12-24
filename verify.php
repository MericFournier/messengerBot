<?php

define('DB_HOST','localhost');
define('DB_NAME','my_serveurmericfournier1');
define('DB_USER','root');
define('DB_PASS','root');

define('ECART',29);

try
{
   // Try to connect to database
   $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

   // Set fetch mode to object
   $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch (Exception $e)
{
   // Failed to connect
   die('Could not connect');
}
$bot = "5a3eda3de4b03718666a3275";
$token = "qwYLsCSz8hk4ytd6CPKP4C0oalstMnGdpDjF8YFHPHCieKNc0AfrnjVs91fGuH74";
$block = "5a3edbcbe4b037186673bf91";

$date = new DateTime();
$actual_time = $date->getTimestamp();
$mintime = $actual_time-ECART;
$maxtime = $actual_time+ECART;
echo $actual_time.'</br>';
echo $mintime.'</br>';
echo $maxtime.'</br>';

// reccuperation du contenu de la base de donnée
$query = $pdo->query('SELECT * FROM test');
$tasks = $query->fetchAll();
$send = array();
//echo '<pre>';
//print_r($tasks);
//echo '</pre>';

foreach ( $tasks as $task ) {
    $date = new DateTime();
	$date->setTimestamp($task->timestamp);
	echo $date->format('U = Y-m-d H:i:s') . "\n";
    echo '</br>';
    if ( $mintime < $task->timestamp && $task->timestamp < $maxtime ) {
    	echo 'lui cest ok';
    	// Instantiate curl
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'https://afternoon-brook-32181.herokuapp.com/?destinataire='.$task->messenger.'&attribute='.$task->attribute.'&value='.$task->value);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($curl);
		curl_close($curl);
        echo 'https://afternoon-brook-32181.herokuapp.com/?destinataire='.$task->messenger.'&attribute='.$task->attribute.'&value='.$task->value;
        echo '</br>';
        var_dump($result);

    }
}

echo '<pre>';
print_r($send);
echo '</pre>';
