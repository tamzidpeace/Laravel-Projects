<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
   protected $fillable =['name','blood_group_id','phone','address','photo'];

   public function bloodGroup()
    {
        return $this->belongsTo(BloodGroup::class);
    }
}
