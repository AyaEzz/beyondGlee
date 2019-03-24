<div class="single-product shop-quick-view-ajax clearfix">
    <div class="ajax-modal-title">
        <h2>Edit Role</h2>
    </div>

    <div class="product modal-padding clearfix">
        <div class="header">
            <h4 class="title">Edit Role for {{$user->name}}</h4>
        </div>
        <div class="content">

            <form action="{{route('admin.userrole', ['id' => $user->id])}}" method="post">

                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="uname" class="text-right control-label col-form-label">Role</label>
                            <select id="role" name="role" class="sm-form-control" autocomplete="off" required>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd">Update Role</button>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
