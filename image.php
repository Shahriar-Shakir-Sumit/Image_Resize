<?php 
class Image{

	public $max_file_size; // 200kb
	public $sizes;
	public function __construct() { 
		$this->max_file_size = 1024*2000000000;
		$this->sizes = array(100 => 100, 150 => 150, 250 => 250);
	}


	public function get_file_extension($file_name){
		$file_extension = new SplFileInfo($file_name);
		//var_dump($file_extension->getExtension()); die();
		return $file_extension;
	}

	public function is_a_valid_image_type($ext)
	{
		$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
		if (in_array($ext, $valid_exts)) 
			return true;
		else 
			return false;
	}

	public function resize_an_image($max_file_size_in_kb)
	{
		$max_file_size = 1024*$max_file_size_in_kb; // 200kb		
		$sizes = array(100 => 100, 150 => 150, 250 => 250);
		return $max_file_size;

	}
}

