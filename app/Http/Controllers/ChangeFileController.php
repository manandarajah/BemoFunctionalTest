<?php

namespace App\Http\Controllers;

use App\Events\ChangeFileToNoIndex;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Redirect;

class ChangeFileController extends Controller
{
    //
    public function change($file) {
    	
		//Rename file
    	$command = File::move(resource_path('views/'.$file.'.php'), resource_path('views/No-Index-'.$file.'.php'));
    	//$command = File::copy(resource_path('views/'.$file.'.php'), resource_path('views/No-Index-'.$file.'.php'));
		
		event(new ChangeFileToNoIndex($command));
		
		return Redirect::back();
    }
}
