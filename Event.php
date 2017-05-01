<?php
/**
 * Event Class
 *
 * This class enables the creation of events
 *
 * @package		event_finder
 * @author		Mrinal kumar bhambhu
 * @link		https://github.com/mrinal2300/event_finder.git
 */
class Event{

	public $id;
	public $location;
	public $tickets = array();
	public $distance;
	
	/**
	 * Initialize event data
	 *
	 * @access	public
	 * @param	Integer value of event id
	 * @param	Integer value of event location point X
	 * @param	Integer value of event location point Y
	 * @param	array ticket prices
	 * @return	void
	 */
	public function set_data($id,$x,$y,$prices){

		$this->id = $id;
		$this->location = new Location($x,$y);
		
		foreach ($prices as $price) {
			
			$this->tickets[] = new Ticket($price);
		}
		
	}

	/**
	 * Set event distance
	 *
	 * @access	public
	 * @param	Integer value of distance
	 * @return	void
	 */
	public function set_distance($distance){

		$this->distance = $distance;
	}

}
?>