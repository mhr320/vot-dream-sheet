<?php

/**
 * Authentication Class
 */
class Auth
{
	
	public static function authenticate($row)
	{
		$_SESSION['USER'] = $row;
	}

	public static function logout()
	{
		if(isset($_SESSION['USER']))
		{
			unset($_SESSION['USER']);
		}
	}

	public static function logged_in()
	{
		if(isset($_SESSION['USER']))
		{
			return true;
		}

		return false;
	}

	public static function isBasicUser()
	{
		if(isset($_SESSION['USER']))
		{
			if($_SESSION['USER']->role == 'c' || $_SESSION['USER']->role == 'd')
			{
				return true;
			}
		}
		return false;
	}

	

	public static function isSuper()
	{
		if(isset($_SESSION['USER']))
		{
			if($_SESSION['USER']->role == 'super_admin')
			{
				return true;
			}
		}
		return false;
	}

	public static function isAdmin()
	{
		if(isset($_SESSION['USER']))
		{
			if($_SESSION['USER']->role == 'admin')
			{
				return true;
			}
		}
		return false;
	}

	public static function user()
	{
		if(isset($_SESSION['USER']))
		{
			return $_SESSION['USER']->nom;
		}
		return false;
	}

	public static function __callStatic($method, $params)
	{
		$prop = strtolower(str_replace("get","", $method));

		if(isset($_SESSION['USER']->$prop))
		{
			return $_SESSION['USER']->$prop;
		}
		return 'Unknown';
	}
	
	// public static function switch_school($id)
	// {
	// 	if(isset($_SESSION['USER']) && $_SESSION['USER']->title == 'super_admin' )
	// 	{
	// 		$user = new User();

	// 		$school = new School();

	// 		if($row = $school->where('id',$id))
	// 		{

	// 			$row = $row[0];

	// 			$arr['school_id'] = $row->school_id;

	// 			$user->update($_SESSION['USER']->id, $arr);
				
	// 			$_SESSION['USER']->school_id = $row->school_id;
	// 			$_SESSION['USER']->school_name = $row->school;
				
	// 		}

	// 		return true;
	// 	}
	// 	return false;
	// }

}