@extends('layouts.main')

@section('content')

    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">
            <div class="row bg-white has-shadow">

                <div class="col-md-12">
                    <h1><span class="icon bg-violet"><i class="icon-user"></i></span> Prospect</h1>
                </div>

                <div class="col-md-12">

                    <br>
                    <h3><i class="fa fa-user"></i> {{ $prospect->first_name }} {{ $prospect->first_name }}</h3>

                    <h3><i class="fa fa-info"></i> {{ $prospect->information }}</h3>

                    <h3><i class="fa fa-phone"></i> <a href="#">{{ $prospect->phone }}</a></h3>

                </div>

            </div>
        </div>
    </section>

    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">
            <div class="row bg-white has-shadow">

                <div class="col-md-12">
                    <h1><span class="icon bg-violet"><i class="fa fa-check"></i></span> Qualification</h1>
                </div>

                <div class="col-md-12">

                    <div class="row">

                        <div class="col-md-12">
                            <form method="post" action="{{ route('prospects.next', ['id' => $prospect->id]) }}">
                                {{ csrf_field() }}

                                <textarea class="form-control" name="description" placeholder="Remarque..."></textarea>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="i-checks">
                                            <input id="radioCustom1" type="radio" checked value="2" name="prospect_status" class="radio-template">
                                            <label for="radioCustom1" class="text-warning">Injoignable</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="i-checks">
                                            <input id="radioCustom2" type="radio" value="3" name="prospect_status" class="radio-template">
                                            <label for="radioCustom2" class="text-danger">Pas de biens</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="i-checks">
                                            <input id="radioCustom3" type="radio" value="4" name="prospect_status" class="radio-template">
                                            <label for="radioCustom3" class="text-success">Client</label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary offset-md-11">Suivant</button>

                            </form>
                        </div>

                        {{--<div class="col-md-3">
                            <button class="btn btn-sm btn-block btn-warning">Injoignable</button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-sm btn-block btn-danger">Pas de biens</button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-sm btn-block btn-success">Client</button>
                        </div>--}}

                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">
            <div class="row bg-white has-shadow">

                <div class="col-md-12">
                    <h1><span class="icon bg-violet"><i class="fa fa-history"></i></span> Historique</h1>
                </div>

                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>response</th>
                            <th>description</th>
                            <th>created_at</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($prospect->prospect_histories as $prospect_history)

                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $prospect_history->response }}</td>
                                <td>{{ $prospect_history->description }}</td>
                                <td>{{ $prospect_history->created_at }}</td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>

@endsection