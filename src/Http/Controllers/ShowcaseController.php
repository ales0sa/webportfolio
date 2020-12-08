<?php

namespace Ales0sa\WebPortfolio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Laravel\Jetstream\Contracts\CreatesTeams;
use Laravel\Jetstream\RedirectsActions;
use Illuminate\Validation\Rule;

use Ales0sa\WebPortfolio\Webs;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

use Redirect;

class ShowcaseController extends Controller
{

	use RedirectsActions;
    //
    public function index(){

    	$data = Webs::get()->shuffle();

    	return Inertia::render('WebPortfolio/Web/Index',
    		['webs' => $data ]
    		);


    }

    public function list(){
    	$data = Webs::get();
    	return Inertia::render('WebPortfolio/Web/List',
    		['webs' => $data ]
    		);
    }

    public function destroy(Request $request, $tokenId)
    {
        Webs::where('id', $tokenId)->delete();
        return back(303);
    }

    public function create(Request $request){

    	$techs = [ 'php', 'js', 'vue', 'laravel' ];

    	return Inertia::render('WebPortfolio/Web/Create',
    		['availableTechnologies' => $techs ]
    		);

    }

    public function store(Request $request)
    {

    	$input = $request->all();


        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255', 'unique:webs'],
            'photo' => ['required', 'image', 'max:1024'],
        ])->validateWithBag('createWeb');


		$path = $request->file('photo')->storePublicly('webs', 'public');
        Webs::create([
            'name' => $request->name,
            'url'  => $input['url'],
            'photo'=> $path,
        ]);
        return Redirect::route('webs.create');

    }

}
