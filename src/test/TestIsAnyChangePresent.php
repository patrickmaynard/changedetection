<?php

use PHPUnit\Framework\TestCase;
use patrickmaynard\changedetection\Checker;

class TestIsAnyChangePresent extends TestCase
{
	public function testIsAnyChangePresentNo()
	{
		$checker = new Checker();
		$source = [
			'url' => 'http://example.com/',
			'must_contain_new' => '*'
		];
		self::assertFalse($checker->isAnyChangePresent($source));
	}
}