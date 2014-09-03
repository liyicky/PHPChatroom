<?php
  mysql_connect("127.0.0.1", "root", "");

  mysql_select_db("chat")
  or die (2);

  $result = mysql_query("select * from chat order by time desc limit 0, 10");
  $messages = array();
  date_default_timezone_set("America/New_York");

  while ($row = mysql_fetch_array($result)) {
    $messages[] = "<div class='message'><div class='messageHead'>" . $row[name] . " _ " . date("g:i A M, d Y", $row[time]) . "</div><div class='messageContent'>" . $row[message] . "</div></div>";
    $old = $row[time];
  }

  for ($i=9;$i>-1;$i--) {
    echo $messages[$i];
  }

  mysql_query("delete from chat where time < " . $old);
?>
