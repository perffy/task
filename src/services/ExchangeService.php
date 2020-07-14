<?php

class ExchangeService implements RateService {
	
	const EXCHANGE_API = 'https://api.exchangeratesapi.io/latest';
	
	public function getPrice(string $currency, float $value): float {
		
		$data = @file_get_contents(self::EXCHANGE_API, true);
		if(!$data) {
			throw new Exception("ExchangeService is now working.");
		}
		else {
			$rates = json_decode($data, true);		
			$rate = isset($rates['rates'][$currency]) ? $rates['rates'][$currency] : 0;
			
			$amntFixed = ($rate > 0) ? $value / $rate : $value;

			return ceil($amntFixed);
		}
	}

}