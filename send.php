<?php
  mysql_connect("127.0.0.1", "root", "")
   or die (1);

  mysql_select_db("chat")
  or die (2);

if ($_GET["message"] || $_GET["name"]) {
  $message = $_GET["message"];
  $name    = $_GET["name"];
  }

  if (strlen($message) < 1) {
    echo 3;
  } else if (strlen($message) > 255) {
    echo 4;
  } else if (strlen($name) < 1) {
    echo 5;
  } else if (strlen($name) > 29) {
    echo 6;
  } else if (mysql_num_rows(mysql_query("select * from chat where name = '" . $name . "' and ip != '" . @$REMOTE_ADDR . "'")) != 0) {
    echo 7;
  } else {
    $search = array("<", ">", ">", "<");

    mysql_query("insert into chat values ('" . time() . "', '" . str_replace($search,"",$name) . "', '" . @$REMOTE_ADDR . "', '" . str_replace($search,"", $message) . "')")
    or die (8);
  }
?>
