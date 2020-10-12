<?php

namespace App\Http\Controllers\Api;

use App\Models\Bar;
use App\Http\Resources\BarCollection;
use App\Http\Resources\Bar as BarResource;

class BarController extends ApiController{
  public function index(){
    return self::responseJson(new BarCollection(Bar::all()));
  }

  public function store(){
    return FALSE;
  }

  public function show($id){
    $instance = Bar::find($id);

    return $instance?
      self::responseJson(new BarResource($instance)):
      self::notFound();
  }

  public function edit(){
    return FALSE;
  }

  public function update(){
    return FALSE;
  }

  public function destroy(){
    return FALSE;
  }
}
