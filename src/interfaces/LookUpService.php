<?php

interface LookUpService {
	
	const EU_COUNTRIES = [
		'AT',
		'BE',
		'BG',
		'CY',
		'CZ',
		'DE',
		'DK',
		'EE',
		'ES',
		'FI',
		'FR',
		'GR',
		'HR',
		'HU',
		'IE',
		'IT',
		'LT',
		'LU',
		'LV',
		'MT',
		'NL',
		'PO',
		'PT',
		'RO',
		'SE',
		'SI',
		'SK',
	];
	
    public function isEu(int $value);
	
    public function getValue(int $value);
	
}