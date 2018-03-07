@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Info Detail : {{ $info->Title }}
                    </h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <td>{{ $info->title }}</td>
                        </tr>
                        <tr>
                            <th>Content</th>
                            <td>{!! $info->body !!}</td>
                        </tr>
                        <tr>
                            <th>Publish</th>
                            <td>{{ $info->status == 1 ? 'Ya' : 'Tidak' }}</td>
                        </tr>           
                    </table>
                </div>
                <div class="panel-footer">
                    <a href="{{ empty($bread['0']) ? url()->previous() : $bread['0']  }}" class="btn btn-white m-l-5">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection