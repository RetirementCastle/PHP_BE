<?php

namespace retirementcastle;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'transaction';
    protected $guarded = [];
    public $timestamps = false;


    public function transactiondetails(){
    	return $this->hasMany('retirementcastle\TransactionDetail');
    }


}

