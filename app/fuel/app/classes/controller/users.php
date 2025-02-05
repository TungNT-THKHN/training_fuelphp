<?php

use Fuel\Core\Input;

class Controller_Users extends Controller
{
    public function action_login()
    {
        return Response::forge(View::forge('users/login'));
    }

    public function action_authenticate()
    {
       $input = Input::post();
       Model_User::check_login($input);

        return Response::forge('Login successful!');
    }
}
