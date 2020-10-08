<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\Device as DeviceResource;
use App\Models\Device;
use App\Http\Resources\DeviceCollection;

class DeviceController extends ApiController{
  public function index(){
    return self::responseJson(new DeviceCollection(Device::all()));
  }

  public function store(Request $request){
    return FALSE;
  }

  public function show($id){
    $device = Device::find($id);

    return $device?
      self::responseJson(new DeviceResource($device)):
      self::notFound();
  }

  public function update(Request $request, $id){
    return FALSE;
  }

  public function destroy($id){
    return FALSE;
  }
}
