@extends('admin.layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">User list</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>User Group</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $row)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->user_group_id==1?'Admin':'Customer' }}</td>
                                    <td>
                                        @if($row->active_fg==1)
                                            <button type="button" class="btn btn-primary btn-xs">Active</button>
                                        @else
                                            <button type="button" class="btn btn-danger btn-xs">Inactive</button>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-action="{{ url('users/'.$row->id.'/edit') }}" data-modal="{{ $header['modalSize'] }}" data-title="Edit User [{{ $row->name }}]" data-target="#myModal" class="btn btn-info btn-xs modal-link">Edit</button> |
                                        <button type="button" class="btn btn-danger btn-xs deleteRow" data-action="{{ url('users/'.$row->id) }}" >Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>


@endsection
