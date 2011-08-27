<span class="page-script" >
    VGDeskHome.hideHeader();
    VGDeskHome.setPageId("login");

    function onLoginViewLoaded(success) { LoginView.onLoad(success); }
    IncludeManager.includeScripts(["js/pages/login/login.js", "js/pages/login/login_view.js"], onLoginViewLoaded);
</span>

<div id="login-body">
	<div class="section" id="login-box">
		<div class="section-header">
			Login to Travels of Oorta
		</div>
		<div id="login-forms">
			<img class="avatar-border project-image" src="assets/images/project-image.png"/>
			<form action="javascript:LoginView.onLogin()" method="post">
				<fieldset>
					<label for="username">Username</label>
					<input id="username-input" type="text" name="username"/>
					<label for="password">Password</label>
					<input id="password-input" type="password" name="password" /><br>						
					<input type="submit" value=" Log On&#8594; " />
					<input type="button" onclick="LoginView.onRegister()" value=" Register " />
				</fieldset>			
			</form>
		</div>
	</div>
</div>
