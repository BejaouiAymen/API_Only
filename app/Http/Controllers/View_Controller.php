<?php

namespace App\Http\Controllers;
use App\Pub;
use App\Image;
use App\Video;
use App\Bank;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
class View_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	Carbon::setLocale('fr');
    	$value=Carbon::now();
		$date=Carbon::parse($value)->format('Y-m-d');
		$day=Carbon::parse($value)->isoFormat('dddd');
		/*$pub=Pub::first();
    	$image=Image::first();
    	$video=Video::first();
		$bank=Bank::get();
		//return $bank;*/
		//$json = json_decode(file_get_contents('https://restcountries.eu/rest/v2/name/tunisia?fullText=true'), true);
		$json2=json_decode(file_get_contents('https://api.ratesapi.io/api/latest?base=USD'),true);
		//$coll=$json[0];
		$k=$json2['rates'];
		//return $json2['rates']['GBP'];
		$i=0;
		foreach ($k as $key => $value) {
			if($key[0]=='E'){
				$json3=json_decode(file_get_contents("https://restcountries.eu/rest/v2/alpha/fr"),true);	
			}else{
			$json3=json_decode(file_get_contents("https://restcountries.eu/rest/v2/alpha/$key[0]$key[1]"),true);}
			
			$k1[$i]=$json3['currencies'];
			$i++;
		}
		return view("Currencies",compact('k','k1'));
    	//return view("new_file",compact("pub","image","video"));
    	//return view("WelcomeSlider");
  		$admin=Video::get();
		if($admin->isEmpty()){
		$model=new Video;
		$model->id=1;
		$model->name='write your name';
		$model->texte='write your texte';
		$model->image=0;
		$model->video='j';
		$model->col=0;
		$model->ligne=0;
		$model->taille=50;
		$model->colorbot="#777";
		$model->colortop="#666";
		$model->table="#ff4000";
		$model->save();
		}
  		$model=Video::first();
		$table=Image::get();
		$image=Bank::get();
		
    	return view("index",compact("model","table","image","date","day"));
	
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$model=Video::first();
    	return view("WelcomeSlider",compact("model"));
    }
	
	public function create2()
    {
    	
		$model=Video::first();
		$tab=Image::get();
		return view("Table",compact("model","tab"));
	}
	
 	public function store2(Request $request)
    {
		Image::truncate();
   		$model=Video::first();
		$k=$model->col*$model->ligne;
		$model->table=request('color');
		$model->save();
		for ($i=1; $i <= $k; $i++) {
			$x=new Image(); 
			$tab[$i]=request($i);
			if($tab[$i]){
			$x->image=$tab[$i];
			}else{
				$x->image="0";
			}
			$x->save();
		}
		if($model->image==0){
			return redirect("/view");				
		}
		return redirect("/image");	
    }
	
	public function create3()
    {
    	
		$model=Video::first();
    	return view("image",compact("model"));
	}
	
 	public function store3(Request $request)
    {
		Bank::truncate();
   		$model=Video::first();
		for ($i=1; $i <= $model->image; $i++) {
			$x=new Bank(); 
			$image="image$i.jpg";
			$path = $request->file($i)->storeAs('public', $image);
			$tab[$i]="/storage/$image";
			$x->image=$tab[$i];
			$x->save();
		}
	return redirect("/view");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
   	    Bank::truncate();
		if($request->file){
		 $path = $request->file('filename')->storeAs('public', 'image1.jpg');
		return asset('storage/image1.jpg');
		}
        $model=Video::first();
		$this->validate(
		$request,[
		'taille'=>['required','min:1'],
		'texte'=>['required','min:3'],
		'image'=>['required','min:1'],
		'video'=>['required','min:1']		
						
		]
		);
		$kvideo=request('video');
		if($kvideo!="j"){
			$taille=100+$model->taille;
		$model->video="<iframe width='100%' height='460xp'
      src='https://www.youtube.com/embed/$kvideo?autoplay=1&loop=1&playlist=YFpX4tppcf0'>
</iframe>";}else{
			$model->video=request('video');
	
}
		$path = $request->file('logo')->storeAs('public', 'logo.png');
			$model->name="/storage/logo.png";
		$model->image=request('image');
		$model->texte=request('texte');
		$model->col=request('col');
		$model->ligne=request('ligne');
		$model->taille=request('taille');
		$model->colortop=request('color');
		
		//$model->contenu=request('contenu');
		$model->save();
		
		if(($model->col!=0)&&($model->ligne!=0))
		{
				return redirect("/list");
		}		
		if($model->image!=0){
			return redirect("/image");	
		}
		
		return redirect("/view");	
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
