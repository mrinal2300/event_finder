<?php
/**
 * Ticket Class
 *
 * This class enables the creation of Tickets
 *
 * @package		event_finder
 * @author		Mrinal kumar bhambhu
 * @link		https://github.com/mrinal2300/event_finder.git
 */
class Ticket{

	public $price;

	/**
	 * Constructor
	 *
	 * Accepts price to create ticket object
	 *
	 * @access	public
	 * @param	positive integer value of price
	 * @return	void
	 */
	public function __construct($price){

		$this->price = $price;

	}


}
?>