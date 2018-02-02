<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Events\TestEvent;
use Pusher\Pusher;

class HomeController extends Controller
{
    public function index(){
        
        $file_path = public_path('testLink/test.txt');
        $fp = fopen($file_path, 'w');
        fwrite($fp, 'clean');
        fclose($fp);
        echo 'a' . (file_get_contents($file_path)) . 'b';
        
//        User::test()->get()->first();
//        
//        $options = array(
//          'cluster' => 'ap1',
//          'encrypted' => true
//        );
//        $pusher = new Pusher(
//          '722308b6b23bb6a1f369',
//          '5d5b9924b85270e8b5fb',
//          '458385',
//          $options
//        );
//
//        $data['message'] = 'hello world';
//        $pusher->trigger('private-user', 'TestEvent', $data);
//        
//        return view('welcome');
        
    }

    public function api()
    {
        $url = "https://requestb.in/w6atc5w6";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, 'test:abc');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        echo $response;
        curl_close($ch);
    }

}
