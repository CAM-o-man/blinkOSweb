<?php
$to = "cam-o-man@live.com";
$subject = "hackSugar contact us";
$text = $_POST["subject"] . " From\n" . $_POST["fname"] . " " . $_POST["lname"];

$text = wordwrap($text, 70);

mail($to, $subject, $text);