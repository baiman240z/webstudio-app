<?php
use App\Util;
?>
@extends('layout-login')

@section('head')
    @component('parts.head')
        @slot('title')
            Login
        @endslot
    @endcomponent
@endsection

@section('contents')

    <div class="card mt-3 shadow-lg">
        <div class="card-header bg-info text-light">
            <h4>login</h4>
        </div>
        <div class="card-body">
            <form method="post" action="">
                {{ csrf_field() }}
                <input type="hidden" name="login_form" value="1">

                <?php Util::showMessage('error') ?>
                <?php Util::showMessage('success') ?>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" name="_login" value="{{ $_login }}" size="20" placeholder="Login ID" autocomplete="off">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="_pwd" value="{{ $_pwd }}" size="20" placeholder="Password" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">login</button>
                </div>

            </form>
        </div>
    </div>

@endsection

@section('footer')
    @component('parts.footer')
        <script>
            $(function () {

            });
        </script>
    @endcomponent
@endsection
