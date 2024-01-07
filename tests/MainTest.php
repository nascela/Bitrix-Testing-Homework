<?php

require_once __DIR__ . '/../boot.php';
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
	public function testFooBarWithPositiveInput()
	{
		$this->assertEquals(
			'1 2 Foo 4 Bar Foo 7 8 Foo Bar 11 Foo 13 14 FooBar',
			fooBar(15)
		);
		$this->assertEquals(
			'1 2 Foo 4 Bar Foo 7 8 Foo Bar',
			fooBar(10)
		);
		$this->assertEquals(
			'1 2 Foo 4 Bar Foo 7 8 Foo Bar 11 Foo 13 14 FooBar 16 17 Foo 19 Bar Foo 22 23 Foo Bar',
			fooBar(25)
		);
		$this->assertEquals(
			'1 2 Foo 4 Bar Foo 7',
			fooBar(7)
		);
	}

	public function testFooBarWithNegativeInput()
	{
		$this->assertEquals(
			'1 FooBar -1 -2 Foo -4 Bar Foo -7 -8 Foo Bar -11 Foo -13 -14 FooBar',
			fooBar(-15)
		);
		$this->assertEquals(
			'1 FooBar -1 -2 Foo -4 Bar Foo -7 -8 Foo Bar',
			fooBar(-10)
		);
		$this->assertEquals(
			'1 FooBar -1 -2 Foo -4 Bar Foo -7 -8 Foo Bar -11 Foo -13 -14 FooBar -16 -17 Foo -19 Bar Foo -22 -23 Foo Bar',
			fooBar(-25)
		);
		$this->assertEquals(
			'1 FooBar -1 -2 Foo -4 Bar Foo -7',
			fooBar(-7)
		);
	}

	public function testFooBarWithZeroInput()
	{
		$this->assertEquals(
			'1 FooBar',
			fooBar(0)
		);
	}

	public function testFooBarWithOneInput()
	{
		$this->assertEquals(
			'1',
			fooBar(1)
		);
	}

	public function testFooBarWithMinusOneInput()
	{
		$this->assertEquals(
			'1 FooBar -1',
			fooBar(-1)
		);
	}

	// cледующие тесты наверное не коректны и написаны для примера
	// правильнее было бы просто указать явно тип получаемого значения в виде "int"
	//
	// так же в новой версии phpUnit убрали возможность отлова фатальных ошибок через expectError()
	// частично из-за этого сделал через expectException() и убрал явное указание типа в функции

	public function testFooBarWithoutInput()
	{
		$this->expectException(wrongInputException::class);
		fooBar();
	}

	public function testFooBarWithNonNumericInput()
	{
		$this->expectException(wrongInputException::class);
		fooBar("text");

		$this->expectException(wrongInputException::class);
		fooBar("01text01");
	}
}
