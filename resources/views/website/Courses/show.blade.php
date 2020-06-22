@extends('website.layout')

@section('content')


<section id="hero_in" class="courses">
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span>{{$course->name}} -Details</h1>
        </div>
    </div>
</section>
<!--/hero_in-->

<div class="bg_color_1">
    <nav class="secondary_nav sticky_horizontal">
        <div class="container">
            <ul class="clearfix">
                <li><a href="#description" class="active">Description</a></li>
                <li><a href="#lessons">Lessons</a></li>
                <li><a href="#reviews">Reviews</a></li>
            </ul>
        </div>
    </nav>
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-8">

                <section id="description">
                    <h2>Description</h2>
                    <p>{{$course->short_description}}</p>
                    <h5>What will you learn</h5>
                    <ul class="list_ok">
                        <li>
                            <h6>Suas summo id sed erat erant oporteat</h6>
                        <p>You'll earn a Certificate that you can share with prospective employers and your professional network.</p>
                        </li>
                        <li>
                            <h6>Illud singulis indoctum ad sed</h6>
                            <p>You'll earn a Certificate that you can share with prospective employers and your professional network.</p>
                        </li>
                        <li>
                            <h6>Alterum bonorum mentitum an mel</h6>
                            <p>You'll earn a Certificate that you can share with prospective employers and your professional network.</p>
                        </li>
                    </ul>
                    <hr>
                    <p>{{$course->long_description}}</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="bullets">
                                <li>Dolorem mediocritatem</li>
                                <li>Mea appareat</li>
                                <li>Prima causae</li>
                                <li>Singulis indoctum</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="bullets">
                                <li>Timeam inimicus</li>
                                <li>Oportere democritum</li>
                                <li>Cetero inermis</li>
                                <li>Pertinacia eum</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </section>
                <!-- /section -->

                <section id="lessons">
                    <div class="intro_title">
                        <h2>Lessons</h2>
                        <ul>
                            <li>{{$course->lessons->count()}} lessons</li>
                            <li>{{\Carbon\Carbon::parse($course->lessons->sum('duration'))->format('i:s')}}</li>
                        </ul>
                    </div>
                    <div id="accordion_lessons" role="tablist" class="add_bottom_45">
{{-- =========================*=========================== --}}
                    <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="indicator ti-minus"></i> All Lessons</a>
                                </h5>
                            </div>
                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion_lessons">
                <div class="card-body">
                    <div class="list_lessons">
                        @if (auth()->check())
                        @if ($course->isEnrolled())
                        <ul>
                            @foreach ($course->lessons as $lesson)
                            <li><a href="{{$lesson->url}}" class="video">{{$lesson->name}}</a><span>{{\Carbon\Carbon::parse($lesson->duration)->format('i:s')}}</span></li>
                                @endforeach
                                @else
                                <p>You have to enroll in this course first.&nbsp;&nbsp;<a href="#enroll" class="login" style="color: #127; font-weight: 600;">Enroll Now!</a></p>
                        @endif


                            {{-- <li><a href="#0" class="txt_doc">Audiology</a><span>00:59</span></li> --}}
                            @else
                            <p>You have to enroll in this course first.&nbsp;&nbsp;<a href="{{route('login')}}" class="login" style="color: #127; font-weight: 600;">Login here!</a></p>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /card -->
    </div>
    <!-- /accordion -->
</section>
<!-- /section -->
{{-- ==========================*=============================== --}}
        <section id="reviews">
            <h2>Reviews</h2>
            <div class="reviews-container">
            <div class="row">
                <div class="col-lg-3">
                <div id="review_summary">
                <strong>{{$course->reviews->avg('rate')}}</strong>
                <div class="rating">
@include('website\includes\rate_star',['rate'=>$course->reviews->avg('rate')])
                    </div>
        <small>Based on {{$course->reviews->count()}} reviews</small>
                </div>
                </div>
                <div class="col-lg-9">
                    @for ($i = 1; $i <=5; $i++)
                    <div class="row">
                        <div class="col-lg-10 col-9">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{$course->getTotalReviewPercentage($i)['percentage']}}%" aria-valuenow="{{$course->getTotalReviewPercentage($i)['percentage']}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                           </div>
                   <div class="col-lg-2 col-3">
                       <small><strong>{{$course->getTotalReviewPercentage($i)['count_reviews']}} stars</strong></small>
                   </div>
                   </div>
                    <!-- /row -->
                    @endfor

                            </div>
                        </div>
                        <!-- /row -->
                    </div>

                    <hr>

        <div class="reviews-container">
@foreach ($course->reviews as $review)

<div class="review-box clearfix">
    <figure class="rev-thumb"><img src="{{asset('website/img/'.$review->user->image)}}" alt="">
    </figure>
    <div class="rev-content">
        <div class="rating">
            @include('website\includes\rate_star',['rate'=>$review->rate])
        </div>
        <div class="rev-info">
            {{$review->user->name}} – {{\Carbon\Carbon::parse($review->created_at)->toFormattedDateString()}}:
        </div>
        <div class="rev-text">
            <p>
                {{$review->comment}}
            </p>
        </div>
    </div>
</div>
@endforeach
<!-- /review-box -->
</div>
                    <!-- /review-container -->
                </section>
                <!-- /section -->
            </div>
            <!-- /col -->
{{-- ===========================*============================ --}}
            <aside class="col-lg-4" id="sidebar">
                <div class="box_detail">
                    <figure>
                        <a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video"><i class="arrow_triangle-right"></i><img src="http://via.placeholder.com/800x533/ccc/fff/course_1.jpg" alt="" class="img-fluid"><span>View course preview</span></a>
                    </figure>
                    <div class="price">
                        ${{$course->price}}
                    {{-- <span class="original_price"><em>$49</em>60% discount price</span> --}}
                    </div>
                    @if (!$course->isEnrolled())
                    <a href="{{route('course.enroll', $course->id)}}" class="btn_1 full-width" id="enroll">Enroll Now</a>
                    @endif



                    {{-- <a href="#0" class="btn_1 full-width outline"><i class="icon_heart"></i> Add to wishlist</a>
                     <div id="list_feat">
                        <h3>What's includes</h3>
                        <ul>
                            <li><i class="icon_mobile"></i>Mobile support</li>
                            <li><i class="icon_archive_alt"></i>Lesson archive</li>
                            <li><i class="icon_mobile"></i>Mobile support</li>
                            <li><i class="icon_chat_alt"></i>Tutor chat</li>
                            <li><i class="icon_document_alt"></i>Course certificate</li>
                        </ul>
                    </div> --}}
                </div>
            </aside>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /bg_color_1 -->

@endsection
