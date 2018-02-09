<?php namespace App\Controllers;
use duncan3dc\Laravel\BladeInstance;
use Jenssegers\Blade\Blade;

class PageController extends BaseController {
  protected $blade;
  public function __construct()
  {
    $this->blade = new Blade(__DIR__ . "/../views/", __DIR__ . "/../cache/views/");
  }
  public function index()
  {
    echo $this->blade->make('home', ['name' => 'John Doe']);
  }
}
