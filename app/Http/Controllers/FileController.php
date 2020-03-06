<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FileController extends Controller
{
    public static function move($model,$files){
    	for ($i=0; $i < count($files); $i++) {
            $name = strtotime($model->created_at).$files[$i]->getClientOriginalName();
            $path = 'file';
            $model->files()->create([
                'name'=>$name,
                'path'=>public_path($path)
            ]);
            $files[$i]->move($path,$name);
        }
    }

    public static function unlinck($model){
    	for ($i=0; $i < count($model->files); $i++) { 
            unlink($model->files[$i]->path.'/'.$model->files[$i]->name);
            $model->files[$i]->delete();
        }
    }

    static public function unlinckEsp($detach){
        for ($i=0; $i < count($detach); $i++) { 
            $file = File::find($detach[$i]);
            unlink($file->path.'/'.$file->name);
            $file->delete();
        }
    }
}
