<?php

class GuideController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $content = View::make("frontend.laundryguide.content")->render();

        return View::make('layout.main', array("content" => $content, "breadcrumbs" => array("Home" => "/", "Laundry Guide" => "")));
    }

    public function washingexperience()
    {

        $tips = Tips::join("kategori", "kategori.id", "=", "tips.id_kategori")
            ->where("kategori.tipe", "=", "laundryguide")
            ->where("kategori.id", "=", "1")
            ->selectRaw("tips.id as id,
				                tips.photo as photo,
				                tips.judul as judul,
								tips.desc as tipsdesc,
								tips.isi as isi,
								tips.created_at as created_at,
								kategori.nama as namakategori, kategori.nama as nama_kategori,kategori.small_image, kategori.large_image")
            ->orderBy("tips.created_at", "desc")->paginate(10);
        if (Agent::isMobile())
        {
            $content = View::make("frontend.laundryguide.mcontent_1", array("tips" => $tips, "kategori" => "washingexperience"))->render();
        } else
        {
            $content = View::make("frontend.laundryguide.content_1", array("tips" => $tips, "kategori" => "washingexperience"))->render();

        }

        return View::make('layout.main', array("content" => $content, "breadcrumbs" => array("Home" => "/", "Laundry Guide" => "/guide", "Washing Experience" => "")));

    }

    public function amazingresult()
    {

        $tips = Tips::join("kategori", "kategori.id", "=", "tips.id_kategori")
            ->where("kategori.id", "=", "2")
            ->selectRaw("tips.id as id,
				                tips.photo as photo,
				                tips.judul as judul,
								tips.desc as tipsdesc,
								tips.isi as isi,
								tips.created_at as created_at,
								kategori.nama as namakategori, kategori.nama as nama_kategori,kategori.small_image, kategori.large_image")
            ->orderBy("tips.created_at", "desc")->paginate(10);
        if (Agent::isMobile())
        {
            $content = View::make("frontend.laundryguide.mcontent_1", array("tips" => $tips, "kategori" => "amazingresult"))->render();
        } else
        {
            $content = View::make("frontend.laundryguide.content_1", array("tips" => $tips, "kategori" => "amazingresult"))->render();

        }

        return View::make('layout.main', array("content" => $content, "breadcrumbs" => array("Home" => "/", "Laundry Guide" => "/guide", "Amazing Result" => "")));

    }

    public function allaboutfabric()
    {

        $tips = Tips::join("kategori", "kategori.id", "=", "tips.id_kategori")
            ->where("kategori.tipe", "=", "laundryguide")
            ->where("kategori.id", "=", "3")
            ->selectRaw("tips.id as id,
				                tips.photo as photo,
				                tips.judul as judul,
								tips.desc as tipsdesc,
								tips.isi as isi,
								tips.created_at as created_at,
								kategori.nama as namakategori, kategori.nama as nama_kategori,kategori.small_image, kategori.large_image")
            ->orderBy("tips.created_at", "desc")->paginate(10);

        if (Agent::isMobile())
        {
            $content = View::make("frontend.laundryguide.mcontent_1", array("tips" => $tips, "kategori" => "allaboutfabric"))->render();
        } else
        {
            $content = View::make("frontend.laundryguide.content_1", array("tips" => $tips, "kategori" => "allaboutfabric"))->render();

        }

        return View::make('layout.main', array("content" => $content, "breadcrumbs" => array("Home" => "/", "Laundry Guide" => "/guide", "All About Fabric" => "")));

    }

    public function tipstrik()
    {

        $tips = Tips::join("kategori", "kategori.id", "=", "tips.id_kategori")
            ->where("kategori.tipe", "=", "laundryguide")
            ->where("kategori.id", "=", "4")
            ->selectRaw("tips.id as id,
				                tips.photo as photo,
				                tips.judul as judul,
								tips.desc as tipsdesc,
								tips.isi as isi,
								tips.created_at as created_at,
								kategori.nama as namakategori, kategori.nama as nama_kategori,kategori.small_image, kategori.large_image")
            ->orderBy("tips.created_at", "desc")->paginate(10);
        if (Agent::isMobile())
        {
            $content = View::make("frontend.laundryguide.mcontent_1", array("tips" => $tips, "kategori" => "tipstrik"))->render();
        } else
        {
            $content = View::make("frontend.laundryguide.content_1", array("tips" => $tips, "kategori" => "tipstrik"))->render();

        }


        return View::make('layout.main', array("content" => $content, "breadcrumbs" => array("Home" => "/", "Laundry Guide" => "/guide", "Tips & Tricks" => "")));

    }

    public function showTips($kategori, $tahun, $id, $judul)
    {

        $this->layout = null;
        $url = "/thread/" . $tahun . "/" . $id . "/" . $judul;
        $judul = ArtikelController::getJudul($judul);
        $tips = Tips::where("tips.id", "=", $id)
            ->join("kategori", "kategori.id", "=", "tips.id_kategori")
            ->where("kategori.tipe", "=", "laundryguide")
            ->selectRaw("tips.id as id, tips.id_user as id_user ,
					  tips.judul as judul, tips.isi as isi, 
					  tips.photo as photo,tips.created_at as created_at, 
					  tips.updated_at as updated_at, kategori.nama as nama_kategori, kategori.id as id_kategori, 
					  kategori.small_image, kategori.large_image, kategori.id as idkategori")
            ->first();
        $datakategori = "";
        switch ($kategori)
        {
            case "washingexperience":
                $datakategori = "Washing Experience";
                break;
            case "amazingresult":
                $datakategori = "Amazing Result";
                break;
            case "allaboutfabric":
                $datakategori = "Allabout Fabric";
                break;
            case "tipstrik":
                $datakategori = "Tips & Trik";
                break;

        }
        Tips::where("tips.id", "=", $id)
            ->where("judul", "like", "%" . $judul . "%")->increment("viewer", 1);
        $content = View::make("frontend.laundryguide.contentshow", array("tips" => $tips, "kategori" => $kategori))->render();

        return View::make('layout.main', array("content" => $content, "breadcrumbs" => array("Home" => "/", "Laundry Guide" => "/guide", $datakategori => "/guide")));
    }

    public static function getTipsRelated($id)
    {


        return Tips::join("kategori", "kategori.id", "=", "tips.id_kategori")
            ->where("kategori.tipe", "=", "laundryguide")
            ->where("kategori.id", "=", $id)
            ->selectRaw("tips.id as id, tips.id_user as id_user ,
					  tips.judul as judul, tips.isi as isi, 
					  tips.photo as photo,tips.created_at as created_at, 
					  tips.updated_at as updated_at, kategori.nama as nama_kategori, 
					  kategori.small_image, kategori.large_image, kategori.id as idkategori")
            ->orderBy(DB::raw('RAND()'))->limit(2)->get();


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
