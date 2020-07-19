@extends('layouts.admin')
@section('title', 'Gestão de Eventos e Stocks Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{Auth::user()->name}}'s Profile</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Name:</label>
                            {{Auth::user()->name}}
                        </div>

                        <div class="form-group">
                            <label for="inputvat">VAT:</label>
                            {{Auth::user()->vat}}
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Address:</label>
                            {{Auth::user()->address}}
                        </div>

                        <div class="form-group">
                            <label for="inputZipcode">Zip Code:</label>
                            {{Auth::user()->zip_code}}
                        </div>

                        <div class="form-group">
                            <label for="inputContact">Contact:</label>
                            {{Auth::user()->contact}}
                        </div>

                        <div class="form-group">
                            <label for="inputEmail">Email address:</label>
                            {{Auth::user()->email}}
                        </div>
                    </div>
                    <div class="card-footer">
                        <a type="button" href="{{route('users.edit', Auth::user()->id)}}" class="btn btn-primary float-left"><i class="fa fa-user-edit"></i></a>
                    </div>
                </div>
            </div>
        </div>
    @include('partials.js')
@stop