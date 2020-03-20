<?php

namespace Tests\Data;

use Iterator;

class CsvIterator implements Iterator //, Countable
{
	private $position = 0;
	private $routingFileName;
	private $routingRecords = [];

	function __construct($pathToFile) {
		$this->loadCSVFile($pathToFile);
		$this->routingFileName = $pathToFile;
	}

	public function current() {
		return $this->routingRecords[$this->position];
	}

	public function key() {
		return $this->position;
	}

	public function next() {
		$this->position++;
	}

	public function rewind() {
		$this->position = 0;
	}

	public function valid() {
		return isset($this->routingRecords[$this->position]);
	}

	function getFileLinesQuantity($file) {

		$fileHandle = fopen($file, "r");
		$numberOfLines = 0;

		while( !feof($fileHandle) ) {
			$line = fgets($fileHandle);
			$numberOfLines++;
		}

		return $numberOfLines;
	}

	function loadCSVFile($path) {
		
		$routingFile  = fopen($path, "r");
		$routingRecordQuantity = $this->getFileLinesQuantity($path);

		for($i = 0; $i < $routingRecordQuantity; $i++) {
			
			$routingRecord = fgetcsv($routingFile);
			$this->routingRecords[] = $routingRecord;
			
		}
		fclose($routingFile);
	}

}
