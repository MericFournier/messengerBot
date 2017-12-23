<?php
echo 'contenu get: ';
echo '<pre>';
print_r($_GET);
echo '</pre>';

$bot = $_GET['bot'];
$destinataire = $_GET['destinataire'];
$block = $_GET['block'];
$token = $_GET['token'];
$attribute = $_GET['attribute'];
$value = $_GET['value'];



$query = "https://api.chatfuel.com/bots/".$bot."/users/".$destinataire."/send?chatfuel_token=".$token."&chatfuel_block_name=".$block."&".$attribute."=".$value;
echo $query;
