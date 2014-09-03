<html>
<head>
<style>
  .message {
    overflow: hidden;
    width: 500px;
    margin-bottom: 5px;
    border: 1px solid;
  }

  .messageHead {
    overflow: hidden;
    background: #FFC;
    width: 500px;
  }

  .messageContent {
    overflow: hidden;
    width: 500px;
  }

  .chat {
    overflow: hidden;
    width: 500px;
    margin: 0 auto;
  }

  .error {
    width: 500px;
    text-align: center;
    color: red;
  }

  .write {
    text-align: center;
  }
</style>
</head>

<body>
  <div id="chat">
    <div id="messages"></div>
    <div id="error"></div>
    <div id="write">
      <textarea id="message" cols="50" rows="5"></textarea>
      <br/>
      Name: <input type="text" id="name"/>
      <input type="button" value="Send" onClick="send();"/>
    </div>
  </div>


<script type="text/javascript">
  function showMessages() {
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET", "showMessages.php", false);
      xmlhttp.send(null);
    } else {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      xmlhttp.open("GET", "showMessages.php", false);
      xmlhttp.send();
    }

    document.getElementById("messages").innerHTML = xmlhttp.responseText;
    setTimeout("showMessages()", 30000);
  }

    showMessages();

  function send() {

      console.log("Message: " + document.getElementById("message").value);
      var sendto = "send.php?message=" + document.getElementById("message").value + "&name=" + document.getElementById("name").value;

      if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", sendto, false);
        xmlhttp.send(null);
      } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        xmlhttp.open("GET", sendto, false);
        xmlhttp.send();
      }

      var error = " ";

      switch(parseInt(xmlhttp.responseText)) {
      case 1:
        error = "The Database is down!";
        break;
      case 2:
        error = "The Database is down!";
        break;
      case 3:
        error = "Don't forget the message";
        break;
      case 4:
        error = "The Message is too long.";
        break;
      case 5:
        error = "Don't forget the name!";
        break;
      case 6:
        error = "The name is too long.";
        break;
      case 7:
        error = "The name is already taken";
      case 8:
        error = "The Database is down!";
      }

      if (error == " ") {
        document.getElementById("error").innerHTML = " ";
        showMessages();
      } else {
        document.getElementById("error").innerHTML = error;
      }
    }
</script>
</body>
</html>






