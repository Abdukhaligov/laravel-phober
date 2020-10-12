<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CustomerCollection;
use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use Auth;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Resources\Customer as CustomerResource;

class CustomerController extends ApiController{
  public function index(){
    return self::responseJson(new CustomerCollection(Customer::all()));
  }

  public function store(CustomerRequest $request){
    /** @var User $user */
    $user = Auth::user();

    /** @var Customer $customer */
    $customer = Customer::create($request->all());
    $customer->author_id = $user->id;
    $customer->save();

    return self::responseJson($customer);
  }

  public function show($id){
    $customer = Customer::find($id);

    return $customer?
      self::responseJson(new CustomerResource($customer)):
      self::notFound();
  }

  public function update(CustomerUpdateRequest $request, $id){
    $customer = Customer::find($id);

    if(!$customer) return self::notFound();

    return $customer->update($request->all())?
      self::responseJson(['message' => 'Customer successfully updated'], JsonResponse::HTTP_OK):
      self::responseJson(['message' => 'Customer not updated'], JsonResponse::HTTP_OK);
  }

  public function destroy($id){
    $customer = Customer::find($id);

    if(!$customer) return self::notFound();

    return $customer->delete()?
      self::responseJson(['message' => 'Customer successfully deleted'], JsonResponse::HTTP_OK):
      self::responseJson(['message' => 'Customer not deleted'], JsonResponse::HTTP_OK);
  }
}
