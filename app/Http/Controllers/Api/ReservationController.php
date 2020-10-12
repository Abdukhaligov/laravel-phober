<?php

namespace App\Http\Controllers\Api;

use App\Models\Reservation;
use App\Http\Resources\Reservation as ReservationResource;
use App\Http\Resources\ReservationCollection;
use Auth;
use App\Models\User;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\ReservationUpdateRequest;
use Illuminate\Http\JsonResponse;

class ReservationController extends ApiController{
  public function index(){
    return self::responseJson(new ReservationCollection(Reservation::all()));
  }

  public function store(ReservationRequest $request){
    /** @var User $user */
    $user = Auth::user();

    /** @var Reservation $reservation */
    $reservation = Reservation::create($request->all());
    $reservation->author_id = $user->id;
    $reservation->save();

    return self::responseJson($reservation);
  }

  public function show($id){
    $customer = Reservation::find($id);

    return $customer?
      self::responseJson(new ReservationResource($customer)):
      self::notFound();
  }

  public function update(ReservationUpdateRequest $request, $id){
    $reservation = Reservation::find($id);

    if(!$reservation) return self::notFound();

    return $reservation->update($request->all())?
      self::responseJson(['message' => 'Reservation successfully updated'], JsonResponse::HTTP_OK):
      self::responseJson(['message' => 'Reservation not updated'], JsonResponse::HTTP_OK);
  }

  public function destroy($id){
    $reservation = Reservation::find($id);

    if(!$reservation) return self::notFound();
    return $reservation->delete()?
      self::responseJson(['message' => 'Reservation successfully deleted'], JsonResponse::HTTP_OK):
      self::responseJson(['message' => 'Reservation not deleted'], JsonResponse::HTTP_OK);
  }
}
