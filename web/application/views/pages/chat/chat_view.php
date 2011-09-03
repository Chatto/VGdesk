<span class="page-script">
    VGDeskHome.setPageId("chat");
    
    function onChatViewLoaded(success) { ChatView.onLoad(success); }
    IncludeManager.includeScripts(["js/pages/chat/chat.js", "js/pages/chat/chat_view.js"], onChatViewLoaded);
</span>


<div id="chat-container">
	
	<div id="chat-tabs">
		<div class="tab tab-active">Main</div>
		<div class="tab">Cloesy</div>
		<div class="tab">Seadrinker</div>
		<div class="tab">Paula.AMC</div>
	</div>
	
	<div id="chat-box">
	TheSlapOfGod: People are horrible<br>
	TheSlapOfGod: You know the Oslo shooter guy?<br>
	TheSlapOfGod: Someone was asking what song he was playing on his ipod when he was at the camp shooting people<br>
	TheSlapOfGod: And the FIRST GOD DAMN RESPONSE was "Let the bodies hit the FJORD"<br>
	</div>
	
	<div id="chat-input">
		<textarea id="chat-textarea">Text here, Xika-dang</textarea>

	</div>
</div>
<div id="chat-list">Chatto<br>Xander<br>Cloesy<br>Paula AMC<br>Seadrinker</div>
