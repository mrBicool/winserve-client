<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Sofa\Eloquence\Eloquence; // base trait
use Sofa\Eloquence\Mappable; // extension trait
use Sofa\Eloquence\Mutable; // extension trait

class Response extends Model
{
    //
    use Eloquence, Mappable, Mutable;

    protected $table        = 'Responses';
    protected $primaryKey   = 'RESPONSESID';
    public $timestamps      = false;


    /**
     * Model Mapping
     */
    protected $maps = [
        'response_id'        => 'RESPONSESID',
        'request_id'         => 'REQUESTID',
        'trans_no'           => 'TRANSACTIONNO',
        'auth_code'          => 'AUTHCODE',
        'masked_card_no'     => 'MASKEDCARDNO',
        'response_code'      => 'RESPONSECODE',
        'response_desc'      => 'RESPONSEDESCRIPTION',
        'param1'             => 'APARAMETER1',
        'param2'             => 'APARAMETER2',
        'param3'             => 'APARAMETER3',
        'param4'             => 'APARAMETER4',
        'param5'             => 'APARAMETER5',
        'param6'             => 'APARAMETER6',
        'param7'             => 'APARAMETER7',
        'param8'             => 'APARAMETER8',
        'param9'             => 'APARAMETER9',
        'param10'             => 'APARAMETER10',
    ];

    /**
     * logic
     */
    public function getNewID(){
        $result =  static::orderBy('response_id','desc')
            ->first();

        if($result == null){
            return 1;
        }

        return $result->response_id + 1;

    }
}
