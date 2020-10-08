<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerCollection;
use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use Auth;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CustomerUpdateRequest;
use \App\Http\Resources\Customer as CustomerResource;

class CustomerController extends Controller{
  private static function notFound(){
    return response()->json(['message' => 'Customer not found'], JsonResponse::HTTP_NOT_FOUND);
  }

  public function index(){
    return new CustomerCollection(Customer::all());
  }

  public function store(CustomerRequest $request){
    /** @var User $user */
    $user = Auth::user();

    /** @var Customer $customer */
    $customer = Customer::create($request->all());
    $customer->author_id = $user->id;
    $customer->save();

    return $customer;
  }

  public function show($id){
    $customer = Customer::find($id);

    if(!$customer) return self::notFound();

    return new CustomerResource(Customer::find($id));
  }

  public function update(CustomerUpdateRequest $request, $id){
    $customer = Customer::find($id);

    if(!$customer) return self::notFound();

    if($customer->update($request->all())){
      return response()->json(['message' => 'Customer successfully updated']);
    }else{
      return response()->json(['message' => 'Customer not updated'], JsonResponse::HTTP_BAD_REQUEST);
    }
  }

  public function destroy($id){
    $customer = Customer::find($id);

    if(!$customer) return self::notFound();

    if($customer->delete()){
      return response()->json(['message' => 'Customer successfully deleted']);
    }else{
      return response()->json(['message' => 'Customer not deleted'], JsonResponse::HTTP_BAD_REQUEST);
    }
  }
}
