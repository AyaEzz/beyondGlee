<div class="single-product shop-quick-view-ajax clearfix">
    <div class="ajax-modal-title">
        <h2>{{$user->name}}</h2>
    </div>

    <div class="product modal-padding clearfix">
        <div class="header">
            <h4 class="title">Edit Profile</h4>
        </div>
        <div class="content">
            <form action="{{route('User.Update')}}" method="post">>

                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>User Role</label>
                            <input type="text"  name="userrole" class="form-control border-input" disabled placeholder="{{$user->title}}" value="{{$user->title}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="name" class="form-control border-input" placeholder="{{$user->name}}" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control border-input" placeholder="{{$user->email}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="firstname" class="form-control border-input" placeholder="{{$user->firstname}}" value="{{$user->firstname}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastname" class="form-control border-input" placeholder="{{$user->lastname}}" value="{{$user->lastname}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control border-input" placeholder="{{$user->address}}" value="{{$user->address}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Birthday</label>
                            <input type="date" name="birthday" class="form-control border-input" placeholder="{{$user->birthday}}" value="{{$user->birthday}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="state" class="form-control border-input" placeholder="{{$user->state}}" value="{{$user->state}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" class="form-control border-input" placeholder="{{$user->country}}" value="{{$user->country}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control border-input" placeholder="{{$user->phone}}">
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
