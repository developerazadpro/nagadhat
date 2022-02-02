<form action="{{ route('users.store') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter User Name" required>
        </div>
        <div class="form-group">
            <label for="description">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter User Email" required>
        </div>
        <div class="form-group">
            <label for="description">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter User Password">
        </div>
        <div class="form-group">
            <label for="description">User Group</label>
            <select name="user_group_id" class="form-control select2" style="width: 100%" required>
                <option value="">-Select-</option>
                @foreach($groups as $row)
                    <option value="{{ $row->user_group_id }}">{{ $row->user_group_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Active Status</label>
            <select name="active_fg" id="" class="form-control">
                <option value="1" selected>Active</option>
                <option value="0" >Inactive</option>
            </select>
        </div>

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</form>