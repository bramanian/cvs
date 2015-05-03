<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');

Route::get("/", "HomeController@home");
Route::get("/event", function ()
{
    $content = View::make("frontend.smartmom.event", array("breadcrumbs" => array("Home" => "/", "Indonesia Fashion Weeks 2015" => "/event")))->render();

    return View::make("layout.main", array("content" => $content));

});

Route::get("/momofthemom/vincensia", function ()
{
    $content = View::make("frontend.smarttips.vincensia", array("breadcrumbs" => array("Home" => "/", "vincensia" => "/vincensia")))->render();

    return View::make("layout.main", array("content" => $content));

});


Route::get("/home/bantuan", "HomeController@bantuan");


Route::get('smart/thread/{id}', "SmartController@searchKategori");
Route::get("thread/all", "ArtikelController@showAllThread");
Route::get("smart/tag/{id}", "ArtikelController@showTag");
Route::get("smart/kategori/{id}", "ArtikelController@showKategori");
Route::get("smart/search/{id}", "ArtikelController@search");
Route::controller('smart', "SmartController");


Route::controller('zone', "ZoneController");
Route::get("tips/search/{id}", "TipsController@search");
Route::get("tips/kategori/{judul}", "TipsController@showKategori");
Route::get("tips/{date}/{id}/{judul}", "TipsController@showTips");
Route::get("tips/tag/{id}", "TipsController@showTag");
Route::controller('/tips', "TipsController");


Route::get("batik/search/{id}", "BatikController@search");
Route::get("batik/{date}/{id}/{judul}", "BatikController@showTips");
Route::get("batik/tag/{id}", "BatikController@showTag");
Route::controller('/batik', "BatikController");

/* Route::get('/batik', function()
{
	
    $content=View::make("frontend.batik.content")->render();
	 return View::make('layout.main',array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","Smart Zone"=>"/zone","Batik"=>"")));
}); */

Route::get("promoevent/search/{id}", "PromoeventController@search");
Route::get("promoevent/{date}/{id}/{judul}", "PromoeventController@showTips");
Route::get("promoevent/tag/{id}", "PromoeventController@showTag");
Route::controller('/promoevent', "PromoeventController");


/* Route::get('/promodanevent', function()
{
	
    $content=View::make("frontend.promodanevent.content")->render();
	 return View::make('layout.main',array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","Smart Zone"=>"/zone","Promo dan Event"=>"")));
});
 */


Route::get('/guide', "GuideController@index");
Route::get('/guide/washingexperience', "GuideController@washingexperience");
Route::get('/guide/amazingresult', "GuideController@amazingresult");
Route::get('/guide/allaboutfabric', "GuideController@allaboutfabric");
Route::get('/guide/tipstrik', "GuideController@tipstrik");
Route::get("guide/{kategori}/{date}/{id}/{judul}/", "GuideController@showTips");


Route::get('/produk/old', function ()
{
    $content = View::make("frontend.produk.content_1")->render();

    return View::make('layout.main', array("content" => $content, "breadcrumbs" => array("Home" => "/", "Smart Zone" => "/zone", "Produk" => "")));
});

Route::get('/produk', function ()
{

    if (Agent::isMobile())
    {
        $content = View::make("frontend.produk.mcontent")->render();
    } else
    {
        $content = View::make("frontend.produk.content")->render();
    }

    return View::make('layout.main', array("content" => $content, "breadcrumbs" => array("Home" => "/", "Attack Zone" => "/zone", "Produk Attack" => "")));
});

Route::get('/produk/data', function ()
{

    return json_encode(Produks::orderBy("id", "asc")->get());
});

Route::get('/tvc', function ()
{

    if (Agent::isMobile())
    {
        $content = View::make("frontend.tvc.mcontent")->render();
    } else
    {

        $content = View::make("frontend.tvc.content")->render();
    }

    return View::make('layout.main', array("content" => $content, "breadcrumbs" => array("Home" => "/", "Attack Zone" => "/zone", "TVC Attack" => "")));
});


Route::get('/activationpage', function ()
{

    $content = View::make("frontend.activationpage.content")->render();

    return View::make('layout.main', array("content" => $content, "breadcrumbs" => array("Home" => "/", "Smart Zone" => "/zone", "Activation Page" => "")));
});


Route::resource("/home/komentar", "KomentarController");
Route::resource("/home/notification", "NotificationController");


Route::group(array('before' => 'isprofile'), function ()
{
    Route::get('/home/profile/create', "HomeController@create");
    Route::post('/home/profile/create', "HomeController@store");

});
Route::get("/home/edit", "HomeController@edit");
Route::post("/home/update", "HomeController@update");
Route::get("/home/leaderboard", "HomeController@leaderboard");

Route::group(array('before' => 'cekprofile'), function ()
{
    Route::get('/home', "HomeController@index");

    Route::resource("/home/thread", "ArtikelController");
    Route::post("/home/thread/{id}/update", "ArtikelController@update");
    Route::get("/home/thread/{id}/delete", "ArtikelController@destroy");

    /*==================================================================*/
    Route::resource("/home/file_photo", "PhotoController");
    Route::any("/home/file_photo/profile", "PhotoController@uploadProfile");

//

});

