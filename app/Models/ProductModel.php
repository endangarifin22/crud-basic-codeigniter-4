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
 * 
 */

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model{ 
    protected $table         = 'product';
    protected $allowedFields = ['name', 'thumbnail', 'slug', 'description', 'create_time', 'update_time'];
    
  public function listing($limit = null){
    /*
    *List Product
    *$limit is a number
    */
     $page       = isset($_GET['page'])?(int)$_GET['page'] : 1;
     $first_page = ($page>1) ? ($page * $limit) - $limit : 0;
     $this->select('*');
    if ($limit === null) {
      $this->limit($limit);
	    $this->OFFSET($first_page);
    } 
    $this->ORDERBY('id', 'DESC');
		$query = $this->get()->getResultArray();
  $data = array(
    'query' => $query,
    'page'  => $page,
);

  return $data;
  }
  
  public function get_total_all(){
    /*
    *Count all data by id
    */
    $this->select('id, COUNT(id) as total');
    $this->ORDERBY('id');
    $query = $this->get()->getRowArray();
  return $query['total'];
  }
  
  public function get_detail($idproduct){
    /*
    *Get detail product by id product
    *$idproduct is a number
    */
    $this->select('*');
    $this->where(array('id' => $idproduct));
   $query = $this->get()->getRowArray();
    return $query;
  }
  
  public function get_total_by_slug($slug){
    /*
    *Get total id by slug
    *$slug is a string
    */
    $this->select('id, COUNT(id) as total');
    $this->where(array('slug' => $slug));
    $this->ORDERBY('id');
   $query = $this->get()->getRowArray();
    return $query['total'];
  }
}