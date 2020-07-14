<?php

include('../vendor/autoload.php');

class RateCalc {

	protected const EU_TAX = 0.01;
	protected const OTHER_TAX = 0.02;

	public static function calculate(string $url = null) {
		
		try {
			if($url != '') {

				$rows = explode("\n", file_get_contents($url));

				if(!empty($rows)) {
					foreach ($rows as $row) {

						$data = json_decode($row);
						if(isset($data->bin)) {
							
							$isEu = BinService::isEu($data->bin);
							$rate = ExchangeService::getPrice($data->currency, $data->amount);

							echo $rate * ($isEu ? self::EU_TAX : self::OTHER_TAX);
							print "\n";
							
						}
						else {
							throw new Exception("The format is incorrect.");
						}
					}
				}
				else {
					throw new Exception("Empty file.");
				}
			}
			else {
				throw new Exception("No input file.");
			}
		}
		catch(Exception $e) {
			echo "Fatal Error: ".$e->getMessage()."\n";
		}
	}

}

$calculator = new RateCalc;

$calculator->calculate($argv[1]);