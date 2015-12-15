@if (isset($categories['children']))
        <ul >
        @foreach($categories['children'] as $categories)
        <li class ="{{$categories['active']? '' : 'non-active-category'}}" style="height:35px;">
                <span class="">{{ $categories['title'] }}</span>
                <span style="float: right">
                    <form method="post" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button formaction="/categories/delete" name='category_id' value='{{$categories['id']}}' class="btn btn-danger btn-sm btn-delete">
                            <i class="fa fa-times"></i>
                        </button>
                    </form> 
                </span>
                <span class="btn btn-default btn-sm" style="float: right; margin-right: 15px;"><a href="categories/{{$categories['id']}}/edit"><i class="fa fa-pencil"></i></a></span>
                <span class="" style="float: right; margin-right: 15px;">{{$categories['active']? 'да' : 'нет'}}</span>
            </li>    
            @include('admin.category', $categories)
        @endforeach
        </ul>
    @endif
