<div class="card">


    <div class="card-body">
        <h5 class="card-title">Coupon Users Applied</h5>


            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                    <tr>

                        <th>User ID</th>
                        <th>User Name</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($usersApplied as $user)
                        <tr>
                            <td>{{$user->user_id}}</td>
                            <td>{{$user->name}}</td>
                        </tr>
                    @endforeach


                    </tbody>

                </table>
            </div>

    </div>
</div>
