@extends('layouts.main')

@section('content')

    <section class="projects no-padding-top" style="margin-top: 20px">
        <div class="container-fluid">

            @foreach($demands as $demand)

                <!-- Project-->
                    <div class="project">
                        <div class="row bg-white has-shadow">
                            <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                                <div class="project-title d-flex align-items-center">
                                    <div class="image has-shadow"><img src="img/project-1.jpg" alt="..." class="img-fluid"></div>
                                    <div class="text">
                                        <h3 class="h4">{{ $demand->type }} - {{ $demand->price }} dt</h3><small>Etages: {{ $demand->floors }} | Chambres: {{ $demand->rooms }}</small>
                                    </div>
                                </div>
                                <div class="project-date"><span class="hidden-sm-down">{{ $demand->region }} {{ $demand->city ? ' | ' . $demand->city : '' }}</span></div>
                                <div class="project-date"><span class="hidden-sm-down">{{ $demand->for_rent ? 'Location' : 'Achat' }}</span></div>
                            </div>
                            <div class="right-col col-lg-6 d-flex align-items-center">

                                <div class="time"><i class="fa fa-clock-o"></i>{{ $demand->garage ? 'Garage' : '' }} </div>
                                <div class="time"><i class="fa fa-clock-o"></i>{{ $demand->terrace ? 'Terrace' : '' }} </div>
                                <div class="time"><i class="fa fa-clock-o"></i>{{ $demand->pool ? 'Piscine' : '' }} </div>
                                <div class="time"><i class="fa fa-clock-o"></i>{{ $demand->central_heating ? 'Chauffage central' : '' }} </div>
                                <div class="time"><i class="fa fa-clock-o"></i>{{ $demand->air_conditionner ? 'Climatiseur' : '' }} </div>
                                {{--<div class="comments"><i class="fa fa-comment-o"></i>20</div>
                                <div class="project-progress">
                                    <div class="progress">
                                        <div role="progressbar" style="width: 45%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                                    </div>
                                </div>--}}
                            </div>
                        </div>
                    </div>

            @endforeach

        </div>
    </section>

@endsection