<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\BitcoinValuesApi;
use Session;
use DB;
use App\Recived_Orders;
use Mail;
class HomeController extends Controller
{
    public function index()
    {
      // $data=Http::get('http://api.currencylayer.com/live?access_key=4ded2220475af0132bf45d94c3597bd8&format=1');
      // echo "<pre>";
      // print_r($data);
      // echo "</pre>";KCBpHLdthtAUjLvWHyUQg
      // dd('https://fcsapi.com/api-v3/forex/latest?symbol=EUR/USD&period=1h&access_key=KCBpHLdthtAUjLvWHyUQg')->json();




      // $url=Http::get('https://bitpay.com/api/rates/PKR');
      // dd(json_decode($url));
      // echo "<pre>";
      // print_r($url);
      // echo "</pre>";
      // die();

      // $url = 'https://bitpay.com/api/rates/PKR';
      // $ch = curl_init();
      // curl_setopt($ch, CURLOPT_URL,$url);
      // curl_setopt($ch, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15")); 
      // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      // $result= curl_exec ($ch);
      // curl_close ($ch);
      // $data=(object)json_decode($result,true);
      // // dd($data);
      // echo "<pre>";
      // print_r($data);
      // echo "</pre>";

      // die();






      // $doller=$btc=0;

      // foreach ($json as $obj) {
      //   if($obj->code=='USD') $btc=$obj->rate;
      // }
      // echo $btc;

      $Bit_Cry_Prices=BitcoinValuesApi::all();
      return view('layout')->with('View_Bit_Cry_Prices',$Bit_Cry_Prices);
      
      $Bit_Cry_Prices=Http::get('https://api.coincap.io/v2/assets')->json();
        return view('layout')->with('View_Bit_Cry_Prices',$Bit_Cry_Prices['data']);
    }




   public function converter(Request $request){

   $url="https://web-api.coinmarketcap.com/v1/tools/price-conversion?amount=".$request->coinVal."&convert=".$request->coinType.",".$request->currencyType."&id=".$request->coinid."";

     // return $Bit_Cry_Prices=Http::get('https://web-api.coinmarketcap.com/v1/tools/price-conversion?amount=1&convert=BTC,USD,EUR,AMD&id=1')->json();
    return $Bit_Cry_Prices=Http::get($url)->json();
   } 
   public function edit_commission_fee($id)
   {
     $data=DB::select("select* from commission_values where id='$id'");
      return view('admin.edit_commission_fee')->with('all_data',$data);
   }
   public function update_commission_fee(Request $req,$id)
   { 
      $transaction_fee=$req->input('transaction_fee');
      $cryptocurrency_additional_price=$req->input('cryptocurrency_additional_price');
     $update=DB::update("UPDATE commission_values SET transaction_fee='$transaction_fee', cryptocurrency_additional_price='$cryptocurrency_additional_price' WHERE id='$id'");

      return redirect('/dashboard');
   }

    public function show_dashboard()
    {
      $data=DB::select('select* from commission_values');
    	return view('admin.dashboard')->with('all_data',$data);
    }

