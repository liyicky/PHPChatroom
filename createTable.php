<?php
  mysql_connect("127.0.0.1", "root", "")
  or die (mysql_error());

  mysql_select_db("chat")
  or die (mysql_error());

  mysql_query("create table chat(
    time int(11) NOT NULL,
    name varchar(30) NOT NULL,
    ip varchar(15) NOT NULL,
    message varchar(255) NOT NULL,
    PRIMARY KEY (time)
  )") or die (mysql_error());
  echo "Complete.";
?>
