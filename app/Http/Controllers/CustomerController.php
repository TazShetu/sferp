<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        return view('customer.list');
    }

    public function create()
    {
        return view('customer.create');
    }


    public function edit(Customer $customer)
    {
        return view('customer.edit');
    }

    public function show(Customer $customer)
    {
        return view('customer.profile');
    }


    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function update(Request $request, Customer $customer)
    {
        //
    }


    public function destroy(Customer $customer)
    {
        //
    }
}
