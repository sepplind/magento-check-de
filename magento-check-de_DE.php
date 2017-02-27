<?php
extension_check(array( 
	'curl',
	'dom', 
	'gd', 
	'hash',
	'iconv',
	'mcrypt',
	'pcre', 
	'pdo', 
	'pdo_mysql', 
	'simplexml',
	'php-xmlrpc'
));

function extension_check($extensions) {
	$fail = '';
	$pass = '';
	
	if(version_compare(phpversion(), '5.4.0', '<')) {
		$fail .= '<li>Sie ben&ouml;tigen <strong>PHP 5.4.0</strong> (oder h&ouml;her)</li>';
	}
	else if(version_compare(phpversion(), '5.4.0', '<')) {
		$pass .='<li style="background:yellow">Sie haben <strong>'.phpversion().'</strong>. Magento funktioniert noch besser mit PHP 5.5 oder h&ouml;her</li>';
	} else {
		$pass .='<li>Sie haben PHP <strong>'.phpversion().'</strong>, das ist PHP 5.5 oder h&ouml;her</li>';
	}

	if(!ini_get('safe_mode')) {
		$pass .='<li>Safe Mode ist <strong>aus</strong></li>';
		preg_match('/[0-9]\.[0-9]+\.[0-9]+/', shell_exec('mysql -V'), $version);
		
		if(version_compare($version[0], '5.6.0', '<')) {
			$fail .= '<li>Sie ben&ouml;tigen <strong>MySQL 5.6.0</strong> oder h&ouml;her</li>';
		} else {
			$pass .='<li>Sie haben <strong>'.$version[0].'</strong>, das ist MYSQL 5.6.0 oder h&ouml;her</li>';
		}
	} else { 
		$fail .= '<li>Safe Mode ist <strong>an</strong></li>';  
	}

	if(ini_get('memory_limit')) {
		$memory_limit = ini_get('memory_limit');
		$memory_limit = preg_replace("/[^0-9?! ]/","",$memory_limit);
		
		if( $memory_limit < 256 ) {
			$fail .= '<li>Sie haben ein Memory Limit von <strong>'.$memory_limit.' MB</strong>. Sie ben&ouml;tigen ein Memory Limit von <strong>256 MB</strong> oder h&ouml;her</li>';
		} else {
			if( $memory_limit < 512 ) {
				$pass .='<li>Sie haben ein Memory Limit von <strong>'.$memory_limit.' MB</strong>. Magento funktioniert noch besser mit einem Memory Limit von 512 MB oder h&ouml;her</li>';
			} else {
				$pass .='<li>Sie haben ein Memory Limit von <strong>'.$memory_limit.' MB</strong>, das ist optimal.</li>';
			}
		}
	} else { 
		$fail .= '<li>Es ist kein Memory Limit angegeben.</li>';  
	}

	foreach($extensions as $extension) {
		if(!extension_loaded($extension)) {
			$fail .= '<li> Sie ben&ouml;tigen die <strong>'.$extension.'</strong> Erweiterung</li>';
		} else{	
			$pass .= '<li>Sie haben die <strong>'.$extension.'</strong> Erweiterung</li>';
		}
	}
	
	if($fail) {
		echo '<h1><strong>Ihr Server ist mit der jetzigen Konfiguration nicht kompatibel mit Magento.</strong></h1>';
		echo '<p><br>Die folgenden Voraussetzungen wurden nicht erf&uuml;llt:';
		echo '<ul style="background:orangered">'.$fail.'</ul></p>';
		echo 'Bitte Kontaktieren Sie Ihren Hosting Provider und bitten Ihn um Unterst&uuml;tzung.<br />';
		echo '<br /><br /><br />';
		echo 'Die folgenden Voraussetzungen wurden erf&uuml;llt:<br />';
		echo '<ul style="background:yellowgreen">'.$pass.'</ul>';
	} else {
		echo '<h1><strong>Herzlichen Gl&uuml;ckwunsch!</strong> Ihr Server ist korrekt f&uuml;r Magento konfiguriert.</h1>';
		echo '<ul style="background:yellowgreen">'.$pass.'</ul>';
	}

	echo '<br /><br /><br />Das Ergebnis wird präsentiert von: <a target="_blank" href="https://www.mag-tutorials.de">Mag-tutorials.de</a>.';
}
?>
