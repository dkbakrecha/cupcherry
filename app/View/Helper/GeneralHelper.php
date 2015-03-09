<?php
App::uses('AppHelper', 'View/Helper');

class GeneralHelper extends AppHelper {

    public $helpers = array(
        'Html',
        'Form',
        'Session',
        'Js',
    );

    public function adminLink($cmsId = 0) {
        $roleId = $this->Session->read('Auth.Admin.role');
        //prd($this->Session->read('Auth.Admin.role'));
        if ($roleId == 'admin') {
            echo '<a target="_blank" style="color:#711101" href="' . Router::url('/') . 'admin/CmsPages/edit/' . $cmsId . '">Click Here To Edit</a>';
        } else
            echo "";
    }

    public function adminFaqLink($faqId = 0) {
        $roleId = $this->Session->read('Auth.User.role_id');
        if ($roleId == 1) {
            echo '<a style="color:#711101" href="' . Router::url('/') . 'admin/Faqs/edit/' . $faqId . '">Click Here To Edit</a>';
        } else
            echo "";
    }

    public function fbShareLink($divClass = '', $sharepath = "", $shareImage = "", $shareTitle = "", $shareSummary = "") {

        $cms_data = $this->cms_page_text(131);

        $shareSummary = @$cms_data['Cmspage']['description'];

        echo '<a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=' . $sharepath . '&p[images][0]=' . $shareImage . '&p[title]=' . $shareTitle . '&p[summary]=' . $shareSummary . '" onclick="javascript:window.open(this.href,\' \',\' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;" target="_blank">
        	<div class="' . $divClass . '"></div>
		</a>';
        //echo $this->Html->link('', 'https://www.facebook.com/sharer/sharer.php?u='.$sharepath, array('class' => 'button', 'target' => '_blank'));
    }

    public function fbShareButtonLink($imgbtn = "", $sharepath = "", $shareImage = "", $shareTitle = "", $shareSummary = "") {

        $imgbtn = $this->Html->image($imgbtn);

        $cms_data = $this->cms_page_text(131);
        $shareSummary = @$cms_data['Cmspage']['description'];

        echo '<a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=' . $sharepath . '&p[images][0]=' . $shareImage . '&p[title]=' . $shareTitle . '&p[summary]=' . $shareSummary . '" onclick="javascript:window.open(this.href,\' \',\' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;" target="_blank">
            ' . $imgbtn . '
        </a>';


        //echo $this->Html->link($this->Html->image($imgbtn, array("alt" => "fblink")),'https://www.facebook.com/sharer/sharer.php?u='.$sharepath,array('escape' => false,'target'=>'_blank'));
    }

    public function twitterShareLink($divClass = '', $sharepath = "", $shareTitle = "", $shareSummary = "") {

        $cms_data = $this->cms_page_text(133);
        $shareSummary = @$cms_data['Cmspage']['description'];


        $text = $shareSummary;
        $hashtags = 'hautetrader1,fashionblog,stylist';

        $short_url = $sharepath;

        $url = 'http://twitter.com/share?text=' . $text . '&hashtags=' . $hashtags . '&url=' . $short_url;

        echo '<a href="' . $url . '" data-lang="en" data-size="large" target="_blank" onclick="javascript:window.open(this.href,\' \',\' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;" data-count="none">
				<div class="' . $divClass . '"></div>
			  </a>';
        //echo $this->Html->link('', 'https://www.facebook.com/sharer/sharer.php?u='.$sharepath, array('class' => 'button', 'target' => '_blank'));
    }

