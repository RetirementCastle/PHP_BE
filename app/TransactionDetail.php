<?php

namespace retirementcastle;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    //

    protected $table = 'transaction_details';
    protected $guarded = [];
    public $timestamps = false;

    public function transaction(){
    	return $this->belongsTo('retirementcastle\Transaction');
    }
}
