<?php namespace App\Controllers;
use Jenssegers\Blade\Blade;

class BaseController {
  protected $blade;
  public function __construct()
  {
    $this->blade = new Blade(__DIR__ . "/../views/", __DIR__ . "/../cache/views/");
  }
}
