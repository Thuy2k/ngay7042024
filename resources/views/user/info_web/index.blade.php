@extends('layouts.user')
@section('content')
    <div id="contact-page" class="container wp-infor-web">
        <div class="bg">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="title text-center">{{ $page->title }}</h2>
                </div>
                <div class="col-sm-12">
                    <div class="main-info-web">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection
