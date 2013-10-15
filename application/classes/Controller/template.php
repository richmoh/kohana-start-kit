<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Template extends Kohana_Controller_Template
{

    public $user;
    protected $_auth_required = false;
    protected $_secure_actions = false;
    protected $_project = false;

    public function before()
    {
        parent::before();

        define('ROOT', $_SERVER['DOCUMENT_ROOT']);
        define('PUBLIC_FILES', ROOT . '/a/public_files');

        $this->open_session();

        $auth = Auth::instance();

        $this->user = $auth->get_user();
        
//        var_dump($this->user);
//        die;
        
        if(!isset($_COOKIE['project-list_end']) && $this->user && $this->user->pk() && $this->user->taken_tour)
        {
            setcookie('project-list_end', 'yes');
            setcookie('paste_end', 'yes');
            setcookie('bug-update_end', 'yes');
        }

//        if (!isset($this->user) && !$this->user->pk())
//        {
//            $this->check_for_facebook_login();
//        }
        $this->setup_template_class();
        
//        $this->set_timezone();
//
//        $this->setup_user();
//
//        $this->is_bugpurge_admin();
//
//        $this->check_roles();
//
//        $this->template->is_account_owner = $this->is_account_owner();
//
//        $this->setup_javascript_files();
//
//        $this->setup_stylesheet_files();
//
//        $this->setup_colors_and_company_logo();
//
//        $this->display_notifications();
//
//        $this->setup_javascript_accessible_variables();
//
//        $this->setup_page_classes();
//
//        $this->setup_logo();
//
//        $this->setup_projects_selection();
//
//        if ($this->template->logged_in)
//        {
//            $this->setup_filter();
//        }
//
//        $this->template->include_header = true;
//
//        $this->_project = $this->get_project_if_available();
//
//        if ($this->_project)
//        {
//            $this->template->project_name = $this->_project->name;
//        }
    }

    private function setup_template_class()
    {
        $this->template->template_class = $this->request->controller() . '-' . $this->request->action();
    }
    
    protected function page_title($title)
    {
        $this->template->page_title = $title;
    }

    protected function page_caption($caption)
    {
        $this->template->page_caption = $caption;
    }

    private function get_project_if_available()
    {
        return Helper::get_project();
    }

    private function set_timezone()
    {
        //Europe/London
//        date_default_timezone_set('GMT+00:00');
//        $this->convert_timezone('-12');
//        echo date_default_timezone_get();
//        echo date('H:i:s');
//        date_default_timezone_set('UTC');
//        echo date_default_timezone_get();
//        echo date('H:i:s');
    }

    private function is_bugpurge_admin()
    {
        if ($this->user)
        {
            $this->template->is_bug_purge_admin = $this->user->has_role('admin');
        } else
        {
            return false;
        }
    }

    protected function is_account_owner()
    {
        if ($this->user)
        {
            $account_owned = ORM::factory('account')->where('owner_id', '=', $this->user->id)->find();

            foreach ($this->user->get_all_projects_user_has_access_to() as $project)
            {
                if ($account_owned->pk() == $project->account->id)
                {
                    return true;
                }
            }
        } else
        {
            return false;
        }
    }

    protected function account_owner_check()
    {
        if (!$this->is_account_owner())
        {
            $this->request->redirect('account/information');
        }
    }

    private function setup_projects_selection()
    {
        $this->template->projects = false;

        if ($this->user)
        {
            $projects = $this->user->get_projects_pinned_to_menu();

            if (count($projects) > 0)
            {
                $this->template->projects = $projects;
            }
        }
    }

    private function setup_filter()
    {
        $project_id = Helper::get_project_id();

        $this->template->project_id = $project_id;


        if (isset($project_id) && $project_id && !isset($_GET['t']))
        {
            $project = $this->user->projects->where('project_id', '=', $project_id)->find();

            $this->template->priorities = Model_Priority::get_priority_selections();

            $this->template->users = $project->get_user_selections();
        }
    }

    private function setup_logo()
    {
        if ($this->user)
        {
            $account = Helper::get_current_account();

            if($account)
            {
                $file_location = $account->get_logo_location();

                $filename = $account->account_setting->get_logo();

                if (file_exists($file_location))
                {
                    $this->template->company_logo = $filename;
                } else
                {
                    $this->template->company_logo = false;
                }

                $this->template->company_name = $account->company_name;
            }else
            {
                $this->template->company_logo = false;

                $this->template->company_name = false;
            }
            
            
        } else
        {
            $this->template->company_logo = false;

            $this->template->company_name = false;
        }
    }

    private function setup_page_classes()
    {
        $this->template->page_classes = array();
    }

    private function setup_javascript_accessible_variables()
    {
        $variables = array();

        $variables['url_base'] = URL::base();

        if ($this->request->param('project_id'))
        {
            $variables['project_id'] = $this->request->param('project_id');
        }

        if ($this->request->param('company'))
        {
            $variables['company'] = $this->request->param('project_id');
        }

        if ($this->request->controller())
        {
            $variables['controller'] = $this->request->controller();
        }

        if ($this->request->action())
        {
            $variables['action'] = $this->request->action();
        }

        $this->template->javascript_variables = json_encode($variables);
    }

    public function action_index()
    {
        $this->template->content = "test";
    }

    public function action_contact()
    {
        $this->response->body('hello, world 2!');
    }

    private function open_session()
    {
        //Open session
        $this->session = Session::instance();
    }

    private function setup_colors_and_company_logo()
    {


        $this->template->primary_color = "";

        $this->template->primary_color = "";

        $this->template->button_color = "";

        $this->template->logo_shadow_color = "";

        $this->template->text_shadow = "";

        if ($this->user)
        {
            try{
            
                $account = Helper::get_current_account();
            
            }catch(Kohana_Exception $e)
            {
                $account = false;
            }
            
            if ($account && $account->account_setting && $account->account_setting->color)
            {
                $account_setting = $account->account_setting;

                $primary_color = "style='background-color: " . $account_setting->color . "'";
                $project_title_color = "style='color: " . $account_setting->color . "'";

                $this->template->primary_color = $primary_color;
                $this->template->project_title_color = $project_title_color;

                $this->template->time = $account_setting->updated;

                $dark_color = Helper::darkerHtmlColor($account_setting->color, 40);

                $darker_color = Helper::darkerHtmlColor($account_setting->color, -40);

                $this->template->logo_shadow_color = "style='box-shadow: 0 4px 5px $dark_color'";

                $this->template->button_color = "border-right: solid 1px $dark_color; border-left: 1px solid $darker_color;";

                $this->template->text_shadow = "text-shadow: 0 1px 1px $darker_color";
            }
        }
    }

    private function create_user_from_facebook($facebook_profile)
    {
        $data = array(
            'firstname' => $facebook_profile['first_name'],
            'surname' => $facebook_profile['last_name'],
            'email' => $facebook_profile['email'],
            'username' => $facebook_profile['email'],
            'login_type' => 'facebook',
            'external_login_id' => 'facebook-' . $facebook_profile['id'],
            'password' => uniqid(),
            'token' => uniqid(),
        );

        $new_user = $this->signup($data);

        return $new_user;
    }

    private function signup($data)
    {
        $company_name = $data['external_login_id'];

        $errors = false;

        $is_free = true;

        try
        {

            $new_user = ORM::factory('user')->values($data);

//            $this->make_subdomain($errors);

            if (!$errors)
            {
                $new_user->save();

                //Set up the free account... regardless
                $account = Helper::create_free_account($company_name, $new_user->id, false);

                $account->setup_quotas();

                if ($is_free)
                {
//                    $this->send_confirmation_email($new_user);

                    $account->use_a_user_from_quota();


                    try
                    {

//                        $this->use_invite($new_user);
                    } catch (Exception_invite $ei)
                    {
                        echo "<br>Could not apply invite";
                    }

//                    $this->request->redirect('confirmation_required?e=' . $new_user->email);
                } else
                {
                    $this->start_paypal_process($account_type, $account);
                }

                $new_user->confirm_user();

                return $new_user;
            }
        } catch (ORM_Validation_Exception $ve)
        {
            if ($errors)
            {
                $errors = array_merge($errors, $ve->errors(''));
            } else
            {
                $errors = $ve->errors('');
            }
        }
    }

    private function has_bug_purge_account($facebook_profile)
    {
        $user = ORM::factory('user')->where('login_type', '=', 'facebook')->where('external_login_id', '=', 'facebook-' . $facebook_profile['id'])->find();

        if (!$user->pk())
        {
            //Create one
            $user = $this->create_user_from_facebook($facebook_profile);
        }

        $auth = Auth::instance();

        //Then login with the $user
        $auth->login($user, false, false, $facebook_profile);
    }

    private function check_for_facebook_login()
    {
        $facebook = new OAFacebook();

        $facebook_profile = $facebook->get_user_profile();

        if ($facebook_profile)
        {
            $this->has_bug_purge_account($facebook_profile);
        }
    }

    private function setup_user()
    {
        $auth = Auth::instance();

        $this->user = $auth->get_user();

        if ($this->user)
        {
            $this->template->logged_in = true;
        } else
        {
//            $this->check_for_facebook_login();

            $this->user = $auth->get_user();

            if ($this->user)
            {
                $this->template->logged_in = true;
            } else
            {
                $this->template->logged_in = false;
            }
        }
    }

    private function check_roles()
    {
        #Check user auth and role
        $action_name = Request::current()->action();



        if (
                (
                $this->_auth_required !== FALSE &&
                Auth::instance()->logged_in($this->_auth_required) === FALSE
                ) ||
                (
                is_array($this->_secure_actions) &&
                array_key_exists($action_name, $this->_secure_actions) &&
                Auth::instance()->logged_in($this->_secure_actions[$action_name]) === FALSE
                )
        )
        {

            if (Auth::instance()->logged_in())
            {
                $this->request->redirect('notify/noaccess');
            } else
            {
//                echo '<pre>';
//                var_dump($_SERVER);
//                echo '</pre>';

                $_SESSION['redirect_on_login'] = $_SERVER['REQUEST_URI'];

//                die;
                $this->request->redirect('login');
            }
        }
    }

    private function setup_javascript_files()
    {
        $this->template->javascript_files = array();

        Helper::add_javascript_file($this, "simple_ajax.js");

        Helper::add_javascript_file($this, "jquery/fancybox/jquery.fancybox-1.3.4.js");
        Helper::add_javascript_file($this, "jquery/fancybox/jquery.fancybox-1.3.4.pack.js");

        Helper::add_javascript_file($this, 'jquery.qtip.min.js');

        Helper::add_javascript_file($this, "main.js");
    }

    private function setup_stylesheet_files()
    {
        $this->template->stylesheet_files = array();

        Helper::add_stylesheet($this, "fancybox/jquery.fancybox-1.3.4.css");
    }

    private function display_debug_info()
    {
        echo "<div style='background-color: white'> <br>- DEBUG INFORMATION - <br>";
        if ($_POST)
        {
            echo '<br>**************** $_POST *******************<br>';
            var_dump($_POST);
        }

        if ($_GET)
        {
            echo '<br>**************** $_GET *******************<br>';
            var_dump($_GET);
        }
        if (isset($_SESSION))
        {
            echo '<br>**************** $_SESSION *******************<br>';
            var_dump($_SESSION);
        }
        echo "</div>";
    }

    private function display_notifications()
    {
        $this->template->notifications = Notifications::display();
    }

    public function check_has_project_access()
    {
        $user = $this->user;

        $project_id = Helper::get_project_id();

        if (!$user->is_admin_on_project($project_id) && !$user->is_owner_of_project($project_id))
        {
            $this->request->redirect(Helper::get_current_project_url() . '/bugs/list');
        }
    }

}

// End Index
