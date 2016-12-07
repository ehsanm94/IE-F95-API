<?php
namespace App;

class Response 
{
	private $ok;
	private $result;
	private $error;

	const ROOT = 'response';
	const RESULT = 'result';

	public function __construct($result = null, $ok = true, $error = null) {
		$this->ok 		= $ok;
		$this->result 	= $result;
		$this->error 	= $error;

	}

	private function createJsonResponse() {
		$response = array_merge(
			array('ok' => $this->ok),
			$this->error ? $this->error->toArray() : array(self::RESULT => $this->result)
		);
		return json_encode(array(self::ROOT => $response));
	}

	private function createXMLResponse() {
		$response = array_merge(
			array('ok' => $this->ok),
			$this->error ? $this->error->toArray() : array(self::RESULT => $this->result)
		);
		$response = Array2XML::createXML(self::ROOT, $response);
		return $response->saveXML();
	}

	public function sendResponseAsJson() {
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
		echo $this->createJsonResponse();
		exit();
	}

	public function sendResponseAsXML() {
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: text/xml');
		echo $this->createXMLResponse();
		exit();
	}
}