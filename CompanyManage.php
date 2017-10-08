<?php
include 'init.php';
require 'database.php';
$layout->add('Header')->set('Company Management');
$layout->add(['CRUD'])->setModel(new Company($db));