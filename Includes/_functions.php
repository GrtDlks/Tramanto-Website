<?php
	function mssql_escape_string($str){
		$search=array("\\","\0","\n","\r","\x1a","'",'"');
		$replace=array("\\\\","\\0","\\n","\\r","\Z","\'",'\"');
		return str_replace($search,$replace,$str);
	}
	
	function showMessage($status, $str, $time = 0, $url = null){
		if($time != 0 && $url != null){
			echo '<meta http-equiv="refresh" content="'.$time.'; url='.$url.'" /><div class="s'.$status.'">'.$str.'</div>';
		}else{
			echo '<div class="s'.$status.'">'.$str.'</div>';
		}
	}
	
	function getRemoteIP(){
		if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])){
			$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
		}
		return $_SERVER['REMOTE_ADDR'];
	}
	
	function generateRandomString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	
	function get_data($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	
	function getClassToString($int){
		switch($int){
			case 1:
				return 'Fighter';
				break;
			case 2:
				return 'CleverFighter';
				break;
			case 3:
				return 'Warrior';
				break;
			case 4:
				return 'Gladiator';
				break;
			case 5:
				return 'Knight';
				break;
			case 6:
				return 'Cleric';
				break;
			case 7:
				return 'HighCleric';
				break;
			case 8:
				return 'Paladin';
				break;
			case 9:
				return 'HolyKnight';
				break;
			case 10:
				return 'Guardian';
				break;
			case 11:
				return 'Archer';
				break;
			case 12:
				return 'HawkArcher';
				break;
			case 13:
				return 'Scout';
				break;
			case 14:
				return 'SharpShooter';
				break;
			case 15:
				return 'Ranger';
				break;
			case 16:
				return 'Mage';
				break;
			case 17:
				return 'WizMage';
				break;
			case 18:
				return 'Enchanter';
				break;
			case 19:
				return 'Warlock';
				break;
			case 20:
				return 'Wizard';
				break;
			case 21:
				return 'Trickster';
				break;
			case 22:
				return 'Gambit';
				break;
			case 23:
				return 'Renegade';
				break;
			case 24:
				return 'Spectre';
				break;
			case 25:
				return 'Reaper';
				break;
		}
	}
	
	function getFiestaMoney($money){
		$cooper = null;
		$silver = null;
		$gold = null;
		$GEM = null;
		$length = strlen($money);
		if($length >= 3){
			$tmplength = ($length - 3);
			$cooper = substr($money, $tmplength, $length).' C';
		}
	}
	
	function minutesToTime($minutes) {
		$d = floor ($minutes / 1440);
		$h = floor (($minutes - $d * 1440) / 60);
		$m = $minutes - ($d * 1440) - ($h * 60);
		//
		// Then you can output it like so...
		//
		return "{$d} days, {$h} hours, {$m} minutes";
	}
	
	function date2timestamp($datum) {
        list($tag, $monat, $jahr) = explode(".", $datum);
        $jahr = sprintf("%04d", $jahr);
		$monat = sprintf("%02d", $monat);
        $tag = sprintf("%02d", $tag);
		return(mktime(0, 0, 0, $monat, $tag, $jahr));
    }   

	function getFeeed($feed_url) {
		$i = 0; // counter
        $feeds = file_get_contents($feed_url);
        $feeds = str_replace("<content:encoded>","<contentEncoded>",$feeds);
        $feeds = str_replace("</content:encoded>","</contentEncoded>",$feeds);
        $rss = simplexml_load_string($feeds);

    echo "<ul>";
        foreach($rss->channel->item as $entry) {
			if ($i < 10) { // parse only 10 items
        echo "<h4><center><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></center></h4>";
        echo "$entry->contentEncoded";
		echo "<br><br>";

    echo "</ul>";
    }
	}
	$i++;
	}	
?>