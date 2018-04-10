<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * The CustomerRepository repository instance.
     */
    protected $customerRepository;

    /**
     * Create a new controller instance.
     *
     * @param  CustomerRepository  $customerRepository
     * @return void
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->middleware('auth');
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }

    public function choice($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.choice', compact('customer'));
    }
}
