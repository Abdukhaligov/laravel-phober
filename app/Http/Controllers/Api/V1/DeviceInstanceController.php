<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\DeviceInstanceResourceCollection;
use App\Models\DeviceInstance;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DeviceInstanceController extends Controller{
  /**
   * @OA\Get(
   *   path="/device-instances",
   *   summary="Get all device instances",
   *   operationId="deviceInstanceIndex",
   *   tags={"Device Instances"},
   *   security={},
   *   @OA\Response(
   *     response="200",
   *     description="ok",
   *   )
   * )
   *
   * @return array
   */
  public function index(){
    return (new DeviceInstanceResourceCollection(DeviceInstance::all()))->resolve();
  }
}
