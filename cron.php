<?php

// reccupérer le json des taches à envoyer depuis verify altervista

// Instantiate curl
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://serveurmericfournier1.altervista.org/cleverbot/verify/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
curl_close($curl);

// Json decode
$result = json_decode($result);

echo '<pre>';
print_r($result);
echo '</pre>';

if ( !empty($result) ) {

  // envoyer une requête vers la page d'envoi index.php
  //



function postBroadcast($query) {
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL,$query);
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $server_output = curl_exec ($ch);
   curl_close ($ch);
}

foreach ($result as $_result) {

  $value = $_result->value;
  $nvalue = str_replace(' ', '%20', $value);
  $attribute = $_result->attribute;
  $destinataire = $_result->messenger;
  $id = $_result->key;

  if ( $id == 1 ) {
    echo 'already';
  }
  else {

  $query = "https://afternoon-brook-32181.herokuapp.com/?destinataire=".$destinataire."&attribute=".$attribute."&value=".$nvalue;
  echo $query.'</br>';
   postBroadcast($query);

  $query2 = "http://serveurmericfournier1.altervista.org/cleverbot/remove/inex.php?key=".$id;
  echo $query2;
  postBroadcast($query2);
}
}





}
