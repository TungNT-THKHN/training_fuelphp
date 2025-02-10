<?php

class Controller_Upload extends Controller
{
    const INDEX_UPLOAD_FILE = 0;
    public function action_process()
    {
        Upload::process(array(
            'path' => DOCROOT . 'uploads',
            'randomize' => true,
            'ext_whitelist' => array('jpg', 'png', 'gif', 'pdf'),
            'max_size' => 5 * 1024 * 1024,
        ));

        if (Upload::is_valid())
        {
            // File::create(DOCROOT . 'uploads', 'test.txt', 'content');
            // Upload::save();

            // $files = Upload::get_files();

            // return Response::forge('Upload thành công! Tên file: ' . $files[self::INDEX_UPLOAD_FILE]['saved_as']);
            
            // append
            File::append(DOCROOT . 'uploads', 'test.txt', 'new content');
            $file = File::read(DOCROOT . 'uploads/test.txt', true);

            return Response::forge('File content: ' . $file);
        } else {
            $errors = Upload::get_errors();
            return Response::forge('Lỗi upload: ' . print_r($errors, true));
        }
    }
}
