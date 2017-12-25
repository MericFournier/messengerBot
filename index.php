<?php
echo 'contenu get: ';
echo '<pre>';
print_r($_GET);
echo '</pre>';

$bot = "5a3eda3de4b03718666a3275";
$token = "qwYLsCSz8hk4ytd6CPKP4C0oalstMnGdpDjF8YFHPHCieKNc0AfrnjVs91fGuH74";
$block = "5a3edbcbe4b037186673bf91";

$destinataire = $_GET['destinataire'];
$attribute = $_GET['attribute'];
$value = $_GET['value'];
$nvalue = str_replace(' ', '%20', $value);



$query = "https://api.chatfuel.com/bots/".$bot."/users/".$destinataire."/send?chatfuel_token=".$token."&chatfuel_block_id=".$block."&".$attribute."=".$nvalue;
echo $query;

function postBroadcast($query) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$query);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    curl_close ($ch);
    //if ( MODE == "preprod" || MODE == "debug" ) { $server_output = (object) array('result' => 'ok' , 'success' => true); }
    $server_output = json_decode($server_output);
    $result =  $server_output->result;
    if ( $result == "ok" ) {
      echo '{"redirect_to_blocks": ["success_contact"]}';
    }
    else {
      echo '{"redirect_to_blocks": ["error_contact"]}';
      var_dump($result);
    }
  }


  postBroadcast($query);
