<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Product;
use Auth;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
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
    $apiContext=PayPal::apiContext();
    $payer = new Payer();
    $payer->setPaymentMethod("paypal");


    $item1 = new Item();
    $item1->setName('Ground Coffee 40 oz')
    ->setCurrency('USD')
    ->setQuantity(1)
    ->setSku("123123") // Similar to `item_number` in Classic API
    ->setPrice(7.5);
    $item2 = new Item();
    $item2->setName('Granola bars')
    ->setCurrency('USD')
    ->setQuantity(5)
    ->setSku("321321") // Similar to `item_number` in Classic API
    ->setPrice(2);

    $itemList = new ItemList();
    $itemList->setItems(array($item1, $item2));


    $details = new Details();
    $details->setShipping(1.2)
    ->setTax(1.3)
    ->setSubtotal(17.50);

    $amount = new Amount();
    $amount->setCurrency("USD")
    ->setTotal(20)
    ->setDetails($details);

    $transaction = new Transaction();
    $transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Payment description")
    ->setInvoiceNumber(uniqid());


    $baseUrl ="http://127.0.0.1:8000";
    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl("$baseUrl/ExecutePayment.php?success=true")
    ->setCancelUrl("$baseUrl/ExecutePayment.php?success=false");


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


    print("Created Payment Using PayPal. Please visit the URL to Approve."."<a href='".$approvalUrl."' >".$approvalUrl."</a>");

    return $payment;
}

}
