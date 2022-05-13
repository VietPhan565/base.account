<?php

//Load model and view
class Controller
{
    //Load services
    public function service($service)
    {
        require_once '../app/services/' . $service . '.php';
        return new $service();
    }

    // Load model
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    // Load view
    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die("View does not exist!");
        }
    }

    // Redirect to another page
    public function redirect($url)
    {
        header('location: ' . $url);
    }

    // End program return json data
    public function close($data = [])
    {
        die(json_encode($data));
    }
}
