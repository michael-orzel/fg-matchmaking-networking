var instance = false;
var state;
var file;
//var mes;

function Chat () {
	this.getState = getStateOfChat;
    this.update = updateChat;
    this.send = sendChat;
}

// Gets current state of chat
function getStateOfChat() {
	if(!instance) {
		instance = true;
		$.ajax({
			type: "POST",
			url: "process.php",
			data: {  
				'function': 'getState',
				'file': file
			},
			dataType: "json",
			
			success: function(data) {
				state = data.state;
				instance = false;
			},
		});
	}
} // End getStateOfChat

// Updates the chat
function updateChat() {
	if(!instance) {
		instance = true;
	    $.ajax({
			type: "POST",
			url: "process.php",
			data: {  
				'function': 'update',
				'state': state,
				'file': file
			},
			dataType: "json",
			
			success: function(data) {
				if(data.text){
					for (var i = 0; i < data.text.length; i++)
					{
                    	$('#chat-area').append($("<p>"+ data.text[i] +"</p>"));
                    }								  
				}
				document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
				instance = false;
				state = data.state;
			},
		});
	} // End if(!instance)
	else {
		setTimeout(updateChat, 1500);
	}
} // End updateChat

// Send the message
function sendChat(message, nickname) {
	updateChat();
    $.ajax({
		type: "POST",
		url: "process.php",
		data: {  
			'function': 'send',
			'message': message,
			'nickname': nickname,
			'file': file
		},
		dataType: "json",

		success: function(data) {
			updateChat();
		},
	});
} // End sendChat
