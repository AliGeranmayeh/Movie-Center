@extends('layouts.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="./categories.html">Categories</a>
                        <span>{{ $show->genere }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    @if (session()->has('success'))
        <div class="container alert alert-success" style="margin-top: 2%">
            {{ session()->get('success') }}
        </div>
    @endif
    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="img/anime/details-pic.jpg">
                            {{-- <div class="comment"><i class="fa fa-comments"></i> 11</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div> --}}
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $show->name }}</h3>
                            </div>

                            <p>{{ $show->description }}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Type:</span> TV Series</li>

                                            <li><span>Date aired:</span>{{ $show->date_aired }}</li>
                                            <li><span>Status:</span> {{ $show->status }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Genre:</span>{{ $show->genere }}</li>

                                            <li><span>Duration:</span> {{ $show->duration }}</li>
                                            <li><span>Quality:</span> {{ $show->quality }}</li>
                                            <li><span>Views:</span> 131,541</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <a href="{{ route('show.follow', $show->id) }}" class="follow-btn"><i
                                        class="fa fa-heart-o"></i>
                                    @if ($show->users->contains(auth()->user()->id))
                                        Followed
                                    @else
                                        Follow
                                    @endif
                                </a>
                                <a href="anime-watching.html" class="watch-btn"><span>Watch Now</span> <i
                                        class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    @if (!$comments->isEmpty())
                        <div class="anime__details__review">
                            <div class="section-title">
                                <h5>Reviews</h5>
                            </div>
                            @foreach ($comments as $comment)
                                <div class="anime__review__item">
                                    <div class="anime__review__item__text">
                                        <h6>{{ $comment->author }}</h6>
                                        <p>{{ $comment->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="{{ route('add.comment', $show->id) }}" , method="POST">
                            @csrf
                            <textarea name='comment' placeholder="Your Comment"></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>you might like...</h5>
                        </div>
                        @foreach ($randomShows as $randomShow)
                            <div class="product__sidebar__view__item set-bg"
                                data-setbg="{{ asset('assets/img/sidebar/tv-1.jpg') }}">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">{{ $randomShow->name }}</a></h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
@endsection()
