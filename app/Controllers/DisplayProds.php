<?php

namespace App\Controllers;
use App\Models\ProductModel;
use CodeIgniter\I18n\Time;
use App\Models\SubCatModel;


class DisplayProds extends BaseController
{
    public function index()
    {
        $session=session();
        $prod=new ProductModel();
        $data=["meta_title"=>"Home"];
        $data['prods'] = json_decode(json_encode($prod->whereIn('tbl_subcategories.is_deleted',[0])->join('tbl_subcategories', 'tbl_subcategories.subcategory_id = tbl_products.subcategory_id')->join('tbl_categories', 'tbl_categories.category_id = tbl_subcategories.category')->paginate()), true);
        $data['pager'] = $prod->pager;

        echo view('admin/displayprod.php',$data);
    }
    public function editPage($type,$id=null){
        $session=session();
        $subs=new SubCatModel();
        if($type=="edit"){
            $data=["meta_title"=>"Editproduct",
            "formtype"=>"edittype"];
            $product=new ProductModel();
            $prodID=$id;
            $data['product']=json_decode(json_encode($product->whereIn('product_id', [$prodID])->paginate()),true);
            $data['pager'] = $product->pager;
          
        }else{
            $data=["meta_title"=>"addproduct",
            "formtype"=>"addtype"];
        }
        $data['subs'] = json_decode(json_encode($subs->whereIn('tbl_subcategories.is_deleted',[0])->join('tbl_categories', 'tbl_categories.category_id = tbl_subcategories.subcategory_id')->paginate()), true);

        return view('admin/editproduct.php',$data);

    }
    public function addprods(){
        $session=session();
        $userid=$_SESSION['user_id'];
        $prods= new ProductModel();
        $prodImage=$this->request->getFile('prod-image');
        if(($prodImage->isValid()&&!$prodImage->hasMoved())){
            $newNameb=$prodImage->getRandomName();
            $prodImage->move('./upload',$newNameb);
            $data=['product_name'=>$this->request->getPost('proditem'),
            'product_description'=>$this->request->getPost('description'),
            'product_image'=>$newNameb,
            'unit_price'=>$this->request->getPost('productprice'),
            'available_quantity'=>$this->request->getPost('prodquantity'),
            'subcategory_id'=>$this->request->getPost('subcategory'),
            'created_at'=>new Time('now'),
            'added_by'=>$userid,
            'is_deleted'=>0
            ];
             $prods->save($data);
             return redirect()->to('displayProds')->with('status','product data saved');

        }
        else{
            echo"i am here";
            echo'<script language="Javascript">';
            echo 'alert($this->upload->display_errors())';
            echo'</script>';
            return redirect()->to('diplayProds')->with('status','product data not saved');
        }
    }
    public function  editprods(){
        $session=session();
        $id = $this->request->getVar('prodID');
        $prod=new ProductModel();
        $userid=$_SESSION['user_id'];
        $prodImage=$this->request->getFile('prod-image');
        if(($prodImage->isValid()&&!$prodImage->hasMoved())){
            $newNameb=$prodImage->getRandomName();
            $prodImage->move('./upload',$newNameb);
            $data=['product_name'=>$this->request->getPost('proditem'),
            'product_description'=>$this->request->getPost('description'),
            'product_image'=>$newNameb,
            'unit_price'=>$this->request->getPost('productprice'),
            'available_quantity'=>$this->request->getPost('prodquantity'),
            'subcategory_id'=>$this->request->getPost('subcategory'),
            'updated_at'=>new Time('now'),
            'added_by'=>$userid,
            'is_deleted'=>0
            ];
        $prod->update($id,$data);
        return redirect()->to('displayProds')->with('status','product data saved');
        }
        else{
            echo"i am here";
            echo'<script language="Javascript">';
            echo 'alert($this->upload->display_errors())';
            echo'</script>';
            return redirect()->to('diplayProds')->with('status','product data not saved');
        }
    }
    public function filterproducts($prods=null,$id=null,$order=null,$category=null,$subcategory=null, $price=null, $productname=null){
        $prods=new ProductModel();
        if($this->request->getPost('select-id')=="Descending"){
            $id='DESC';
        }
        if($this->request->getPost('select-price')=="Descending"){
            $price='DESC';
        }
        if($this->request->getPost('select-quantity')=="Descending"){
            $order='DESC';
        }
        if($this->request->getPost('select-id')=="Ascending"){
            $id='ASC';
        }
        if($this->request->getPost('select-price')=="Ascending"){
            $price='ASC';
        }
        if($this->request->getPost('select-quantity')=="Ascending"){
            $order='ASC';
        }

        

        $filters=[
        $id,
        $order,
        $category=$this->request->getPost('select-cato'),
        $subcategory=$this->request->getPost('select-subcato'),
        $price,
        $productname=$this->request->getPost('select-prod')];


        $count=0;
        $activefilters=[];
        foreach($filters as $item){
            if($item!=null && $item!="None"){
                $count++;
                array_push($activefilters,$item);
            }
        }
        if (in_array($productname, $activefilters)){
        $data['prods'] = json_decode(json_encode($prods->whereIn('tbl_products.is_deleted',[0])
        ->where('tbl_products.product_name', $productname)
        ->paginate()), true);
        $data['pager'] = $prods->pager;

        }elseif(in_array($category, $activefilters)){
            $data['prods'] = json_decode(json_encode($prods->whereIn('tbl_products.is_deleted',[0])->
            join('tbl_subcategories', 'tbl_subcategories.subcategory_id = tbl_products.subcategory_id')->
            join('tbl_categories', 'tbl_categories.category_id = tbl_subcategories.category')
            ->where('tbl_categories.category_id', $category)
            ->paginate()), true);
            $data['pager'] = $prods->pager;

        }
        elseif(in_array($subcategory,$activefilters)){
            $data['prods'] = json_decode(json_encode($prods->whereIn('tbl_products.is_deleted',[0])->
            join('tbl_subcategories', 'tbl_subcategories.subcategory_id = tbl_products.subcategory_id')->
            join('tbl_categories', 'tbl_categories.category_id = tbl_subcategories.category')
            ->where('tbl_subcategories.subcategory_id', $subcategory)
            ->paginate()), true);
            $data['pager'] = $prods->pager;

        }
        elseif(in_array($order,$activefilters)){
            $data['prods'] = json_decode(json_encode($prods->whereIn('tbl_products.is_deleted',[0])->
            join('tbl_subcategories', 'tbl_subcategories.subcategory_id = tbl_products.subcategory_id')->
            join('tbl_categories', 'tbl_categories.category_id = tbl_subcategories.category')
            ->orderby('tbl_products.available_quantity',$order)
            ->paginate()), true);
            $data['pager'] = $prods->pager;

        }
        elseif(in_array($price,$activefilters)){
            $data['prods'] = json_decode(json_encode($prods->whereIn('tbl_products.is_deleted',[0])->
            join('tbl_subcategories', 'tbl_subcategories.subcategory_id = tbl_products.subcategory_id')->
            join('tbl_categories', 'tbl_categories.category_id = tbl_subcategories.category')
            ->orderby('tbl_products.unit_price',$price)
            ->paginate()), true);
            $data['pager'] = $prods->pager;

        }
        elseif(in_array($id,$activefilters)){
            $data['prods'] = json_decode(json_encode($prods->whereIn('tbl_products.is_deleted',[0])->
            join('tbl_subcategories', 'tbl_subcategories.subcategory_id = tbl_products.subcategory_id')->
            join('tbl_categories', 'tbl_categories.category_id = tbl_subcategories.category')
            ->orderby('tbl_products.product_id',$id)
            ->paginate()), true);
            $data['pager'] = $prods->pager;

        }
        else{
            $data['prods'] = json_decode(json_encode($prods->whereIn('tbl_subcategories.is_deleted',[0])->join('tbl_subcategories', 'tbl_subcategories.subcategory_id = tbl_products.subcategory_id')->join('tbl_categories', 'tbl_categories.category_id = tbl_subcategories.category')->paginate()), true);
            $data['pager'] = $prods->pager;   
        }
        return $this->response
        ->setStatusCode(200)
        ->setJSON($data['prods'])
        ;


    }  
}
?>
