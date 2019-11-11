<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
      'gender' => 'required',
      'hair_type' => 'required',
      'hair_volume' => 'required',
      'hair_length' => 'required',
      'hair_color' => 'required',
      'straighte' => 'required',
      'perm' => 'required',
      'hair_style' => 'required',
     
      );
}
