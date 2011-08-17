var Login = {};

Login.login = function(username, password, callback)
{
	var url = "index.php/login/login_api/login_user";
	var params = {
		username:username,
		password:password
	};
	RequestManager.postRequest(url, params, RequestManager.parseJSON, callback);
};

Login.register = function(username, password, email, callback)
{
	var url = "index.php/login/login_api/register_user";
	var params = {
		username:username,
		password:password,
		email:email
	};
	RequestManager.postRequest(url, params, RequestManager.parseJSON, callback);
};

Login.logout = function(callback)
{
	var url = "index.php/login/login_api/logout_user";
	Requestmanager.postRequest(url, null, RequestManager.parseJSON, callback);
};