Route::group(array('before' => 'auth'), function ()
{


    Route::get("/thread/{date}/{id}/{judul}/komentar", "KomentarController@komentarThread");
    Route::get("/thread/{date}/{id}/{judul}/postreply", "KomentarController@getReply");
    Route::get("/thread/{date}/{id}/{judul}/komentar/{idkomentar}/rekomentar", "KomentarController@komentarThreadReplay");
    Route::any("/komentar/add/{id}/postreply", "KomentarController@postReply");
    Route::any("/komentar/add/{id}", "KomentarController@addKomentar");
    Route::any("/komentar", "KomentarController@index");
    Route::any("/komentar/rekomentar/{id}", "KomentarController@reKomentar");

//

});
Route::get("/thread/{date}/{id}/{judul}", "ArtikelController@showThread");
Route::any("home/komentar/{id}/show", "NotificationController@showKomentar");
Route::any("home/komentar/{id}/{idtulisan}/show", "KomentarController@showKomentar2");
Route::any("home/komentar/{id}/{idtulisan}/edit", "KomentarController@editKomentar");
Route::any("home/komentar/{id}/{idtulisan}/delete", "KomentarController@destroy");
Route::any("home/komentar/{id}/created", "KomentarController@createKomentar");


Route::post("/kota", function ()
{

    if (Input::get("id") != null)
    {
        $kota = Kota::where("provinsi_id", "=", Input::get("id"))->orderBy("name", "asc")->get();
        echo json_encode($kota);


    } else
    {

        echo "";
    }

});

Route::post("/thread/rating", function ()
{
    $data["status"] = "";
    $data["message"] = "";
    if (Auth::check())
    {

        $rating = Rating::where("id_user", "=", Auth::id())
            ->where("tipe", "=", "artikel")
            ->where("id_tulisan", "=", Input::get("id"))->count();

        if ($rating != 0)
        {
            $rating = Rating::where("id_user", "=", Auth::id())
                ->where("tipe", "=", "artikel")
                ->where("id_tulisan", "=", Input::get("id"))
                ->update(array("jumlah" => Input::get("value")));
            $rating = Rating::where("tipe", "=", "artikel")
                ->where("id_tulisan", "=", Input::get("id"))
                ->selectRaw("sum(jumlah) as jumlah, count(*) as votes, (sum(jumlah)/count(*)) as rata_")->first();
            $data["status"] = "success";
            $data["jumlah"] = $rating->jumlah;
            $data["votes"] = $rating->votes;
            $data["rata"] = $rating->rata_;
            echo json_encode($data);
        } else
        {
            $rating = new Rating();
            $rating->jumlah = Input::get("value");
            $rating->id_user = Auth::id();
            $rating->tipe = "artikel";
            $rating->id_tulisan = Input::get("id");
            if ($rating->save())
            {
                $rating = Rating::where("tipe", "=", "artikel")
                    ->where("id_tulisan", "=", Input::get("id"))
                    ->selectRaw("sum(jumlah) as jumlah, count(*) as votes, (sum(jumlah)/count(*)) as rata_")->first();
                $data["status"] = "success";
                $data["jumlah"] = $rating->jumlah;
                $data["votes"] = $rating->votes;
                $data["rata"] = $rating->rata_;
                echo json_encode($data);

            } else
            {
                $data["status"] = "gagal";
                $data["message"] = "gagal di simpan";
                echo json_encode($data);
            }

        }
    } else
    {

        $data["status"] = "notlogin";
        $data["message"] = "";
        echo json_encode($data);
    }


});
Route::get("facebook", function ()
{

    $idfacebook = "195784980453175";
    $json_file = @file_get_contents("https://graph.facebook.com/v2.2/$idfacebook?fields=id,posts&limit=6&access_token=818837808140936|nApDRqqg8UuE2w_hfvPszh5TzEE");
    $jfo = json_decode($json_file);
    $datatemp = array(array());
    $n = 0;
    $nn = 0;
    if (isset($jfo))
    {
        foreach ($jfo->posts->data as $data)
        {

            if (isset($data->picture) && isset($data->message))
            {
                if ($data->status_type == "added_photos")
                {

                    $json_image = @file_get_contents("http://graph.facebook.com/" . $data->object_id . "?fields=images");
                    $jf1 = json_decode($json_image);
                    if (isset($jf1))
                    {
                        if (isset($jf1->images[0]->source))
                        {
                            $datatemp[$nn]["pesan"] = $data->message;
                            $datatemp[$nn]["id"] = $data->id;
                            $datatemp[$nn]["image"] = $jf1->images[0]->source;
                            $nn++;

                        }
                    }

                }
            }

            $n++;
        }
        echo json_encode($datatemp);
    }
});

Route::get('/contactus', 'ContactController@contactus');

// Confide routes

Route::group(array('before' => 'auth'), function()
{
    Route::get('elfinder', 'Barryvdh\Elfinder\ElfinderController@showIndex');
    Route::any('elfinder/connector', 'Barryvdh\Elfinder\ElfinderController@showConnector');
    Route::get('elfinder/ckeditor4', 'Barryvdh\Elfinder\ElfinderController@showCKeditor4');
});
