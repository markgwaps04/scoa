<?php
ob_start();

header("pragma: no-cache");
header("Cache-Control: private");
header("Cache-Control: no-cache");
header('location: public/Users');

flush();
ob_end_flush();
die();
