<?php
class Core
{
    protected $current_controller = 'pages';
    protected $current_method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->get_url();

        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {

                //Set new controller
                $this->current_controller = ucwords($url[0]);
                unset($url[0]);
            }
        }

        //Require controller
        require_once '../app/controllers/' . $this->current_controller . '.php';
        $this->current_controller = new $this->current_controller;

        //Check for method in URL
        if (isset($url[1])) {
            if (method_exists($this->current_controller, $url[1])) {
                $this->current_method = $url[1];
                unset($url[1]);
            }
        }

        //Get Param
        $this->params = $url ? array_values($url) : [];

        //Callback array of params
        call_user_func_array([$this->current_controller, $this->current_method], $this->params);
    }

    public function get_url()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');

            //Filter var as str/number
            $url = filter_var($url, FILTER_SANITIZE_URL);

            //Break to array
            $url = explode('/', $url);
            return $url;
        }
    }
}
