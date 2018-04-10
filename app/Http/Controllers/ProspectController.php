<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Prospect;
use App\ProspectHistory;
use App\Repositories\ProspectRepository;
use Illuminate\Http\Request;

class ProspectController extends Controller
{
    /**
     * The ProspectRepository repository instance.
     */
    protected $prospectRepository;

    /**
     * Create a new controller instance.
     *
     * @param  ProspectRepository  $prospectRepository
     * @return void
     */
    public function __construct(ProspectRepository $prospectRepository)
    {
        $this->middleware('auth');
        $this->prospectRepository = $prospectRepository;
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
        $prospect = Prospect::findOrFail($id);

        return view('prospects.show', compact('prospect'));
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

    public function next(Request $request, $id)
    {
        $old_prospect = Prospect::findOrFail($id);

        $old_prospect->status = $request->prospect_status;
        $old_prospect->save();

        $prospect_history = ProspectHistory::create([
            'response' => $request->prospect_status,
            'description' => $request->description,
            'prospect_id' => $old_prospect->id,
            'user_id' => $request->user()->id
        ]);

        if ($request->prospect_status == 4) {
            $customer = Customer::create([
                'first_name' => $old_prospect->first_name,
                'last_name' => $old_prospect->last_name,
                'cin' => $old_prospect->cin,
                'phone' => $old_prospect->phone,
                'prospect_id' => $old_prospect->id,
            ]);

            return redirect()->route('customers.choice', ['id' => $customer->id]);
        }

        $prospect = $this->prospectRepository->nextProspect();

        if ($prospect == null) {
            return redirect()->route('prospects.empty');
        }

        return redirect()->route('prospects.show', ['id' => $prospect->id]);
    }

    public function theNext()
    {
        $prospect = $this->prospectRepository->nextProspect();
        if ($prospect == null) {
            return redirect()->route('prospects.empty');
        }
        return redirect()->route('prospects.show', ['id' => $prospect->id]);
    }

    public function empty()
    {
        return view('prospects.empty');
        return 'here';
        dd('here');
    }
}
