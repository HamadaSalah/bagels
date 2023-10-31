@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">All News</h2>
<a href="{{route('news.create')}}">  
    <button class="btn btn-primary" style="float: right"><i class="fa fa-plus"> </i>  New News</button>
</a>
<div class="clear"></div>
@if ($news->count()>0)
<div class="table-responsive">
    <table class="table user-table no-wrap" id="myDTable">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">Head</th>
                {{-- <th class="border-top-0">Body</th> --}}
                <th class="border-top-0">Img</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $new)
            <tr>
                <td>{{$new->id}}</td>
                <td>{{$new->head}}</td>
                {{-- <td>{{mb_substr($new->body, 0, 100, 'utf-8')}}...</td> --}}
                <td>
                    <a data-fancybox="gallery" href="{{asset('images/'.$new->img)}}"> 
                        <img src="{{asset('images/'.$new->img)}}" style="width: 100px;height: 100px;" class="img-thumbnail" alt="">
                    </a>
                </td>
                    <td>
                    <form style="display: inline;" action="{{route('news.destroy', $new->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                    <a href="{{Route('news.edit', $new->id)}} ">
                        <button class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</button>
                    </a>
                </td>

            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="clearfix"></div>
<p class="text-center">No Data Avialble</p>    
@endif
@endsection
