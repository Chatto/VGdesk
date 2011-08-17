// a few methods for making javascript ajax requests easier
RequestManager = {};

RequestManager.requests = new Array();
RequestManager.xmlHttpRequest = null;
RequestManager.doingRequest = false;

function RequestInstance(method, url, params, callback, userData)
{
	this.method = method;
	this.url = url;
	this.params = params;
	this.callback = callback;
	this.userData = userData;
}

RequestManager.getRequest = function(url, callback, userData)
{
	RequestManager.requests.push(new RequestInstance("GET", url, null, callback, userData));
	if (!RequestManager.doingRequest)
	{
		RequestManager.doNextRequest();
	}
};

RequestManager.postRequest = function(url, params, callback, userData)
{
	RequestManager.requests.push(new RequestInstance("POST", url, params, callback, userData));
	if (!RequestManager.doingRequest)
	{
		RequestManager.doNextRequest();
	}
};

RequestManager.onRequestComplete = function(e)
{
	var request = RequestManager.requests[0];
	var xmlHttpRequest = RequestManager.xmlHttpRequest;
	if (xmlHttpRequest.readyState == 4)
	{
		var text = "";
		if (xmlHttpRequest.status == 200)
		{
			text = xmlHttpRequest.responseText;
		}
		request.callback(text, request.userData);
		
		RequestManager.requests.splice(0, 1);
		RequestManager.doingRequest = false;
		RequestManager.doNextRequest();
	}
};

RequestManager.doNextRequest = function()
{
	RequestManager.loadXmlHttpRequest();
	doingRequest = true;
	
	if (RequestManager.requests.length > 0)
	{
		var request = RequestManager.requests[0];
		var xmlHttpRequest = RequestManager.xmlHttpRequest;
		
		xmlHttpRequest.open(request.method, request.url, true);
		xmlHttpRequest.onreadystatechange = RequestManager.onRequestComplete;
		xmlHttpRequest.send(request.params);
	}
};

RequestManager.parseJSON = function(text, userData)
{
	userData.callback(eval(text));
};

RequestManager.loadXmlHttpRequest = function()
{
	if (RequestManager.xmlHttpRequest == null)
	{
		if (window.XMLHttpRequest)
		{
			RequestManager.xmlHttpRequest = new XMLHttpRequest();
		}
		else
		{
			RequestManager.xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
};
