<?php
return [
  "driver" => "smtp",
  "host" => "smtp.mailtrap.io",
  "port" => 2525,
  "from" => array(
      "address" => "from@example.com",
      "name" => "Example"
  ),
  "username" => "c4a3307c5e0b7b",
  "password" => "c37aa339cf31f2",
  "sendmail" => "/usr/sbin/sendmail -bs"
];