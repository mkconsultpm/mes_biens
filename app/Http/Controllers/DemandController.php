<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Demand;
use App\MyVariables;
use App\Repositories\DemandRepository;
use Illuminate\Http\Request;

class DemandController extends Controller
{
    public $myVars;
    /**
     * The DemandRepository repository instance.
     */
    protected $demandRepository;

    /**
     * Create a new controller instance.
     *
     * @param  DemandRepository $demandRepository
     * @param MyVariables $myVariables
     */
    public function __construct(DemandRepository $demandRepository, MyVariables $myVariables)
    {
        $this->middleware('auth');
        $this->demandRepository = $demandRepository;
        $this->myVars = $myVariables;
    }

    public function index()
    {
        $demands = Demand::all();

        return view('demands.index', compact('demands'));
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

        $type = $type;

        return view('demands.create', compact('types', 'regions', 'cities', 'state', 'rooms', 'floors', 'customer', 'type'));
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
        ]);

        $this->demandRepository->storeDemand($request, $id, $rent);

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
