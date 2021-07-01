<?php

/**
 * ===================================================
 * 
 * PHP Framework "Mk2"
 *
 * HtmlUI
 * 
 * URL : https://www.mk2-php.com/
 * 
 * Copylight : Nakajima-Satoru 2021.
 *           : Sakaguchiya Co. Ltd. (https://www.teastalk.jp/)
 * 
 * ===================================================
 */

namespace mk2\ui_html;

use Mk2\Libraries\UI;

class HtmlUI extends UI{

	/**
	 * div
	 * @param string $text
	 * @param array $option = null
	 */
	public function div($text,$option = null){

		$optstr=$this->_optionString($option);

		$str='<div'.$optstr.">".$text."</div>";

		return $str;
	}

	/**
	 * span
	 * @param string $text
	 * @param array $option = null
	 */
	public function span($text,$option = null){

		$optstr=$this->_optionString($option);

		$str='<span'.$optstr.">".$text."</span>";

		return $str;

	}

	/**
	 * link
	 * @param string $text
	 * @param string $url
	 * @param array $option = null
	 */
	public function link($text,$url,$option = null){

		if(empty($option)){
			$option=[];
		}

		$option["href"]=$this->Response->url($url);

		$optstr=$this->_optionString($option);

		$str="<a".$optstr.">".$text."</a>";

		return $str;
	}

	/**
	 * image
	 * @param string $imageUrl
	 * @param array $option = null
	 */
	public function image($imageUrl,$option=null){

		if(empty($option)){
			$option=[];
		}

		$option["src"]=$this->Response->url($imageUrl);

		$optstr=$this->_optionString($option);

		$str="<img".$optstr.">";

		return $str;
	}

	/**
	 * iframe
	 * @param string $imageUrl
	 * @param array $option = null
	 */
	public function iframe($iframeUrl,$option=null){

		if(empty($option)){
			$option=[];
		}

		$option["src"]=$this->Response->url($iframeUrl);

		$optstr=$this->_optionString($option);

		$str="<iframe".$optstr."></iframe>";

		return $str;
	}

	/**
	 * css
	 * @param $cssUrls
	 * @param array $option = null
	 */
	public function css($cssUrls,$option=null){

		if(empty($option)){
			$option=[];
		}

		if(is_string($cssUrls)){
			$cssUrls=[$cssUrls];
		}

		$str="";
		foreach($cssUrls as $c_){

			$option["rel"]="stylesheet";
			$option["href"]=$this->Response->url($c_);
	
			$optstr=$this->_optionString($option);
	
			$str.="<link".$optstr.">";
		}

		return $str;
	}

	/**
	 * script
	 * @param $scriptUrls
	 * @param array $option = null
	 */
	public function script($scriptUrls,$option=null){

		if(empty($option)){
			$option=[];
		}

		if(is_string($scriptUrls)){
			$scriptUrls=[$scriptUrls];
		}

		$str="";
		foreach($scriptUrls as $s_){

			$option["src"]=$this->Response->url($s_);

			$optstr=$this->_optionString($option);
	
			$str.="<script".$optstr."></script>";
		}

		return $str;
	}

	/**
	 * _optionString
	 * @param $option
	 */
	private function _optionString($option){

		$optStr="";
		if(is_array($option)){
			foreach($option as $field=>$value){
				$optStr.=" ".$field.'="'.$value.'"';
			}
		}

		return $optStr;
	}
}