<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recived_Orders extends Model
{
    protected $fillable = [

'order_number',
'payment_method',
'paypal_email',
'bankwire_holder_name',
'bankwire_swift_card',
'bankwire_bank_name',
'bankwire_iban',
'bankwire_country',
'westrenunion_full_name',
'westrenunion_address',
'westrenunion_country',
'westrenunion_phone_no',
'perfectmoney_pm_id',
'payza_payza_email',
'payoneer_payoneer_email',
'webmoney_webmoney_purse',
'okpay_okpay_email',
'skrill_skrill_email',
'nettler_nettler_id',
'dash_dash_id',
'moneygram_full_name',
'moneygram_address',
'moneygram_country',
'moneygram_phone_no',
'creditcard_card_number',
'creditcard_expiry',
'creditcard_cvv',
'instaforex_instaforex_id',
'solidtrustpay_std_id',
'usbank_us_id',
'usbank_expiry',
'usbank_cvv',
'advcash_wallet_id',
'alipaychina_email_id',
'paysafecard_email_id',
'onecard_email_id',
'sofort_email_id',
'qiviwallet_id',
'entromoney_wallet_address',
'mobilewallet_full_name',
'mobilewallet_phone_number',
'wordremit_wallet_address',
'wordremit_swift_card',
'wordremit_bank_name',
'wordremit_iban',
'wordremit_country',
'mobilepay_full_name',
'mobilepay_phone_number',
'capitalone_email_id',
'applepay_full_name',
'applepay_phone_number',
'chasequickpay_email_id',
'transferwise_email_address',
'venmomobilepayment_full_name',
'xoommoneytransfer_email_address',
'swifttransfer_holder_name',
'swifttransfer_swift_card',
'swifttransfer_bank_name',
'swifttransfer_iban',
'swifttransfer_country',
'directbankdeposit_holder_name',
'directbankdeposit_bank_name',
'directbankdeposit_iban',
'directbankdeposit_country',
'buyvirtualcard_email_address',
'reciver_wallet_address',
'transection_id',
'recived_total_amount',
'recived_bitcoin',
'transection_url',
'order_date',
'status',
'commission_fee',
'bitcoin_current_val',



];

protected $table="recived_order_tbl";	
}
