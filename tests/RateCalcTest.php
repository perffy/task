<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class RateCalcTest extends TestCase
{
	
    public function testBinServiceGetValue(): void
    {
		$service = new BinService();
		$number = 4517360;
		$isEu = $service->getValue($number);
		$this->assertSame(true, $isEu);
    }

	
	public function testBinServiceIsEu(): void
    {
		$service = new BinService();
		$number = 4517360;
		$isEu = $service->isEu($number);
		$this->assertSame(false, $isEu);
    }

}
