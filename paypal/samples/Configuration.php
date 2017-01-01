<?php 
class Configuration
{
	// For a full list of configuration parameters refer in wiki page (https://github.com/paypal/sdk-core-php/wiki/Configuring-the-SDK)
	public static function getConfig()
	{
		$config = array(
				// values: 'sandbox' for testing
				//		   'live' for production
				"mode" => "sandbox"

				// These values are defaulted in SDK. If you want to override default values, uncomment it and add your value.
				// "http.ConnectionTimeOut" => "5000",
				// "http.Retry" => "2",
			);
		return $config;
	}

	// Creates a configuration array containing credentials and other required configuration parameters.
	public static function getAcctAndConfig()
	{
		$config = array(
				// Signature Credential
				//"acct1.UserName" => "ncasson_api1.megamenus.net",
//				"acct1.Password" => "8JCNBK9D7ZY3JZN3",
//				"acct1.Signature" => "A.uMnNsiAu69zpHSzCRFT4PCVQVmAoKtHOd4FNKSVbDDgNvgibwWxZCf",
//				"acct1.AppId" => "APP-0LE13490W36152948"

				 "acct1.UserName" => "certuser_biz_api1.paypal.com",
				 "acct1.Password" => "D6JNKKULHN3G5B8A",
				 "acct1.CertPath" => "cert_key.pem",
				 "acct1.AppId" => "APP-80W284485P519543T"
				);

		return array_merge($config, self::getConfig());;
	}

}