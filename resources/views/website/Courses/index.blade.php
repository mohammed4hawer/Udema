@extends('Website.layout')

@section('content')
<section id="hero_in" class="courses">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>All Our Online courses</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->
		<div class="filters_listing sticky_horizontal">
			<div class="container">
				<ul class="clearfix">
					<li>
						<div class="switch-field">
							<input type="radio" id="all" name="listing_filter" value="all" checked>
							<label for="all">All</label>
							<input type="radio" id="popular" name="listing_filter" value="popular">
							<label for="popular">Popular</label>
							<input type="radio" id="latest" name="listing_filter" value="latest">
							<label for="latest">Latest</label>
						</div>
					</li>
					<li>
						<div class="layout_view">
							<a href="#0" class="active"><i class="icon-th"></i></a>
							<a href="#"><i class="icon-th-list"></i></a>
						</div>
					</li>
					<li>
						<select name="orderby" class="selectbox">
                            <option value="category" selected disabled>Category</option>
                            @foreach ($categories as $category)
                            <option value="#">{{$category->name}}</option>
                            @endforeach
							</select>
					</li>
				</ul>
			</div>
			<!-- /container -->
		</div>
		<!-- /filters -->

		<div class="container margin_60_35">
			<div class="row">
			@foreach($courses as $course)
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="box_grid wow">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<a href="#0" class="wish_bt"></a>
							<a href="#"><img src="{{asset('website/img/'.$course->image)}}" class="img-fluid" alt=""></a>
							<div class="price">${{$course->price}}</div>
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper">
							<small>{{$course->category->name}}</small>
							<a href="{{route('courses.show',$course->id)}}"><h3>{{$course->name}}</h3></a>
							<p>{{$course->short_description}}</p>
							<div class="rating">
							@include('website\includes\rate_star',['rate'=>$course->reviews->avg('rate')])
							 <small>({{$course->reviews->count()}})</small></div>
						</div>
						<ul>
						<li><i class="icon_clock_alt">&nbsp;</i>{{$course->lessons->sum('duration')}}</li>
						<li><a href="{{route('courses.show', $course->id)}}">Enroll now</a></li>
						</ul>
					</div>
				</div>
			@endforeach
			</div>
			<!-- /row -->
			<p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Load more</a></p>
		</div>
		<!-- /container -->
		<div class="bg_color_1">
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-md-4">
						<a href="{{route('contact')}}" class="boxed_list">
							<i class="pe-7s-help2"></i>
							<h4>Need Help? Contact us</h4>
							<p>Cum appareat maiestatis interpretaris et, et sit.</p>
						</a>
					</div>
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-wallet"></i>
							<h4>Payments and Refunds</h4>
							<p>Qui ea nemore eruditi, magna prima possit eu mei.</p>
						</a>
					</div>
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-note2"></i>
							<h4>Quality Standards</h4>
							<p>Hinc vituperata sed ut, pro laudem nonumes ex.</p>
						</a>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
@endsection
