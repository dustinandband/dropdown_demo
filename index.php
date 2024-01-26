<?php
// Periodically download most up-to-date json files from web
include_once "playerListSync.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>test</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- Magicsuggest requires Bootstrap 3 and jQuery 1.8+ to work -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	<link href="assets/magicsuggest/magicsuggest-min.css" rel="stylesheet">
	<script src="assets/magicsuggest/magicsuggest-min.js"></script>
	
	<!-- custom javascript functions -->
	<script src="jsFunctions.js"></script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>

<body>

	<div class="container">
	
		<div class="header">
			<h1>test</h1>
		</div>
		
		<br><br>
		
		<div class="form-group">
			<div class="row">
				<!-- Map DropDown -->
				<div class="col-sm-3 col-md-2">
					<select id='mapDropDown' onchange="UpdateListings();" class="form-control">
					<option value='all' selected="selected">All Maps</option>
					<optgroup label="Dead Center">
					<option value='c1m2_streets'>Gun Shop</option>
					<option value='c1m4_atrium'>Mall Atrium</option>
					</optgroup>
					<optgroup label="The Passing">
					<option value='c6m1_riverbank'>Riverbank</option>
					<option value='c6m2_bedlam'>Bedlam/Underground</option>
					<option value='c6m3_port'>Port Passing</option>
					</optgroup>
					<optgroup label="Dark Carnival">
					<option value='c2m1_highway'>Motel</option>
					<option value='c2m4_barns'>Stadium Gate</option>
					<option value='c2m5_concert'>Concert</option>
					</optgroup>
					<optgroup label="Swamp Fever">
					<option value='c3m1_plankcountry'>Gator Village</option>
					<option value='c3m3_shantytown'>Shanty Town</option>
					<option value='c3m4_plantation'>Plantation</option>
					</optgroup>
					<optgroup label="Hard Rain">
					<option value='c4m1_milltown_a'>Burger Tank</option>
					<option value='c4m2_sugarmill_a'>Sugar Mill</option>
					<option value='c4m3_sugarmill_b'>Cane Field</option>
					</optgroup>
					<optgroup label="The Parish">
					<option value='c5m1_waterfront'>Waterfront</option>
					<option value='c5m2_park'>Bus Depot</option>
					<option value='c5m3_cemetery'>Cemetery</option>
					<option value='c5m4_quarter'>Float</option>
					<option value='c5m5_bridge'>Bridge</option>
					</optgroup>
					<optgroup label="The Sacrifice">
					<option value='c7m1_docks'>Traincar</option>
					<option value='c7m2_barge'>Barge</option>
					<option value='c7m3_port'>Port Sacrifice</option>
					</optgroup>
					<optgroup label="No Mercy">
					<option value='c8m2_subway'>Generator Room</option>
					<option value='c8m3_sewers'>Gas Station</option>
					<option value='c8m4_interior'>Hospital</option>
					<option value='c8m5_rooftop'>Rooftop</option>
					</optgroup>
					<optgroup label="Crash Course">
					<option value='c9m1_alleys'>The Bridge (cc)</option>
					<option value='c9m2_lots'>Truck Depot</option>
					</optgroup>
					<optgroup label="Death Toll">
					<option value='c10m2_drainage'>Drains</option>
					<option value='c10m3_ranchhouse'>Church</option>
					<option value='c10m4_mainstreet'>Street</option>
					<option value='c10m5_houseboat'>Boathouse</option>
					</optgroup>
					<optgroup label="Dead Air">
					<option value='c11m2_offices'>Crane</option>
					<option value='c11m3_garage'>Construction Site</option>
					<option value='c11m4_terminal'>Terminal</option>
					<option value='c11m5_runway'>Runway</option>
					</optgroup>
					<optgroup label="Blood Harvest">
					<option value='c12m2_traintunnel'>Warehouse</option>
					<option value='c12m3_bridge'>The Bridge (BH)</option>
					<option value='c12m5_cornfield'>Farmhouse</option>
					</optgroup>
					<optgroup label="Cold Stream">
					<option value='c13m3_memorialbridge'>Junkyard (Cold Stream)</option>
					<option value='c13m4_cutthroatcreek'>Waterworks</option>
					</optgroup>
					<optgroup label="The Last Stand">
					<option value='c14m1_junkyard'>Junkyard (Last Stand)</option>
					<option value='c14m2_lighthouse'>Lighthouse</option>
					</optgroup>
					<optgroup label="Custom Maps">
					<option value='l4d2_syberianhusky_c1m3b'>Simplex Survival</option>
					</optgroup>
					</select>
				</div>
				
				<!-- Category DropDown -->
				<div class="col-sm-3 col-md-2">
					<select id='CateogoryDropDown' onchange="UpdateListings();" class="form-control">
					<option value='any' selected="selected">any</option>
					<option value='full-team'>full-team</option>
					<option value='trio'>trio</option>
					<option value='duo'>duo</option>
					<option value='solo'>solo</option>
					</select>
				</div>
				<!-- game mode DropDown -->
				<div class="col-sm-3 col-md-2">
					<select id='minsDropDown' onchange="UpdateListings();" class="form-control">
					<option value='any' selected='selected'>any</option>
					<option value='sub20'>under 20 mins</option>
					<option value='20'>20-29</option>
					<option value='30'>30-39</option>
					<option value='40'>40-49</option>
					<option value='50'>50-59</option>
					<option value='60'>60-69</option>
					<option value='70'>70-79</option>
					<option value='80'>80-89</option>
					<option value='90'>90-99</option>
					<option value='100'>100-199</option>
					<option value='200'>200+</option>
					</select>
				</div>
				
				<!-- Organize DropDown -->
				<div class="col-sm-3 col-md-2">
					<select id='organizeDropDown' onchange="UpdateListings();" class="form-control">
					<option value='newest' selected="selected">Newest submitted</option>
					<option value='oldest'>Oldest Submitted</option>
					<option value='highest'>Highest Time</option>
					</select>
				</div>
			</div> <!-- end row -->
			
			<div class="row-top-margin row">
				<!-- player name or steam64ID -->
				<div class="col-xs-12 col-sm-12 col-md-8">
				<input id="playerSearch" onchange="UpdateListings();" class="form-control" />
				</div>
			</div>
			
			<br>
			
			<div class="row row-top-margin">
				<!-- Filter Rounds containing logged events -->
				<div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
				<input type="checkbox" id="LoggedEvents" onchange="UpdateListings();">
				<label for="LoggedEvents">Logged events</label>
				</div>
				
				<!-- Filter Unique Teams -->
				<div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
				<input type="checkbox" id="UniqueTeams" onchange="UpdateListings();">
				<label for="UniqueTeams">Unique teams</label>
				</div>
				
				<!-- Filter Unique maps -->
				<div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
				<input type="checkbox" id="UniqueMaps" onchange="UpdateListings();">
				<label for="UniqueMaps">Unique maps</label>
				</div>
				
				<!-- Filter Rounds containing player clips -->
				<div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
				<input type="checkbox" id="PlayerClip" onchange="UpdateListings();">
				<label for="PlayerClip">Player clips</label>
				</div>
			</div>
			
			<!-- Logged events additional filters -->
			<div class="row row-top-margin" id="loggedEventsExpanded">
			<br />
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<input id="loggedeventTextSearch" onchange="UpdateListings();" placeholder="Search logged events" class="form-control" />
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<input id="LogEventPlayerSearch" onchange="UpdateListings();" class="form-control" />
				</div>
			</div>
			
		</div>
		<!-- Map listings are displayed here -->
		<div id="ListingsArea"><b></b></div>

	</div>
</body>
</html>