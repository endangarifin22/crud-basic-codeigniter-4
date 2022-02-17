<?php
/**
* --------------------------------------------------------------------
* CODEIGNITER 4 - CRUD Basic
* --------------------------------------------------------------------
*
* This content is released under the MIT License (MIT)
*
*Author  : Endang Arifin
*Github  : https://github.com/endangarifin22
*LinkedIn: https://www.linkedin.com/in/endang-arifin/
*Facebook: https://www.facebook.com/endangarifin22
*@license  https://opensource.org/licenses/MIT MIT License
*@link     https://github.com/endangarifin22/crud-basic-codeigniter-4
**/

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\ProductModel;

class Product extends BaseController {
  
  function __construct(){
    //Class ProductModel
    $this->Product = new ProductModel;
    //Session
    $this->Session = session();
    //Save thumbnail img product
    $this->Dir = 'public/upload/product/';
  }
    public function index(){
      /*
      *List Product
      */
      //$limit is total list product in page
      $limit   = 5;
      //Get List Product
      $product = $this->Product->listing($limit);
      
      //Get all total product
      $total_page = $this->Product->get_total_all();
      //Complete the number of pages
      $total_page = ceil($total_page/$limit);

      $data = [
        'title'      => 'List Ptoduct',
        'content'    => 'product/list',
        'product'    => $product['query'],
        'page'       => $product['page'],
        'total_page' => $total_page,
        'dir'        => $this->Dir,
        ];
        return view('layout/wrapper', $data);
    }
    
    public function add(){
      /*
      *Add new Product
      */
      helper('form');
      //Validate
      $validate = $this->validate([
          'name' => 'required',
          'thumbnail' => 'required',
     			'thumbnail'	=> [
                'uploaded[thumbnail]',
                'mime_in[thumbnail,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[thumbnail,4096]',
            ],
          'description' => 'required'
        ]);
        
        if ($validate) {
          $avatar     = $this->request->getFile('thumbnail');
          $newname    = $avatar->getRandomName();
          $avatar->move($this->Dir,$newname);
          $slug       = strtolower(url_title($this->request->getVar('name')));
          //Check the amount of data
          $slug_check = $this->Product->get_total_by_slug($slug);
          //Create random number
          $random     = rand(00,99);
		  	if ($slug_check >1) {
		  	  $slug = $slug.'-'.$random;
		  	}
        //Get new datetime
		  	$time = new Time('now');
		  	$data = [
          'name'        => $this->request->getVar('name'),
          'slug'        => $slug,
          'thumbnail'   => $newname,
          'description' => $this->request->getVar('description'),
          'create_time' => $time,
          'update_time' => $time,
		  	  ];
          //Create new flash data session
		  	  $this->Session->setFlashdata('success', 'New Product Success to add');
		  	  $this->Product->insert($data);
          //direct to page list product
		  	 return redirect()->to(base_url('product'));
        }
      $data = [
        'title'   => 'Add New Product',
        'content' => 'product/add',
        ];
        return view('layout/wrapper', $data);
    }
    
    public function edit($idproduct){
      /*
      *Edit Product
      */
      helper('form');
      
      if ($this->request->getMethod() == 'post') {
        //Validate
        $validate = $this->validate([
          	'thumbnail'	=> [
                'uploaded[thumbnail]',
                'mime_in[thumbnail,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[thumbnail,4096]',
            ],
          ]);
          //Get detail product by id
          $product = $this->Product->get_detail($idproduct);
          //Thumbnail name old
          $newname = $product['thumbnail'];
          
          if ($validate) {
            $avatar  	= $this->request->getFile('thumbnail');
            //New name for thumbnail
		      	$newname 	= $avatar->getRandomName();
		      	$avatar->move($this->Dir,$newname);
          }
          
          $slug       = strtolower(url_title($this->request->getVar('slug')));
          //Check the amount of data
          $slug_check = $this->Product->get_total_by_slug($slug);
          //Create random number
          $random     = rand(00,99);
		  	
		  	if ($slug_check >1) {
          //If $slug_check bigger than 1 create new slug with combination $slug old and $random
		  	  $slug = $slug.'-'.$random;
		  	}
        //Get new datetime
		  	$time = new Time('now');
        $data = [
          'name'        => $this->request->getVar('name'),
          'slug'        => $slug,
          'thumbnail'   => $newname,
          'description' => $this->request->getVar('description'),
          'update_time' => $time,
          ];
          //Update data product by id product
          $this->Product->update($idproduct, $data);
          //Create new flash data session
          $this->Session->setFlashdata('success', 'Product Success to update');
          //Direct to page detail product by id product
          return redirect()->to(base_url('product/detail/'.$idproduct));
        }
        //Get detail product by id product
        $product = $this->Product->get_detail($idproduct);

      $data = [
        'title'   => 'Edit Product',
        'content' => 'product/edit',
        'product' => $product,
        'dir'     => $this->Dir,
        ];
        
        return view('layout/wrapper', $data);
    }
    
    public function detail($idproduct){
      /*
      *Detail Product
      */
      //Get detail product by id product
      $product = $this->Product->get_detail($idproduct);
      $data = [
        'title'   => $product['name'],
        'content' => 'product/detail',
        'product' => $product,
        'dir'     => $this->Dir,
        ];
        
        return view('layout/wrapper', $data);
    }
    
    public function remove(){
      /*
      *Remove a product
      */
      //Validate
      $validate = $this->validate([
        'idproduct' => 'required'
        ]);
        
        if ($validate) {
          //Get data post id product
          $idproduct = $this->request->getVar('idproduct');
          //Delete Product by id product
         $this->Product->delete($idproduct);
         //Create new flash data session
         $this->Session->setFlashdata('success', 'Product Success to delete');
        } else {
        //Create new flash data session
         $this->Session->setFlashdata('danger', 'Not Product  to delete');
        }
        //Direct to product list page
        return redirect()->to(base_url('product'));
    }
}
