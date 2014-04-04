<?php

class home_page {

	/***/
	function show() {
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