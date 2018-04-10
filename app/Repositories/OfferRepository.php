<?php

namespace App\Repositories;

use App\Customer;
use App\Offer;
use Illuminate\Support\Facades\Session;

class OfferRepository
{
    public function storeOffer($request, $id, $rent)
    {
        try {
            $agent = $request->user();
            $customer = Customer::findOrFail($id);

            $offer = new Offer();

            $offer->for_rent = $rent;
            $offer->type = $request->type;
            $offer->region = $request->region;
            $offer->city = $request->city;

            if ($request->address != null) {
                $offer->address = $request->address;
            } else{
                $offer->address = 'N/A';
            }

            $offer->rooms = $request->rooms;
            $offer->floors = $request->floors;
            $offer->state = $request->state;

            $this->manageExtras($request, $offer);

            $offer->price = $request->price;

            if ($request->description != null) {
                $offer->description = $request->description;
            } else {
                $offer->description = "N/A";
            }

            if ($request->surface) {
                $offer->surface = $request->surface;
            } else {
                $offer->surface = '0';
            }

            $offer->image = 'uploads/user-default.png';

            $offer->user()->associate($agent);
            $offer->customer()->associate($customer);

            $offer->save();

            Session::flash('message', 'Offre ajoutée avec succès');
            Session::flash('alert-class', 'alert-success');


        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            return redirect()->back();
        }
    }

    public function manageExtras($request, $offer)
    {
        /*
         * Extras - boolean
         */

        if ($request->garage) {
            $offer->garage = true;
        } else {
            $offer->garage = false;
        }

        if ($request->terrace) {
            $offer->terrace = true;
        } else {
            $offer->terrace = false;
        }

        if ($request->pool) {
            $offer->pool = true;
        } else {
            $offer->pool = false;
        }

        if ($request->central_heating) {
            $offer->central_heating = true;
        } else {
            $offer->central_heating = false;
        }

        if ($request->drying_room) {
            $offer->drying_room = true;
        } else {
            $offer->drying_room = false;
        }

        if ($request->air_conditioner) {
            $offer->air_conditioner = true;
        } else {
            $offer->air_conditioner = false;
        }

        if ($request->gaz_de_ville) {
            $offer->gaz_de_ville = true;
        } else {
            $offer->gaz_de_ville = false;
        }

        if ($request->ascenceur) {
            $offer->ascenceur = true;
        } else {
            $offer->ascenceur = false;
        }

        if ($request->cuisine_equipee) {
            $offer->cuisine_equipee = true;
        } else {
            $offer->cuisine_equipee = false;
        }

        if ($request->salle_de_bain) {
            $offer->salle_de_bain = true;
        } else {
            $offer->salle_de_bain = false;
        }

        if ($request->salle_deau) {
            $offer->salle_deau = true;
        } else {
            $offer->salle_deau = false;
        }

        /*
         * ./Extras - boolean
         */

    }
}