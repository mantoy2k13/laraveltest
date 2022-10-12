<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class SearchController extends Controller
{
   public function index()
{
return view('search.search');
}
public function search(Request $request)
{
if($request->ajax())
{
   $output="";
   $products=DB::table('products')->where('Title','LIKE','%'.$request->search."%")->get();
   $search = $request->search;
if($products)
{

foreach ($products as $key => $product) {
   $output.='<tr>'.
   '<td>'.$product->id.'</td>'.
   '<td>'.$product->Title.'</td>'.
   '<td>'.$product->Description.'</td>'.
   '<td>'.$product->price.'</td>'.
   '</tr>';
}
   // return Response($output);
   return response()->json( ['output'=>$output, 'search'=> $search] );
   }
   }
}
}