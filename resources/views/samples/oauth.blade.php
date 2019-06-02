<?php
use App\Util;
?>
@extends('layout')

@section('head')
    @component('parts.head')
        @slot('title')
            oAuth2.0
        @endslot
    @endcomponent
@endsection

@section('contents')
    <h1>oAuth2.0</h1>

    <?php Util::showMessage('error') ?>
    <?php Util::showMessage('success') ?>

    <div class="card card-default">
        <div class="card-header">GET</div>
        <div class="card-body">
            <pre>{{ print_r($all, true) }}</pre>
        </div>
    </div>

    <div class="card card-default mt-3">
        <div class="card-header">token</div>
        <div class="card-body">
            <pre>{{ print_r($token, true) }}</pre>
        </div>
    </div>

    <div class="card card-default mt-3">
        <div class="card-header">owner</div>
        <div class="card-body">
            <pre>{{ print_r($owner, true) }}</pre>
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
