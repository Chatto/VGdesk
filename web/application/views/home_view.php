<!DOCTYPE html>
<html lang="en">
<head>
	<title>VGdesk</title>
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">
		
		<!-- The Following Script Contains all of the Page Loading Logic -->
		<script type="text/javascript" src="js/navigation.js"></script>
		
		<script type="text/javascript">

			var initialized = false;

			function onPageLoaded(e)
			{
				var dumpElementId = "page-body";
				var startPage = "overview";
				
				setDumpElementId(dumpElementId);
				navigateTo(startPage);
			}
			
		</script>
		
	</head>
<body onload="onPageLoaded(event)">
	<div id="header">
		<img id="logo" src="assets/images/logo.png"/>
		<p class="header-button"><a href="javascript:navigateTo('overview')">Overview</a></p>
		<p class="header-button"><a href="javascript:navigateTo('files')">Files</a></p>
		<p class="header-button"><a href="javascript:navigateTo('planner')">Planner</a></p>
		<p class="header-button"><a href="javascript:navigateTo('writer')">Writer</a></p>
		<p class="header-button"><a href="javascript:navigateTo('forum')">Forum</a></p>
		<p class="header-button"><a href="javascript:navigateTo('chat')">Chat</a></p>
		<p class="header-button"><a href="javascript:navigateTo('tools')">Tools</a></p>
	</div>
	
	<div id="page-body">
	<!-- This is where the loaded pages will be dumped -->
	</div>
	
	<div id="footer">
		<div id="arrow-left">::</div>
		<div class="footer-content"></div>
		<div id="arrow-right">::</div>
	</div>
</body>
</html>
