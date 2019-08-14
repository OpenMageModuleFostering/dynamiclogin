<?php
class SF_Jsgetphp_LoginController extends Mage_Core_Controller_Front_Action
{
	public function LoginAction()
    {
		 $this->loadLayout();
		 $html=$this->getLayout()->getBlock('root')->toHtml();
		 $html=$this->compress_html($html);
		 echo "document.write('".$html."')"; 
    }
	public function compress_html($string) {
		$string = str_replace("\r\n", '', $string); 
		$string = str_replace("\n", '', $string); 
		$string = str_replace("\t", '', $string); 
		$pattern = array (
			"/> *([^ ]*) *</",
			"/[\s]+/",
			"/<!--[^!]*-->/",
			"/\" /",
			"/ \"/",
			"'/\*[^*]*\*/'"
		);
		$replace = array (
			">\\1<",
			" ",
			"",
			"\"",
			"\"",
			""
		);
		return preg_replace($pattern, $replace, $string);
	}

}
