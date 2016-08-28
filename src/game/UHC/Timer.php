<?php

namespace game\UHC;

/**
 * UHC PlugIn - MCPE Mini-Game
 *
 * Copyright (C) MCPE_PluginDev
 *
 * @author DavidJBrockway aka MCPE_PluginDev
 *        
 */
class Timer {
	private $classname = "Timer";
	private $start = 0;
	private $stop = 0;
	private $elapsed = 0;
	
	// Constructor
	public function Timer($start = true) {
		if ($this->$start)
			$this->start ();
	}
	
	// Start counting time
	public function start() {
		$this->start = $this->_gettime ();
	}
	
	// Stop counting time
	public function stop() {
		$this->stop = $this->_gettime ();
		$this->elapsed = $this->_compute ();
	}
	
	// Get Elapsed Time
	public function elapsed() {
		if (! $this->elapsed)
			$this->stop ();
		
		return $this->elapsed;
	}
	
	// Resets Timer so it can be used again
	public function reset() {
		$this->start = 0;
		$this->stop = 0;
		$this->elapsed = 0;
	}
	
	// ### PRIVATE METHODS ####
	
	// Get Current Time
	private function _gettime() {
		$mtime = microtime ();
		$mtime = explode ( " ", $mtime );
		return $mtime [1] + $mtime [0];
	}
	
	// Compute elapsed time
	private function _compute() {
		return $this->stop - $this->start;
	}
}
