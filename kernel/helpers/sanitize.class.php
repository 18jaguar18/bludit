<?php defined('BLUDIT') or die('Bludit CMS.');

class Sanitize {

	// new
	public static function html($text)
	{
		return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
	}

	public static function pathFile($path, $file)
	{
		$real = realpath($path.$file);

		// If $real is FALSE the file does not exist.
		if($real===false)
			return false;

		// If the $real path does not start with the systemPath then this is Path Traversal.
		if(strpos($path.$file, $real)!==0)
			return false;

		return true;
	}

	// old
	public static function ip($ip)
	{
		return filter_var($ip, FILTER_VALIDATE_IP);
	}

	public static function mail($mail)
	{
		return filter_var($mail, FILTER_VALIDATE_EMAIL);
	}

	public static function int($int)
	{
		if($int === 0)
			return( true );
		elseif (filter_var($int, FILTER_VALIDATE_INT) === false )
			return( false );
		else
			return( true );
	}

	// Remove all characters except digits
	public static function sanitize_float($value)
	{
		return( filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_THOUSAND) );
	}

	// Valid an integer positive
	public static function sanitize_int($value)
	{
		$value = (int)$value;

		if($value>=0)
			return $value;
		else
			return 0;
	}

	public static function sanitize_email($value)
	{
		return( filter_var($value, FILTER_SANITIZE_EMAIL) );
	}

	public static function sanitize_url($value)
	{
		return( filter_var($value, FILTER_SANITIZE_URL) );
	}

	// Convert all applicable characters to HTML entities incluye acentos


}
