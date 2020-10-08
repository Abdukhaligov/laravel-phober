<?php

namespace App\Http\Controllers\Api;

use App\Models\Bar;
use Illuminate\Http\Request;
use App\Http\Resources\BarCollection;
use App\Http\Resources\Bar as BarResource;

class BarController extends ApiController{
  public function index(){
    return self::responseJson(new BarCollection(Bar::all()));
  }

  public function store(Request $request){
    return FALSE;
  }

  public function show($id){
    $instance = Bar::find($id);

    return $instance?
      self::responseJson(new BarResource($instance)):
      self::notFound();
  }

  public function edit(Bar $bar){
    return FALSE;
  }

  public function update(Request $request, Bar $bar){
    return FALSE;
  }

  public function destroy(Bar $bar){
    return FALSE;
  }
}
