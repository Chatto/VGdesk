var VGDeskHome = {};

VGDeskHome.defaultPage = "overview";
VGDeskHome.user = null;
VGDeskHome.currentPageId = "";

VGDeskHome.onPageLoaded = function(e)
{
    IncludeManager.includeScripts(["js/pages/login/login.js"], VGDeskHome.onPageLoadComplete);
};

VGDeskHome.onPageLoadComplete = function()
{ 
    VGDeskHome.hideHeader();
    Login.getLoggedInUser(VGDeskHome.initialize);
};

VGDeskHome.initialize = function(user)
{
    VGDeskHome.setLoggedInUser(user);
    window.onhashchange = VGDeskHome.onHashChange;
    VGDeskHome.onHashChange();
}; 

VGDeskHome.onHashChange = function()
{
    var hash = getQueryString("#");
    var pageId = hash["p"];

    if (pageId == "undefined")
    {
	pageId = VGDeskHome.defaultPage;
    }

    if (pageId != VGDeskHome.currentPageId)
    {
	VGDeskHome.navigate(pageId);
    }
};

VGDeskHome.setPageId = function(pageId)
{
    VGDeskHome.currentPageId = pageId;
    window.location = "#p=" + pageId;
}

VGDeskHome.navigate = function(pageId)
{
    this.currentPageId = pageId;
	Navigation.navigateTo(pageId, VGDeskHome.dumpPageText);
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
	document.getElementById("header").style.display = "none";
	document.getElementById("footer").style.display = "none";

	document.getElementById("page-body").className = "page-body-no-header";
};

VGDeskHome.showHeader = function()
{
	document.getElementById("header").style.display = "block";
	document.getElementById("footer").style.display = "block";

	document.getElementById("page-body").className = "page-body-header";
};

VGDeskHome.onLogout = function()
{
    Login.logout(VGDeskHome.onLogoutComplete);
};

VGDeskHome.onLogoutComplete = function(response)
{
    VGDeskHome.setLoggedInUser(response);
    VGDeskHome.navigate("login");
};

VGDeskHome.setLoggedInUser = function(user)
{
    VGDeskHome.user = user;
    VGDeskHome.onLoggedInUserChanged(user);
};

VGDeskHome.getLoggedInUser = function()
{
    return VGDeskHome.user;
};

VGDeskHome.onLoggedInUserChanged = function(user)
{
    var welcomeMessage = document.getElementById("welcome-message");
    if (user != null)
    {
	welcomeMessage.innerHTML = "Welcome " + user.username;
    }
};
