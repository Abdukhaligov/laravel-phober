<?php

namespace App\Http\Controllers\Api;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Resources\Reservation as ReservationResource;
use App\Http\Resources\ReservationCollection;
use Auth;
use App\Models\User;
use App\Http\Requests\ReservationRequest;

class ReservationController extends ApiController{
  public function index(){
    return self::responseJson(new ReservationCollection(Reservation::all()));

  }

  public function store(ReservationRequest $request){
    /** @var User $user */
    $user = Auth::user();

    //if($request->date) $request->date = $request->da

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

  public function update(Request $request, $id){
    //
  }
  public function destroy(Reservation $reservation){
    //
  }
}
