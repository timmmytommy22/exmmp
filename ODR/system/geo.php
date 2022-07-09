<?php

class ipModel {
	
	static $host = 'http://extreme-ip-lookup.com/json/';

	private function fetch($host) {

		if (function_exists('curl_init')) {
						
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $host);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, 'geoPlugin PHP Class v1.0');
			$response = curl_exec($ch);
			curl_close ($ch);
			
		} elseif(ini_get('allow_url_fopen')) {
			
			$response = file_get_contents($host, 'r');
		
		} else {
			return;
		}
		
		return $response;
	}

	public static function get($ip = null)
	{
		if (is_null($ip))
		{
			$ip = self::get_ip();
		}

		$data = self::fetch(self::$host,$ip);
		if ($data)
		{
			$data = json_decode($data);
			$ip_detail['city'] = $data->city;
			$ip_detail['region'] = $data->region;
			$ip_detail['country'] = $data->country;
			return $ip_detail;
		}
	}

	public static function get_ip()
	{
	  if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
		$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	  }
	  $client  = @$_SERVER['HTTP_CLIENT_IP'];
	  $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	  $remote  = $_SERVER['REMOTE_ADDR'];
	
	  if (filter_var($client, FILTER_VALIDATE_IP)) {
		$ip = $client;
	  } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
		$ip = $forward;
	  } else {
		$ip = $remote;
	  }
	
	  return $ip;
	}
}

//print_r(ipModel::get());
?>