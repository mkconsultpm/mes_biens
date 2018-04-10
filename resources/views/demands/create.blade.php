@extends('layouts.main')

@section('content')

    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">
                <div class="row bg-white has-shadow">

                    <form action="{{ route('demands.store', ['id' => $customer->id]) }}" method="post">

                        {{ csrf_field() }}

                        @include('demands.form')

                        <button type="submit" class="btn btn-primary">Ajouter demande</button>

                    </form>

                </div>
        </div>
    </section>

@endsection

@section('thisjs')

    <script>

        $(document).ready(function(){
            $('#city option').hide();
        });

        $('#region').change(function(){
            $('#city option').hide();
            $('.' + $(this).val()).show();
        });

        /*$('#customer').change(function(){
            if ($(this).val() != null) {
                $('#first_name').val($(this).find(':selected').attr('data-first-name'));
                $('#last_name').val($(this).find(':selected').attr('data-last-name'));
                $('#cin').val($(this).val());
                $('#phone').val($(this).find(':selected').attr('data-phone'));
            }
        });*/

    </script>



@endsection
