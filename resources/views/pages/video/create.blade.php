@extends('layouts.app')

@section('styles')
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Form
                </div>

                <div class="panel-body">
                    {!! Form::open(['method' => 'POST', 'route' => 'admin.video.store', 'novalidate']) !!}
                        @include('pages.video._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#lfm').filemanager('file');
        });
    </script>
@endsection
