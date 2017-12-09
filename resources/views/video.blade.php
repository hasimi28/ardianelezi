@extends('layouts.app')

@section('head')
    <link href="{{asset('css/themes/css/sidebar-widget.css')}}" rel="stylesheet">
    <script src="{{asset('css/themes/js/jquery.tubeplayer.min.js')}}"></script>
@endsection
@section('content')
<style>
    .scrollbar-indigo::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
        background-color: #F5F5F5;
        border-radius: 5px; }

    .scrollbar-indigo::-webkit-scrollbar {
        width: 6px;
        background-color: #F5F5F5; }

    .scrollbar-indigo::-webkit-scrollbar-thumb {
        border-radius: 6px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
        background-color: #3f51b5; }
.des_2:hover{
    box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}


</style>
<div class="kode_blog_madium_wrap">
    <!--CONTAINER START-->
    <div class="container">
        <!--KODE PORTFOLIO DES DES 2 START-->

        <h4 class="sidebar_title">@foreach($cat as $c) {{$c->name}} @endforeach</h4>
        <div class="kode_portfolio_des des_2 z-depth-2">
            @if($video->count())
            <div class="col-md-7" style="margin-top:30px;">
                <div id="player"></div>
            </div>

            <div class="col-md-5 scrollbar-indigo" style="height:600px;overflow:scroll;overflow-x: hidden;" >


                    <ul class="kode_calender_detail">
                        @foreach($video as $vid)
                        <li>
                            <div class="kode_calender_list">
                                <span><img src="{{asset('css/themes/images/play.png')}}"></span>
                                <div class="kode_event_text">
                                    <h6> <a href="javascript:void(0);" class="mt-0 mb-1 video2 active" id="{{$vid->youtube_id}}"> {{$vid->title}} </a></h6>
                                    <p>Published : <span>  {{$vid->created_at->diffForHumans()}}</span></p>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>

                <div class="kode_project_share">

                    <!--KODE SOCIAL SHARE START-->

                    <!--KODE SOCIAL SHARE END-->
                </div>
            </div>
            @else
                <div style="background-color:#019b69!important;color:white;font-size:22px;padding:15px">Nuk ka asnje video !</div>
            @endif
        </div>

        <!--KODE PORTFOLIO DES DES 2 END-->


        <!--KODE PAGINATION LIST START-->

        <!--KODE PAGINATION LIST END-->
    </div>
    <!--CONTAINER END-->
</div>

    @endsection

@section('js')
    <script>
        // 2. This code loads the IFrame Player API code asynchronously.
        var tag = document.createElement('script');

        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);



        video_id = $('.video2').attr('id') ;


        // 3. This function creates an <iframe> (and YouTube player)
        //    after the API code downloads.
        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {

                videoId: video_id,
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        // 4. The API will call this function when the video player is ready.
        function onPlayerReady(event) {
            event.target.playVideo();
        }

        // 5. The API calls this function when the player's state changes.
        //    The function indicates that when playing a video (state=1),
        //    the player should play for six seconds and then stop.
        var done = false;
        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING && !done) {
                setTimeout(stopVideo, 6000);
                done = true;
            }
        }




        $('.video2').click(function(){

            video_id = $(this).attr('id') ;
            player.loadVideoById(video_id);
        });


        // 3. This function creates an <iframe> (and YouTube player)

    </script>
    @endsection