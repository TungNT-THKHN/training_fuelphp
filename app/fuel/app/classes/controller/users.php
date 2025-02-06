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
            return Response::redirect('hotel', 'location', 301);
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
}
