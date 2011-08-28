<span class="page-script">
    VGDeskHome.hideHeader();
    VGDeskHome.setPageId("register");
    VGDeskHome.setLoggedInUser(null);
    
    function onRegisterViewLoaded(success) { RegisterView.onLoad(success); }
    IncludeManager.includeScripts(["js/pages/login/login.js", "js/pages/login/register_view.js"], onRegisterViewLoaded);
</span>

<div id="login-body">
	<div class="section" id="reg-box">
		<div class="section-header">
			Travels of Oorta Registration
		</div>
		<div id="reg-forms">
			<form action="javascript:RegisterView.onRegister()" method="POST">
				<fieldset>
					<label for="regdisplayname">Display Name</label>
					<input id="reg-displayname" type="text" name="regdisplayname"/>
					<label for="regusername">Username</label>
					<input id="reg-username" type="text" name="regusername"/>
					<label for="regpass">Password</label>
					<input id="reg-pass" type="password" name="regpass"/>
					<label for="regpassverify">Re-type Password</label>
					<input id="reg-passverify" type="password" name="regpassverify"/>
					<label for="regemail">Email</label>
					<input id="reg-email" type="text" name="regemail"/><br>
					<input type="submit" value=" Submit&#8594; " /><input type="button" onClick="RegisterView.onLogin()" value="Back to Login"/>
				</fieldset>
			</form>
		</div>
	</div>
</div>