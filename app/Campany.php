<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campany extends Model
{
    protected $guarded =[];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
