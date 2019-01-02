@extends('layouts.app')

@section('content')
<!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(/img/bg-img/breadcumb10.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Apstiprināt e-pasta adresi</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- ##### Breadcumb Area End ##### -->

<div class="blog-area section-padding-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Apstipriniet e-pasta adresi') }}
                    </div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Apstiprināšanas links ir nosūtīts uz Jūsu e-pasta adresi.') }}
                            </div>
                        @endif

                        {{ __('Pirms turpināt, lūdzu pārbaudiet e-pastu, lai apstiprinātu reģistrāciju.') }}
                        {{ __('Ja nesaņēmāt e-pastu') }}, <a href="{{ route('verification.resend') }}">{{ __('spiediet šeit, lai pieprasītu vēl vienu e-pastu') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
