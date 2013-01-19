<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2012 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Fuel\Tasks;

class Init
{
	public static function hello()
	{
		echo 'hello';
	}

	public static function run()
	{
		\Auth::create_user('hentai', 'hentai', 'porn@porn.jp', 100);
		echo 'account = "hentai", password = "hentai"';
	}
}
