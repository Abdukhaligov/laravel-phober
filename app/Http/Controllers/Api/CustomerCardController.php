<?php

namespace App\Http\Controllers\Api;

use App\Models\CustomerCard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\CustomerCardCollection;
use App\Http\Resources\CustomerCard as CustomerCardResource;

class CustomerCardController extends Controller{
  private static function notFound(){
    return response()->json(['message' => 'Customer card not found'], JsonResponse::HTTP_NOT_FOUND);
  }

  public function index(){
    return new CustomerCardCollection(CustomerCard::all());
  }

  public function store(Request $request){
    //
  }

  public function show($id){
    $customer = new CustomerCardResource(CustomerCard::find($id));

    return $customer ?? self::notFound();
  }

  public function update(Request $request, $id){
    //
  }

  public function destroy($id){
    //
  }
}
