<?php namespace App\Http\Controllers;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Config;
use App\Http\Requests;
use App\country;
use App\User;
use App\trustcircle;
use App\requestuser;
use App\grouptable;
use App\mygroup;
use App\turn;
use App\votecandidate;
use App\votes;
use App\Bid;
use App\gactransfer;
use App\actransfer;
use App\loan;
use App\merry;
use App\schedule;
use App\notification;
use App\contributions;
use App\branchtransfer;
use App\loanrequest;
use App\images;
use Response;
use Auth; 
use DB; 
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Validation\Factory;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Calendar\Facades\Calendar;
use Illuminate\Routing\UrlGenerator;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Redirect;
use \Validator;
use App;
use PDF;
use Hash;
use Illuminate\Support\Facades\Input;
use File;
use Url;
use Cart;
use Carbon\Carbon;

class PaypalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	private $_api_context;
 
    public function __construct()
    {
        
        // setup PayPal api context
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function postPayment()
{
           

    $content = Cart::content();

    $payer = new Payer();
    $payer->setPaymentMethod('paypal');
 

    $item_list = new ItemList();
    $totalcash=0;

    $item_1 = array();

$i=0;

    foreach($content as $row)
	{
	$amount = $row->price;
	$total=0;
	if(count($content)>0)
	{
		$total = ((int)$amount-((((int)$row->options->discount)*$amount)/100)*((int)$row->qty));
	}
	else
	{
		$total = ((int)$amount)*((int)$row->qty);
	}

     $item_1[$i] = new Item();
    $item_1[$i] ->setName($row->name) // item name
        ->setCurrency('USD')
        ->setQuantity($row->qty)
        ->setPrice((int)$total); // unit price


        // $item_1 = array('setName'=>$row->name,'setCurrency'=>'USD','setQuantity'=>$row->qty,'setPrice'=>$total);


        $totalcash=((int)$totalcash)+((int)$total);
        $i++;
	}

	 $item_list->setItems($item_1);

   print_r($item_list);
   echo "<br>".$totalcash;
 
    // $item_2 = new Item();
    // $item_2->setName('Item 2')
    //     ->setCurrency('USD')
    //     ->setQuantity(4)
    //     ->setPrice('70');
 
 
    // add item to list

    
 
    $amount = new Amount();
    $amount->setCurrency('USD')
        ->setTotal($totalcash);
 
    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($item_list)
        ->setDescription('Sales Buy');
 
    $redirect_urls = new RedirectUrls();
    $redirect_urls->setReturnUrl(url('paymentsuccess')) // Specify return URL
        ->setCancelUrl(url('paymentfail'));
 
    $payment = new Payment();
    $payment->setIntent('Sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirect_urls)
        ->setTransactions(array($transaction));
 
    try {
        $payment->create($this->_api_context);
    } catch (\PayPal\Exception\PayPalConnectionException $ex) {
        if (\Config::get('app.debug')) {
            echo "Exception: " . $ex->getMessage() . PHP_EOL;
            $err_data = json_decode($ex->getData(), true);
            echo "<br>";print_r($err_data);
            exit;
        } else {
            die('Some error occur, sorry for inconvenient');
        }
    }
 
    foreach($payment->getLinks() as $link) {
        if($link->getRel() == 'approval_url') {
            $redirect_url = $link->getHref();
            break;
        }

    }
 
    // add payment ID to session
    Session::put('paypal_payment_id', $payment->getId());
 
    if(isset($redirect_url)) {
        // redirect to paypal
        return Redirect::away($redirect_url);
    }
 
    return Redirect::route('topup')
        ->with('error', 'Unknown error occurred');
        
}

public function getPaymentStatus(Request $request)
{
    // Get the payment ID before session clear
    $payment_id = Session::get('paypal_payment_id');
 
    // clear the session payment ID
    Session::forget('paypal_payment_id');
 
    if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
        return Redirect::route('original.route')
            ->with('error', 'Payment failed');
    }
 
    $payment = Payment::get($payment_id, $this->_api_context);
 
    // PaymentExecution object includes information necessary 
    // to execute a PayPal account payment. 
    // The payer_id is added to the request query parameters
    // when the user is redirected from paypal back to your site
    $execution = new PaymentExecution();
    $execution->setPayerId(Input::get('PayerID'));
 
    //Execute the payment
    $result = $payment->execute($execution, $this->_api_context);
   
   // echo $result->transactions[0]->amount->total;
    // echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later
   
    if ($result->getState() == 'approved') { // payment made

          return redirect('CheckOut');
    }
    else
    {
     Session::flash('messageerr', 'successfully paid KSH for your packages thank you thank you');
    return redirect('seecart');
    }
}
	
}
