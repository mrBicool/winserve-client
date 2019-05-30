<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Sofa\Eloquence\Eloquence; // base trait
use Sofa\Eloquence\Mappable; // extension trait
use Sofa\Eloquence\Mutable; // extension trait

class Request extends Model
{
    //
    use Eloquence, Mappable, Mutable;
    //
    protected $table        = 'Requests';
    protected $primaryKey   = 'REQUESTID';
    public $timestamps      = false;

    /**
     * Model Mapping
     */
    protected $maps = [
        'request_id'        => 'REQUESTID', 
        'username'          => 'USERNAME',
        'password'          => 'PASSWORD',
        'trans_no'          => 'TRANSACTIONNO',
        'trans_type'        => 'TRANSACTIONTYPE',
        'trans_date'        => 'TRANSACTIONDATE',   // datetime
        'auth_code'         => 'AUTHCODE',
        'is_void'           => 'ISVOIDTRANSACTION',
        'business_date'     => 'BUSINESSDATE',
        'store_no'          => 'STORENO',
        'check_id'          => 'CHECKID',
        'term_id'           => 'TERMID',
        'tender_type'       => 'TENDERTYPE',
        'tender_id'         => 'TENDERID',
        'void_trans_no'     => 'VOIDTRANSACTIONNO',
        'site'              => 'SITE',
        'company'           => 'COMPANY',
        'terminal_no'       => 'TERMINALNO',
        'cashier_id'        => 'CASHIERID',
        'manager_id'        => 'MANAGERID',
        'shift_no'          => 'SHIFTNO',
        'calling_system'    => 'CALLINGSYSTEM',
        'parter_system'     => 'PARTNERSYSTEM',
        'currency'          => 'CURRENCY',
        'sale_type'         => 'SALETYPE',
        'sale_reason'       => 'SALEREASON',
        'qty'               => 'QUANTITY',
        'gross_amount'      => 'GROSSAMOUNT',
        'inventory'         => 'INVENTORY',
        'param1'            => 'APARAMETER1',
        'param2'            => 'APARAMETER2',
        'param3'            => 'APARAMETER3',
        'param4'            => 'APARAMETER4',
        'param5'            => 'APARAMETER5',
        'param6'            => 'APARAMETER6',
        'param7'            => 'APARAMETER7',
        'param8'            => 'APARAMETER8',
        'param9'            => 'APARAMETER9',
        'param10'           => 'APARAMETER10',
        'param11'           => 'APARAMETER11',
        'param12'           => 'APARAMETER12',
        'param13'           => 'APARAMETER13',
        'param14'           => 'APARAMETER14',
        'param15'           => 'APARAMETER15',
        'param16'           => 'APARAMETER16',
        'param17'           => 'APARAMETER17',
        'param18'           => 'APARAMETER18',
        'param19'           => 'APARAMETER19',
        'param20'           => 'APARAMETER20'
    ];  

    protected $getterMutators = [
        'trans_no'   => 'trim', 
        'trans_type'   => 'trim', 
        'is_void'  => 'trim',
        'store_no'  => 'trim',
        'check_id' => 'trim',
        'term_id' => 'trim',
        'tender_id' => 'trim',
        'void_trans_no' => 'trim',
        'site' => 'trim',
        'terminal_no' => 'trim',
        'cashier_id' => 'trim',
        'manager_id' => 'trim',
        'shift_to' => 'trim',
        'currency' => 'trim',
        'sale_type' => 'trim',
        'inventory' => 'trim',
    ];

    /**
     * Relationshit
     */
    public function details(){
        return $this->hasMany('App\RequestDetail','REQUESTID');
    }
}
