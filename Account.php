<?php
require 'init.php';
require 'connect.php';

if (is_null($token)) {
    $t = $layout->add(['View', 'red'=>true,  'ui'=>'segment'])->add('Text');
    $t->addParagraph('Before manipulating the databases please connect the corresponding companies first.');
    $connectB = $app->add(['Button', 'Go connection'])->link('index.php');
}
else {
    $t = $layout->add(['View', 'red'=>true,  'ui'=>'segment']);
    $t->add(['Header', 'Company ID: '.$_SESSION['company_id'], 'size'=>3]);
    $disconnectB = $t->add(['Button', 'Disconnect','icon'=>'pause'])->link('?action=disconnect');
    $t->add(['Header', 'Account', 'icon'=>'settings']);
    
	
$buttons = [
    ['page' => ['account_create'],                       'title' => 'Create'],
    ['page' => ['account_read'],                         'title' => 'Read'],
    ['page' => ['account_update'],                       'title' => 'Update'],
    ['page' => ['account_query', 'layout'=>'centered'],  'title' => 'Query'],
];
// toolbar
$tb = $layout->add('View');
// iframe
$i = $layout->add(['View', 'green'=>true, 'ui'=>'segment'])->setElement('iframe')->setStyle(['width'=>'100%', 'height'=>'500px']);
// add buttons in toolbar
foreach ($buttons as $k=>$args) {
    $tb->add('Button')
        ->set([$args['title'], 'iconRight'=>'down arrow'])
        ->js('click', $i->js()->attr('src', $layout->app->url($args['page'])));
}
	
}
?>