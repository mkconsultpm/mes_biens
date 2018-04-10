<?php

namespace App\Http\Controllers;

use App\Customer;
use App\MyVariables;
use App\Repositories\OfferRepository;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public $myVars;
    /**
     * The OfferRepository repository instance.
     */
    protected $offerRepository;

    /**
     * Create a new controller instance.
     *
     * @param  OfferRepository $offerRepository
     * @param MyVariables $myVariables
     */
    public function __construct(OfferRepository $offerRepository, MyVariables $myVariables)
    {
        $this->middleware('auth');
        $this->offerRepository = $offerRepository;
        $this->myVars = $myVariables;
    }

    public function index()
    {

    }

    public function create($id, $type)
    {
        $types = $this->myVars->types;
        $regions = $this->myVars->regions;
        $cities = $this->myVars->cities;
        $state = $this->myVars->state;
        $rooms = $this->myVars->rooms;
        $floors = $this->myVars->floors;

        $customer = Customer::findOrFail($id);

        return view('offers.create', compact('types', 'regions', 'cities', 'state', 'type', 'rooms', 'floors', 'customer'));
    }

    public function store(Request $request, $id)
    {
        if ($request->for_rent == "Rent") {
            $rent = true;
            $state_rule = 'required|string|max:255';
        } else {
            $rent = false;
            $state_rule = 'string|max:255';
        }

        $this->validate($request, [
            'type' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            //'address' => 'required|string|max:255',
            'rooms' => 'required|string|max:255',
            'floors' => 'required|string|max:255',
            'state' => $state_rule,
            //'surface' => 'required|string|max:255',
            //'description' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            //'image' => 'required',
        ]);

        $this->offerRepository->storeOffer($request, $id, $rent);

        return redirect()->route('prospects.theNext');

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
}
