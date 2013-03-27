<?php

class Library_FormField {
	
	private $fieldName = '';
	private $tag = '';
	private $type = '';
	private $attribute = array();
	
	
	public function __construct(String $name, String $tag, String $type, Array $attr = array()) {
		$this->setTag($tag);
		
		$this->setFieldName($name);
		$this->setAttribute('id', $name);
		$this->setAttribute('name', $name);
		
		$this->setType($type);
		$this->setAttribute('type', $type);
	}
	
	
	
	public function renderHTML() {
		$html = '<' . $this->getTag() . ' ';
		foreach($this->attribute as $k => $v) {
			$html .= $k . '="' . $v . '" ';
		}		
		if (strtolower($this->getTag()) != 'input') {
			$html .= '/>';
		} else {
			$html .= '>';
			$html .= '</' . $this->getTag() . '>';
		}
		
		
		return $html;
	}
	
	
	
	public function setTag(String $s) { $this->tag = $s; }
	public function setFieldName($s) { $this->fieldName = $s; }
	public function setType(String $s) { $this->type = $s; }
	public function setAttribute(String $k, String $v) { $this->attribute[$k] = $v; }
	
	public function getTag() { return $this->tag; }
	public function getFieldName() { return $this->fieldName; }
	public function getType() { return $this->type; }
	public function getAttribute(String $k) { return (key_exists($k, $this->getAttributes())) ? $this->attribute[$k] : ''; }
	public function getAttributes() { return $this->attribute; }
}

?>