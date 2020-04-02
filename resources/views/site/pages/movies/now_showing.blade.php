@extends('site.app')

@section('title','Now Showing')

@section('content')

<!-- ==========Movie-Section========== -->
<section class="movie-section padding-top padding-bottom">
    <div class="container">
        <div class="row flex-wrap-reverse justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-3">
                <div class="widget-1 widget-banner">
                    <div class="widget-1-body">
                        <a href="#0">
                            <img src="{{asset('assets_client/images/sidebar/banner/banner01.jpg')}}" alt="banner">
                        </a>
                    </div>
                </div>
                <div class="widget-1 widget-check">
                    <div class="widget-header">
                        <h5 class="m-title">Filter By</h5> <a href="#0" class="clear-check">Clear All</a>
                    </div>
                    
                </div>
                <div class="widget-1 widget-banner">
                    <div class="widget-1-body">
                        <a href="#0">
                            <img src="{{asset('assets_client/images/sidebar/banner/banner02.jpg')}}" alt="banner">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 mb-50 mb-lg-0">
                <div class="filter-tab tab">
                    {{-- Show and Sort --}}
                    <div class="filter-area">
                        <div class="filter-main">
                            <div class="left">
                                <div class="item">
                                    <span class="show">Show :</span>
                                    <select class="select-bar">
                                        <option value="12">12</option>
                                        <option value="15">15</option>
                                        <option value="18">18</option>
                                        <option value="21">21</option>
                                        <option value="24">24</option>
                                        <option value="27">27</option>
                                        <option value="30">30</option>
                                    </select>
                                </div>
                                <div class="item">
                                    <span class="show">Sort By :</span>
                                    <select class="select-bar">
                                        <option value="showing">now showing</option>
                                        <option value="exclusive">exclusive</option>
                                        <option value="trending">trending</option>
                                        <option value="most-view">most view</option>
                                    </select>
                                </div>
                            </div>
                            <ul class="grid-button tab-menu">
                                <li class="active">
                                    <i class="fas fa-th"></i>
                                </li>                            
                                <li>
                                    <i class="fas fa-bars"></i>
                                </li>                            
                            </ul>
                        </div>
                    </div>
                    {{-- Show and Sort --}}
                    <div class="tab-area">
                        {{-- Movies Grid --}}
                        <div class="tab-item active">
                            <div class="row mb-10 justify-content-center">
                                @forelse ($films as $film)
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="movie-grid">
                                            <div class="movie-thumb c-thumb">
                                                @if ($film->images->count() > 0)
                                                    <a href="{{ route('movies.now_showing_slug',$film->slug) }}">
                                                        <img src="{{ asset('storage/'.$film->images->first()->full) }}" alt="movie"  width="255px" height="375px">
                                                    </a>
                                                @else
                                                    <a href="{{ route('movies.now_showing_slug',$film->slug) }}">
                                                        <img src="https://via.placeholder.com/176" alt="movie" width="255px" height="375px">
                                                    </a>
                                                @endif
                                                
                                            </div>
                                            <div class="movie-content bg-one">
                                                <h5 class="title m-0">
                                                    <a href="{{ route('movies.now_showing_slug',$film->slug) }}">{{ $film->film_name }}</a>
                                                </h5>
                                                <p>Category: 
                                                    @foreach ($film->categories as $category)
                                                        <span class="badge badge-info">{{ $category->name }}</span>
                                                    @endforeach
                                                </p>
                                                <p>
                                                    Duration: {{$film->duration}} minutes
                                                </p>
                                                <p>
                                                    Date Release {{$film->date_release}}
                                                </p>
                                                <ul class="movie-rating-percent">
                                                    <li>
                                                        <div class="thumb">
                                                            <img src="{{asset('assets_client/images/movie/tomato.png')}}" alt="movie">
                                                        </div>
                                                        <span class="content">88%</span>
                                                    </li>
                                                    <li>
                                                        <div class="thumb">
                                                            <img src="{{asset('assets_client/images/movie/cake.png')}}" alt="movie">
                                                        </div>
                                                        <span class="content">88%</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>No Film found in {{ $film->film_name }}.</p>
                                @endforelse
                                
                            </div>
                        </div>
                        {{-- Movies List --}}
                        <div class="tab-item">
                            <div class="movie-area mb-10">
                                @forelse ($films as $film)
                                <div class="movie-list">
                                    <div class="movie-thumb c-thumb">
                                        @if ($film->images->count() > 0)
                                        <a href="{{route('movies.now_showing_slug',$film->slug)}}" class="w-100 bg_img h-100" data-background="{{ asset('storage/'.$film->images->first()->full) }}">
                                            <img class="d-sm-none" src="{{ asset('storage/'.$film->images->first()->full) }}" alt="movie">
                                        </a>
                                        @else
                                        <a href="{{route('movies.now_showing_slug',$film->slug)}}" class="w-100 bg_img h-100" data-background="https://via.placeholder.com/176">
                                            <img class="d-sm-none" src="https://via.placeholder.com/176" alt="movie">
                                        </a>
                                        @endif
                                        
                                    </div>
                                    <div class="movie-content bg-one">
                                        <h5 class="title">
                                            <a href="{{route('movies.now_showing_slug',$film->slug)}}">{{$film->film_name}}</a>
                                        </h5>
                                        <p class="duration">{{$film->duration}} minutes</p>
                                        <div class="movie-tags">
                                            @foreach ($film->categories as $category)
                                                <a href="#0">{{$category->name}}</a>
                                            @endforeach
                                        </div>
                                        <div class="release">
                                            <span>Release Date : </span> <a href="#0"> {{$film->date_release}}</a>
                                        </div>
                                        <ul class="movie-rating-percent">
                                            <li>
                                                <div class="thumb">
                                                    <img src="{{asset('assets_client/images/movie/tomato.png')}}" alt="movie">
                                                </div>
                                                <span class="content">88%</span>
                                            </li>
                                            <li>
                                                <div class="thumb">
                                                    <img src="{{asset('assets_client/images/movie/cake.png')}}" alt="movie">
                                                </div>
                                                <span class="content">88%</span>
                                            </li>
                                        </ul>
                                        <div class="book-area">
                                            <div class="book-ticket">
                                                <div class="react-item">
                                                    <a href="#0">
                                                        <div class="thumb">
                                                            <img src="{{asset('assets_client/images/icons/heart.png')}}" alt="icons">
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="react-item mr-auto">
                                                    <a href="#0">
                                                        <div class="thumb">
                                                        <img src="{{asset('assets_client/images/icons/book.png')}}" alt="icons">
                                                        </div>
                                                        <span>book ticket</span>
                                                    </a>
                                                </div>
                                                <div class="react-item">
                                                    <a href="#0" class="popup-video">
                                                        <div class="thumb">
                                                            <img src="{{asset('assets_client/images/icons/play-button.png')}}" alt="icons">
                                                        </div>
                                                        <span>watch trailer</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    <p>No Film found in {{ $film->film_name }}.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="pagination-area text-center">
                        <a href="#0"><i class="fas fa-angle-double-left"></i><span>Prev</span></a>
                        <a href="#0">1</a>
                        <a href="#0">2</a>
                        <a href="#0" class="active">3</a>
                        <a href="#0">4</a>
                        <a href="#0">5</a>
                        <a href="#0"><span>Next</span><i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Movie-Section========== -->

@endsection