<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Element;
use Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    //Redirection
     public function RedirectToHomePage()
    {
        if(Auth::user()){
              return view('HomePage');
            }else{
              return view('auth.login');
        }
    }
    
    
    //Fonction Ajouter des Elements
    public function AjouterElement(Request $request){
    $monid = Auth::user()->id;
    $this->validate($request, [
           'titre' => 'required',
           'description' => 'required'
    ]);
    $ajouterelement = new Element;
    $ajouterelement->titre=$request->titre;
    $ajouterelement->description=$request->description;
    $ajouterelement->user_id=$monid;
    
    $image       = $request->photo;
    $extension="png";
    $code=mt_rand();
    $fileName=$code.'.'.$extension;
    $image_resize = Image::make($image);              
    $image_resize->resize(600, 600);
    $image_resize->save(public_path('/PhotoElements/' .$fileName));
   
    $ajouterelement->photo = $fileName;
    $ajouterelement->save();
	return response()->json(['etat'=> true, 'id' => $ajouterelement->id]);    
    }
    
     //Fonction Recuperer des Elements Update
    public function RecupererElementsUpdate(){
      $elements= Element::where('delete','=',0)->select('id','photo','titre','description')->orderBy('updated_at','desc')->limit(8)->get();  
   return $elements;
    }
    
    //Fonction Recuperer des Elements
    public function RecupererElements(){
      $elements= Element::where('delete','=',0)->select('id','photo','titre','description')->orderBy('updated_at','desc')->get();  
   return $elements;
    }
    
    //Fonction Supprimer des Elements
      public function SupprimerElement(Request $request){
      $supprimerelement = Element::find($request->id);
      $supprimerelement->delete=1;
      $supprimerelement->save();
	return response()->json(['etat'=> true]);
    }
    
    //Changer le Mot de passe
     public function ChangerPasse(Request $request){
      $this->validate($request, [    
        'nouveaumotdepasse' => 'required',
      ]);
      $monpasse = Auth::user()->password;
      $monid = Auth::user()->id;
      $supprimerelement = User::find($monid);
      $pass= Hash::make($request->nouveaumotdepasse);
      $supprimerelement->password = $pass;
      $supprimerelement->save();
	   return response()->json(['etat'=> true]);
    }
    
    //Deconnexion
     public function Deconnexion(Request $request)
    {
        $request->session()->flush();
        return response()->json(['etat'=> true]);
    }
    
   
}
