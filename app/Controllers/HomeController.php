<?php

class HomeController extends Controller{

  public function index()
  {
    $posts = $this->model('Posts')->index();
    return $this->view('home', ['post' => $posts]);
  }

  public function about()
  {
    return $this->view('about');
  }

}

 ?>
