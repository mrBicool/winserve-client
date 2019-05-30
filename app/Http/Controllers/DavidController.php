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
                    $TransactionDate    = $SaleHeader->addChild('TransactionDate', $tr->trans_date); 
                    $AuthCode           = $SaleHeader->addChild('AuthCode', $tr->auth_code); 
                    $IsVoidTransaction  = $SaleHeader->addChild('IsVoidTransaction', $tr->is_void); 
                    $BusinessDate       = $SaleHeader->addChild('BusinessDate', $tr->business_date);
                    $StoreNo            = $SaleHeader->addChild('StoreNo', $tr->store_no);
                    $CheckID            = $SaleHeader->addChild('CheckID', $tr->check_id);
                    $TermID             = $SaleHeader->addChild('TermID', $tr->term_id);
                    $TenderType         = $SaleHeader->addChild('TenderType', $tr->tender_type);
                    $TenderID           = $SaleHeader->addChild('TenderID', $tr->tender_id);
                    $VoidTransactionNo  = $SaleHeader->addChild('VoidTransactionNo', $tr->void_trans_no);
                    $Site               = $SaleHeader->addChild('Site', $tr->site);
                    $Company            = $SaleHeader->addChild('Company', $tr->company);
                    $TerminalNo         = $SaleHeader->addChild('TerminalNo', $tr->terminal_no);
                $CashierID              = $saleRequest->addChild('CashierID', $tr->cashier_id); 
                $ManagerID              = $saleRequest->addChild('ManagerID', $tr->manager_id); 
                $ShiftNo                = $saleRequest->addChild('ShiftNo', $tr->shift_no); 
                $CallingSystem          = $saleRequest->addChild('CallingSystem', $tr->calling_system); 
                $PartnerSystem          = $saleRequest->addChild('PartnerSystem', $tr->parter_system); 
                $Currency               = $saleRequest->addChild('Currency', $tr->currency); 
                $SaleType               = $saleRequest->addChild('SaleType', $tr->sale_type); 
                $SaleReason             = $saleRequest->addChild('SaleReason', $tr->sale_reason); 
                $Quantity               = $saleRequest->addChild('Quantity', $tr->qty);
                $GrossAmount            = $saleRequest->addChild('GrossAmount', $tr->gross_amount);
                $Inventory              = $saleRequest->addChild('Inventory', $tr->inventory);
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
