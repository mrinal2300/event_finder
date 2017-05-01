<?php
/**
 * Location Class
 *
 * This class enables the creation of Location
 *
 * @package		event_finder
 * @author		Mrinal kumar bhambhu
 * @link		https://github.com/mrinal2300/event_finder.git
 */
class Location{

	public $x;
	public $y;

	/**
	 * Constructor
	 *
	 * Accepts location points X and Y
	 *
	 * @access	public
	 * @param	integer value of X point
	 * @param	integer value of Y point
	 * @return	void
	 */
	public function __construct($x,$y){

		$this->x = $x;
		$this->y = $y;

	}
}
