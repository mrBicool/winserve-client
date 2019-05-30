<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence; // base trait
use Sofa\Eloquence\Mappable; // extension trait
use Sofa\Eloquence\Mutable; // extension trait

class RequestDetail extends Model
{
    //
    use Eloquence, Mappable, Mutable;
    //
    protected $table    = 'RequestsDetails';
    public $timestamps  = false;

    /**
     * Model Mapping
     */
    protected $maps = [
        'request_detail_id' => 'REQUESTDETAILID', 
        'request_id'        => 'REQUESTID', 
        'item_code'         => 'ITEMCODE',
        'item_desc'         => 'ITEMDESC',
        'qty'               => 'QUANTITY',
        'unit_price'        => 'UNITPRICE',
        'item_amount'       => 'ITEMAMOUNT',
        'sales_category'    => 'SALESCATEGORY',
        'extra_item_code'   => 'ADDITIONALPRODUCTCODE',
        'tax_id'            => 'TAXID',
        'inclusive_tax'     => 'INCLUSIVETAX',
        'parent_item'       => 'PARENTITEM',
        'discount'          => 'DISCOUNT',
        'promo'             => 'PROMO',
        'net_amount'        => 'NETAMOUNT',
        'exclusive_tax'     => 'EXCLUSIVETAX'
    ];  

    protected $getterMutators = [
        // 'description'   => 'trim', 
    ];
}
