<?php
  require_once 'pdo_covidirect.php';

  db_covidirect::setConfig('mysql:host=172.17.0.1:3306;dbname=covidirect;', 'admin', '420');
?>