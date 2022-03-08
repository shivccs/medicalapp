<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_id{

	public function construct_id($prefix)
	{
		
		$date = date("Ymds");
		$microtime = floatval(substr((string)microtime(), 1, 8));
        $mili = substr($microtime, 2,3);
		return $prefix.$date.$mili;
	}
}