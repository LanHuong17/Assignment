<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function details_product($product_slug , Request $request){
         $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
         $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 
         $details_product = DB::table('tbl_product')
         ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.cat
        egory_id')
         ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
         ->where('tbl_product.product_slug',$product_slug)->get();
         foreach($details_product as $key => $value){
         $category_id = $value->category_id;
         //seo 
         $meta_desc = $value->product_desc;
         $meta_keywords = $value->product_slug;
         $meta_title = $value->product_name;
         $url_canonical = $request->url();
         //--seo
         }
         
         $related_product = DB::table('tbl_product')
         ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.cat
        egory_id')
         ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
         ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_slug',[$product_slug])->get();
         return view('pages.sanpham.show_details')->with('category',$cate_product)->with('brand',$brand_product)->with('product_details',$details_product)->with('relate',$related_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
         
    }
}
