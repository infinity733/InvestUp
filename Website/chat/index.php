<?php 
include '../conn.php';
$colors = array('#007AFF','#FF7000','#FF7000','#15E25F','#CFC700','#CFC700','#CF1100','#CF00BE','#F00');
$color_pick = array_rand($colors);


$to_mail = $_GET['with'];
$from_mail = $_SESSION['user_email'];

// redirect to login page if user is not logged in
if (!isset($_SESSION['user_email'])) {
	header('location: ../signup.php');
}

// redirect to home if user is trying to chat with himself
if ($to_mail == $from_mail) {
	header('location: ../index.php');
}

$conn=mysqli_connect("localhost","root","","investup");


// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
  }
  
  // Prepare and execute query
  $sql = "SELECT * FROM messages
		  WHERE (`sender` = '$from_mail' AND `recipient`= '$to_mail')
			 OR (`sender` = '$to_mail' AND `recipient` = '$from_mail' )
		  ORDER BY timestamp ASC";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  
//   while ($row = mysqli_fetch_assoc($result)) {
// 	echo $row["sender"] . ": " . $row["recipient"] . $row["message"] . "\n";
// 	echo "\n";
//   }
  
  // Close statement and connection
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
.chat-wrapper {
	font: bold 11px/normal 'lucida grande', tahoma, verdana, arial, sans-serif;
    padding: 20px;
    width: 80%;
	margin:  auto;
}
#message-box {
    width: 100%;
    display: inline-block;
    height: 80vh;
    background: #F1F5F9;
    box-shadow: inset 0px 0px 2px #00000017;
	border-radius: 10px;
	overflow-y:scroll;
	position:relative;
}
.user-panel{
    margin-top: 10px;
	min-height:10vh;
	display: flex;
	align-items: center;
	justify-content: space-between;
}
input[type=text]{
    border: none;
    padding: 20px 20px;
	border-radius: 5px;
	border:2px solid #ccc;
	font-size: 18px;
	border-style: solid

}

input[type=text]#message{
    width:100%;
	margin: 0px 20px 0px 15px;

}
button#send-message {
    border: none;
    padding: 20px 30px;
    background: #EA580C;
    box-shadow: 2px 2px 2px #0000001c;
	margin: 0px 15px 0px 0px;
	border-radius: 5px;
	color:white;
	font-size: 18px;

}
</style>
</head>
<body>

<div class="chat-wrapper">
	
<div id="message-box" >
	<div style="position:sticky;top:0px; background-color:#EA580C;width:100%;color:white;padding:10px 0px" >  
		<h2 style="margin-left:25px;font-size:18px">Chatting with: <?php echo $to_mail ?></h2>
	</div>

<?php
while ($row = mysqli_fetch_assoc($result)) {
	$user_name = $row["sender"];
	$user_message = $row["message"];
	$dir=$row["sender"] == $_SESSION['user_email']?'right':'left';
	$bgcolor=$row["sender"] != $_SESSION['user_email']?'white':'#F3826E';
	$color=$row["sender"] != $_SESSION['user_email']?'black':'white';
	echo '<div class="text-box" style="color:black; font-size:18px; margin:4px 25px;clear:both;float:'. $dir . '"> <div style="color:'.$color . '; background-color:'. $bgcolor . '; padding:15px; border:1px solid white; max-width:600px; border-radius:10px;margin-top:10px; "> <span class="user_message" style="font-size:16px;font-weight:normal">' . $user_message . '</span></div> </div>';
  }

?>

</div>
<div class="user-panel">
	<input type="text" name="name" id="name" style="display:none" placeholder="Type your message here..." maxlength="100" class="input-box" value=<?php echo $_SESSION['user_email'] ?> />
	<input type="text" name="message" id="message" placeholder="Type your message here..." maxlength="800" class="input-box" />
	<button id="send-message">Send</button>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript">  

  const queryParams = new URLSearchParams(window.location.search);
  const chattingWith = queryParams.get('with');

	//create a new WebSocket object.
	var msgBox = $('#message-box');
	var wsUri = "ws://localhost:9000/demo/server.php"; 	
	websocket = new WebSocket(wsUri); 
	
	websocket.onopen = function(ev) { // connection is open 
		
		// msgBox.append('<div class="system_msg" style="color:#15803D; font-size:20px; margin-left:25px">Connected</div>'); //notify user
		// msgBox.append('<hr style="margin-bottom:30px;margin-left:25px "/>'); //notify user
	}
	// Message received from server
	websocket.onmessage = function(ev) {
		var response 		= JSON.parse(ev.data); //PHP sends Json data
		var res_type 		= response.type; //message type
		var user_message 	= response.message; //message text
		var user_name 		= response.name; //user name
		var user_color 		= response.color; //color
		var from_mail 		= response.from_mail; //color
		var to_mail 		= response.to_mail; //color

		const dir=user_name == chattingWith?'left':'right';
		const bgcolor=user_name == chattingWith?'white':'#F3826E';
		const color=user_name == chattingWith?'black':'white';
		const c_user='<?php echo $_SESSION['user_email'] ?>';
		const display=(c_user ==from_mail && chattingWith==to_mail) ||( c_user ==to_mail && chattingWith==from_mail)?'block':'none';

		switch(res_type){
			case 'usermsg':
				msgBox.append(`<div style="color:black; font-size:18px; margin:4px 25px;clear:both;float:${dir};display:${display}"> <div style="background-color:${bgcolor};color:${color}; padding:15px; border:1px solid white; max-width:600px; border-radius:10px;margin-top:10px; "> <span class="user_message" style="font-size:16px;font-weight:normal">${user_message}</span></div> </div>`);
				break;
			case 'system':
				msgBox.append('<div style="color:#bbbbbb;font-size:20px">' + user_message + '</div>');
				break;
		}
		msgBox[0].scrollTop = msgBox[0].scrollHeight; //scroll message 

	};
	
	websocket.onerror	= function(ev){ msgBox.append('<div class="system_error">Error Occurred - ' + ev.data + '</div>'); }; 
	websocket.onclose 	= function(ev){ msgBox.append('<div class="system_msg">Connection Closed</div>'); }; 

	//Message send button
	$('#send-message').click(function(){
		send_message();
	});
	
	//User hits enter key 
	$( "#message" ).on( "keydown", function( event ) {
	  if(event.which==13){
		  send_message();
	  }
	});
	
	//Send message
	function send_message(){
		var message_input = $('#message'); //user message text
		var name_input = $('#name'); //user name


		
		if(name_input.val() == ""){ //empty name?
			alert("Enter your Name please!");
			return;
		}
		if(message_input.val() == ""){ //emtpy message?
			alert("Enter Some message Please!");
			return;
		}

		const queryParams = new URLSearchParams(window.location.search);
  		const to_email = queryParams.get('with');
		
		// aler(message_input.val())
		//prepare json data
		var msg = {
			message: message_input.val(),
			name: name_input.val(),
			from_mail:  '<?php echo $_SESSION['user_email'] ?>',
			to_mail:to_email,
			color : '<?php echo $colors[$color_pick]; ?>'
		};
		//convert and send data to server
		websocket.send(JSON.stringify(msg));	
		message_input.val(''); //reset message input
	}
</script>
</body>
</html>
