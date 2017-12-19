<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  
public function home () {
   $messages = [
	   [
	   'id' => 1,
	   'content' => 'My message',
	   'image' => 'http://lorempixel.com/600/338',

	   ],
	   [
		'id' => 2,
		'content' => 'My message 1',
		'image' => 'http://lorempixel.com/600/339',
 
		],
		[
		'id' => 3,
		'content' => 'My message 2',
		'image' => 'http://lorempixel.com/600/340',
	 
		],
		[
		'id' => 4,
		'content' => 'My message 3',
		'image' => 'http://lorempixel.com/600/341',
			 
		],
		];

	return view('welcome', [
		'messages' => $messages,
	
	]);
}




}