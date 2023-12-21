@extends('layouts.app')

@section('breadcrumb')
<x-breadcrumb title="Dashboard" />
@endsection

@section('content')

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
        <div class="col">
            <div class="bg-white card mini-stat text-info" style="min-height: 299px;">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="bg-white float-start mini-stat-img me-4">
                            <img src="{{ asset('images/Fortaleza Íntegra VERT.png') }}" alt="">
                        </div>
                    </div>
                    <div class="pt-3">
                        <div class="float-end">
                            <a href="#" class="text-info">
                                <i class="mdi mdi-arrow-right h5"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-3">
                        <div class="float-end">
                        </div>
                        <p class="mt-1 mb-0 text-info fw-bold">Total</p>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection