var VGDeskHome = {};

VGDeskHome.startPage = "overview";

VGDeskHome.onPageLoaded = function(e)
{
	VGDeskHome.hideHeader();
	VGDeskHome.navigate(VGDeskHome.startPage);
};

VGDeskHome.navigate = function(pageId)
{
	Navigation.navigateTo(pageId, VGDeskHome.dumpPageText);
	console.log(pageId);
	console.log(VGDeskHome.dumpPageText);
};

VGDeskHome.dumpPageText = function(pageId, text)
{
	var dumpElement = document.getElementById("page-body");
	if (text != "")
	{
		dumpElement.innerHTML = text;	
	}
	else
	{
		dumpElement.innerHTML = "Page Not Found";
	}

	VGDeskHome.showHeader();
};		

VGDeskHome.hideHeader = function()
{
	console.log("Hide Header");
	
	document.getElementById("header").style.display = "none";
	document.getElementById("footer").style.display = "none";

	document.getElementById("page-body").className = "page-body-no-header";
};

VGDeskHome.showHeader = function()
{
	console.log("Show Header");
	
	document.getElementById("header").style.display = "block";
	document.getElementById("footer").style.display = "block";

	document.getElementById("page-body").className = "page-body-header";
};