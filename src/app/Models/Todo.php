<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
    ];

    public function getID(){
        return $this->id;
    }

    public function getContent(){
        return $this->content;
    }

    public function getEditURL(){
        return 'todos/update/'.$this->id;
    }

    public function getDeleteURL(){
        return 'todos//delete/'.$this->id;
    }    
}
