<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as TransRequest;
use SoapBox\Formatter\Formatter;
use Response;

class DavidController extends Controller
{
    //
    public function transaction($id){

        try{
            $tr         = TransRequest::find($id);  
            $xml        = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/" xmlns:req="http://ENOC.SSB.IntegrationServices.SalesPaymentService/V1.0/Request"><soapenv:Header/></soapenv:Envelope>');
            $xml->addAttribute('version', '1.0'); 

            $body                       = $xml->addChild('Body');  
            $SendSaleRequest            = $body->addChild('tem:SendSaleRequest');
            $saleRequest                = $SendSaleRequest->addChild('saleRequest'); 
                $AuthHeader             = $saleRequest->addChild('AuthHeader'); 
                    $UserName           = $AuthHeader->addChild('UserName', $tr->username); 
                    $Password           = $AuthHeader->addChild('Password', $tr->password);
                $SaleHeader             = $saleRequest->addChild('SaleHeader'); 
                    $TransactionNo      = $SaleHeader->addChild('TransactionNo', $tr->trans_no); 
                    $TransactionType    = $SaleHeader->addChild('TransactionType', $tr->trans_type); 
                    $TransactionDate    = $SaleHeader->addChild('TransactionDate'); 
                    $AuthCode           = $SaleHeader->addChild('AuthCode'); 
                    $IsVoidTransaction  = $SaleHeader->addChild('IsVoidTransaction'); 
                    $BusinessDate       = $SaleHeader->addChild('BusinessDate');
                    $StoreNo            = $SaleHeader->addChild('StoreNo');
                    $CheckID            = $SaleHeader->addChild('CheckID');
                    $TermID             = $SaleHeader->addChild('TermID');
                    $TenderType         = $SaleHeader->addChild('TenderType');
                    $TenderID           = $SaleHeader->addChild('TenderID');
                    $VoidTransactionNo  = $SaleHeader->addChild('VoidTransactionNo');
                    $Site               = $SaleHeader->addChild('Site');
                    $Company            = $SaleHeader->addChild('Company');
                    $TerminalNo         = $SaleHeader->addChild('TerminalNo');
                $CashierID              = $saleRequest->addChild('CashierID'); 
                $ManagerID              = $saleRequest->addChild('ManagerID'); 
                $ShiftNo                = $saleRequest->addChild('ShiftNo'); 
                $CallingSystem          = $saleRequest->addChild('CallingSystem'); 
                $PartnerSystem          = $saleRequest->addChild('PartnerSystem'); 
                $Currency               = $saleRequest->addChild('Currency'); 
                $SaleType               = $saleRequest->addChild('SaleType'); 
                $SaleReason             = $saleRequest->addChild('SaleReason'); 
                $Quantity               = $saleRequest->addChild('Quantity');
                $GrossAmount            = $saleRequest->addChild('GrossAmount');
                $Inventory              = $saleRequest->addChild('Inventory');
                $ItemsList              = $saleRequest->addChild('ItemsList');
                    foreach($tr->details as $detail){
                        $Item           = $ItemsList->addChild('Item');
                            $ItemCode                   = $Item->addChild('ItemCode', $detail->item_code);
                            $ItemDesc                   = $Item->addChild('ItemDesc', $detail->item_desc);
                            $Quantity                   = $Item->addChild('Quantity');
                            $UnitPrice                  = $Item->addChild('UnitPrice');
                            $ItemAmount                 = $Item->addChild('ItemAmount');
                            $SalesCategory              = $Item->addChild('SalesCategory');
                            $AdditionalProductCode      = $Item->addChild('AdditionalProductCode');
                            $TaxID                      = $Item->addChild('TaxID');
                            $InclusiveTax               = $Item->addChild('InclusiveTax');
                            $ParentItem                 = $Item->addChild('ParentItem');
                            $Discount                   = $Item->addChild('Discount');
                            $Promo                      = $Item->addChild('Promo');
                            $NetAmount                  = $Item->addChild('NetAmount');
                            $ExclusiveTax               = $Item->addChild('ExclusiveTax'); 
                    }
                $AParameter1            = $saleRequest->addChild('AParameter1');
                $AParameter2            = $saleRequest->addChild('AParameter2');
                $AParameter3            = $saleRequest->addChild('AParameter3');
                $AParameter4            = $saleRequest->addChild('AParameter4');
                $AParameter5            = $saleRequest->addChild('AParameter5');
                $AParameter6            = $saleRequest->addChild('AParameter6');
                $AParameter7            = $saleRequest->addChild('AParameter7');
                $AParameter8            = $saleRequest->addChild('AParameter8');
                $AParameter9            = $saleRequest->addChild('AParameter9');
                $AParameter10           = $saleRequest->addChild('AParameter10');
                $AParameter11           = $saleRequest->addChild('AParameter11');
                $AParameter12           = $saleRequest->addChild('AParameter12');
                $AParameter13           = $saleRequest->addChild('AParameter13');
                $AParameter14           = $saleRequest->addChild('AParameter14');
                $AParameter15           = $saleRequest->addChild('AParameter15');
                $AParameter16           = $saleRequest->addChild('AParameter16');
                $AParameter17           = $saleRequest->addChild('AParameter17');
                $AParameter18           = $saleRequest->addChild('AParameter18');
                $AParameter19           = $saleRequest->addChild('AParameter19');
                $AParameter20           = $saleRequest->addChild('AParameter20');

            $response   = Response::make($xml->asXML(), 200);
            $response->header('Content-Type', 'application/xml');
            return $response;

            
        }catch( \Exception $e){

        }
        
    }
}
