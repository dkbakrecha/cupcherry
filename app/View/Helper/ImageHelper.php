<?php

App::uses('Helper', 'View/Helper');

class ImageHelper extends AppHelper  {
        var $name = 'Image';
	public $helpers = array('Html');
	public $cacheDir = 'resized'; // relative to 'img'.DS

	/**
	 * Automatically resizes an image and returns formatted IMG tag
	 *
	 * @param string $path Path to the image file, relative to the webroot/img/ directory.
	 * @param integer $width Image of returned image
	 * @param integer $height Height of returned image
	 * @param boolean $aspect Maintain aspect ratio (default: true)
	 * @param array	$htmlAttributes Array of HTML attributes.
	 * @param boolean $return Wheter this method should return a value or output it. This overrides AUTO_OUTPUT.
	 * @return mixed  Either string or echos the value, depends on AUTO_OUTPUT and $return.
	 * @access public
	 */
	public function resize($path, $width, $height, $aspect = true, $htmlAttributes = array(), $return = false,$extraDiv=0) {
		
	
		$types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); // used to determine image type
		if (empty($htmlAttributes['alt'])) $htmlAttributes['alt'] = 'thumb';  // Ponemos alt default

		$uploadsDir = 'img';

		$fullpath = ROOT.DS.APP_DIR.DS.WEBROOT_DIR.DS.$uploadsDir.DS;
		
		$tempPath=realpath(dirname(dirname(dirname(__FILE__)))).'/webroot/img/';
		
		if(file_exists($tempPath.$path) && $path!='front_uploads/' && $path!='uploads/'){
			$url = ROOT.DS.APP_DIR.DS.WEBROOT_DIR.DS.IMAGES_URL.$path;
		}
		else{
			$url=$tempPath."uploads/no_image.jpg";
		}
		
		if (!($size = getimagesize($url)))
			return; // image doesn't exist
		
		
		if ($aspect) { // adjust to aspect.
			if($height == 0){
				$height = ceil($width / ($size[0]/$size[1]));
			}
			else if($width == 0){
				$width = ceil(($size[0]/$size[1]) * $height);
			}
			else if (($size[1]/$height) > ($size[0]/$width))  // $size[0]:width, [1]:height, [2]:type
				$width = ceil(($size[0]/$size[1]) * $height);
			else
				$height = ceil($width / ($size[0]/$size[1]));
		}
		
		$relfile = $this->webroot.$uploadsDir.'/'.$this->cacheDir.'/'.$width.'x'.$height.'_'.basename($path); // relative file
		$cachefile = $fullpath.$this->cacheDir.DS.$width.'x'.$height.'_'.basename($path);  // location on server
//prd($cachefile);
		if (file_exists($cachefile)) {
			$csize = getimagesize($cachefile);
			$cached = ($csize[0] == $width && $csize[1] == $height); // image is cached
			if (@filemtime($cachefile) < @filemtime($url)) // check if up to date
				$cached = false;
		} else {
			$cached = false;
		}

		if (!$cached) {
			$resize = ($size[0] > $width || $size[1] > $height) || ($size[0] < $width || $size[1] < $height);
		} else {
			$resize = false;
		}
		//prd($resize);
		
		if ($resize) {
			$image = call_user_func('imagecreatefrom'.$types[$size[2]], $url);
			if (function_exists("imagecreatetruecolor") && ($temp = imagecreatetruecolor ($width, $height))) {
				
				imagealphablending($temp, false);
				imagesavealpha($temp,true);
				$transparent = imagecolorallocatealpha($temp, 255, 255, 255, 127);
				imagefilledrectangle($temp, 0, 0, $width, $height, $transparent);
				
				imagecopyresampled ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
			} else {
				
				$temp = imagecreate ($width, $height);
				
				imagealphablending($temp, false);
				imagesavealpha($temp,true);
				$transparent = imagecolorallocatealpha($temp, 255, 255, 255, 127);
				imagefilledrectangle($temp, 0, 0, $width, $height, $transparent);
				
				imagecopyresized ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
			}
			call_user_func("image".$types[$size[2]], $temp, $cachefile);
			imagedestroy ($image);
			imagedestroy ($temp);
		} else {
			//copy($url, $cachefile);
			
			if (!$cached) {
				if(isset($height) and !empty($height))
					$htmlAttributes['height']=$height;
					
				if(isset($width) and !empty($width))
					$htmlAttributes['width']=$width;
					
				$htmlAttributes['border']=0;
				//prd($htmlAttributes);
				return $this->Html->image($path, $htmlAttributes);
			}
			
		}
		
