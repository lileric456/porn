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

class Get
{
	public static function run($alias = null)
	{
		$treasures = \Model_Site::get_treasures($alias);

		$total_files = 0;
		foreach ($treasures as $alias => $files)
		{
			$total_files += count($files);
		}
		$count = 1;
		foreach ($treasures as $alias => $files)
		{
			$site_total_files = count($files);
			echo sprintf('%s %s file(s)', $alias, count($files))."\n";
			if (!file_exists($alias)) mkdir($alias);
			if (!is_dir($alias)) die('ebon');
			$site_count = 1;

			$stdout = fopen('php://stdout', 'w');

			foreach ($files as $file)
			{

				$filepath = basename($file['url']);
				$filepath = $alias.'/'.$filepath; 
				if (file_exists($filepath))
				{
					fwrite($stdout, sprintf('%s exists. skipping', $filepath)."\n");
				}
				else
				{
					fwrite($stdout, sprintf('Downloading %s... (%s/%s) (%s/%s)', $filepath, $site_count, $site_total_files, $count, $total_files)."\n");
					
					$opts = array(
						'http'=>array('method' => 'GET')
					);
					if (isset($file['referer']))
					{
						$opts['http']['header'] = "Referer: ".$file['referer']."\r\n";
					}

					$context = stream_context_create($opts);
					$buffer = file_get_contents($file['url'], false, $context);
					file_put_contents($filepath, $buffer);
				}
				++$site_count;
				++$count;
			}

			fclose($stdout);
		}
	}

	public static function show($alias = null)
	{
		$treasures = \Model_Site::get_treasures($alias);
		foreach ($treasures as $alias => $files)
		{
			echo sprintf('%s %s file(s)', $alias, count($files))."\n";
			foreach ($files as $file)
			{
				echo $file['url']."\n";
			}
		}
	}
}
