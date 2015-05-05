<?php defined('BLUDIT') or die('Bludit CMS.');

class Session {

	private static $started = false;

	public static function start()
	{
		if(self::$started)
			return true;

		// DEBUG: Ver un nombre con alguna llave random al momentode instalar.
    	$session_name = 'Bludit-KEY';

    	// If TRUE cookie will only be sent over secure connections.
    	$secure = false;

    	// If set to TRUE then PHP will attempt to send the httponly flag when setting the session cookie.
    	$httponly = true;

		// Gets current cookies params.
		$cookieParams = session_get_cookie_params();

    	session_set_cookie_params($cookieParams["lifetime"],
        	$cookieParams["path"], 
        	$cookieParams["domain"], 
        	$secure,
        	$httponly
        );

	    // Sets the session name to the one set above.
	    session_name($session_name);
    
    	// Start session.
    	self::$started = session_start();

		// Regenerated the session, delete the old one. There are problems with AJAX.
		//session_regenerate_id(true);
	}

	public static function started()
	{
		return self::$started;
	}

	public static function destroy()
	{
		session_destroy();

		unset($_SESSION);
		
		self::$started = false;
	}

	public static function set($key, $value)
	{
		$key = 's_'.$key;
		
		$_SESSION[$key] = $value;
	}

	public static function get($key)
	{
		$key = 's_'.$key;

		if( isset($_SESSION[$key]) )
			return $_SESSION[$key];

		return false;
	}
}
