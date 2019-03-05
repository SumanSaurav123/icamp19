<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies_list extends Model
{
    //
    protected $table = 'companies_lists';

    public function candidates()
    {
        return $this->belongsTo('App\Candidate', 'icamp_id', 'icamp_id');
    }

    public function companies()
    {
        return $this->belongsTo('App\Companies', 'companies_id', 'id');
    }
}
