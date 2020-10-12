<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\InstanceCollection;
use App\Models\Instance;
use App\Http\Resources\Instance as InstanceResource;
use Illuminate\Http\Request;

class InstanceController extends ApiController{
  public function index(){
    return self::responseJson(new InstanceCollection(Instance::all()));
  }

  public function store(Request $request){
    return FALSE;
  }

  public function show($id){
    $instance = Instance::find($id);

    return $instance?
      self::responseJson(new InstanceResource($instance)):
      self::notFound();
  }

  public function update(){
    return FALSE;
  }

  public function destroy(){
    return FALSE;
  }
}