    public function twitterShareButtonLink($imgbtn = "", $sharepath = "", $shareTitle = "", $shareSummary = "", $flag = "") {

        $img = $this->Html->image($imgbtn);
        $cms_data = $this->cms_page_text(133);
        $shareSummary = @$cms_data['Cmspage']['description'];

        /* if($flag==1){
          $text = '';
          $hashtags = '';
          }
          else{
          $text = $shareSummary;
          $hashtags = 'hautetrader,fashionblog,stylist';
          } */
        $text = $shareSummary;
        $hashtags = 'hautetrader1,fashionblog,stylist';

        $short_url = $sharepath;

        $url = 'http://twitter.com/share?text=' . $text . '&hashtags=' . $hashtags . '&url=' . $short_url;

        echo '<a href="' . $url . '" data-lang="en" data-size="large" target="_blank" onclick="javascript:window.open(this.href,\' \',\' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;" data-count="none">
        	' . $img . '
        </a>';
        /* echo '<a href="http://twitter.com/home?status='.$sharepath.'" data-text="'.$text.'" data-url="'.$sharepath.'" data-related="jasoncosta" data-lang="en" data-size="large" target="_blank" onclick="javascript:window.open(this.href,\' \',\' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;" data-count="none">
          '.$img.'
          </a>'; */
    }

    public function pinterestShareLink($divClass = "", $sharepath = "", $shareImage = "", $shareTitle = "", $shareSummary = "") {

        $cms_data = $this->cms_page_text(131);
        $shareTitle = @$cms_data['Cmspage']['description'] . @$shareTitle;

        echo '<a href="//www.pinterest.com/pin/create/button/?url=' . $sharepath . '&media=' . $shareImage . '&description=' . $shareTitle . '" target="_blank" data-pin-do="buttonPin" data-pin-config="above" onclick="javascript:window.open(this.href,\' \',\' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;">
        	<div class="' . $divClass . '"></div>
		</a>';
    }

    public function pinterestShareButtonLink($imgbtn = "", $sharepath = "", $shareImage = "", $shareTitle = "", $shareSummary = "") {

        $imgbtn = $this->Html->image($imgbtn);

        $cms_data = $this->cms_page_text(131);
        $shareTitle = @$cms_data['Cmspage']['description'] . @$shareTitle;

        echo '<a href="//www.pinterest.com/pin/create/button/?url=' . $sharepath . '&media=' . $shareImage . '&description=' . $shareTitle . '" target="_blank" data-pin-do="buttonPin" data-pin-config="above" onclick="javascript:window.open(this.href,\' \',\' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;">
        ' . $imgbtn . '
		</a>';
    }

    public function googlePlusShareLink($imgbtn = "", $sharepath = "") {

        $imgbtn = $this->Html->image($imgbtn);

        $cms_data = $this->cms_page_text(131);
        $shareTitle = @$cms_data['Cmspage']['description'] . @$shareTitle;


        echo '<a href="https://plus.google.com/share?url=' . $sharepath . '+' . $shareTitle . '" target="_blank"  onclick="javascript:window.open(this.href,\' \',\' menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;">
			' . $imgbtn . '
		</a>';
    }

    public function new_shorten_url($long_url = "") {

        if (!empty($long_url)) {

            App::import("Model", "ShortUrl");
            $model = new ShortUrl();

            $long_url_array = $model->find('first', array('conditions' => array('ShortUrl.long_url' => $long_url)));

            if ($long_url_array && count($long_url_array) > 0) {
                //$this->set('SHORT_URL', $long_url_array['ShortUrl']['short_url']);
                return $long_url_array['ShortUrl']['short_url'];
            }

            // Get API key from : http://code.google.com/apis/console/
            $apiKey = '926968577661';

            $postData = array('longUrl' => $long_url, 'key' => $apiKey);
            $jsonData = json_encode($postData);

            $curlObj = curl_init();

            curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url');
            curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curlObj, CURLOPT_HEADER, 0);
            curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
            curl_setopt($curlObj, CURLOPT_POST, 1);
            curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);

            $response = curl_exec($curlObj);

            // Change the response json string to object
            $json = json_decode($response);

