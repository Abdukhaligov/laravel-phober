<?php

namespace App\Http\Controllers\Api;

use App\Models\CustomerCard;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\CustomerCardCollection;
use App\Http\Resources\CustomerCard as CustomerCardResource;
use App\Http\Requests\CustomerCardRequest;
use Auth;
use App\Models\User;
use App\Http\Requests\CustomerCardUpdateRequest;

class CustomerCardController extends ApiController{
  public function index(){
    return self::responseJson(new CustomerCardCollection(CustomerCard::all()));
  }

  public function store(CustomerCardRequest $request){
    /** @var User $user */
    $user = Auth::user();

    /** @var CustomerCard $customerCard */
    $customerCard = CustomerCard::create($request->all());
    $customerCard->author_id = $user->id;
    $customerCard->save();

    return self::responseJson($customerCard);
  }

  public function show($id){
    $customerCard = CustomerCard::find($id);

    return $customerCard?
      self::responseJson(new CustomerCardResource($customerCard)):
      self::notFound();
  }

  public function update(CustomerCardUpdateRequest $request, $id){
    $customerCard = CustomerCard::find($id);

    if(!$customerCard) return self::notFound();

    if($customerCard->update($request->all())){
      return self::responseJson(['message' => 'Customer card successfully updated'], JsonResponse::HTTP_OK);
    }else{
      return self::responseJson(['message' => 'Customer card not updated'], JsonResponse::HTTP_BAD_REQUEST);
    }
  }

  public function destroy($id){
    $customerCard = CustomerCard::find($id);

    if(!$customerCard) return self::notFound();

    if($customerCard->delete()){
      return self::responseJson(['message' => 'Customer card successfully deleted'], JsonResponse::HTTP_OK);
    }else{
      return self::responseJson(['message' => 'Customer card not deleted'], JsonResponse::HTTP_BAD_REQUEST);
    }
  }
}
