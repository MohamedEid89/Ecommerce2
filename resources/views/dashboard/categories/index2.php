</div>
<div class="row" id="cancel-row">
    <div class="table-responsive">
        <table id="html5-extension" class="table dt-table-hover dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="html5-extension_info">
            <thead>
                <tr role="row">
                    <th tabindex="0" rowspan="1" colspan="1">ID</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="html5-extension" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">
                        Avatar</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="html5-extension" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 129px;">Name</th>
                    <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 77px;">Start date
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1" colspan="1" aria-label="Extn.: activate to sort column ascending" style="width: 38px;">Extn.</th>
                    <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 92px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr role="row">
                    <td>{{ $category->id }}</td>
                    <td>
                        <div class="d-flex">
                            <div class="usr-img-frame mr-2 rounded-circle">
                                <img alt="avatar" class="img-fluid rounded-circle" src="../src/assets/img/girl-1.png">
                            </div>
                        </div>
                    </td>
                    <td class="sorting_1">{{ $category->name }}</td>
                    <td>{{ $category->parent_id }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('categories.edit') }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ route('categories.destroy') }}" class="btn btn-sm btn-danger">Delete</a>
                            <form action="{{ route('categories.destroy') }}" method="POST">
                                @csrf
                                @method('delete')
                            </form>

                        </div>
                    </td>
                    @empty
                <tr>
                    <td colspan="7">No Data Founded</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

</div>