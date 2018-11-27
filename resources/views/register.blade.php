@extends('layout')

@section('title', 'Login')

@section('content')
     <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div class="box">
                    <div class="shape1"></div>
                    <div class="shape2"></div>
                    <div class="shape3"></div>
                    <div class="shape4"></div>
                    <div class="shape5"></div>
                    <div class="shape6"></div>
                    <div class="shape7"></div>
                    <div class="float">
                        <form class="form  align-center" action="/api/user" method="post">
                            <div class="form-group">
                                <label for="name" class="text-white">name:</label><br>
                                <input type="text" name="name" id="username" class="form-control">
                            </div>
                             <div class="form-group">
                                <label for="password" class="text-white">password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-white">email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group" style="magin: 0 auto;">
                                <input type="submit" name="Register" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
@endsection
