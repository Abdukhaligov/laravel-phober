<?php

namespace App\Http\Controllers\Api;

use App\Models\CustomerCard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\CustomerCardCollection;
use App\Http\Resources\CustomerCard as CustomerCardResource;
use App\Http\Requests\CustomerCardRequest;
use Auth;
use App\Models\User;
use App\Http\Requests\CustomerCardUpdateRequest;

class CustomerCardController extends Controller{
  private static function notFound(){
    return response()->json(['message' => 'Customer card not found'], JsonResponse::HTTP_NOT_FOUND);
  }

  public function index(){
    return new CustomerCardCollection(CustomerCard::all());
  }

  public function store(CustomerCardRequest $request){
    /** @var User $user */
    $user = Auth::user();

    /** @var CustomerCard $customerCard */
    $customerCard = CustomerCard::create($request->all());
    $customerCard->author_id = $user->id;
    $customerCard->save();

    return $customerCard;
  }

  public function show($id){
    $customerCard = CustomerCard::find($id);

    if(!$customerCard) return self::notFound();

    return new CustomerCardResource(CustomerCard::find($id));
  }

  public function update(CustomerCardUpdateRequest $request, $id){
    $customerCard = CustomerCard::find($id);

    if(!$customerCard) return self::notFound();

    if($customerCard->update($request->all())){
      return response()->json(['message' => 'Customer card successfully updated']);
    }else{
      return response()->json(['message' => 'Customer card not updated'], JsonResponse::HTTP_BAD_REQUEST);
    }
  }

  public function destroy($id){
    $customerCard = CustomerCard::find($id);

    if(!$customerCard) return self::notFound();

    if($customerCard->delete()){
      return response()->json(['message' => 'Customer card successfully deleted']);
    }else{
      return response()->json(['message' => 'Customer card not deleted'], JsonResponse::HTTP_BAD_REQUEST);
    }
  }
}
