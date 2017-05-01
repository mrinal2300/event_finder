<?php 
require_once("Event.php");
require_once("Location.php");
require_once("Ticket.php");
/**
 * App Class
 *
 * This class enables prepration of seed data
 *
 * @package		event_finder
 * @author		Mrinal kumar bhambhu
 * @link		https://github.com/mrinal2300/event_finder.git
 */
class App{

	public $events = array();


	/**
	 * Generate seed events data
	 *
	 * @access	public
	 * @param   integer Number of events to be generated
	 * @return	void
	 */
	public function seed_data($number_of_events = 5){


		foreach (range(1, $number_of_events) as $number) {

			$tickets = array();

			for ($i=0; $i < rand(1,5); $i++) { 

				$tickets[] = rand(10,50);
				
			}
			
			$event = new Event();
			$location = $this->unique_location();
			$event->set_data($number,$location[0],$location[1],$tickets);
			$this->events[] = $event;
		}

	}

	/**
	 * Generate unique location points X and Y for events
	 *
	 * @access	public
	 * @return	array x at index 0 and y at index 1
	 */
	public function unique_location(){

		$x = rand(-10,10);
		$y = rand(-10,10);

		if(empty($this->events)){
			return array($x,$y);
		}

		foreach ($this->events as $event) {

			if($event->location->x == $x && $event->location->y == $y){

				return $this->unique_location($event);
			}
		}

		return array($x,$y);
	}

	/**
	 *
	 * find events distance from  x and y
	 *
	 * @access	public
	 * @param	integer value of point X
	 * @param	integer value of point Y
	 * @return	array of object - sorted events
	 */
	public function find_events_by_distance($x,$y){

		foreach ($this->events as $event) {

			$distance = abs($event->location->x - $x) + abs($event->location->y - $y);
			$event->set_distance($distance);

			sort($event->tickets);

		}

		usort($this->events, array($this ,"sort_distance"));

		return $this->events;
	}

	/**
	 *
	 * sort events distance between two event object
	 *
	 * @access	public
	 * @param	object 
	 * @param	object
	 * @return	integer - distance between two objects
	 */
	public function sort_distance($e1,$e2){

		return $e1->distance - $e2->distance;
	}

}
?>