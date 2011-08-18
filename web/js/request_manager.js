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
	this.text = "";
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
		if (xmlHttpRequest.status == 200)
		{
			request.text = xmlHttpRequest.responseText;
			setTimeout(RequestManager.finishRequest, 1);
		}
	}
};

RequestManager.finishRequest = function()
{
	var request = RequestManager.requests[0];
	request.callback(request.text, request.userData);
	
	RequestManager.requests.splice(0, 1);
	RequestManager.doingRequest = false;
	RequestManager.doNextRequest();
};

RequestManager.objectToQueryString = function(obj)
{
	var queryString = "";
	
	for (var x in obj)
	{
		if (queryString != "")
		{
			queryString += "&";
		}
		queryString += (x + "=" + obj[x]);
	}
	
	return queryString;
};

RequestManager.doNextRequest = function()
{
	RequestManager.loadXmlHttpRequest();
	doingRequest = true;
	
	if (RequestManager.requests.length > 0)
	{
		var request = RequestManager.requests[0];
		var xmlHttpRequest = RequestManager.xmlHttpRequest;
		var queryString = RequestManager.objectToQueryString(request.params);
		
		xmlHttpRequest.open(request.method, request.url, true);
		
		if (request.method == "POST")
		{
			//Send the proper header information along with the request
			xmlHttpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlHttpRequest.setRequestHeader("Content-length", queryString.length);
			xmlHttpRequest.setRequestHeader("Connection", "close");
		}
		
		xmlHttpRequest.onreadystatechange = RequestManager.onRequestComplete;
		xmlHttpRequest.send(queryString);
	}
};

RequestManager.parseJSON = function(text, callback)
{
	callback(eval.call(window, "(" + text + ")"));
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
