<span class="page-script">
    VGDeskHome.setPageId("chat");
    
    function onChatViewLoaded(success) { ChatView.onLoad(success); }
    IncludeManager.includeScripts(["js/pages/chat/chat.js", "js/pages/chat/chat_view.js"], onChatViewLoaded);
</span>

<!-- Chat HTML Here -->