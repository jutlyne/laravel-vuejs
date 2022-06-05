<div class="col-lg-3">
    <div class="section-title">
        <h3 class="color-yellow"><a href="blog-category-01.html" title="">Hots</a></h3>
    </div><!-- end title -->
    @foreach ($popularPosts as $itemHot)
        <div class="blog-box">
            <div class="post-media">
                <a href="single.html" title="">
                    <img src="{{ asset('/storage/' . $itemHot->images) }}" alt="" class="img-fluid">
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
