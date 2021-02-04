<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller as BaseController;

/**
 * @OA\Info(
 *    title="E-catalog API V1",
 *    version="1.0.0",
 *    @OA\Contact(
 *      name="Hikmat",
 *      url="https://www.linkedin.com/in/abdukhaligov/",
 *      email="hikmat.pou@gmail.com"
 *    ),
 * )
 * @OA\Server(
 *      url=V1_HOST,
 *      description="API Server"
 * ),
 * @OA\Server(
 *      url="http://localhost:8000/api/v1",
 *      description="localhost"
 * )
 */
class Controller extends BaseController{
  //
}
