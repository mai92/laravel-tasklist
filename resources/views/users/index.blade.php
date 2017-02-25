@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Halo {{ $name or 'Fuad' }} , apa tugasmu hari ini ?</div>

                <div class="panel-body">
                    <ul class="list-group">
                        @foreach ($tasks as $task)
                            <li class="list-group-item">{{ $task->task }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
