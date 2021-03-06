var Navigation = {};

Navigation.navigationUrlData = new Array();
Navigation.navigationUrlData['login'] = "index.php/login/login_page/";
Navigation.navigationUrlData['register'] = "index.php/login/register_page/"
Navigation.navigationUrlData['overview'] = "index.php/overview/overview_page/";
Navigation.navigationUrlData['files'] = "index.php/files/files_page/";
Navigation.navigationUrlData['planner'] = "index.php/planner/planner_page/";
Navigation.navigationUrlData['writer'] = "index.php/writer/writer_page/";
Navigation.navigationUrlData['forum'] = "index.php/forum/forum_page/";
Navigation.navigationUrlData['chat'] = "index.php/chat/chat_page/";
Navigation.navigationUrlData['tools'] = "index.php/tools/tools_page/";

// Call Navigation method to navigate to the page with the given Id
Navigation.navigateTo = function(pageId, callback)
{
    var pageUrl = Navigation.navigationUrlData[pageId];

    window.location = "#p=" + pageId;

    if (pageUrl)
    {
	var username = "";
	var loggedInUser = VGDeskHome.getLoggedInUser();
	if (loggedInUser != null)
	{
	    username = loggedInUser.username;
	}

        RequestManager.postRequest(pageUrl, {username:username}, Navigation.dumpText, {pageId:pageId, callback:callback});
    }
};

Navigation.dumpText = function(text, userData)
{
    // callback
    if (userData.callback)
    {
        userData.callback(userData.pageId, text);
    }
    
    // execute the scripts
    var scripts = getElementsByClassName("page-script", "span");
    for (var i=0; i<scripts.length; i++)
    {
        globalEval(scripts[i].innerHTML);
    }
};