@extends('layout.public.appsingle')

@section('content')

    <div class="page-wrapper">
        <div class="blog-list clearfix">
            @foreach ($listPosts as $itemPost)
                @php
                    $date = date('M-d, Y', strtotime($itemPost->created_at));
                @endphp
                <div class="blog-box row">

                    <div class="col-md-4">
                        <div class="post-media">
                            <a href="single.html" title="">
                                <img src="{{ asset('/storage/' . $itemPost->images) }}" alt="" class="img-fluid">
                                <div class="hovereffect"></div>
                            </a>
                        </div><!-- end media -->
                    </div><!-- end col -->
                    <div class="blog-meta big-meta col-md-8">
                        <h4><a href="single.html" title="">{{ $itemPost->name }}</a>
                        </h4>
                        <p>{{ $itemPost->sort_detail }}</p>
                        <small><a href="blog-category-01.html" title="">{{ $itemPost->category->name }}</a></small>
                        <small><a href="single.html" title="">{{ $date }}</a></small>
                        <small><a href="blog-author.html" title="">by JutLy</a></small>
                    </div><!-- end meta -->
                    <hr class="invis">

                </div><!-- end blog-box -->

                <hr class="invis">
            @endforeach
        </div><!-- end blog-list -->
    </div><!-- end page-wrapper -->

    <hr class="invis">

    <div class="row">
        <div class="col-md-12">
            {{ $listPosts->links() }}
        </div><!-- end col -->
    </div><!-- end row -->
@endsection
