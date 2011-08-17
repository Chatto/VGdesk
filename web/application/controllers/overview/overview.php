<?php

class Overview extends CI_Controller
{
	public function index()
	{
		echo "
		<div class='section vertical-column' id='events'>
			<div class='section-header'>Events</div>
			<b>Loading upcoming events...</b><br><br><br>
			<p class='log-entry'><h3>Double Cluepon Epic Holiday Drunk Party [4 months]</h3></p>
			<p class='log-entry'><h3>Apocolypse [?]</h3></p>
			<p class='log-entry'><h3>Smoke Weed [Everyday]</h3></p>
		</div>
		
		<div class='section vertical-column' id='tasks'>
			<div class='section-header'>Tasks</div>
			<b>Loading new tasks...</b><br><br><br>
			<p class='log-entry'><h3>Finish Kalina Eira Character Sheet [4 Days Left]</h3></p>
			<p class='log-entry'><h3>Code the Login Page for VGdesk [2 Days Ago]</h3></p>
			<p class='log-entry'><h3>Get Distracted and Work On This Instead [Completed]</h3></p>
		</div>
		
		<div class='section vertical-column' id='files'>
			<div class='section-header'>Files</div>
			<b>Loading recent activity...</b><br><br><br>
			<p class='log-entry'><h3><b>Chatto</b> uploaded: derp.jpg</h3></p>
			<p class='log-entry'><h3><b>Xander</b> pushed: code.cpp</h3></p>
			<p class='log-entry'><h3><b>Chatto</b> updated: derp.jpg</h3></p>
		</div>
		
		<div class='section vertical-column' id='discussion'>
			<div class='section-header'>Discussion</div>
			<b>Loading latest discussions...</b><br><br><br>
			<p class='log-entry'><h3><b>Chatto</b> commented on:<br>derp.jpg</h3></p>
			<p class='log-entry'><h3><b>Xander</b> posted:<br>Design for Overview</h3></p>
			<p class='log-entry'><h3><b>Chatto</b> posted in:<br>Design for Overview</h3></p>
		</div>
		
		<div class='section vertical-column' id='pages'>
			<div class='section-header'>Pages</div>
			<b>Loading recently editted and created pages...</b><br><br><br>
			<p class='log-entry'><h3><b>Chatto</b> created:<br>Characters::Oorta</h3></p>
			<p class='log-entry'><h3><b>Xander</b> editted:<br>Characters::Oorta</h3></p>
			<p class='log-entry'><h3><b>Chatto</b> editted:<br>Places::Konna</h3></p>
		</div>
		
		
		
		
		";
	}
}
