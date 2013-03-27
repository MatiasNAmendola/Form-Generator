<?php

class FormGenerator {
	
	public function __construct(String $formName, String $formMethod, String $formAction, Array $formAttr = array()) {
		if (!empty($formName)) {
			$this->formName = $formName;
		} else {
			return false;
		}
		
		if (!empty($formMethod)) {
			$this->formMethod = $formMethod;
		} else {
			return false;
		}
		
		if (!empty($formAction)) {
			$this->formAction = $formAction;
		} else {
			return false;
		}
		
		$this->formAttr = $formAttr;
		
		return true;
	}
	
	
	
	public function addTextarea(String $name, String $value = '', array $attr = array()) {
		
	}
	
	
	
	public function formRender() {
		$this->form = "<form method=\"$formMethod" action=\"$action\"";
		if(count($attr) > 0) {
			foreach($attr as $k => $v) {
				$this->form .= " $k=\"$v\"";
			}
		}
		$this->form .= '>';
		$this->formEnd = '</form>';
	}
	
	
	

	
	public function addInputField($type, $name, $label = '', $size = '', $value ='', $attr = array()) {
		$name = generatNameTag(array('input', $type, $name, $label));
		
		$field = "<input type=\"$type\"";
		$field .= $this->attr2String('size', $size);
		$field .= $this->attr2String('value', $value);
		if(count($attr) > 0) {
			$field .= $this->attr2String($attr);
		}
		$field .= ' />';
		
		$label = "<label for=\"$name\">$label</label>";
		
		$this->content[] = array($label, $field);
	}
	
	
	
	
	public function generateNameTag($data = array()) {
		$return = '';
		foreach ($data as $v) {
			$return .= '_';
		}
	}








	private function attr2String($attr, $val = '') {
		if(is_array($attr) && $val == '') {
			foreach($attr as $k => $v) {
				$return = $this->attr2String($k, $v);
			}
			return $return;
		}else{
			if ($attr != '' && $val != '') {
				return " $attr=\"$val\"";
			}else if($attr != '' && $val == '') {
				return " $attr=\"\"";
			}else{
				return '';
			}
		}
	}

	



	public function generatForm() {
		$return = $this->form;
		foreach($this->content as $c) {
			$return .= '<div>' . $c[0] . $c[1] . '</div>';
		}
		$return .= $this->formEnd;
		
		return $return;
	}
}


?>
