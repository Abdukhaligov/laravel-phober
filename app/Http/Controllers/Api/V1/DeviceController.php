<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\Device\DeviceMinimalResourceCollection;
use App\Http\Resources\Device\DeviceResource;
use App\Models\Device;
use Illuminate\Http\JsonResponse;

class DeviceController extends Controller{
  /**
   * @OA\Get(
   *   path="/devices",
   *   summary="Get all devices",
   *   operationId="devicesIndex",
   *   tags={"Devices"},
   *   security={},
   *   @OA\Response(
   *     response="200",
   *     description="ok",
   *   )
   * )
   *
   * @return JsonResponse
   */
  public function index(){
    $devices = (new DeviceMinimalResourceCollection(Device::all()))->resolve();

    return self::responseSuccess($devices);
  }

  /**
   * @OA\Get(
   *   path="/devices/findBy/id/{id}",
   *   summary="Get device by id",
   *   operationId="devicesShow",
   *   tags={"Devices"},
   *   security={},
   *   @OA\Parameter(
   *     name="id",
   *     in="path",
   *     required=true,
   *     @OA\Schema(
   *       type="integer"
   *     )
   *   ),
   *   @OA\Response(
   *     response="200",
   *     description="ok",
   *   )
   * )
   *
   * @param $id
   * @return JsonResponse
   */
  public function show($id){
    $deviceInstance = Device::find($id);

    return $deviceInstance
      ? self::responseSuccess(new DeviceResource($deviceInstance))
      : self::responseNotFound('Device');
  }
}
