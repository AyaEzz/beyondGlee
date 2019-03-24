<div class="shop-quick-view-ajax clearfix">
    <div class="ajax-modal-title">
        <h2>{{$user->name}}</h2>
    </div>

    <div class="modal-padding clearfix">
        <div class="header">
            <h4 class="title">Confirm Delete {{$user->name}}</h4>
        </div>
        <div class="content">

            <form action="{{route('admin.deleteuser', ['id' => $user->id])}}" method="post">

                {{ csrf_field() }}
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h3>You are deleting {{$user->name}} .
                                <br>Are you sure ?
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="button button-rounded">Yes</button>
                    <button type="button" class="button button-rounded">No</button>
                </div>
                <div class="clearfix"></div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
