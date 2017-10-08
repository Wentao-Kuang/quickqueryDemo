<?php

include 'init.php';
require 'connect.php';
require 'database.php';

$layout->add('Header')->set('Welcome to Quick Query System');


if (is_null($token)) {
    $t = $layout->add(['View', 'red'=>true,  'ui'=>'segment'])->add('Text');
    $t->addParagraph('Before manipulating the databases please connect the corresponding companies.');
    //$connectB = $app->add(['Button', 'Connect'])->link('?action=connect');
    //$connectB->set(['Connect', 'iconRight'=>'right arrow']);
}
else {
    $t = $layout->add(['View', 'red'=>true,  'ui'=>'segment'])->add('Text');
    $t->addParagraph('Connect Successfully. Company ID: '.$_SESSION['company_id']);
    $disconnectB = $app->add(['Button', 'Disconnect'])->link('?action=disconnect');
    $disconnectB->set(['Disconnect', 'icon'=>'pause']);
}

$table = $layout->add('Table');
$table->setModel(new Company($db),['name']);
$table->addColumn('name', new \atk4\ui\TableColumn\Link('?action=connect'));
?>