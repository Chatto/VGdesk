var IncludeManager = {};

IncludeManager.pendingScriptsCount = 0;
IncludeManager.loading = false;
IncludeManager.callback = null;
IncludeManager.timeout = 1000;
IncludeManager.timer = null;
IncludeManager.includedScripts = new Array();

IncludeManager.includeScripts = function(scripts, callback)
{
	if (IncludeManager.loading === true)
	{
		return;
	}
	
	for (var i=0; i<scripts.length; i++)
	{
		var script = scripts[i];
		
		if (IncludeManager.includedScripts[script])
		{
			continue;
		}
		IncludeManager.includedScripts[script] = true;
		
		var scriptElement = document.createElement('script');
		scriptElement.setAttribute('src', script);
		scriptElement.setAttribute('type','text/javascript');
		scriptElement.onload = IncludeManager.onScriptLoad;
		scriptElement.onreadystatechange = IncludeManager.onScriptLoad;
		document.getElementsByTagName("head")[0].appendChild(scriptElement); 

		IncludeManager.loading = true;
		IncludeManager.pendingScriptsCount++;
	}
	
	IncludeManager.callback = callback;
	IncludeManager.timer = setTimeout(IncludeManager.onScriptFail, IncludeManager.timeout);
};

IncludeManager.onScriptLoad = function(e)
{
	IncludeManager.pendingScriptsCount--;
	if (IncludeManager.pendingScriptsCount <= 0)
	{
		IncludeManager.loading = false;
		IncludeManager.callback(true);
		
		// get rid of the error timeout
		if (IncludeManager.timer)
		{
			clearTimeout(IncludeManager.timer);
		}
	}
};

IncludeManager.onScriptFail = function(e)
{
	IncludeManager.loading = false;
	IncludeManager.pendingScriptsCount = 0;
	IncludeManager.callback(false);
};

