<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
      'name',
      'description',
      'company_id',
      'user_id',
      'days'
    ];

    public function user(){
      return $this->belongsTo('App\Models\User');
    }

    public function company(){
      return $this->belongsTo('App\Models\Company');
    }

}
