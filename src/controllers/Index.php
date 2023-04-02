<?php
namespace Controllers;

session_start();

class Index
{
  public function home()
  {
    view('Index/home', [], true);
  }

  public function about()
  {
    view('Index/about');
  }
}