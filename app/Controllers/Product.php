<?php

namespace App\Controllers;
use App\Models\ProductModel;
use CodeIgniter\I18n\Time;
use App\Models\WalletModel;
use App\Models\Orderdetails;
use App\Models\Order;


class Product extends BaseController
{
    public function index()
    {
        $session=session();
        $prod=new ProductModel();
        $data=["meta_title"=>"Home"];
        $data['prods'] = json_decode(json_encode($prod->whereIn('tbl_products.is_deleted',[0])->paginate()), true);
        $data['pager'] = $prod->pager;

        echo view('productpage.php',$data);
    }
    public function addtocart($id){
        $session=session();
        $prod=new ProductModel();
        $proddets=$prod-> where('product_id', $id)->first();
        $stock=$proddets['available_quantity'];


        if(isset($_SESSION['cart'])){
            $item_array_id=array_column($_SESSION['cart'],"product_ID");
            if(!in_array($id,$item_array_id)){
                $count=count($_SESSION['cart']);
                $item_array=array('product_ID'=>$id,'Quantity'=>1,'stock'=>$stock);
                $_SESSION['cart'][$count]=$item_array;
                echo"<script>alert('Item has been added to cart');
                window.location.href='/product';
                </script>";
            }
            else{
                echo"<script>alert('Item is already in cart');
                window.location.href='/product';
                </script>";
        
            }
        }
        else
        {
            $item_array=array('product_ID'=>$id,'Quantity'=>1,'stock'=>$stock);

            $_SESSION['cart'][0]=$item_array;
            echo"<script>alert('Item has been added to cart');
            window.location.href='/product';
            </script>";
        }
    }
    public function cart()
    {
        $session=session();
        $prod=new ProductModel();
        $data=["meta_title"=>"Home"];
        $data['prods'] = json_decode(json_encode($prod->whereIn('tbl_products.is_deleted',[0])->paginate()), true);
        $data['pager'] = $prod->pager;

        echo view('cart.php',$data);
    }
    public function updateQuantity(){
        session();
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_POST['prodquan'])){
                foreach($_SESSION['cart'] as $key=>$value){
                    if($value['product_ID']==$_POST['prod_ID']){
                        $_SESSION['cart'][$key]["Quantity"]=$_POST["prodquan"];
                        echo"<script>
                        window.location.href='/cart';
                        </script>";
                    }
                }
            }
        }
    }
    public function deletefromcart($id){
        session();
        foreach($_SESSION['cart'] as $key=>$value){
            if($value['product_ID']==$id){
                unset($_SESSION['cart'][$key]);
                echo"<script>alert('Item is has been removed from cart');
                window.location.href='/cart';
                </script>";
            }
        }
                    
    }
    public function checkout(){
 
        $session = session();
        $wallet=new WalletModel();
        $order=new Order();
        $orderdets= new Orderdetails();
        $prods=new ProductModel();
        $walletdets=$wallet-> where('customer_id', $_SESSION['user_id'])->first();
        $walletid=$walletdets['wallet_id'];
        $current_bal=$_SESSION['wallet_balance'];
        $paymenttype=$this->request->getPost('paymenttype');
        if ($paymenttype=='wallet'){
            $paymenttype=0;
        }elseif($paymenttype=='mpesa'){
            $paymenttype=1;
        }else{
            $paymenttype=2;
        }
        $payment=$this->request->getPost('totalpay');



        if($this->request->getVar('Complete_payment') == 'walletpay'){
            $newamount=intval($current_bal)-intval($payment);
            if($newamount>=0){
            $newData = [
                'amount_available'    => $newamount ,
            ];

            $wallet->update($walletid,$newData);
            $walletdets=$wallet-> where('customer_id', $_SESSION['user_id'])->first();
            $_SESSION['wallet_balance']=$walletdets['amount_available'];
            $orderData=[
                'customer_id'=>$_SESSION['user_id'],
                'order_amount'=>$payment,
                'order_status'=>'PAID',
                'created_at'=>new Time('now'),
                'payment_type'=>$paymenttype];
                $order->save($orderData);
                $order_id=$order->getInsertID();
            foreach($_SESSION['cart']as $key=> $value){
                $id=$value['product_ID'];
                $quantity_bought=$value['Quantity'];
                $stock=$value['stock'];
                $newquan=$stock-$quantity_bought;
                $productData=['available_quantity'=>$newquan];
                $prods->update($id,$productData);

                $proddets=$prods-> where('product_id', $id)->first();
                $prodprice=$proddets['unit_price'];
                $prodtotal=$prodprice*$quantity_bought;  
                $orderdetsdata=[
                    'order_id'=>$order_id,
                    'product_id'=> $id,
                    'product_price'=>$prodprice,
                    'order_quantity'=>$quantity_bought,
                    'orderdetails_total'=>$prodtotal,
                    'created_at'=>new Time('now')
                    
                ];
                $orderdets->save($orderdetsdata);

            }
            unset($_SESSION['cart']);


            echo"<script>alert('Transcaction Successful');
                window.location.href='/homepage';
                </script>";
            } 
            else{
                echo"<script>alert('Unsuccessful. Balance low');
                window.location.href='/cart';
                </script>";

            }
            
        }
        else{
           
            $orderData=[
                'customer_id'=>$_SESSION['user_id'],
                'order_amount'=>$payment,
                'order_status'=>'PAID',
                'created_at'=>new Time('now'),
                'payment_type'=>$paymenttype];
                $order->save($orderData);
                $order_id=$order->getInsertID();
            foreach($_SESSION['cart']as $key=> $value){
                $id=$value['product_ID'];
                $quantity_bought=$value['Quantity'];
                $stock=$value['stock'];
                $newquan=$stock-$quantity_bought;
                $productData=['available_quantity'=>$newquan];
                $prods->update($id,$productData);

                $proddets=$prods-> where('product_id', $id)->first();
                $prodprice=$proddets['unit_price'];
                $prodtotal=$prodprice*$quantity_bought;  
                $orderdetsdata=[
                    'order_id'=>$order_id,
                    'product_id'=> $id,
                    'product_price'=>$prodprice,
                    'order_quantity'=>$quantity_bought,
                    'orderdetails_total'=>$prodtotal,
                    'created_at'=>new Time('now')
                    
                ];
                $orderdets->save($orderdetsdata);

            }
            unset($_SESSION['cart']);


            echo"<script>alert('Transcaction Successful');
                window.location.href='/homepage';
                </script>";
            } 
        }
        
}
?>
