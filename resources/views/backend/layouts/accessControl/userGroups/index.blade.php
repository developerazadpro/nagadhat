@extends('backend.layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">User Group List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Sl</th>
                                    <th>Group Name</th>
                                    <th>Group Key</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $key => $row)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $row->user_group_name }}</td>
                                    <td>{{ $row->user_group_key }}</td>
                                    <td>
                                        @if($row->active_fg==1)
                                            <button type="button" class="btn btn-primary btn-xs">Active</button>
                                        @else
                                            <button type="button" class="btn btn-danger btn-xs">Inactive</button>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-action="{{ url('user-groups/'.$row->id.'/edit') }}" data-modal="{{ $header['modalSize'] }}" data-title="Edit {{ $row->user_group_name }}" data-target="#myModal" class="btn btn-info btn-xs modal-link">Edit</button> |
                                        <button type="button" class="btn btn-danger btn-xs deleteRow" data-action="{{ url('user-groups/'.$row->id) }}" >Delete</button>
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


@endsection
