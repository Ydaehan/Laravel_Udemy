<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	function index()
	{
		// Eloquent ORM (Create)
		// $user = new User();
		// $user->name = 'Artik';
		// $user->email = 'artik@gmail.com';
		// $user->password = '12345';
		// $user->save();

		// read data from db
		// $user = User::find(1);
		// dd($user);

		// update data
		// $user = User::find(1);
		// $user->name = 'Test user';
		// $user->save();

		// delete data
		// $user = User::find(1);
		// $user->delete();


		return view('welcome');
	}

	function showAboutPage()
	{
		return view('about');
	}
}