            curl_close($curlObj);
            if ($json->id) {
                $shortUrlArray = array();
                $shortUrlArray['ShortUrl']['short_url'] = $json->id;
                $shortUrlArray['ShortUrl']['long_url'] = $long_url;

                $model->save($shortUrlArray);
                //$this->set('SHORT_URL', $json->id);
                return $json->id;
            }
            //$this->set('SHORT_URL', $long_url);*/
            return $long_url;
        }
        return '';
    }

    public function setstar($productId = 0) {
        //$productId=(($productId)/($productId+$n))*5;
        //prd($productId);
        $flag = 1;
        if ($productId <= 0) {
            while ($flag <= 5) {
                echo '<span>';
                echo $this->Html->image("ui_images/images/tca/tc_star_blank.png");
                echo '</span>';
                $flag++;
            }
        } elseif ($productId >= 5) {
            while ($flag <= 5) {
                echo '<span>';
                echo $this->Html->image("ui_images/images/tca/tc_star.png");
                echo '</span>';
                $flag++;
            }
        } else {
            $i = 1;
            while ($i <= $productId) {
                echo '<span>';
                echo $this->Html->image("ui_images/images/tca/tc_star.png");
                echo '</span>';
                $i++;
            }
            while ($i <= 5) {
                echo '<span>';
                echo $this->Html->image("ui_images/images/tca/tc_star_blank.png");
                echo '</span>';
                $i++;
            }
        }
    }

    public function full_url() {
        $s = &$_SERVER;
        $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true : false;
        $sp = strtolower($s['SERVER_PROTOCOL']);
        $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
        $port = $s['SERVER_PORT'];
        $port = ((!$ssl && $port == '80') || ($ssl && $port == '443')) ? '' : ':' . $port;
        $host = isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : $s['SERVER_NAME'];
        return $protocol . '://' . $host . $port . $s['REQUEST_URI'];
    }

    public function emptyMsg($msg = NULL) {
        /* No record found  --- Dharmendra */
        echo "<div id='no_record_message'>";
        if (isset($msg) && !empty($msg)) {
            echo $msg;
        } else {
            echo "no message found";
        }
        echo "</div>";
    }

    public function cms_page_text($cms_id = NULL) {

        //App::import("Model", "Cmspage");  
        //$model = new Cmspage();  
        //$data = $model->find('first',array('conditions'=>array('Cmspage.status'=>1,'Cmspage.id'=>$cms_id)));;
        //if($data)
        //return $data;
    }

    public function short_msg($msg = NULL, $length = NULL) {

        $len = strlen($msg);
        if ($len > $length) {
            $msg = substr($msg, 0, $length) . '...';
        }

        return $msg;
    }

    public function dateDiff($time1, $time2, $precision = 6) {
        /*
         * 	For calculating time defferent between two date.
         * 	Input : Timestamp	Output: Array of Defference
         * 	Date : 20 Jan 2014 ...dk Use -Product Detail comment
         */

        // If not numeric then convert texts to unix timestamps
        if (!is_int($time1)) {
            $time1 = strtotime($time1);
        }
        if (!is_int($time2)) {
            $time2 = strtotime($time2);
        }

        // If time1 is bigger than time2
        // Then swap time1 and time2
        if ($time1 > $time2) {
            $ttime = $time1;
            $time1 = $time2;
            $time2 = $ttime;
        }

        // Set up intervals and diffs arrays
        $intervals = array('year', 'month', 'day', 'hour', 'minute', 'second');
        $diffs = array();

        // Loop thru all intervals
        foreach ($intervals as $interval) {
            // Set default diff to 0
            $diffs[$interval] = 0;
            // Create temp time from time1 and interval
            $ttime = strtotime("+1 " . $interval, $time1);
            // Loop until temp time is smaller than time2
            while ($time2 >= $ttime) {
                $time1 = $ttime;
                $diffs[$interval] ++;
                // Create new temp time from time1 and interval
                $ttime = strtotime("+1 " . $interval, $time1);
            }
        }

        $count = 0;
        $times = array();
        // Loop thru all diffs
        foreach ($diffs as $interval => $value) {
            // Break if we have needed precission
            if ($count >= $precision) {
                break;
            }
            // Add value and interval
            // if value is bigger than 0
            if ($value >= 0) {
                // Add s if value is not 1
                if ($value != 1) {
                    $interval .= "s";
                }
                // Add value and interval to times array
                $times[] = $value; // . " " . $interval;
                $count++;
            }
        }

        // Return string with times
        //return implode(", ", $times);
        return $times;
    }

  

}
