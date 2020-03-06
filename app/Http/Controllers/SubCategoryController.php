<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    static public function attach ($attacher,$toAttach){
    	for ($i=0; $i < count($toAttach); $i++) { 
            $attacher->subCategories()->attach($toAttach[$i]);
        }
    }

    static public function detach ($detacher,$toDetach){
    	for ($i=0; $i < count($toDetach); $i++) { 
            $detacher->subCategories()->detach($toDetach[$i]);
        }
    }
}
