<!DOCTYPE html>
<html lang="en">
<head>
	<title>VGdesk</title>
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	
	<!-- Jquery Library -->
	<script type="text/javascript" src="js/jquery.js"></script>
	
	<!-- Let Javascript be loaded automatically -->
	<script type="text/javascript" src="js/include_manager.js"></script>
	
	<!-- Contains some helpers for manager the DOM -->
	<script type="text/javascript" src="js/dom_helper.js"></script>
	
	<!-- Contains some helper functions for http request -->
	<script type="text/javascript" src="js/request_manager.js"></script>
	
	<!-- Contains all of the Page Loading Logic -->
	<script type="text/javascript" src="js/navigation.js"></script>
	
	<!-- Home Page Script -->
        <script type="text/javascript">
             var vgdesk_default_page = '<?php echo("$default_page") ?>';
        </script>
	<script type="text/javascript" src="js/vgdesk_home.js"></script>
	
</head>
<body onload="VGDeskHome.onPageLoaded(event)">
	<div class="grayscale">
	<div id="header">
		<!--<img id="logo" src="assets/images/logo.svg"/>-->
		<p class="header-button"><a href="javascript:VGDeskHome.navigate('overview')">Overview</a></p>
		<p class="header-button"><a href="javascript:VGDeskHome.navigate('files')">Files</a></p>
		<p class="header-button"><a href="javascript:VGDeskHome.navigate('planner')">Planner</a></p>
		<p class="header-button"><a href="javascript:VGDeskHome.navigate('writer')">Writer</a></p>
		<p class="header-button"><a href="javascript:VGDeskHome.navigate('forum')">Forum</a></p>
		<p class="header-button"><a href="javascript:VGDeskHome.navigate('chat')">Chat</a></p>
		<p class="header-button"><a href="javascript:VGDeskHome.navigate('tools')">Tools</a></p>
		<p id="user-box"><span id="welcome-message" class="log-data"></span><br><a href="#">Settings</a> - <a href="#">Profile</a> - <a href="javascript:VGDeskHome.onLogout()">Logout</a></p>
	</div>
	
	<div id="page-body">
	<!-- This is where the loaded pages will be dumped -->
	</div>

	<div id="footer">
		<div id="arrow-left">::</div>
		<div class="footer-content"></div>
		<div id="arrow-right">::</div>
	</div>
	</div>
</body>
</html>
