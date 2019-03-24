<div class="shop-quick-view-ajax clearfix">

    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-steps/jquery.steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-steps/steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-minicolors/jquery.minicolors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style.css')}}" type="text/css" />


    <div class="ajax-modal-title">
        <h2>{{$Distributor->name}}</h2>
    </div>

    <div class="modal-padding clearfix">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" action="{{route('admin.Distributors.Edit', ['id' => $Distributor->id])}}" method="post" class="m-t-40" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <h4 class="card-title">Edit Distributor</h4>
                            <div class="form-group row">
                                <label for="uname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{$Distributor->name}}" value="{{$Distributor->name}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="{{$Distributor->phone}}" value="{{$Distributor->phone}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="description" name="description" placeholder="{{$Distributor->description}}" value="{{$Distributor->description}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="{{$Distributor->address}}" value="{{$Distributor->address}}">
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="mimage" class="col-sm-3 text-right control-label col-form-label">Main Image</label>
                                <div class="col-sm-9">
                                    <input id="mimage" name="mimage" type="file" accept="image/*" class="form-control">
                                </div>
                                <label for="cimage" class="col-sm-3 text-right control-label col-form-label">Current Image</label>
                                <div class="col-sm-9">
                                    <img id="cimage" width="64" height="64" src="{{asset($Distributor->image)}}" alt="{{$Distributor->name}}">
                                </div>

                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script src="{{asset('admin/assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>

</div>