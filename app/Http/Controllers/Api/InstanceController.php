<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InstanceCollection;
use App\Models\Instance;
use App\Http\Resources\Instance as InstanceResource;
use Illuminate\Http\Request;

class InstanceController extends Controller {
  public function index() {
    return new InstanceCollection(Instance::all());
  }

  public function store(Request $request) {
    //
  }

  public function show($id) {
    return new InstanceResource(Instance::find($id));
  }

  public function update(Request $request, $id) {
    //
  }

  public function destroy($id) {
    //
  }
}
