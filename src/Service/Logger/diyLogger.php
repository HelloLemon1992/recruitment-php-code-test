<?php

namespace App\Service\Logger;

use think\facade\Log;

class diyLogger implements LoggerInterface{

	public static $logInstance = null;
	public static function getStaticInstance(){
		if(static::$logInstance == null){
			static::$logInstance = new self();
		}
		return static::$logInstance;
	}

	public function __construct(){
		Log::init([
			'default'	=>	'file',
			'channels'	=>	[
				'file'	=>	[
					'type'	=>	'file',
					'path'	=>	'./logs/',
				],
			],
		]);
	}

	public function info($msg){
		Log::record(static::msgFormatter($msg),'info');
	}
	public function debug($msg){
		Log::record(static::msgFormatter($msg),'debug');
	}
	public function error($msg){
		Log::record(static::msgFormatter($msg),'error');
	}

	public static function msgFormatter($msg){
		return strtoupper($msg);
	}
}