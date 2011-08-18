var Login = {};

Login.login = function(username, password, callback)
{
	console.debug("in Login.login");
	
	var url = "index.php/login/login_api/login_user";
	var params = {
		username:username,
		password:password
	};
	window.RequestManager.postRequest(url, params, RequestManager.parseJSON, callback);
};

Login.register = function(username, password, email, callback)
{
	var url = "index.php/login/login_api/register_user";
	var params = {
		username:username,
		password:password,
		email:email
	};
	window.RequestManager.postRequest(url, params, RequestManager.parseJSON, callback);
};

Login.logout = function(callback)
{
	var url = "index.php/login/login_api/logout_user";
	window.Requestmanager.postRequest(url, null, RequestManager.parseJSON, callback);
};