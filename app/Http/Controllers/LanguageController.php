<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    static public function attach ($attacher,$toAttach){
    	for ($i=0; $i < count($toAttach); $i++) { 
            $attacher->languages()->attach($toAttach[$i]['id'],['level'=>$toAttach[$i]['level']]);
        }
    }

    static public function detach ($detacher,$toDetach){
    	for ($i=0; $i < count($toDetach); $i++) { 
            $detacher->languages()->detach($toDetach[$i]);
        }
    }
}