		if($extraDiv==1){
			return '<div class="imgloader" style="height:'.$height.'px;width:'.$width.'px;">'.$this->output(sprintf($this->Html->_tags['image'], $relfile, $this->Html->_parseAttributes($htmlAttributes, null, '', ' ')), $return).'</div>';
		}
		else
		{
			return $this->output(sprintf($this->Html->_tags['image'], $relfile, $this->Html->_parseAttributes($htmlAttributes, null, '', ' ')), $return);	
		}

	}
	
	//online used in blog images
	public function resize_blog($path, $width, $height, $aspect = true, $htmlAttributes = array(), $return = false,$extraDiv=0) {
		
	
		$types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); // used to determine image type
		if (empty($htmlAttributes['alt'])) $htmlAttributes['alt'] = 'thumb';  // Ponemos alt default

		$uploadsDir = 'img';

		$fullpath = ROOT.DS.APP_DIR.DS.WEBROOT_DIR.DS.$uploadsDir.DS;
		
		$tempPath=realpath(dirname(dirname(dirname(dirname(__FILE__))))).'/blog/wp-content/uploads/';
		//pr($tempPath);
		//pr($tempPath.$path);
		if(file_exists($tempPath.$path) && $path!='front_uploads/' && $path!='uploads/'){
			$url = Router::url('/', true).'blog/wp-content/uploads/'.$path;
		}
		else{
			$url=$tempPath."uploads/no_image.jpg";
		}
		//prd($url);
		
		if (!($size = getimagesize($url)))
			return; // image doesn't exist
		
		
		if ($aspect) { // adjust to aspect.
			if($height == 0){
				$height = ceil($width / ($size[0]/$size[1]));
			}
			else if($width == 0){
				$width = ceil(($size[0]/$size[1]) * $height);
			}
			else if (($size[1]/$height) > ($size[0]/$width))  // $size[0]:width, [1]:height, [2]:type
				$width = ceil(($size[0]/$size[1]) * $height);
			else
				$height = ceil($width / ($size[0]/$size[1]));
		}
		
		$relfile = $this->webroot.$uploadsDir.'/'.$this->cacheDir.'/'.$width.'x'.$height.'_'.basename($path); // relative file
		$cachefile = $fullpath.$this->cacheDir.DS.$width.'x'.$height.'_'.basename($path);  // location on server
