<?php

namespace Test\App;

use PHPUnit\Framework\TestCase;

include dirname(dirname(dirname(__FILE__)))."/src/App/Demo.php";

/**
 * Class ProductHandlerTest
 */
class DemoTest extends TestCase
{
	public static $demoInstance;
	public static function setUpBeforeClass() :void{
		static::$demoInstance = new \Demo(new \App\Service\AppLogger(),new \HttpRequest());
	}

	public function testFoo(){
		$this->assertEquals(static::$demoInstance->foo(),'bar');
	}

	public function testApi(){
		$apiResult = static::$demoInstance->get_user_info();
		$this->assertNotNull($apiResult);
		$this->assertArrayHasKey('error',$apiResult);
		$this->assertArrayHasKey('data',$apiResult);
		$this->assertArrayHasKey('id',$apiResult['data']);
		$this->assertArrayHasKey('username',$apiResult['data']);
	}

	public static function tearDownAfterClass() :void{
		//...
	}
}