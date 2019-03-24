<div class="card">


    <div class="card-body">
        <h5 class="card-title">Coupon Categories Applied</h5>


            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                    <tr>

                        <th>Category ID</th>
                        <th>Category Parent</th>
                        <th>SubCategory</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categoriesApplied as $category)
                        <tr>
                            <td>{{$category->subcategory_id}}</td>
                            <td>{{$category->Cate}}</td>
                            <td>{{$category->SubCate}}</td>
                        </tr>
                    @endforeach


                    </tbody>

                </table>
            </div>

    </div>
</div>


