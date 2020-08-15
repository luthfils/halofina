<?php

require 'vendor/autoload.php';
use Halofina\Calculator\Financial;
use Halofina\Verify\Mail;
use Halofina\Verify\Password;

Flight::route('/', function(){
    Flight::render('indexV2', array(), 'body');
    Flight::render('layout', array());
});

Flight::route('/verify/@param', function($param){
    Mail::routingVerif($param);
});

Flight::route('/reverify/@param', function($param){
    Mail::routingReverif($param);
});

Flight::route('/verify/password/@param', function($param) {
    Password::routing($param);
});


Flight::route('/job/@page', function($page){
    Flight::render('job/'.$page, array(), 'body');
    Flight::render('job/layout', array('title' => $page));
});

// Response format
Flight::map("output", function($data = array()){
    echo json_encode(array(
        "s" => 200,
        "d" => $data,
    ));
});

// Handle error
Flight::map("error", function($e){
    echo json_encode(array(
        "s" => 500,
        "m" => $e->getMessage()
    ));
});

// API for calculate
Flight::route('/api/calculator', function(){
    $calculator = new Financial();
    $result = $calculator->result($_REQUEST);

    Flight::output($result);
});

Flight::route('/download/@os', function($os){
    if ($os=='android') {
        Flight::redirect('https://play.google.com/store/apps/details?id=com.halofina.lite');
    }else if($os == 'ios') {
        Flight::redirect('https://itunes.apple.com/us/app/halofina/id1416490843?l=id&ls=1&mt=8');
    }

});

Flight::route('/rekomendasi', function(){
    Flight::redirect('http://onelink.to/ewvk72');
});

Flight::route('/@page', function($page){
    Flight::render($page, array(), 'body');
    Flight::render('layout', array('title' => $page));
});

Flight::start();