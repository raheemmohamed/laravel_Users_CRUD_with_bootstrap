<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $upload_directory = 'http://localhost:81/laravelcodehack/public/images/';



    protected $fillable =[
        'file'
    ];

    public function getFileAttribute($value){
        return $this->upload_directory. $value;

    }
}
