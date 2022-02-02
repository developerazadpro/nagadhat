<form action="{{ route('user-groups.store') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
        <div class="form-group">
            <label for="name">Group Name</label>
            <input type="text" class="form-control" name="user_group_name" placeholder="Enter User Group Name" required>
        </div>
        <div class="form-group">
            <label for="description">Group Key</label>
            <input type="text" class="form-control" name="user_group_key" placeholder="Enter group-key">
        </div>
        <div class="form-group">
            <label for="description">User Define Sl.</label>
            <input type="number" class="form-control" name="userdsl_no" placeholder="Enter Serial No." min="1">
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