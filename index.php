<?php
require_once("App.php");

// if x and y value is set 
if(isset($_GET['x']) && isset($_GET['y'])){
	$x = $_GET['x'];
	$y = $_GET['y'];

	//create app object
	$app = new App();

	//generate seed data
	$app->seed_data(5);

	//get events by distance
	$results = $app->find_events_by_distance($x,$y);
}
?>

<h3>Find Events</h3>
<h5>Please input numeric value between -10 to +10 (Y axis), and -10 to +10 (X axis)</h5>
<form method="GET" action="index.php">
	<input type="number" min="-10" max="10" name="x" placeholder="X">
	<input type="number" min="-10" max="10" name="y" placeholder="Y">
	<button type="submit" >Find Events</button>
</form>

<?php if(isset($_GET['x']) && isset($_GET['y'])){ ?>

	<p>Closest event to (<?php echo $x; ?>,<?php echo $y; ?>) </p>
	<?php foreach ($results as $result) { ?>
	<p>Event <?php echo sprintf("%03d",$result->id); ?> - $<?php echo $result->tickets[0]->price; ?> Distance <?php echo $result->distance; ?></p>

<?php } ?>
<?php } ?>












