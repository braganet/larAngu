<?php

namespace LarAngu;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //para inserção de dados em massa
    protected $fillable = [
        'name',
         'responsible',
         'email',
         'phone',
         'address',
         'obs'

    ];
}
