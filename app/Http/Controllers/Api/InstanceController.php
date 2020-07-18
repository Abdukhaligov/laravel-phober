<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Instance;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InstanceController extends Controller {
  public function index() {
    //
  }

  public function store(Request $request) {
    //
  }

  public function show($id) {
    $instance = Instance::find($id);

    return response()->json($instance, JsonResponse::HTTP_ACCEPTED);
  }

  public function update(Request $request, $id) {
    //
  }

  public function destroy($id) {
    //
  }
}
