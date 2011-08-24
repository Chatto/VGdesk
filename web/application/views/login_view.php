<span class="page-script" >
     IncludeManager.includeScripts(["js/pages/login/login.js", "js/pages/login/login_view.js"]);
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
					<input type="button" value=" Register " />
				</fieldset>			
			</form>
		</div>
	</div>

	<div class="section" id="reg-box">
		<div class="section-header">
			Travels of Oorta Registration
		</div>
		<div id="reg-forms">
			<form>
				<fieldset>
					<label for="regdisplayname">Display Name</label>
					<input id="reg-displayname" type="text" name="regdisplayname"/>
					<label for="regusername">Username</label>
					<input id="reg-displayname" type="text" name="regusername"/>
					<label for="regpass">Password</label>
					<input id="reg-pass" type="password" name="regpass"/>
					<label for="regpassverify">Re-type Password</label>
					<input id="reg-passverify" type="password" name="regpassverify"/>
					<label for="regemail">Email</label>
					<input id="reg-email" type="text" name="regemail"/><br>
					<input type="submit" value=" Submit&#8594; ">
				</fieldset>
			</form>
		</div>
	</div>
</div>
