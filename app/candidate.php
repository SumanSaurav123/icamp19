<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Companies_list;
use Auth;

class candidate extends Authenticatable
{
    //
    protected $table = 'candidates';

    protected $hidden = [
        'passcode',
    ];

    public function companies_list()
    {
        return $this->hasMany('App\Companies_list','icamp_id','icamp_id');
    }

    public function checkAlreadySelected($id)
    {
        $data = Auth::user()->companies_list;
        foreach($data as $d)
        {
            if($d->companies->id==$id)
              return true;
        }
        return false;
    }

    
}
