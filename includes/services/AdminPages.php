<?php


namespace WP_Palette\Services;

use WP_Palette\BaseClass;

class AdminPages extends BaseClass
{
	public function register() {
		add_action('admin_menu', [$this, 'add_subpage']);
	}

	public function add_subpage()
	{
		add_submenu_page(
			$this->page['parent_slug'],
			$this->page['page_title'],
			$this->page['menu_title'],
			$this->page['capability'],
			$this->page['menu_slug'],
			$this->page['callback']);
	}
}