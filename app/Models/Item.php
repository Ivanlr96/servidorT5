<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model

{


    use HasFactory;
    public function box()
    {
        return $this->belongsTo(Box::class);
    }
    public function loan()
    {

        return $this->hasOne(Loan::class);
    }

        protected $fillable = ['name', 'description', 'price', 'picture', 'box_id'];

        public function activeLoan()
            {
                return $this->loan()->whereNull('return_date')->first();
            }

}
