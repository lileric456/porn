<?php
class Model_Site extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'alias',
		'url',
		'pattern',
		'account',
		'password',
		'is_camouflage_referer',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[20]');
		$val->add_field('alias', 'Alias', 'required|max_length[255]');
		$val->add_field('url', 'Url', 'required');
		$val->add_field('pattern', 'Pattern', 'required');
		$val->add_field('account', 'Account', 'max_length[200]');
		$val->add_field('password', 'Password', 'max_length[200]');

		return $val;
	}

	public static function get_treasures($alias = null)
	{
		if ($alias !== null)
		{
			$site = \Model_Site::find_by_alias($alias);
			if (!$site instanceof \Model_Site) die('abon');
			$sites[] = $site;
		}
		else
		{
			$sites = \Model_Site::find('all');
		}

		$treasures = array();

		foreach ($sites as $site)
		{
			$captures = array(
				array('url' => $site->url)
			);
			
			$patterns = explode('@@@@', $site->pattern);
			
			foreach ($patterns as $pattern)
			{
				$_captures = array();
				foreach ($captures as $capture)
				{
					$url = $capture['url'];
					$html = @file_get_contents($url);
					if (preg_match_all('@'.$pattern.'@', $html, $matches))
					{
						foreach ($matches[1] as $match)
						{
							if (strpos($match, 'http') !== 0)
							{
								$info = parse_url($url);
								$info['scheme'] .= ':/';
								if (!isset($info['path'])) $info['path'] = '/';
								if ($info['path'] === '/')
								{
									$match = preg_replace('@../@', '', $match);
									$info['path'] = $match;
								}
								if (isset($info['port'])) $info['host'] .= ':';
								$match = join('/', $info);
							}

							// Url is starting 'http'
							
							if (!empty($site->account))
							{
								// Put account information in url
								$account = $site->account.':'.$site->password.'@';

								$match = preg_replace('@^(https?://)(.*)$@', '$1'.$account.'$2', $match);

							}

							$_capture = array(
								'url' => $match,
							);

							if ($site->is_camouflage_referer)
							{
								$_capture['referer'] = $url;
							}

							$_captures[] = $_capture;
						}
					}
					else
					{
						// Match error
					}
				}
				$captures = $_captures;
			}
			$treasures[$site->alias] = $captures;
		}

		return $treasures;
	}
}
