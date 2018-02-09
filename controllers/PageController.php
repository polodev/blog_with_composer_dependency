<?php namespace App\Controllers;

class PageController extends BaseController {
  public function index()
  {
    echo $this->blade->make('home', ['name' => 'John Doe']);
  }
}
