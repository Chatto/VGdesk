// The page to dump the results of navigateTo(pageId)
var dumpElementId = null;

var navigationUrlData = [];
navigationUrlData['overview'] = "index.php/overview/overview/";
navigationUrlData['files'] = "index.php/files/files/";
navigationUrlData['planner'] = "index.php/planner/planner/";
navigationUrlData['writer'] = "index.php/writer/writer/";
navigationUrlData['forum'] = "index.php/forum/forum/";
navigationUrlData['chat'] = "index.php/chat/chat/";
navigationUrlData['tools'] = "index.php/tools/tools/";

var AjaxData = 
{
	xmlHttpRequest:null,
	isLoading:false,
	currentDumpElement:null
};

function setDumpElementId(value)
{
	dumpElementId = value;
}

// Call this method to navigate to the page with the given Id
function navigateTo(pageId)
{
	if (!dumpElementId)
	{
		alert("dumpElementId is null. call setDumpElementId() before navigateTo()");
	}
	
	var pageUrl = navigationUrlData[pageId];
	if (pageUrl)
	{
		navigateToPage(pageUrl, dumpElementId);		
	}
}

// Use AJAX to navigate to a page, 
// and dump the results into the dumpElement
function navigateToPage(pageUrl, dumpElementId)
{
	var dumpElement = document.getElementById(dumpElementId);
	
	if (!AjaxData.isLoading
		&& dumpElement != null)
	{
		AjaxData.isLoading = true;
		AjaxData.currentDumpElement = dumpElement;
		
		loadXmlHttpRequest();
		var request = AjaxData.xmlHttpRequest;
			
		request.open('GET', pageUrl, true);
		request.onreadystatechange = onNavigateToPageComplete;
		request.send(null);
	}
}

// When the page is done loading, dump the response text into the dump element
function onNavigateToPageComplete(e)
{
	var request = AjaxData.xmlHttpRequest;
	
	if (request.readyState == 4)
	{
		if (request.status == 200)
		{
			var text = request.responseText;
			AjaxData.currentDumpElement.innerHTML = text;
		}
		else
		{
			AjaxData.currentDumpElement.innerHTML = "Page Not Found";
		}
		
		AjaxData.isLoading = false;
	}
}

// Initialize the XmlHttpRequest
function loadXmlHttpRequest()
{
	if (AjaxData.xmlHttpRequest == null)
	{
		if (window.XMLHttpRequest)
		{
			AjaxData.xmlHttpRequest = new XMLHttpRequest();
		}
		else
		{
			AjaxData.xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
}
