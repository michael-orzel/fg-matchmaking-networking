<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>

<head>
  <title>Netplay</title>

  <link rel="stylesheet" type="text/css" href="style.css">

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script type="text/javascript" src="chat.js"></script>

  <script type="text/javascript">
  /*
    // Ask user for name with popup prompt    
    var name = prompt("Enter your chat name:", "Guest");
    
    // Default name is 'Guest'
    if (!name || name === ' ') {
     name = "Guest";	
    }
  
    // Strip Tags
    name = name.replace(/(<([^>]+)>)/ig,"");
  
    // Display name on page
    $("#name-area").html("You are: <span>" + name + "</span>");
  */

    // Kick off chat
    var chat =  new Chat();
    $(function() {
      chat.getState(); 
     
      // Watch textarea for key presses
      $("#sendie").keydown(function(event) {
        var key = event.which;  
       
        // All keys including return  
        if (key >= 33) {      
          var maxLength = $(this).attr("maxlength");  
          var length = this.value.length;

          // Don't allow new content if length is maxed out
          if (length >= maxLength) {
            event.preventDefault();  
          }
        }
      });

      // Watch textarea for key release
      $('#sendie').keyup(function(e) {
                
        if (e.keyCode == 13) {

          var text = $(this).val();
          var maxLength = $(this).attr("maxlength");  
          var length = text.length; 
                 
          // Send 
          if (length <= maxLength + 1) {        
            chat.send(text, name); // SESSION['USERNAME']!!!!!!
            $(this).val("");
          } 
          else {
            $(this).val(text.substring(0, maxLength));
          }

        }
      });
    }); // End function
</script>
</head>

<body onload="setInterval('chat.update()', 1000)">
  <div id="page-wrap">
    <h2>jQuery/PHP Chat</h2>
    
    <div id="chat-wrap"><div id="chat-area"></div></div>
    
    <form id="send-message-area">
      <?php if(isset($_SESSION['username'])) : ?>
    	  <p id="name-area">User: <strong><?php echo $_SESSION['username']; ?></strong></p>
      <?php endif ?>
      <p>Your message: </p>
      <textarea id="sendie" maxlength = '100'></textarea>
    </form>
  </div> <!-- End page-wrap -->
</body>

</html>