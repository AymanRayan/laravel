<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $table= "lists";

    protected $fillable = ['title' , 'content' ,'image','startDate','endDate','addedBy'];

    public $timestamps = false;
}
