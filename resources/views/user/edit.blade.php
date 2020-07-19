@extends('layouts.admin')
@section('title', 'Gestão de Eventos e Stocks Dashboard')
@section('content_header')
    <h1><i class="fa fa-user"></i> Users</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Edit user:&nbsp;{{$user->name}}</h3>
                        {{--                        @dd($user)--}}
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('users.update',$user)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name:</label>
                                <input required type="text" class="form-control" id="inputName" name="name" placeholder="Enter name" value="{{$user->name}}">
                            </div>

                            <div class="form-group">
                                <label for="inputvat">VAT</label>
                                <input required type="text" class="form-control" id="inputvat" name="vat" placeholder="Enter VAT number" value="{{$user->vat}}">
                            </div>

                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input required type="text" class="form-control" id="inputAddress" name="address" placeholder="Enter address" value="{{$user->address}}">
                            </div>

                            <div class="form-group">
                                <label for="inputZipcode">Zip Code</label>
                                <input required type="text" class="form-control" id="inputZipcode" name="zip_code" placeholder="Enter zip code" value="{{$user->zip_code}}">
                            </div>

                            <div class="form-group">
                                <label for="inputContact">Contact</label>
                                <input required type="text" class="form-control" id="inputContact" name="contact" placeholder="Enter contact" value="{{$user->contact}}">
                            </div>

                            <div class="form-group">
                                <label for="inputEmail">Email address</label>
                                <input required type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter email" value="{{$user->email}}">
                            </div>
{{--                            TODO: testar a password a funcionar--}}
{{--                            --}}{{--                            <div class="form-group">--}}
{{--                            --}}{{--                                <label for="inputPassword">Password</label>--}}
{{--                            --}}{{--                                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">--}}
{{--                            --}}{{--                            </div>--}}
{{--                            --}}{{--                            <div class="form-group">--}}
{{--                            --}}{{--                                <label for="confirmPassword">Confirm Password</label>--}}
{{--                            --}}{{--                                <input type="password" class="form-control" id="confirmPassword" name="confirm" placeholder="Confirm Password">--}}
{{--                            --}}{{--                            </div>--}}
{{--                        <!-- /.card-body -->--}}
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                            <a type="button" href="{{route('home')}}" class="btn btn-default float-right">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    @include('partials.js')
@stop