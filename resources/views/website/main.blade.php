@extends('website.layout')

@section('content')


<section class="hero_single version_2">
    <div class="wrapper">
        <div class="container">
            <h3>What would you learn?</h3>
            <p>Increase your expertise in business, technology and personal development</p>
            <form>
                <div id="custom-search-input">
                    <div class="input-group">
                        <input type="text" class=" search-query" placeholder="Ex. Architecture, Specialization...">
                        <input type="submit" class="btn_search" value="Search">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- /hero_single -->

<div class="features clearfix">
    <div class="container">
        <ul>
            <li><i class="pe-7s-study"></i>
                <h4>+200 courses</h4><span>Explore a variety of fresh topics</span>
            </li>
            <li><i class="pe-7s-cup"></i>
                <h4>Expert teachers</h4><span>Find the right instructor for you</span>
            </li>
            <li><i class="pe-7s-target"></i>
                <h4>Focus on target</h4><span>Increase your personal expertise</span>
            </li>
        </ul>
    </div>
</div>
<!-- /features -->

<div class="container-fluid margin_120_0">
    <div class="main_title_2">
        <span><em></em></span>
        <h2>Udema Popular Courses</h2>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
    </div>
    <div id="reccomended" class="owl-carousel owl-theme">
        @foreach ($courses as $course)

        <div class="item">
            <div class="box_grid">
                <figure>
                    <a href="#0" class="wish_bt"></a>
                    <a href="#">
                    <div class="preview"><span>Preview course</span></div><img src="{{asset('website/img/'.$course->image)}}" class="img-fluid" alt=""></a>
                    <div class="price">${{$course->price}}</div>

                </figure>
                <div class="wrapper">
                <small>{{$course->category->name}}</small>
                <a href="{{route('courses.show',$course->id)}}"><h3>{{$course->name}}</h3></a>
                <p>{{$course->short_description}}</p>
                <div class="rating">
@include('website\includes\rate_star',['rate'=>$course->reviews->avg('rate')] )
                <small>({{$course->reviews->count()}})</small>
            </div>
                </div>
                <ul>
                    <li><i class="icon_clock_alt"></i>&nbsp;{{$course->lessons->sum('duration')}}
                    min</li>
                    {{-- <li><i class="icon_like"></i> 890</li> --}}
                    <li><a href="{{route('courses.show', $course->id)}}">Enroll now</a></li>
                </ul>
            </div>
        </div>
        @endforeach
        <!-- /item -->

    </div>
    <!-- /carousel -->
    <div class="container">
        <p class="btn_home_align"><a href="{{route('courses.index')}}" class="btn_1 rounded">View all courses</a></p>
    </div>
    <!-- /container -->
    <hr>
</div>
<!-- /container -->

<div class="container margin_30_95">
    <div class="main_title_2">
        <span><em></em></span>
        <h2>Udema Categories Courses</h2>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
    </div>
    <div class="row">
        @foreach ($categories as $category)

<div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
<a href="#0" class="grid_item">
    <figure class="block-reveal">
    <div class="block-horizzontal"></div>
    <img src="{{asset('website/img/'.$category->image)}}" class="img-fluid" alt="" style="width: 350px; height: 187px">
  <div class="info">
  <small><i class="ti-layers"></i>{{$category->courses->count()}} Programmes</small>
         <h3>{{$category->name}}</h3>
            </div>
        </figure>
    </a>
</div>
        <!-- /grid_item -->
        @endforeach
    </div>
    <!-- /row -->
</div>
<!-- /container -->

<div class="bg_color_1">
    <div class="container margin_120_95">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>News and Events</h2>
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
        </div>
        <div class="row">
            @foreach ($posts as $post)

            <div class="col-lg-6">
            <a class="box_news" href="{{route('posts.show', $post->id)}}">
                <figure><img src="{{asset('website/img/'.$post->image)}}" alt="">
                <figcaption><strong>{{\Carbon\Carbon::parse($post->created_at)->format('d')}}</strong>{{\Carbon\Carbon::parse($post->created_at)->format('M')}}</figcaption>
                </figure>
                <ul>
                        {{-- <li>Mark Twain</li> --}}
                    <li>{{\Carbon\Carbon::parse($post->created_at)->format('d / m / Y')}}</li>
                    </ul>
                <h4>{{$post->name}}</h4>
                <p>{{Str::limit($post->description, 110)}}</p>
                </a>
            </div>
            <!-- /box_news -->
            @endforeach
        </div>
        <!-- /row -->
        <p class="btn_home_align"><a href="{{route('posts.index')}}" class="btn_1 rounded">View all news</a></p>
    </div>
    <!-- /container -->
</div>
<!-- /bg_color_1 -->

<div class="call_section">
    <div class="container clearfix">
        <div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
            <div class="block-reveal">
                <div class="block-vertical"></div>
                <div class="box_1">
                    <h3>Enjoy a great students community</h3>
                    <p>Ius cu tamquam persequeris, eu veniam apeirian platonem qui, id aliquip voluptatibus pri. Ei mea primis ornatus disputationi. Menandri erroribus cu per, duo solet congue ut. </p>
                    <a href="#0" class="btn_1 rounded">Read more</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/call_section-->


@endsection
