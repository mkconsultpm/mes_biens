@extends('layouts.main')

@section('content')

    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">
            <div class="row bg-white has-shadow">

                <form action="{{ route('excel_files.store') }}" class="form-horizontal"
                      method="post" enctype="multipart/form-data" required>
                    <input type="file" name="import_file" />
                    {{ csrf_field() }}
                    <button class="btn btn-primary">Import File</button>
                </form>

            </div>
        </div>
    </section>

    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">
            <div class="row bg-white has-shadow">

                @foreach($files as $file)

                    <!-- Item -->
                        <div class="col-xl-3 col-sm-6">
                            <div class="item d-flex align-items-center hoverable{{ $file->is_active ? ' active_bg' : '' }}">
                                <div class="icon bg-green"><i class="icon-bill"></i></div>
                                <div class="title"><span>{{ $file->created_at }}</span>
                                    <small>
                                        {{ $file->description }}
                                        {{--<div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>--}}
                                    </small>
                                    @if (!$file->is_active)
                                        <small>
                                            <a href="{{ route('excel_files.activate', ['id' => $file->id]) }}">activate</a>
                                        </small>
                                    @endif
                                </div>
                                <div class="number"><strong>{{ $file->data_count }}</strong></div>
                            </div>
                        </div>

                @endforeach

            </div>
        </div>
    </section>

@endsection