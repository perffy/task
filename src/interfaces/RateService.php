<?php

interface RateService {

    public function getPrice(string $currency, float $value);
	
}