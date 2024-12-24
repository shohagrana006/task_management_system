
@extends('admin.app')

@section('admin_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            {{-- task back button --}}
            <div class="create_button mb-4">
                <a href="{{route('admin.tasks.index')}}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-long-arrow-alt-left"></i>
                    </span>
                    <span class="text">Back</span>
                </a>
            </div>

             {{-- create form --}}
            <div class="create_form">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                         <h4 class="m-0 font-weight-bold text-primary">{{ isset($task) ? 'Edit' : 'Create' }} Task</h4>
                    </div>

                    <div class="card-body">
                       <form method="POST" action="{{ isset($task) ? route('admin.tasks.update', $task) : route('admin.tasks.store') }}">
                            @csrf
                            @if(isset($task)) @method('PUT') @endif
                             <div class="row m-auto">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input id="title" class="form-control" type="text" name="title" required placeholder="Write task title" value="{{ $task->title ?? '' }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}!!</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control" placeholder="Write task description">{{ $task->description ?? '' }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select id="status" class="form-control" name="status">
                                            <option {{ (isset($task) && $task->status == 0) ? 'selected' : '' }} value="0">Pending</option>
                                            <option {{ (isset($task) && $task->status == 1) ? 'selected' : '' }} value="1">In Progress</option>
                                            <option {{ (isset($task) && $task->status == 2) ? 'selected' : '' }} value="2">Completed</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}!!</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-info" type="submit">{{ isset($task) ? 'Update' : 'Save' }}</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection