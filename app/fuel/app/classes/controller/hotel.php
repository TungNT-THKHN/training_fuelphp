<?php

use Fuel\Core\Input;
use Fuel\Core\Response;
use Fuel\Core\Validation;

class Controller_Hotel extends Controller
{
    public function action_index()
    {
        $hotels = Model_Hotel::find('all');

        return Response::forge(View::forge('hotel/index', ['hotels' => $hotels]));
    }

    public function action_create()
    {
        return Response::forge(View::forge('hotel/create'));
    }

    public function action_store()
{
    $data = Input::post();
    $val = Validation::forge();

    $val->add('hotel_name', 'Hotel Name')
        ->add_rule('required')
        ->add_rule('min_length', 5)
        ->add_rule('max_length', 20)
        ->set_error_message('min_length', 'Please enter less than or equal to 5');

    if ($val->run()) {
        $hotel_model = new Model_Hotel();
        $hotel_model->create_hotel($data);

        return Response::redirect('hotel/index');
    }

    $errors = $val->error();
    foreach ($errors as $field => $error) {
        $error_messages[$field] = $error->get_message();
    }
    Session::set_flash('error', $error_messages);

    return Response::redirect_back();
}


    public function action_edit(int $id)
    {
        $hotel = Model_Hotel::find($id);

        return Response::forge(View::forge('hotel/edit', ['hotel' => $hotel]));
    }

    public function action_update(int $id)
    {
        $data = Input::post();
        $hotel_model = Model_Hotel::find($id);
        
        $hotel_model ->set(array(
            'hotel_name' => $data['hotel_name'] ?? '',
            'address' => $data['address'] ?? '',
            'phone' => $data['phone'] ?? '',
            'email' => $data['email'] ?? '',
            'description' => $data['description']?? '',
        ));
        $hotel_model->save();

        return Response::redirect('hotel/index');
    }

    public function action_delete(int $id)
    {
        $entry = Model_Hotel::find($id);
        $entry->delete();

        return Response::redirect('hotel/index');
    }
}