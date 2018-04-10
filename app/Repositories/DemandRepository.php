<?php

namespace App\Repositories;

use App\Customer;
use App\Demand;
use Illuminate\Support\Facades\Session;

class DemandRepository
{
    public function storeDemand($request, $id, $rent)
    {
        try {
            $agent = $request->user();
            $customer = Customer::findOrFail($id);

            $demand = new Demand();

            $demand->for_rent = $rent;
            $demand->type = $request->type;
            $demand->region = $request->region;
            $demand->city = $request->city;

            if ($request->address != null) {
                $demand->address = $request->address;
            } else{
                $demand->address = 'N/A';
            }

            $demand->rooms = $request->rooms;
            $demand->floors = $request->floors;
            $demand->state = $request->state;

            $this->manageExtras($request, $demand);

            $demand->price = $request->price;

            if ($request->description != null) {
                $demand->description = $request->description;
            } else{
                $demand->description = 'N/A';
            }

            if ($request->surface) {
                $demand->surface = $request->surface;
            } else {
                $demand->surface = '0';
            }

            $demand->image = '';

            $demand->user()->associate($agent);
            $demand->customer()->associate($customer);

            $demand->save();
            Session::flash('message', 'Demande ajoutée avec succès');
            Session::flash('alert-class', 'alert-success');

        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            return redirect()->back();
        }
    }

    public function manageExtras($request, $demand)
    {
        /*
         * Extras - boolean
         */

        if ($request->garage) {
            $demand->garage = true;
        } else {
            $demand->garage = false;
        }

        if ($request->terrace) {
            $demand->terrace = true;
        } else {
            $demand->terrace = false;
        }

        if ($request->pool) {
            $demand->pool = true;
        } else {
            $demand->pool = false;
        }

        if ($request->central_heating) {
            $demand->central_heating = true;
        } else {
            $demand->central_heating = false;
        }

        if ($request->drying_room) {
            $demand->drying_room = true;
        } else {
            $demand->drying_room = false;
        }

        if ($request->air_conditioner) {
            $demand->air_conditioner = true;
        } else {
            $demand->air_conditioner = false;
        }

        if ($request->gaz_de_ville) {
            $demand->gaz_de_ville = true;
        } else {
            $demand->gaz_de_ville = false;
        }

        if ($request->ascenceur) {
            $demand->ascenceur = true;
        } else {
            $demand->ascenceur = false;
        }

        if ($request->cuisine_equipee) {
            $demand->cuisine_equipee = true;
        } else {
            $demand->cuisine_equipee = false;
        }

        if ($request->salle_de_bain) {
            $demand->salle_de_bain = true;
        } else {
            $demand->salle_de_bain = false;
        }

        if ($request->salle_deau) {
            $demand->salle_deau = true;
        } else {
            $demand->salle_deau = false;
        }

        /*
         * ./Extras - boolean
         */

    }
}