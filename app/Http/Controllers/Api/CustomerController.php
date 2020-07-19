<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerCollection;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller {
  public function index() {
    return new CustomerCollection(Customer::all());
  }

  public function store(Request $request) {
    //
  }

  public function show($id) {
    //
  }

  public function update(Request $request, $id) {
    //
  }

  public function destroy($id) {
    //
  }
}
