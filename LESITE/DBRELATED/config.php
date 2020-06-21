<?php
  require_once 'pdo_covidirect.php';

  db_covidirect::setConfig('mysql:unix_socket=/cloudsql/rare-array-280013:europe-west4:covidirect-database-mysql;dbname=covidirect;', 'admin', '420');
?>