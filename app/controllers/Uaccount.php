<?php

class Uaccount extends Controller{
    public function __construct(){

    }

    public function index(){
        $this->view('authentication/login');
    }

    public function hello(){
        $data = [
        ];
        $this->view('authentication/hello',$data);
    }
}