<?php
namespace App;

class Error 
{
	private $error_code;
	private $error;

	public function __construct($error_code, $error) {
		$this->error_code 	= $error_code;
		$this->error 		= $error;
	}

	public static function badRequest($message = null) {
		$error_code = 400;
		$error = !$message ? 'Bad request' : $message;
		return new static($error_code, $error);
	}

	public function toArray() {
		$error = array(
			'status' 		=> $this->error_code,
			'description' 	=> $this->error,
		);
		return array ('error' => $error);
	}
}