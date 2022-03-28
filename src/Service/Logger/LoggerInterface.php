<?php

namespace App\Service\Logger;

interface LoggerInterface{
	public function info($msg);
	public function debug($msg);
	public function error($msg);
}