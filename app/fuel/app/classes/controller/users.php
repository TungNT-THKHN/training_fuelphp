<?php

use Fuel\Core\Input;
use Fuel\Core\Response;
use Fuel\Core\Session;

class Controller_Users extends Controller
{
    public function action_login()
    {
        return Response::forge(View::forge('users/login'));
    }

    public function action_authenticate()
    {
       $input = Input::post();
       $result = Model_User::check_login($input);

        if ($result){
            return Response::redirect('hotel/index', 'location', 301);
        }
        Session::set_flash('error', 'Invalid username or password!');

        Response::redirect(Input::referrer());
    }

    public function action_register()
    {
        if (Input::method() == 'POST') {
            $data = Input::post();
            $user = new Model_User();
            $user->register($data);
            return Response::forge('Register successful!');
        } else {
            return Response::forge(View::forge('users/register'));
        }
    }
    public function action_logout()
    {
        Session::destroy();
        Response::redirect('login');
    }

    public function action_test()
	{
        // Form
		// $form = Form::open(array('action' => 'form/submit', 'method' => 'post'));
		// $form .= Form::label('Username', 'username');
        // $form .= Form::submit('submit', 'Submit');
        // $form .= Form::close();

		// return Response::forge(View::forge('users/test', array('form' => $form), false));

        $form = Form::open(array('action' => 'upload/process', 'method' => 'post', 'enctype' => 'multipart/form-data'));

        $form .= Form::label('Choose File:', 'file');
        $form .= Form::file('file');
        $form .= Form::submit('submit', 'Upload');

        $form .= Form::close();

        return Response::forge(View::forge('users/test', array('form' => $form), false));
	}
}
