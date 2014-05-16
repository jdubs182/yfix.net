<?php

class home_page {

	/***/
	function view() {
		$dir = dirname(PROJECT_PATH).'/docs/';
		$doc = preg_replace('~[^a-z0-9_-]+~ims', '', $_GET['id']);
		if ($doc) {
			$f = $dir. $doc. '.stpl';
			if (file_exists($f)) {
				return tpl()->parse_string(file_get_contents($f), $replace, 'doc_'.$name);
			}
		}
		return _e('Not found');
	}

	/***/
	function show() {
		$dir = dirname(PROJECT_PATH).'/docs/';
		if ($_GET['id']) {
			return $this->view();
		}
		foreach (glob($dir.'*.stpl') as $path) {
			$f = basename($path);
			$name = substr($f, 0, -strlen('.stpl'));
			$body[] = '<li><a href="./?object='.$_GET['object'].'&action=view&id='.$name.'">'.$name.'</a></li>';
		}
		return implode(PHP_EOL, $body);
	}

	/***/
	function _hook_side_column() {
		$items = array();
		$url = process_url('./?object='.$_GET['object']);
		foreach ((array)glob(dirname(__FILE__).'/*.class.php') as $cls) {
			$cls = basename($cls);
			if ($cls == __CLASS__) {
				continue;
			}
			$name = substr($cls, 0, -strlen('.class.php'));
			$items[] = '<li><a href="./?object='.$name.'"><i class="icon-chevron-right"></i> '.t($name).'</a></li>';
		}
		return '<div class="bs-docs-sidebar"><ul class="nav nav-list bs-docs-sidenav">'.implode(PHP_EOL, $items).'</ul></div>';
	}
}