//prd($cachefile);
		if (file_exists($cachefile)) {
			$csize = getimagesize($cachefile);
			$cached = ($csize[0] == $width && $csize[1] == $height); // image is cached
			if (@filemtime($cachefile) < @filemtime($url)) // check if up to date
				$cached = false;
		} else {
			$cached = false;
		}

		if (!$cached) {
			$resize = ($size[0] > $width || $size[1] > $height) || ($size[0] < $width || $size[1] < $height);
		} else {
			$resize = false;
		}
		//prd($resize);
		
		if ($resize) {
			$image = call_user_func('imagecreatefrom'.$types[$size[2]], $url);
			if (function_exists("imagecreatetruecolor") && ($temp = imagecreatetruecolor ($width, $height))) {
				
				imagealphablending($temp, false);
				imagesavealpha($temp,true);
				$transparent = imagecolorallocatealpha($temp, 255, 255, 255, 127);
				imagefilledrectangle($temp, 0, 0, $width, $height, $transparent);
				
				imagecopyresampled ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
			} else {
				
				$temp = imagecreate ($width, $height);
				
				imagealphablending($temp, false);
				imagesavealpha($temp,true);
				$transparent = imagecolorallocatealpha($temp, 255, 255, 255, 127);
				imagefilledrectangle($temp, 0, 0, $width, $height, $transparent);
				
				imagecopyresized ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
			}
			call_user_func("image".$types[$size[2]], $temp, $cachefile);
			imagedestroy ($image);
			imagedestroy ($temp);
		} else {
			//copy($url, $cachefile);
			
			if (!$cached) {
				if(isset($height) and !empty($height))
					$htmlAttributes['height']=$height;
					
				if(isset($width) and !empty($width))
					$htmlAttributes['width']=$width;
					
				$htmlAttributes['border']=0;
				//prd($htmlAttributes);
				return $this->Html->image($path, $htmlAttributes);
			}
			
		}
		
		if($extraDiv==1){
			return '<div class="imgloader" style="height:'.$height.'px;width:'.$width.'px;">'.$this->output(sprintf($this->Html->_tags['image'], $relfile, $this->Html->_parseAttributes($htmlAttributes, null, '', ' ')), $return).'</div>';
		}
		else
		{
			return $this->output(sprintf($this->Html->_tags['image'], $relfile, $this->Html->_parseAttributes($htmlAttributes, null, '', ' ')), $return);	
		}

	}
	
	public function resize_url($path, $width, $height, $aspect = true,$htmlAttributes = array() , $return = false) {
		
	
		$types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); // used to determine image type
		if (empty($htmlAttributes['alt'])) $htmlAttributes['alt'] = 'thumb';  // Ponemos alt default

		$uploadsDir = 'img';

		$fullpath = ROOT.DS.APP_DIR.DS.WEBROOT_DIR.DS.$uploadsDir.DS;
		
		$tempPath=realpath(dirname(dirname(dirname(__FILE__)))).'/webroot/img/';
		
		if(file_exists($tempPath.$path) and $path!='uploads/')
			$url = ROOT.DS.APP_DIR.DS.WEBROOT_DIR.DS.IMAGES_URL.$path;
		else
		$url=$tempPath."uploads/no_image.jpg";
		
		//echo '<img src="'.$url.'">'; exit;
		if (!($size = getimagesize($url)))
			return; // image doesn't exist
		//pr($size); exit;
		if ($aspect) { // adjust to aspect.
			if (($size[1]/$height) > ($size[0]/$width))  // $size[0]:width, [1]:height, [2]:type
				$width = ceil(($size[0]/$size[1]) * $height);
			else
				$height = ceil($width / ($size[0]/$size[1]));
		}

		$relfile = $this->webroot.$uploadsDir.'/'.$this->cacheDir.'/'.$width.'x'.$height.'_'.basename($path); // relative file
		$cachefile = $fullpath.$this->cacheDir.DS.$width.'x'.$height.'_'.basename($path);  // location on server

		if (file_exists($cachefile)) {
			$csize = getimagesize($cachefile);
			$cached = ($csize[0] == $width && $csize[1] == $height); // image is cached
			if (@filemtime($cachefile) < @filemtime($url)) // check if up to date
				$cached = false;
		} else {
			$cached = false;
		}

		if (!$cached) {
			$resize = ($size[0] > $width || $size[1] > $height) || ($size[0] < $width || $size[1] < $height);
		} else {
			$resize = false;
		}

		if ($resize) {
			$image = call_user_func('imagecreatefrom'.$types[$size[2]], $url);
			if (function_exists("imagecreatetruecolor") && ($temp = imagecreatetruecolor ($width, $height))) {
				imagecopyresampled ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
			} else {
				$temp = imagecreate ($width, $height);
				imagecopyresized ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
			}
			call_user_func("image".$types[$size[2]], $temp, $cachefile);
			imagedestroy ($image);
			imagedestroy ($temp);
		} else {
			//copy($url, $cachefile);
			if (!$cached) {
				
				return ($path);
			}
			
		}
		//return $this->webroot.'img/'.$path;
		return $relfile;
		return $this->output(sprintf($this->Html->_tags['image'], $relfile, $this->Html->_parseAttributes($htmlAttributes, null, '', ' ')), $return);
	}
	
	
	//Image Resize Url for blog ...
	public function resize_url_blog($path, $width, $height, $aspect = true,$htmlAttributes = array() , $return = false) {
		
	
		$types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); // used to determine image type
		if (empty($htmlAttributes['alt'])) $htmlAttributes['alt'] = 'thumb';  // Ponemos alt default

		$uploadsDir = 'blog/wp-content/uploads';

		//$fullpath = ROOT.DS.APP_DIR.DS.WEBROOT_DIR.DS.$uploadsDir.DS;
		$fullpath = ROOT.DS.$uploadsDir.DS;
		
		$tempPath=realpath(dirname(dirname(dirname(dirname(__FILE__))))).'/blog/wp-content/uploads/';
		
		if(file_exists($tempPath.$path) and $path!='uploads/')
		{
			$url = Router::url('/', true).'blog/wp-content/uploads/'.$path;
		}
		else
		{
			$url=$tempPath."uploads/no_image.jpg";
		}
		//prd($url);
		
		//echo '<img src="'.$url.'">'; exit;
		if (!($size = getimagesize($url)))
			return; // image doesn't exist
		//pr($size); exit;
		if ($aspect) { // adjust to aspect.
			if (($size[1]/$height) > ($size[0]/$width))  // $size[0]:width, [1]:height, [2]:type
				$width = ceil(($size[0]/$size[1]) * $height);
			else
				$height = ceil($width / ($size[0]/$size[1]));
		}

		$relfile = $this->webroot.$uploadsDir.'/'.$width.'x'.$height.'_'.basename($path); // relative file
		$cachefile = $fullpath.$width.'x'.$height.'_'.basename($path);  // location on server
		//pr($cachefile);
		if (file_exists($cachefile)) {
			$csize = getimagesize($cachefile);
			$cached = ($csize[0] == $width && $csize[1] == $height); // image is cached
			if (@filemtime($cachefile) < @filemtime($url)) // check if up to date
				$cached = false;
		} else {
			$cached = false;
		}

		if (!$cached) {
			$resize = ($size[0] > $width || $size[1] > $height) || ($size[0] < $width || $size[1] < $height);
		} else {
			$resize = false;
		}

		if ($resize) {
			$image = call_user_func('imagecreatefrom'.$types[$size[2]], $url);
			if (function_exists("imagecreatetruecolor") && ($temp = imagecreatetruecolor ($width, $height))) {
				imagecopyresampled ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
			} else {
				$temp = imagecreate ($width, $height);
				imagecopyresized ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
			}
			call_user_func("image".$types[$size[2]], $temp, $cachefile);
			imagedestroy ($image);
			imagedestroy ($temp);
		} else {
			//copy($url, $cachefile);
			if (!$cached) {
				
				return ($path);
			}
			
		}
		//prd($relfile);
		//return $this->webroot.'img/'.$path;
		return $relfile;
		return $this->output(sprintf($this->Html->_tags['image'], $relfile, $this->Html->_parseAttributes($htmlAttributes, null, '', ' ')), $return);
	}
}
