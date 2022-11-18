<?php

namespace App\Controllers;
use MongoDB\BSON\Javascript;
use App\Models\CatModel;


class Admincats extends BaseController
{
    public function index()
    {
        $session=session();
        $cats=new CatModel();
        $data['cats']=$cats->findAll();
        return view('admin/categories.php',$data);
    }
    public function editCat($type,$id=null){
        $session=session();
        if($type=="edit"){
            $data=["meta_title"=>"EditCategory",
            "formtype"=>"edittype"];
            $category=new CatModel();
            $catID=$id;
            $data['cats']=json_decode(json_encode($category->whereIn('category_id', [$catID])->paginate()),true);
            $data['pager'] = $category->pager;
          
        }else{
            $data=["meta_title"=>"addproduct",
            "formtype"=>"addtype"];
        }
        return view('admin/createnewCats.php',$data);

    }
    public function updatecat(){
        $session=session();
        $cats= new CatModel();
        $banner=$this->request->getFile('cat-ban');
        $id=$this->request->getVar('cat-id');
    
        if(($banner->isValid()&&!$banner->hasMoved())){
            echo "i am here";
            $newNameb=$banner->getRandomName();
            $banner->move('./upload',$newNameb);
            $data=['category_name'=>$this->request->getPost('catnam'),
            'categoryImage'=>$newNameb,
            'is_deleted'=>0
            ];
            $cats->update($id,$data);
            return redirect()->to('adminCats')->with('status','category data saved');
        }
        else{
       
            echo'<script language="Javascript">';
            echo 'alert($this->upload->display_errors())';
            echo'</script>';
            return redirect()->to('adminCats')->with('status','category data not saved');
        }
   
      
    }
    public function insertcat(){
        $session=session();
        $cats= new CatModel();
        $banner=$this->request->getFile('cat-ban');
            
        if(($banner->isValid()&&!$banner->hasMoved())){
            $newNameb=$banner->getRandomName();
            $banner->move('./upload',$newNameb);
            $data=['category_name'=>$this->request->getPost('catnam'),
            'categoryImage'=>$newNameb,
            ];
            $cats->save($data);
            return redirect()->to('adminCats')->with('status','category data saved');
        }
        else{
       
            echo'<script language="Javascript">';
            echo 'alert($this->upload->display_errors())';
            echo'</script>';
            return redirect()->to('adminCats')->with('status','category data not saved');
        }
   
      
    }
}
?>
