<?php 
include_once 'conn.php';

?>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.chat-container {
  display: flex;
  flex-direction: column;
  height: 100vh;
}

.chat-messages {
  flex-grow: 1;
  overflow-y: auto;
  padding: 20px;
  background-color: #000000;
}

.message {
    padding : 5px;
    display: flex;
  align-items: center;
  margin-bottom: 10px;
  border-radius: 10px;
}

.message-text {
    padding: 10px;
  border-radius: 10px;
  max-width: 60%;
  font-size: 20px;
}

.message-time {
    padding: 5px;
  font-weight: bold;
}

.chat-input {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px;
  background-color: #000000;
}

.chat-input input[type="text"] {
  flex-grow: 1;
  border: none;
  background-color: #f1f1f1;
  font-size: 20px;
  padding: 15px;
  border-radius: 30px;
  margin-right: 10px;
  width: 65%
}

.chat-input button {
  background-color: yellow;
  color: black;
  border: none;
  cursor: pointer;
  font-weight: bold;
  font-size: 20px;
  padding: 15px 30px;
  border-radius: 30px;
  width : 30%
}

    </style>
  </head>
    <body>
    <div class="chat-container">
    <div class="chat-messages">

    </div>

    <div class="chat-input">
    <form id="message-form" action="" method="GET">
          <input type="text" name="message" placeholder="Type a message..." required>
          <input type="text" name="name" value="<?php echo $_GET['name'] ?>" hidden>
        <input type="text" name="color" value="<?php echo $_GET['color'] ?>" hidden>
          <button>Send</button>
    </form>
    </div>
 
    <script>
  // Define a function to fetch new chat messages
  function fetchMessages() {
  // Get the chat container element
  var chatContainer = document.querySelector('.chat-messages');

  // Get the current scroll position
  var isScrolledToBottom = chatContainer.scrollHeight - chatContainer.clientHeight <= chatContainer.scrollTop + 1;
  
  // Send an AJAX request to fetch the latest chat messages
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'get_messages.php');
  xhr.onload = function() {
    if (xhr.status === 200) {
      // Update the chat container with the new messages
      chatContainer.innerHTML = xhr.responseText;
      
      // Scroll to the bottom if the chat was already scrolled to the bottom before the new messages were loaded
      if (isScrolledToBottom) {
        chatContainer.scrollTop = chatContainer.scrollHeight - chatContainer.clientHeight;
      }
    }
  };

  xhr.send();
}

  
  // Call the fetchMessages function every second
  setInterval(fetchMessages, 1000);

  $(document).ready(function() {
    // Listen for the form submission
    $('#message-form').submit(function(event) {
      // Prevent the default form behavior
      event.preventDefault();
      // Get the form data
      var formData = $(this).serialize();
      // Send an AJAX request to the server
      $.ajax({
        type: 'GET',
        url: 'server.php', 
        data: formData,
        success: function(response) {
            // Do something with the response, e.g. update the chat messages
            $('.chat-messages').html(response);
            // Clear the message input field
            $('input[name="message"]').val('');
            // Scroll to the bottom of the chat container
            $('.chat-messages').scrollTop($('.chat-messages')[0].scrollHeight);
            }

      });
    });
  });
</script>

    </body>
</html>