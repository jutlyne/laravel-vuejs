@extends('layout.public.app')

@section('content')

    <section class="section">
        <div class="container">
            <hr class="invis1">
            <div class="row">
                <div class="col-lg-9">
                    <div class="blog-list clearfix">

                        @foreach ($listPosts as $itemPost)
                            @php
                                $date = date('M-d, Y', strtotime($itemPost->created_at))
                            @endphp
                            <div class="blog-box row">

                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="/post/{{ $itemPost->id }}" title="">
                                            <img src="{{ asset('/storage/' . $itemPost->images) }}" alt=""
                                                class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->
                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="/post/{{ $itemPost->id }}" title="">{{ $itemPost->name }}</a>
                                    </h4>
                                    <p>{{ $itemPost->sort_detail }}</p>
                                    <small><a href="/category/{{ $itemPost->category->id }}" title="">{{ $itemPost->category->name }}</a></small>
                                    <small><a href="javascript:void(0)" title="">{{ $date }}</a></small>
                                    <small><a href="javascript:void(0)" title="">by Boby</a></small>
                                </div><!-- end meta -->
                                <hr class="invis">

                            </div><!-- end blog-box -->

                            <hr class="invis">
                        @endforeach

                    </div><!-- end blog-list -->

                    <hr class="invis">
                </div><!-- end col -->

                <div class="col-lg-3">
                    <div class="section-title">
                        <h3 class="color-yellow"><a href="blog-category-01.html" title="">Hots</a></h3>
                    </div><!-- end title -->
                    @foreach ($listHots as $itemHot)
                            <div class="blog-box">
                                <div class="post-media">
                                    <a href="single.html" title="">
                                        <img src="{{ asset('/storage/' . $itemHot->images) }}" alt=""
                                            class="img-fluid">
                                        <div class="hovereffect">
                                            <span class="videohover"></span>
                                        </div><!-- end hover -->
                                    </a>
                                </div><!-- end media -->
                                <div class="blog-meta">
                                    <h4><a href="single.html" title="">{{ $itemHot->name }}</a></h4>
                                    <small>
                                        <a href="blog-category-01.html" title="">
                                            {{ $itemHot->category->name }}
                                        </a>
                                    </small>
                                    <small><a href="blog-category-01.html" title="">21 July, 2017</a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">
                    @endforeach
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis1">
                {{ $listPosts->links() }}

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="banner-spot clearfix">
                        <div class="banner-img">
                            <img src="upload/banner_02.jpg" alt="" class="img-fluid">
                        </div><!-- end banner-img -->
                    </div><!-- end banner -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
