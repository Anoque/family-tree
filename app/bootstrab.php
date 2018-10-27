<?php
require_once 'app/config/db.php';
require_once ("app/core/model.php");
require_once ("app/core/controller.php");
require_once ("app/core/view.php");
require_once ("app/core/route.php");
$link = Connection::connect();
route::start();
?>