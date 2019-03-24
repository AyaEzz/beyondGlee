<div class="single-product shop-quick-view-ajax clearfix">
    <div class="ajax-modal-title">
        <h2>{{$user->name}}</h2>
    </div>

    <div class="product modal-padding clearfix">
        <div class="header">
            <h4 class="title">Edit Profile</h4>
        </div>
        <div class="content">

            <form action="{{route('admin.editprofile', ['id' => $user->id])}}" method="post">

                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="hidden" id="id" name="id" value="{{$user->id}}" class="sm-form-control">
                            <label for="uname" class="text-right control-label col-form-label">User Name</label>
                            <input type="text" class="form-control" id="uname" name="uname" placeholder="{{$user->name}}" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email1" class="text-right control-label col-form-label">E-Mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="{{$user->email}}">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="lname" class="text-right control-label col-form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="fname" class="text-right control-label col-form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="{{$user->firstname}}" value="{{$user->firstname}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lname" class="text-right control-label col-form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="{{$user->lastname}}" value="{{$user->lastname}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="title" class="text-right control-label col-form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="{{$user->title}}" value="{{$user->title}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address" class="text-right control-label col-form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="{{$user->address}}" value="{{$user->address}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birthday" class="text-right control-label col-form-label">BirthDay</label>
                            <input type="date" name="birthday" class="form-control border-input" placeholder="{{$user->birthday}}" value="{{$user->birthday}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="state" class="text-right control-label col-form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="{{$user->state}}" value="{{$user->state}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="country" class="text-right control-label col-form-label">Country</label>
                            <input type="text" class="form-control" id="country" name="country" placeholder="{{$user->country}}" value="{{$user->country}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone" class="text-right control-label col-form-label">Contact No</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="{{$user->phone}}">
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
