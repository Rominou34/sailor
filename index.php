<?php

session_start();

require('config.php');

/*
* Returns the location of the user on the website
*/
function getCurrentUri()
{
	$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
	$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
	if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
	$uri = '/' . trim($uri, '/');
	return $uri;
}
/*
* Here we get the uri and transform it into an array for easier routing
*/
function uriToArray($base_url) {
	$base_url = getCurrentUri();
  $routes = array();
  $routes = explode('/', $base_url);
  $rout = array();
	foreach($routes as $route)
	{
    if(trim($route) != '')
			array_push($rout, $route);
	}
	return $rout;
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
	// We get the location of the user
	$url = getCurrentUri();
	$route = uriToArray($url);
	// '/'
	switch(count($route)) {
    case 0:
    	include('client/homepage.php');
    	break;
    // '/*'
    case 1:
    	// '/index.php'
    	switch($route[0]) {
    		case 'index.php':
    			include('client/homepage.php');
    			break;
        case 'oauth':
          include('client/oauth.php');
          break;
				case 'droplets':
					include('client/droplets.php');
					break;
				case 'test':
					include('server/droplets.php');
					break;
				/*
				* If the url is '/server/*' we redirect directly to the file
				* It's done like this so the front-end can AJAX to '/server/resource.php'
				*/
				case 'server':
					include('server/'.$route[1]);
					break;
    		default:
    			die('404 file not found');
      }
  }
} else if($_SERVER['REQUEST_METHOD'] == 'POST') {
  switch(count($route)) {
    case 1:
      switch($route[0]) {

      }
  }
}

?>
