<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Throwable;

class OrderController extends Controller
{
    public function  addToCart($productId)
    {


        $product = Food::find($productId);
        $myCart = session()->get('cart');

        if (empty($myCart)) {
            //1. add to cart
            $newCart[$productId] = [
                'id' => $productId,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
                'subtotal' => $product->price * 1
            ];

            // dd($newCart);

            session()->put('cart', $newCart);

            notify()->success('Product added to cart successfully.');
            return redirect()->back();
        } else {
            //check product exist or not
            if (array_key_exists($productId, $myCart)) {
                //update quantity


                $myCart[$productId]['quantity'] = $myCart[$productId]['quantity'] + 1;
                $myCart[$productId]['subtotal'] = $myCart[$productId]['quantity'] * $myCart[$productId]['price'];

                session()->put('cart', $myCart);

                notify()->success('Food quantity updated.');
                return redirect()->back();
            } else {

                //add to cart new food
                $myCart[$productId] = [
                    'id' => $productId,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image,
                    'quantity' => 1,
                    'subtotal' => $product->price * 1
                ];

                session()->put('cart', $myCart);

                notify()->success('New Food added to cart successfully.');
                return redirect()->back();
            }
        }
    }

    // CartController.php
    public function updateCart(Request $request)
    {
        $cart = session()->get('cart');
        $cartId = $request->input('cartId');
        $newQuantity = $request->input('quantity');

        if (isset($cart[$cartId])) {
            $cart[$cartId]['quantity'] = $newQuantity;
            $cart[$cartId]['subtotal'] = $cart[$cartId]['price'] * $newQuantity;
            session()->put('cart', $cart);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }


    public function checkout()
    {
        return view('frontend.pages.checkout');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return view('frontend.pages.cart', ['cartIsEmpty' => true]);
        }
        return view('frontend.pages.cart', ['cartIsEmpty' => false, 'cart' => $cart]);
    }

    public function clearCart()
    {

        session()->forget('cart');
        notify()->success('Cart cleared.');
        return redirect()->back();
    }

    public function placeOrder(Request $request)
    {
        // dd($request->all());
        //validation

        try {

            //    dd($request->paymentMethod);
            $cartData = session()->get('cart');
            //insert data into order table
            $order = Order::create([
                //'customer_id'=>1,
                'transaction_id' => date('YmdHis'),
                'customer_id' => auth()->user()->id,
                'total_price' => array_sum(array_column($cartData, 'subtotal')),
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'payment_method' => $request->paymentMethod,
            ]);

            //insert cart data into order details table


            foreach ($cartData as $data) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'food_id' => $data['id'],
                    'unit_price' => $data['price'],
                    'quantity' => $data['quantity'],
                    'subtotal' => $data['subtotal'],
                ]);

                $food = Food::find($data['id']);
                $food->decrement('quantity', $data['quantity']);
            }

            session()->forget('cart');

            if ($request->paymentMethod == 'ssl') {
                //pay with ssl        

                $this->payNow($order);
            }
            notify()->success('Order placed successfully.');
            return redirect()->route('homepage');
        } catch (Throwable $exception) {
            dd($exception->getMessage());
        }
    }


    public function payNow($order)
    {
        // dd($order);
        $post_data = array();
        $post_data['total_amount'] = $order->total_price; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $order->id; // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $order->name;
        $post_data['cus_email'] = $order->email;
        $post_data['cus_add1'] = $order->address;
        // dd($post_data);
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '019381271278';
        $post_data['cus_fax'] = "";

        // $a['key']=['el1','el2'];

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        // $update_product = DB::table('orders')
        //     ->where('transaction_id', $post_data['tran_id'])
        //     ->updateOrInsert([
        //         'name' => $post_data['cus_name'],
        //         'email' => $post_data['cus_email'],
        //         'phone' => $post_data['cus_phone'],
        //         'amount' => $post_data['total_amount'],
        //         'status' => 'Pending',
        //         'address' => $post_data['cus_add1'],
        //         'transaction_id' => $post_data['tran_id'],
        //         'currency' => $post_data['currency']
        //     ]);



        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }

    public function deleteorder($orderId)
    {
        $cartData = session()->get('cart', []);

        // Find the index of the item with the provided order ID in the cart array
        $index = array_search($orderId, array_column($cartData, 'id'));

        // If the item is found in the cart
        if ($index !== false) {
            // Remove the item from the cart array
            unset($cartData[$index]);
            // Update the cart data in the session
            session(['cart' => array_values($cartData)]); // Re-index the array after removing the item

            notify()->success('Item deleted from cart successfully.');
        } else {
            // Optionally, handle the case where the item with the provided order ID is not found in the cart
            notify()->error('Item not found in cart.');
        }

        return redirect()->back();
    }
}
