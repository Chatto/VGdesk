var Navigation = {};

// The page to dump the results of navigateTo(pageId)
Navigation.dumpElementId = null;

Navigation.navigationUrlData = new Array();
Navigation.navigationUrlData['overview'] = "index.php/overview/overview_page/";
Navigation.navigationUrlData['files'] = "index.php/files/files_page/";
Navigation.navigationUrlData['planner'] = "index.php/planner/planner_page/";
Navigation.navigationUrlData['writer'] = "index.php/writer/writer_page/";
Navigation.navigationUrlData['forum'] = "index.php/forum/forum_page/";
Navigation.navigationUrlData['chat'] = "index.php/chat/chat_page/";
Navigation.navigationUrlData['tools'] = "index.php/tools/tools_page/";

Navigation.setDumpElementId = function(value)
{
	Navigation.dumpElementId = value;
};

// Call Navigation method to navigate to the page with the given Id
Navigation.navigateTo = function(pageId)
{
	if (!Navigation.dumpElementId)
	{
		alert("dumpElementId is null. call setDumpElementId() before navigateTo()");
	}
	
	var pageUrl = Navigation.navigationUrlData[pageId];
	if (pageUrl)
	{
		var dumpElement = document.getElementById(Navigation.dumpElementId);
		RequestManager.getRequest(pageUrl, Navigation.dumpText, {dumpElement:dumpElement});
	}
};

Navigation.dumpText = function(text, userData)
{
	var dumpElement = userData.dumpElement;
	if (text == "")
	{
		dumpElement.innerHTML = "Page Not Found";
	}
	else
	{
		dumpElement.innerHTML = text;
	}
	
	// execute the scripts
	var scripts = getElementsByClassName("page-script", "span");
	for (var i=0; i<scripts.length; i++)
	{
		eval(scripts[i].innerHTML);
	}
};