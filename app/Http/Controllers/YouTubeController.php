<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;
class YouTubeController extends Controller
{
    public function index()
    {
        if(session('search_query')) {

            $videoLists = $this->_videoLists(session('search_query'));

        } else  {

            $videoLists = $this->_videoLists('Laravel Chat');
        }

        return view('index',compact('videoLists'));
    }

    public function results(Request $request)
    {
        session(['search_query' => $request->search_query]);
        $videoLists = $this->_videoLists($request->search_query);
        return view('results', compact('videoLists'));
    }

    public function watch($id){
        $singleVideo = $this->_singleVideo($id);
        if(session('search_query')) {

            $videoLists = $this->_videoLists(session('search_query'));

        } else  {

            $videoLists = $this->_videoLists('Laravel Chat');
        }
        return view('watch',compact('singleVideo','videoLists'));
    }

    //we will search result here
    protected function _videoLists($keywords)
    {
        $part= 'snippet';
        $country = 'BD';
        $apiKey = config('services.youtube.api_key');
        $maxResults = 12;
        $youTubeEndPoint = config('services.youtube.search_endpoint');
        $type = 'video';

        $url = "$youTubeEndPoint?part=$part&maxResults=$maxResults&regionCode=$country&type=$type&key=$apiKey&q=$keywords";

        $response = Http::get($url);
        $results = json_decode($response);
        //we will create to json file to see our response
        File::put(storage_path().'/app/public/results.json',$response->body());
        return $results;
    }

    protected function _singleVideo($id)
    {
        $apiKey = config('services.youtube.api_key');
        $part = 'snippet';
        $url ="https:://www.googleapis.com/youtube/v3/videos?part=snippet&id=$id&key=$apiKey";
        $response = Http::get($url);
        $results = json_decode($response);
        // will create to json file to see our single video details
        File::put(storage_path(). '/app/public/single.json', $response->body());

        return $results;
    }
}
