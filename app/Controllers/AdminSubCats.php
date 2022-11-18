<?php

namespace App\Controllers;
use App\Models\SubCatModel;


class AdminSubCats extends BaseController
{
    public function index($id)
    {
        $catid=intval($id);
        $session = session();
        $sessionData = [
            'current_category_id' => $catid,
        ];

        $session->set($sessionData);
        $subcats=new SubCatModel();
        $data['subcats']=json_decode(json_encode($subcats->whereIn('category', [$catid])->whereIn('is_deleted',[0])->paginate()),true);
        return view('admin/subcategories.php',$data);
    }
    public function editCat($type,$id=null){
        $subcategory=new SubCatModel();
        $data['subs']=json_decode(json_encode($subcategory->whereIn('tbl_subcategories.is_deleted', [0])->paginate()),true);

        if($type=="edit"){
            $data=["meta_title"=>"EditCategory",
            "formtype"=>"edittype"];
            $subcategory=new SubCatModel();
            $subcatID=$id;
            $data['subcats']=json_decode(json_encode($subcategory->whereIn('subcategory_id', [$subcatID])->paginate()),true);
            $data['pager'] = $subcategory->pager;
          
        }else{
            $data=["meta_title"=>"addproduct",
            "formtype"=>"addtype"];
        }
        return view('admin/createnewSubCats.php',$data);

    }
    public function insertsubcat(){
        $session=session();
        $categ_ID= $_SESSION['current_category_id'];
        $subcats= new SubCatModel();
        $banner=$this->request->getFile('cat-ban');
        $catimg=$this->request->getFile('cat-image');
        if(($banner->isValid()&&!$banner->hasMoved())&&($catimg->isValid()&&!$catimg->hasMoved())){
            $newNameb=$banner->getRandomName();
            $banner->move('./upload',$newNameb);
            $newNamec=$catimg->getRandomName();
            $catimg->move('./upload/',$newNamec);
        }
        else{
       
            echo'<script language="Javascript">';
            echo 'alert($this->upload->display_errors())';
            echo'</script>';
        }
        $data=['subcategory_name'=>$this->request->getPost('catnam'),
        'subcategory_image'=>$newNamec,
        'subcategory_banner'=>$newNameb,
        'category'=>$categ_ID
        ];
        $subcats->save($data);
        return redirect()->to('adminSubCats/index/'.$categ_ID)->with('status','category data save');
    }
    public function updatesubcat(){
        $session=session();
        $categ_ID= $_SESSION['current_category_id'];
        $subcats= new SubCatModel();
        $banner=$this->request->getFile('cat-ban');
        $catimg=$this->request->getFile('cat-image');
        $subcategory_id=$this->request->getPost('catid');

        if(($banner->isValid()&&!$banner->hasMoved())&&($catimg->isValid()&&!$catimg->hasMoved())){
            $newNameb=$banner->getRandomName();
            $banner->move('./upload',$newNameb);
            $newNamec=$catimg->getRandomName();
            $catimg->move('./upload/',$newNamec);
        }
        else{
       
            echo'<script language="Javascript">';
            echo 'alert($this->upload->display_errors())';
            echo'</script>';
        }
        $data=['subcategory_name'=>$this->request->getPost('catnam'),
        'subcategory_image'=>$newNamec,
        'subcategory_banner'=>$newNameb,
        'category'=>$categ_ID
        ];
        $subcats->update($subcategory_id,$data);
        return redirect()->to('adminSubCats/index/'.$categ_ID)->with('status','category data save');
    }
}
?>
