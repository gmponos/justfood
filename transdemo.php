<?php
require("gtranslate/GTranslate.php");

 try{
       $gt = new Gtranslate;
       echo "Translating [Hello World] from English to German => ".$gt->english_to_german("hello world")."<br/>";
        echo "Translating [Ciao mondo] Italian to English => ".$gt->it_to_en("Ciao mondo")."<br/>";
 } catch (GTranslateException $ge)
 {
       echo $ge->getMessage();
 }
?>
<?php
$translate_string = "Das ist wunderschön";
 try{
       $gt = new Gtranslate;
	echo "[HTTP] Translating [$translate_string] German to English => ".$gt->german_to_english($translate_string)."\n";

	/**
	* Lets switch the request type to CURL
	*/
	$gt->setRequestType('curl');
	echo "[CURL] Translating [$translate_string] German to English => ".$gt->german_to_english($translate_string)."\n";
	$translate_string	=	'hello';
	echo "[CURL] Translating [$translate_string] English to German=> ".$gt->english_to_german($translate_string)."\n";
	echo "[CURL] Translating [$translate_string] English to Portuguese=> ".$gt->english_to_portuguese($translate_string)."\n";
	echo "[CURL] Translating [$translate_string] English to Italian=> ".$gt->english_to_italian($translate_string)."\n";

} catch (GTranslateException $ge)
 {
       echo $ge->getMessage();
 }

    /*$apiKey = 'AIzaSyDZaEtufIxj0WdIq1F5NbPm-SagkYrilL0';
    $text = 'Hello world!';
    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source=en&target=fr';

    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($handle);                 
    $responseDecoded = json_decode($response, true);
	print_r($responseDecoded);
    curl_close($handle);

    echo 'Source: ' . $text . '<br>';
    echo 'Translation: ' . $responseDecoded['data']['translations'][0]['translatedText'];*/
?>