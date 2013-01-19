<?php
class Controller_Admin_Site extends Controller_Admin 
{

	public function action_index()
	{
		$data['sites'] = Model_Site::find('all');
		$this->template->title = "Sites";
		$this->template->content = View::forge('admin\site/index', $data);

	}

	public function action_view($id = null)
	{
		$data['site'] = Model_Site::find($id);

		$this->template->title = "Site";
		$this->template->content = View::forge('admin\site/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Site::validate('create');

			if ($val->run())
			{
				$site = Model_Site::forge(array(
					'name' => Input::post('name'),
					'alias' => Input::post('alias'),
					'url' => Input::post('url'),
					'pattern' => Input::post('pattern'),
					'account' => Input::post('account'),
					'password' => Input::post('password'),
					'is_camouflage_referer' => Input::post('is_camouflage_referer'),
				));

				if ($site and $site->save())
				{
					Session::set_flash('success', e('Added site #'.$site->id.'.'));

					Response::redirect('admin/site');
				}

				else
				{
					Session::set_flash('error', e('Could not save site.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Sites";
		$this->template->content = View::forge('admin\site/create');

	}

	public function action_edit($id = null)
	{
		$site = Model_Site::find($id);
		$val = Model_Site::validate('edit');

		if ($val->run())
		{
			$site->name = Input::post('name');
			$site->alias = Input::post('alias');
			$site->url = Input::post('url');
			$site->pattern = Input::post('pattern');
			$site->account = Input::post('account');
			$site->password = Input::post('password');
			$site->is_camouflage_referer = Input::post('is_camouflage_referer');

			if ($site->save())
			{
				Session::set_flash('success', e('Updated site #' . $id));

				Response::redirect('admin/site');
			}

			else
			{
				Session::set_flash('error', e('Could not update site #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$site->name = $val->validated('name');
				$site->alias = $val->validated('alias');
				$site->url = $val->validated('url');
				$site->pattern = $val->validated('pattern');
				$site->account = $val->validated('account');
				$site->password = $val->validated('password');
				$site->is_camouflage_referer = $val->validated('is_camouflage_referer');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('site', $site, false);
		}

		$this->template->title = "Sites";
		$this->template->content = View::forge('admin\site/edit');

	}

	public function action_delete($id = null)
	{
		if ($site = Model_Site::find($id))
		{
			$site->delete();

			Session::set_flash('success', e('Deleted site #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete site #'.$id));
		}

		Response::redirect('admin/site');

	}


}