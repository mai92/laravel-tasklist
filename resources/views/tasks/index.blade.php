@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Hi {{ auth()->user()->name }} , whats your task today ?</div>

                <div class="panel-body">
                    <form action="{{ route('task.add') }}" class="form-horizontal" method="post">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-12">
                               <input type="text" name="task" placeholder="Write a task ..." class="form-control" value="{{ old('task') ?: '' }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                               <button class="btn btn-primary pull-right">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Today Task :</div>

                <div class="panel-body">
                    <ul class="list-group">
                        @if (auth()->user()->tasks()->today()->count() === 0)
                            <h5 class="text-center">No task.</h5>
                        @else
                            @foreach (auth()->user()->tasks()->today()->latestFirst()->get() as $task)
                                <li class="list-group-item">{{ $task->task }}</li>
                            @endforeach
                        @endif
                        
                    </ul>
                </div>
            </div>

             <div class="panel panel-default">
                <div class="panel-heading">Position :</div>

                <div class="panel-body">
                    <ul class="list-group">
                        @if ($position->count() === 0)
                            <h5 class="text-center">No Position</h5>
                        @else
                            <a href="/home" class="list-group-item">All Positions</a>
                            @foreach ($position->get() as $position)
                                <a href="{{ route('task.position', $position->slug) }}" class="list-group-item">{{ $position->name }}</a>
                            @endforeach
                        @endif
                        
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            @foreach ($users as $user)
                <div class="panel panel-default col-md-12">
                    <div class="panel-heading"><h4>{{ $user->name }} <small>( {{ $user->position->name }} )</small></h4> <span class="pull-right badge">{{ $user->todayTasks->count() }} tasks</span></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-12">
                               <ul class="">
                                   @if ($user->todayTasks->count() != 0)
                                        @foreach ($user->todayTasks as $today)
                                            <li class="">{{ $today->task }} </li>
                                        @endforeach
                                   @else
                                        <h5 class="text-center">No task .</h5>
                                   @endif
                               </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
