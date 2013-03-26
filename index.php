<?php

require_once 'Form.php';
require_once 'FormGenerator.php';
//require_once 'FormValidator.php';

$method = 'POST';
$action = '';
$attr = array('class' => 'generatedForm', 'id' => 'form1');
$form = new FormGenerator($method, $action, $attr);



$label = 'Test-Feld:';
$type = 'text';
$size = 23;
$value = 'Default Value';
$attr = array('onclick' => 'alert("hallo du da")', 'class' => 'inputField');
$form->addInputField($type, $name, $label, $size, $value, $attr);


echo $form->generatForm();
?>