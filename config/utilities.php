<?php

/**
 * Get URI path.
 * @return string $uri  Sanitized URI
 */
function getUri(): string
{
  $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
  $uri = explode('/', $uri);
  array_shift($uri);
  $uri = implode('/', $uri);

  return $uri;
}

/**
 * Loads a view file
 * @param  string $view Example: 'index', 'about', 'contact'
 * @param  array  $data Passing vars to the view
 * @return void
 */
function view(string $view, array $data = [], bool $protected = false): void
{
  // session_start();
  $file = APPROOT . '/src/views/' . $view . '.php';
  // echo $file;
  // Check for view file
  if (is_readable($file)) {
    if (($view === 'Auth/signin' || $view === 'Auth/signup') && isset($_SESSION['user_id'])) {
      header("Location: " . URLROOT);
    } else if (
      (!$protected || ($protected && isset($_SESSION['user_id']))) &&
      (!isset($data['role']) || ($data['role']) && $data['role'] === $_SESSION['role'])
    ) {
      require_once $file;
    } else {
      header("Location: " . URLROOT . "/auth/signin");
    }
  } else {
    // View does not exist
    die('<h1> 404 Page not found </h1>');
  }
}