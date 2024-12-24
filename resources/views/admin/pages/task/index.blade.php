
@extends('admin.app')

@section('admin_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            {{-- task create button --}}
            <div class="create_button mb-4">
                <a href="{{route('admin.tasks.create')}}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Create task</span>
                </a>
            </div>
           
            {{-- task list parent div --}}
            <div class="task_list">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 row">
                        <div class="col-md-6">
                            <h6 class="font-weight-bold text-primary">Tasks list</h6>
                        </div>

                         {{-- sort by status dropdown --}}
                        <div class="col-md-3">
                            <span>Sort by status</span>
                            <div class="status">
                                <select class="form-control" name="status" id="statusFilter">
                                    <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All</option>
                                    <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Pending</option>
                                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>In progress</option>
                                    <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>
                        </div>

                         {{-- sort by due date dropdown --}}
                        <div class="col-md-3">
                            <span>Sort by date</span>
                            <div class="due_date">
                                <input type="date" class="form-control" name="due_date" id="dueDate" value="{{ request('due_date') }}">
                            </div>
                        </div>

                    </div>

                  


                    <div class="card-body">
                        {{-- notification status --}}
                        @if(null !== session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        

                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"> 
                                <table class="table table-bordered table-striped w-100">
                                    <thead>
                                        <tr>
                                            <th>Serial no.</th>
                                            <th>Task title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        @forelse ($tasks as $task)
                                            <tr>
                                                <td>{{ ($tasks->currentPage() - 1) * $tasks->perPage() + $loop->iteration }}</td>
                                                <td>{{$task->title}}</td>
                                                <td>{{$task->description ?? 'N/A'}}</td>
                                                <td>
                                                    @if($task->status == 0)
                                                        <span class="badge badge-warning">Pending</span>
                                                    @elseif($task->status == 1)
                                                        <span class="badge badge-info">In Progress</span>
                                                    @else
                                                        <span class="badge badge-success">Completed</span>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($task->created_at)->format('j M Y') }}</td>
                                                <td>
                                                    <a href="{{route('admin.tasks.edit', $task->id)}}" class="btn btn-primary btn-sm">Edit</a>

                                                    <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are you sure want to delete');" class="btn btn-danger btn-sm task_delete" type="submit">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="50" class="text-danger text-center">No data found</td>
                                            </tr>
                                        @endforelse
                                        
                                    </tbody>
                                </table>
                                {{ $tasks->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>
@endsection

@push('admin_script')
   <script>
        // status base search
        document.getElementById('statusFilter').addEventListener('change', function() {
            const value = this.value;
            window.location.href = `{{ url('admin/tasks') }}?status=${value}`;
        });

        // due date base search
        document.getElementById('dueDate').addEventListener('change', function() {
            const value = this.value;
            window.location.href = `{{ url('admin/tasks') }}?due_date=${value}`;
        });

    </script>
@endpush
