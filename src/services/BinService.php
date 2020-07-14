<?php

class BinService implements LookUpService {
	
	private const BIN_API = 'https://lookup.binlist.net/';
	
	public function getValue(int $value): bool {
		
		$binResults = @file_get_contents(self::BIN_API.$value, true);

		if(!$binResults) {
			throw new Exception("BinService is now working.");
		}
		else {
			$result = json_decode($binResults);
			return $result->country->alpha2;
		}
		
	}
	
	public function isEu(int $value): bool {
		
		$country = strtoupper(self::getValue($value));
		return (in_array($country, self::EU_COUNTRIES)) ? true : false;
		
	}

}