    public function admin_login()
    {

      return view('admin_login');
    }
    public function api_index()
    {
      return view('profile');
    }

//make order 
    public function make_order(Request $request)
    {
      $payment_method=$request->paymentVal;
      if($request->paymentVal=='paypal')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='bank_wire')
      {

        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='westren_union')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='perfect_money')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='payza')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='payoneer')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
        // echo $request->payoneer_payoneer_email;
      }
      else if($request->paymentVal=='webmoney')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='okpay')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='skrill')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='nettler')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='dash')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='money_gram')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='credit_card')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='instaforex')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='solid_trust_pay')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='us_bank')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));
        return view('profile')->with('order_data',Session::get('order_data'));

      }
      else if($request->paymentVal=='advcash')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
        // echo $request->advcash_wallet_id;
      }
      else if($request->paymentVal=='alipay_china')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
        // echo $request->alipaychina_email_id;
      }
      else if($request->paymentVal=='paysafecard')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='onecard')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='sofort')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='qivi_wallet')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='entromoney')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='mobile_wallet')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='wordremit')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='mobile_pay')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='capital_one')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='apple_pay')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='chase_quick_pay')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='transfer_wise')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='venmo_mobile_payment')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='xoom_money_transfer')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='swift_transfer')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='direct_bank_deposit')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else if($request->paymentVal=='buy_virtual_card')
      {
        Session::put('order_data', array('paymethod'=> $payment_method,'reqData'=>$request->all()));

        return view('profile')->with('order_data',Session::get('order_data'));
      }
      else
      {

      }
      // dd($request->all());
    }

    public function confirm_order(Request $request)
    {


     $insertArray=[];
      if ($request->paymentVal=='paypal') {
        $insertArray=[
        'paypal_email'=>$request->paypal_email,
        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];
      }
      else if($request->paymentVal=='bank_wire')
      {
        $insertArray=[
        'bankwire_holder_name'=>$request->bankwire_holder_name,
        'bankwire_swift_card'=>$request->bankwire_swift_card,
        'bankwire_bank_name'=>$request->bankwire_bank_name,
        'bankwire_iban'=>$request->bankwire_iban,
        'bankwire_country'=>$request->bankwire_country,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];
      // dd($insertArray);
      }
      else if($request->paymentVal=='westren_union')
      {
        $insertArray=[
        'westrenunion_full_name'=>$request->westrenunion_full_name,
        'westrenunion_address'=>$request->westrenunion_address,
        'westrenunion_country'=>$request->westrenunion_country,
        'westrenunion_phone_no'=>$request->westrenunion_phone_no,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='perfect_money')
      {
                $insertArray=[
        'perfectmoney_pm_id'=>$request->perfectmoney_pm_id,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='payza')
      {

        $insertArray=[
        'payza_payza_email'=>$request->payza_payza_email,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='payoneer')
      {
        $insertArray=[
        'payoneer_payoneer_email'=>$request->payoneer_payoneer_email,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='webmoney')
      {
        $insertArray=[
        'webmoney_webmoney_purse'=>$request->webmoney_webmoney_purse,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='okpay')
      {
        $insertArray=[
        'okpay_okpay_email'=>$request->okpay_okpay_email,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='skrill')
      {
        
        $insertArray=[
        'skrill_skrill_email'=>$request->skrill_skrill_email,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='nettler')
      {
        
        $insertArray=[
        'nettler_nettler_id'=>$request->nettler_nettler_id,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,
      ];

      }
      else if($request->paymentVal=='dash')
      {
        $insertArray=[
        'dash_dash_id'=>$request->dash_dash_id,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='money_gram')
      {
        
        $insertArray=[
        'moneygram_full_name'=>$request->moneygram_full_name,
        'moneygram_address'=>$request->moneygram_address,
        'moneygram_country'=>$request->moneygram_country,
        'moneygram_phone_no'=>$request->moneygram_phone_no,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='credit_card')
      {
        
        $insertArray=[
        'creditcard_card_number'=>$request->creditcard_card_number,
        'creditcard_expiry'=>$request->creditcard_expiry,
        'creditcard_cvv'=>$request->creditcard_cvv,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='instaforex')
      {
        
        $insertArray=[
        'instaforex_instaforex_id'=>$request->instaforex_instaforex_id,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='solid_trust_pay')
      {
        
        $insertArray=[
        'solidtrustpay_std_id'=>$request->solidtrustpay_std_id,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,
      ];

      }
      else if($request->paymentVal=='us_bank')
      {
        
        $insertArray=[
        'usbank_us_id'=>$request->usbank_us_id,
        'usbank_expiry'=>$request->usbank_expiry,
        'usbank_cvv'=>$request->usbank_cvv,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='advcash')
      {
        
        $insertArray=[
        'advcash_wallet_id'=>$request->advcash_wallet_id,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='alipay_china')
      {
        
        $insertArray=[
        'alipaychina_email_id'=>$request->alipaychina_email_id,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='paysafecard')
      {
        
        $insertArray=[
        'paysafecard_email_id'=>$request->paysafecard_email_id,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='onecard')
      {
        
        $insertArray=[
        'onecard_email_id'=>$request->onecard_email_id,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,


      ];

      }
      else if($request->paymentVal=='sofort')
      {
        
        $insertArray=[
        'sofort_email_id'=>$request->sofort_email_id,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='qivi_wallet')
      {
        
        $insertArray=[
        'qiviwallet_id'=>$request->qiviwallet_id,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='entromoney')
      {
        
        $insertArray=[
        'entromoney_wallet_address'=>$request->entromoney_wallet_address,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,


      ];

      }
      else if($request->paymentVal=='mobile_wallet')
      {
        
        $insertArray=[
        'mobilewallet_full_name'=>$request->mobilewallet_full_name,
        'mobilewallet_phone_number'=>$request->mobilewallet_phone_number,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='wordremit')
      {
        
        $insertArray=[
        'wordremit_wallet_address'=>$request->wordremit_wallet_address,
        'wordremit_swift_card'=>$request->wordremit_swift_card,
        'wordremit_bank_name'=>$request->wordremit_bank_name,
        'wordremit_iban'=>$request->wordremit_iban,
        'wordremit_country'=>$request->wordremit_country,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='mobile_pay')
      {
        
        $insertArray=[
        'mobilepay_full_name'=>$request->mobilepay_full_name,
        'mobilepay_phone_number'=>$request->mobilepay_phone_number,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='capital_one')
      {
        
        $insertArray=[
        'capitalone_email_id'=>$request->capitalone_email_id,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='apple_pay')
      {
        
        $insertArray=[
        'applepay_full_name'=>$request->applepay_full_name,
        'applepay_phone_number'=>$request->applepay_phone_number,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='chase_quick_pay')
      {
        
        $insertArray=[
        'chasequickpay_email_id'=>$request->chasequickpay_email_id,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='transfer_wise')
      {
        
        $insertArray=[
        'transferwise_email_address'=>$request->transferwise_email_address,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='venmo_mobile_payment')
      {
        $insertArray=[
        'venmomobilepayment_full_name'=>$request->venmomobilepayment_full_name,
        'venmomobilepayment_phone_number'=>$request->venmomobilepayment_phone_number,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='xoom_money_transfer')
      {
        
        $insertArray=[
        'xoommoneytransfer_email_address'=>$request->xoommoneytransfer_email_address,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='swift_transfer')
      {
        
        $insertArray=[
        'swifttransfer_holder_name'=>$request->swifttransfer_holder_name,
        'swifttransfer_swift_card'=>$request->swifttransfer_swift_card,
        'swifttransfer_bank_name'=>$request->swifttransfer_bank_name,
        'swifttransfer_iban'=>$request->swifttransfer_iban,
        'swifttransfer_country'=>$request->swifttransfer_country,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='direct_bank_deposit')
      {
        

        $insertArray=[
        'directbankdeposit_holder_name'=>$request->directbankdeposit_holder_name,
        'directbankdeposit_bank_name'=>$request->directbankdeposit_bank_name,
        'directbankdeposit_iban'=>$request->directbankdeposit_iban,
        'directbankdeposit_country'=>$request->directbankdeposit_country,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->paymentVal=='buy_virtual_card')
      {
        
        $insertArray=[
        'buyvirtualcard_email_address'=>$request->buyvirtualcard_email_address,

        'commission_fee'=>$request->hidden_commission_fee,
        'recived_total_amount'=>$request->hidden_recived_amount,
        'recived_bitcoin'=>$request->users_bitcoin_entered_amount,
        'transection_url'=>$request->transection_url,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->paymentVal,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];
      
      }

  $insertgo=Recived_Orders::create($insertArray);


// include('smtp/PHPMailerAutoload.php');

//   $mail=new PHPMailer(true);
//   $mail->isSMTP();
//   $mail->Host="smtp.gmail.com";
//   $mail->Port=587;
//   $mail->SMTPSecure="tls";
//   $mail->SMTPAuth=true;
//   $mail->Username="janujakhar2370@gmail.com";
//   $mail->Password="jakhar2370";
//   $mail->SetFrom("janujakhar2370@gmail.com");
//   $mail->addAddress("zahidjakhar2370@gmail.com");
//   $mail->IsHTML(true);
//   $mail->Subject="New Data";
//   $mail->Body=$insertArray;
//   $mail->SMTPOptions=array('ssl'=>array(
//     'verify_peer'=>false,
//     'verify_peer_name'=>false,
//     'allow_self_signed'=>false
//   ));
//   if($mail->send()){
//     

//   }else{
//     echo "Error";
//   }
return view('order_recived_confirmation');


    
    }
    public function Update_Order(Request $request,$id)
    {
      $insertArray=[];
      if ($request->payment_method=='paypal') {
        $insertArray=[
        'paypal_email'=>$request->paypal_email,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];
      // dd($insertArray);
      }
      else if($request->payment_method=='bank_wire')
      {
        $insertArray=[
        'bankwire_holder_name'=>$request->bankwire_holder_name,
        'bankwire_swift_card'=>$request->bankwire_swift_card,
        'bankwire_bank_name'=>$request->bankwire_bank_name,
        'bankwire_iban'=>$request->bankwire_iban,
        'bankwire_country'=>$request->bankwire_country,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];
      // dd($insertArray);
      }
      else if($request->payment_method=='westren_union')
      {
        $insertArray=[
        'westrenunion_full_name'=>$request->westrenunion_full_name,
        'westrenunion_address'=>$request->westrenunion_address,
        'westrenunion_country'=>$request->westrenunion_country,
        'westrenunion_phone_no'=>$request->westrenunion_phone_no,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,
      ];

      }
      else if($request->payment_method=='perfect_money')
      {
                $insertArray=[
        'perfectmoney_pm_id'=>$request->perfectmoney_pm_id,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='payza')
      {

        $insertArray=[
        'payza_payza_email'=>$request->payza_payza_email,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='payoneer')
      {
        $insertArray=[
        'payoneer_payoneer_email'=>$request->payoneer_payoneer_email,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='webmoney')
      {
        $insertArray=[
        'webmoney_webmoney_purse'=>$request->webmoney_webmoney_purse,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='okpay')
      {
        $insertArray=[
        'okpay_okpay_email'=>$request->okpay_okpay_email,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='skrill')
      {
        
        $insertArray=[
        'skrill_skrill_email'=>$request->skrill_skrill_email,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='nettler')
      {
        
        $insertArray=[
        'nettler_nettler_id'=>$request->nettler_nettler_id,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,
      ];

      }
      else if($request->payment_method=='dash')
      {
        $insertArray=[
        'dash_dash_id'=>$request->dash_dash_id,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='money_gram')
      {
        
        $insertArray=[
        'moneygram_full_name'=>$request->moneygram_full_name,
        'moneygram_address'=>$request->moneygram_address,
        'moneygram_country'=>$request->moneygram_country,
        'moneygram_phone_no'=>$request->moneygram_phone_no,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='credit_card')
      {
        
        $insertArray=[
        'creditcard_card_number'=>$request->creditcard_card_number,
        'creditcard_expiry'=>$request->creditcard_expiry,
        'creditcard_cvv'=>$request->creditcard_cvv,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='instaforex')
      {
        
        $insertArray=[
        'instaforex_instaforex_id'=>$request->instaforex_instaforex_id,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='solid_trust_pay')
      {
        
        $insertArray=[
        'solidtrustpay_std_id'=>$request->solidtrustpay_std_id,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,
      ];

      }
      else if($request->payment_method=='us_bank')
      {
        
        $insertArray=[
        'usbank_us_id'=>$request->usbank_us_id,
        'usbank_expiry'=>$request->usbank_expiry,
        'usbank_cvv'=>$request->usbank_cvv,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='advcash')
      {
        
        $insertArray=[
        'advcash_wallet_id'=>$request->advcash_wallet_id,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='alipay_china')
      {
        
        $insertArray=[
        'alipaychina_email_id'=>$request->alipaychina_email_id,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='paysafecard')
      {
        
        $insertArray=[
        'paysafecard_email_id'=>$request->paysafecard_email_id,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='onecard')
      {
        
        $insertArray=[
        'onecard_email_id'=>$request->onecard_email_id,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='sofort')
      {
        
        $insertArray=[
        'sofort_email_id'=>$request->sofort_email_id,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='qivi_wallet')
      {
        
        $insertArray=[
        'qiviwallet_id'=>$request->qiviwallet_id,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='entromoney')
      {
        
        $insertArray=[
        'entromoney_wallet_address'=>$request->entromoney_wallet_address,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='mobile_wallet')
      {
        
        $insertArray=[
        'mobilewallet_full_name'=>$request->mobilewallet_full_name,
        'mobilewallet_phone_number'=>$request->mobilewallet_phone_number,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='wordremit')
      {
        
        $insertArray=[
        'wordremit_wallet_address'=>$request->wordremit_wallet_address,
        'wordremit_swift_card'=>$request->wordremit_swift_card,
        'wordremit_bank_name'=>$request->wordremit_bank_name,
        'wordremit_iban'=>$request->wordremit_iban,
        'wordremit_country'=>$request->wordremit_country,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='mobile_pay')
      {
        
        $insertArray=[
        'mobilepay_full_name'=>$request->mobilepay_full_name,
        'mobilepay_phone_number'=>$request->mobilepay_phone_number,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='capital_one')
      {
        
        $insertArray=[
        'capitalone_email_id'=>$request->capitalone_email_id,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='apple_pay')
      {
        
        $insertArray=[
        'applepay_full_name'=>$request->applepay_full_name,
        'applepay_phone_number'=>$request->applepay_phone_number,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='chase_quick_pay')
      {
        
        $insertArray=[
        'chasequickpay_email_id'=>$request->chasequickpay_email_id,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='transfer_wise')
      {
        
        $insertArray=[
        'transferwise_email_address'=>$request->transferwise_email_address,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='venmo_mobile_payment')
      {
        $insertArray=[
        'venmomobilepayment_full_name'=>$request->venmomobilepayment_full_name,
        'venmomobilepayment_phone_number'=>$request->venmomobilepayment_phone_number,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='xoom_money_transfer')
      {
        
        $insertArray=[
        'xoommoneytransfer_email_address'=>$request->xoommoneytransfer_email_address,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='swift_transfer')
      {
        
        $insertArray=[
        'swifttransfer_holder_name'=>$request->swifttransfer_holder_name,
        'swifttransfer_swift_card'=>$request->swifttransfer_swift_card,
        'swifttransfer_bank_name'=>$request->swifttransfer_bank_name,
        'swifttransfer_iban'=>$request->swifttransfer_iban,
        'swifttransfer_country'=>$request->swifttransfer_country,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='direct_bank_deposit')
      {
        

        $insertArray=[
        'directbankdeposit_holder_name'=>$request->directbankdeposit_holder_name,
        'directbankdeposit_bank_name'=>$request->directbankdeposit_bank_name,
        'directbankdeposit_iban'=>$request->directbankdeposit_iban,
        'directbankdeposit_country'=>$request->directbankdeposit_country,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];

      }
      else if($request->payment_method=='buy_virtual_card')
      {
        
        $insertArray=[
        'buyvirtualcard_email_address'=>$request->buyvirtualcard_email_address,

        'commission_fee'=>$request->commission_fee,
        'recived_total_amount'=>$request->recived_total_amount,
        'recived_bitcoin'=>$request->recived_bitcoin,
        'transection_url'=>$request->transection_url,
        'transection_id'=>$request->transection_id,
        'order_date'=>$request->order_date,
        'reciver_wallet_address'=>$request->reciver_wallet_address,
        'order_number'=>$request->order_number,
        'payment_method'=>$request->payment_method,
        'bitcoin_current_val'=>$request->bitcoin_current_val,

      ];
      
      }

      $updateOrderFind = Recived_Orders::find($id);
      $updateOrderFind->update($insertArray);
      if ($updateOrderFind) {
           return redirect('/get_all_payments_orders_data');
        }
    
    }




    public function testing()
    {
      $Bit_Cry_Prices=BitcoinValuesApi::all();


  
    
        return view('testing')->with('View_Bit_Cry_Prices',$Bit_Cry_Prices);
    

      $Bit_Cry_Prices=Http::get('https://api.coincap.io/v2/assets')->json();
        return view('testing')->with('View_Bit_Cry_Prices',$Bit_Cry_Prices['data']);
      // return view('testing');
    }

    public function edit_order_value($id)
    {
      // $id="3";
      $data=DB::select("select* from recived_order_tbl WHERE id='$id'");
      return view('admin.payments_orders.edit')->with('all_data',$data);
      // return view('admin.payments_orders.edit');
    }
    
     
}
