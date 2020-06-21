<?php

namespace App\Http\Controllers;

use App\Mail\SendMailPurchase;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Product;
use Auth;
use Illuminate\Support\Facades\Mail;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use App\Facade\PayPal;

class PublicController extends Controller
{
    public function index(){
        $posts=Post::paginate(5);
        return view('welcome',compact('posts'));
    }
    public function contact(){
     return view('contact');

 }
 public function comment(Request $request){
    $this->validate($request,[
        'content'=>'required'

    ]);

    $comment=new Comment;
    $comment->content=$request->content;
    $comment->post_id=$request->post_id;
    $comment->user_id=Auth::id();
    $comment->save();
    return redirect()->back();

}
public function about(){
    return view('about');
}
public function singlePost($id){
    $post=Post::find($id);
    return view('post',compact('post'));
}
public function shop(){
    $product=Product::all();
    return view('shop',compact('product'));
}
public function singleProduct ($id){
    $product=Product::find($id);
    return view('singleProduct',compact('product'));
}
public function oderProduct($id){
    $product=Product::find($id);
    $apiContext=PayPal::apiContext();
    $payer = new Payer();
    $payer->setPaymentMethod("paypal");


    $item1 = new Item();
    $item1->setName($product->title)
    ->setCurrency('USD')
    ->setQuantity(1)
    ->setSku($product->id) // Similar to `item_number` in Classic API
    ->setPrice($product->price);


    $itemList = new ItemList();
    $itemList->setItems(array($item1));


    $details = new Details();
    $details->setShipping(2)
    ->setTax(2)
    ->setSubtotal($product->price);

    $amount = new Amount();
    $amount->setCurrency("USD")
    ->setTotal($product->price+4)
    ->setDetails($details);

    $transaction = new Transaction();
    $transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Payment description")
    ->setInvoiceNumber(uniqid());



    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl(route('single.product.execute',$id))
    ->setCancelUrl(route('shop'));


    $payment = new Payment();
    $payment->setIntent("sale")
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions(array($transaction));


// For Sample Purposes Only.
    $request = clone $payment;


    try {
        $payment->create($apiContext);
    } catch (\Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        print("Created Payment Using PayPal. Please visit the URL to Approve." .$request);
        exit(1);
    }


    $approvalUrl = $payment->getApprovalLink();




    return redirect($approvalUrl);
}
public function executeoder($id){
    $product=Product::find($id);

    $apiContext=PayPal::apiContext();

        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $apiContext);

    // ### Payment Execute
    // PaymentExecution object includes information necessary
    // to execute a PayPal account payment.
    // The payer_id is added to the request query parameters
    // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

    // ### Optional Changes to Amount
    // If you wish to update the amount that you wish to charge the customer,
    // based on the shipping address or any other reason, you could
    // do that by passing the transaction object with just `amount` field in it.
    // Here is the example on how we changed the shipping to $1 more than before.
        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        $details->setShipping(2)
        ->setTax(2)
        ->setSubtotal($product->price);

        $amount->setCurrency('USD');
        $amount->setTotal($product->price+4);
        $amount->setDetails($details);
        $transaction->setAmount($amount);

    // Add the above transaction object inside our Execution object.
        $execution->addTransaction($transaction);

        try {
        // Execute the payment
        // (See bootstrap.php for more on `ApiContext`)
            $result = $payment->execute($execution, $apiContext);


        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            print("Executed Payment 1". $payment->getId()."Result:". $result);

            try {
                $payment = Payment::get($paymentId, $apiContext);
                $paymentInfo=json_decode($payment);
                Mail::to($paymentInfo->payer->payer_info->email)
                ->bcc('sale1@blogtest.com')
                ->send(new SendMailPurchase($paymentInfo));

            } catch (\Exception $ex) {
            return redirect()->route('shop');
            }
        } catch (\Exception $ex) {
        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
         return redirect()->route('shop');
        }

    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
       return redirect()->route('shop');
    }



}
