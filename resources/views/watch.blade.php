@extends('master')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-8">
                <div class="card mb-4" style="width: 100%">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="600" src="https://www.youtube.com/watch?v=wy-sWNXEgg8&t=80s{{ $singleVideo->items[0]->id }}">
                        </iframe>
                    </div>

                    <div class="card-body">
                        <h5>{{ $singleVideo->items[0]->snippet->title }}</h5>
                             <p class="text-secondary">Published at {{ date('d M Y', strtotime($singleVideo->items[0]->snippet->PublishedAt)) }}</p>

                             <p>{{ $singleVideo->items[0]->snippet->description }}</p>
                    </div>

                </div>
            </div>

            <div class="col-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <img src="https://www.talkwalker.com/images/2020/blog-headers/image-analysis.png" class="img-fluid" alt="">
                            <div class="card-body">
                                <h5>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h5>
                            </div>
                            <div class="card-footer text-muted">
                                Published at 20-11-2020
                            </div>
                        </div>

                        <div class="col-12">
                            <img src="https://www.talkwalker.com/images/2020/blog-headers/image-analysis.png" class="img-fluid" alt="">
                            <div class="card-body">
                                <h5>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h5>
                            </div>
                            <div class="card-footer text-muted">
                                Published at 20-11-2020
                            </div>
                        </div>


                        <div class="col-12">
                            <img src="https://www.talkwalker.com/images/2020/blog-headers/image-analysis.png" class="img-fluid" alt="">
                            <div class="card-body">
                                <h5>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h5>
                            </div>
                            <div class="card-footer text-muted">
                                Published at 20-11-2020
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


@endsection