<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\Device\Instance\DeviceInstanceResource;
use App\Http\Resources\Device\Instance\DeviceInstanceResourceCollection;
use App\Models\DeviceInstance;
use Illuminate\Http\JsonResponse;

class DeviceInstanceController extends Controller{
  /**
   * @OA\Get(
   *   path="/device-instances",
   *   summary="Get all device instances",
   *   operationId="deviceInstancesIndex",
   *   tags={"Device Instances"},
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
    $deviceInstances = (new DeviceInstanceResourceCollection(DeviceInstance::all()))->resolve();

    return self::responseSuccess($deviceInstances);
  }

  /**
   * @OA\Get(
   *   path="/device-instances/findBy/id/{id}",
   *   summary="Get device instance by id",
   *   operationId="deviceInstancesShow",
   *   tags={"Device Instances"},
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
    $deviceInstance = DeviceInstance::find($id);

    return $deviceInstance
      ? self::responseSuccess(new DeviceInstanceResource($deviceInstance))
      : self::responseNotFound('Device Instance');
  }
}
