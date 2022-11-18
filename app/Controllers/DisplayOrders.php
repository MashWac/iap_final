<?php

namespace App\Controllers;
use App\Models\Order;
use CodeIgniter\I18n\Time;
use CodeIgniter\RESTful\ResourceController;

class DisplayOrders extends ResourceController

{
    public function index()
    {
        $session=session();
        $order=new Order();
        $data=["meta_title"=>"Home"];
        $data['orders'] = json_decode(json_encode($order->whereIn('tbl_order.is_deleted',[0])->join('tbl_orderdetails', 'tbl_orderdetails.order_id = tbl_order.order_id')->join('tbl_paymenttypes','tbl_paymenttypes.paymenttype_id=tbl_order.payment_type')->paginate()), true);
        $data['pager'] = $order->pager;

        return view('admin/displayorders.php',$data);
    }
    public function orders()
    {
        $session=session();
        $order=new Order();
        $data['orders'] = json_decode(json_encode($order->whereIn('tbl_order.is_deleted',[0])->join('tbl_orderdetails', 'tbl_orderdetails.order_id = tbl_order.order_id')->join('tbl_paymenttypes','tbl_paymenttypes.paymenttype_id=tbl_order.payment_type')->paginate()), true);
        $data['pager'] = $order->pager;
        return $this->response
        ->setStatusCode(200)
        ->setJSON($data['']);

    }
}
?>
