<?php
require 'connect.php';

$url = 'http://localhost:8080/';

$app = new \atk4\ui\App();
$app->title = 'Quick Query';
if (file_exists('../public/atk4JS.min.js')) {
    $app->cdn['atk'] = '../public';
}
$app->initLayout(new \atk4\ui\Layout\Admin());
$layout = $app->layout;

if (isset($layout->leftMenu)) {
    $f = basename($_SERVER['PHP_SELF']);
    $layout->leftMenu->addItem(['Welcome Page', 'icon'=>'gift'], ['index']);
    $layout->leftMenu->addItem(['Company Management', 'icon'=>'object group'], ['CompanyManage']);
    $form = $layout->leftMenu->addGroup(['Entities', 'icon'=>'cubes']);
    $form->addItem('Account', ['Account']);
    $form->addItem('Attachable', ['Attachable']);
    $form->addItem('Batch', ['Batch']);
    $form->addItem('Bill', ['Bill']);
    $form->addItem('BillPayment', ['BillPayment']);
    $form->addItem('Budget', ['Budget']);
    $form->addItem('ChangeDataCapture', ['ChangeDataCapture']);
    $form->addItem('CompanyInfo', ['CompanyInfo']);
    $form->addItem('CreditMemo', ['CreditMemo']);
    $form->addItem('Customer', ['Customer']);
    $form->addItem('Department', ['Department']);
    $form->addItem('Deposit', ['Deposit']);
    $form->addItem('Employee', ['Employee']);
    $form->addItem('Estimate', ['Estimate']);
    $form->addItem('Invoice', ['Invoice']);
    $form->addItem('Item', ['Item']);
    $form->addItem('JournalEntry', ['JournalEntry']);
    $form->addItem('Payment', ['Payment']);
    $form->addItem('PaymentMethod', ['PaymentMethod']);
    $form->addItem('Preference', ['Preference']);
    $form->addItem('Purchase', ['Purchase']);
    $form->addItem('PurchaseOrder', ['PurchaseOrder']);
    $form->addItem('RefundReceipt', ['RefundReceipt']);
    $form->addItem('Reports', ['Reports']);
    $form->addItem('SalesReceipt', ['SalesReceipt']);
    $form->addItem('TaxAgency', ['TaxAgency']);
    $form->addItem('TaxCode', ['TaxCode']);
    $form->addItem('TaxRate', ['TaxRate']);
    $form->addItem('TaxService', ['TaxService']);
    $form->addItem('Term', ['Term']);
    $form->addItem('TimeActivity', ['TimeActivity']);
    $form->addItem('Transfer', ['Transfer']);
    $form->addItem('Vendor', ['Vendor']);
    $form->addItem('VendorCredit', ['VendorCredit']);
}
?>