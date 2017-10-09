@extends('layout.app')
@section('content')

    <div id="content">
        <div class="header-task">
            <div style="float: left;">
                <p style="margin: 13px;font-size: 20px">Tasks List</p>
            </div>
            <div style="float: right;padding-right: 21px;padding-top: 4px;">
                <button type="button" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-align-justify"></span>
                </button>
            </div>
        </div>
            <div class="panel panel-default">
            <div class="panel-header"><p style="padding: 15px">New Task</p><br></div>
            <div class="panel-body">
              <!-- Display Validation Errors -->
                    @include('common.errors')
                <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                    <div class="panel-add">
                        <label>Task</label>
                        <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}"><br>
                        <button class="btn btn-default"><i class="glyphicon glyphicon-plus"></i><span style="margin-left: 5px">Add Task</span></button>
                    </div>
                </form>
            </div>
            </div><br>
             <div class="panel panel-default">
                <div class="panel-header"><p style="padding: 15px">Current Task</p><br></div>
                <div class="panel-body">
                    <div class="panel-table">
                    <table class="table table-striped table-hover">
                        <thead>
                            <td style="font-weight: bold;">Task</td>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="table-text"><div>{{ $task->name }}</div></td>

                                    <!-- Task Delete Button -->
                                    <td>
                                        <form action="{{ url('task/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div><br>
        </div>  
@endsection