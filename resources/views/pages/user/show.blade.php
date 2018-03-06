@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        User Detail : {{ $user->name }}
                    </h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>           
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection