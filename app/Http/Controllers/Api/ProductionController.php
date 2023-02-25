<?php

namespace App\Http\Controllers\Api;

use App\Models\Favorate;
use App\Models\Production;
use Illuminate\Routing\Controller;


use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class ProductionController extends Controller
{
    public function getAllProducts(){
    $getAllProducts=Production::get();
        return response()->json(['products'=>$getAllProducts,'status'=>'ok', ], 200);
    }
    public function getTopFive(){
        $products=Production::orderBy('voteAverage','DESC')->limit(5)->get();
            return response()->json(['products'=>$products,'status'=>'ok', ], 200);
    }
    public function getProductsPagination(){
            $getAllProducts=Production::simplePaginate(10);
                return response()->json(['products'=>$getAllProducts,'status'=>'ok', ], 200);
    }
    public function add_favorite_movie(Request $request){
        $token =$token = PersonalAccessToken::findToken($request->token);
        $user = $token->tokenable;
        $favorate=new Favorate();
        $favorate->user_id=$user->id;
        $favorate->production_id=$request->production_id;
        $favorate->save();
        return response()->json(['message'=>'added successfully','status'=>'ok' ], 200);
    }
    public function delete_movie(Request $request){
        $token =$token = PersonalAccessToken::findToken($request->token);
        $user = $token->tokenable;
        Favorate::where('user_id',$user->id)->where('production_id',$user->production_id)->delete();
        return response()->json(['message'=>'deleted successfully','status'=>'ok' ], 200);
    }
    public function list_favorate(Request $request){
        $token =$token = PersonalAccessToken::findToken($request->token);
        $user = $token->tokenable;
        $favorate=Favorate::where('user_id',$user->id)->get();
        return response()->json(['favorates'=>$favorate,'status'=>'ok' ], 200);
    }
    public function search(Request $request){
        $movies=Production::where('title', 'LIKE', '%'.$request->title.'%')->get();
        if($movies->isEmpty())
        return response()->json(['result'=>'not found movies or series has this title','status'=>'ok' ], 200);
        else
        return response()->json(['result'=>$movies,'status'=>'ok' ], 200);
    }
    public function details_movies(Request $request){
        $details_movie=Production::where('id',$request->movie_id)->first();
        return response()->json(['details_m'=>$details_movie,'status'=>'ok' ], 200);
    }

}
