var VGDeskHome = {};

VGDeskHome.startPage = vgdesk_default_page;
VGDeskHome.user = null;

VGDeskHome.onPageLoaded = function(e)
{
    IncludeManager.includeScripts(["js/pages/login/login.js"], VGDeskHome.onPageLoadComplete);
};

VGDeskHome.onPageLoadComplete = function()
{ 
    VGDeskHome.hideHeader();

    // get the page from the hash tag
    var page = getQueryString("#")["p"];
    if (page)
    {
	VGDeskHome.startPage = page;
    }
    
    Login.getLoggedInUser(VGDeskHome.setLoggedInUser);
    VGDeskHome.navigate(VGDeskHome.startPage);
};

VGDeskHome.setPageId = function(pageId)
{
    window.location = "#p=" + pageId;
}

VGDeskHome.navigate = function(pageId)
{
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
	
	VGDeskHome.verifyUser();

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

VGDeskHome.verifyUser = function()
{
    var verifyUserElements = getElementsByClassName("verify-user");
    for (var i=0; i<verifyUserElements.length; i++)
    {
	globalEval("var vgdeskHomeVerifyUserParseJSONResult = " + verifyUserElements[i].innerHTML);
	var user = vgdeskHomeVerifyUserParseJSONResult;

	if (user.username != VGDeskHome.user.username)
	{
	    alert("FUCK YOU HACKER");
	}
    }
};