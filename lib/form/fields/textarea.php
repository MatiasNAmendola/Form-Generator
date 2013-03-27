<?php

class Library_Form_Fields_Textare {

	function __construct (String $name, String $value = '', array $attr = array()) {
		$this->createField($name, $value, $attr);
	}
	
	
	private function createField (String $name, String $value = '', array $attr = array()) {
		$html = '<textarea ';
		$html .= 'name="'.$name.'" ';
		if (count($attr) > 0) {
			foreach($attr as $k => $v) {
				$html .= $k . '="' . $v . '" ';
			}
		}
		$html = trim($html) . '>';
		if (!empty($value)) {
			$html .= $value;
		}
		$html .= '</textarea>';
	}
	
	
	public function valid (Library_Form_Fields_Textare $obj = $this) {
		
	}
}