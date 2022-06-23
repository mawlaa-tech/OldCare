<?php

namespace App\Http\Controllers;

use App\Models\Old;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Collection;
class OldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function __construct(){
        $this->middleware('auth');
    }*/
    public function Index()
    {
       

        $olds = Old::latest()->paginate(10);
        return view('admin.old.index', compact('olds'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddOld()
    {
        return view('admin.old.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function StoreOld(Request $request)
    {
        
        $validated = $request->validate([
            'nom' => 'required|min:3',
            'prenom' => 'required|min:3',

            
        ],
        [
        'nom.required' => 'SVP entrez le nom du pesonne',
        'prenom.required' => 'SVP entrez le image le bon type',

        'nom.min' => 'La marque plus long 4 caracters',

        ]);

 /*   $olds_image = $request->file('image');
   /* $name_gen = hexdec(uniqid());
    $img_ext =  strtolower($brand_image->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$img_ext;
    $up_location = 'image/brand/';
    $last_img = $up_location.$img_name;
    $brand_image->move($up_location,$img_name);
*/
// image intervention
/*$name_gen = hexdec(uniqid().'.'.$olds_image->getClientOriginalExtension());
Image::make($olds_image)->resize(1000,500)->save('image/old/'.$name_gen);
$last_img = 'image/old/'.$name_gen;*/

    Old::insert([
       'nom' =>$request->nom,
       'prenom' =>$request->prenom,
       'age' =>$request->age,
       'adresse' =>$request->adresse,
       'proche_number' =>$request->proche_number,
       'room_number' =>$request->room_number,
      // 'image' =>$last_img,
       'created_at' =>Carbon::now()

    ]);

    $notification = array(
           'message' => 'la personne a été ajouter!!',
           'alert-type' => 'success',

    );
    $olds = Old::latest()->paginate(10);

    return redirect()->route('show.old', $olds)->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Old  $old
     * @return \Illuminate\Http\Response
     */
    public function show(Old $old)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Old  $old
     * @return \Illuminate\Http\Response
     */
    public function EditOld($id)
    {
        $olds=Old::find($id);
      return  view('admin.old.edit', compact("olds"));   
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Old  $old
     * @return \Illuminate\Http\Response
     */
    public function UpdateOld(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|min:3',
            'prenom' => 'required|min:3',

            
        ],
        [
        'nom.required' => 'SVP entrez le nom du pesonne',
        'prenom.required' => 'SVP entrez le image le bon type',

        'nom.min' => 'La marque plus long 4 caracters',
        ]);

        

    Old::find($id)->update([
       'nom' =>$request->nom,
       'prenom' =>$request->prenom,
       'age' =>$request->age,
       'adresse' =>$request->adresse,
       'proche_number' =>$request->proche_number,
       'room_number' =>$request->room_number,
      // 'image' =>$last_img,
      'created_at' =>Carbon::now()


    ]);

    $notification = array(
           'message' => 'la personne a été modifié!!',
           'alert-type' => 'success',

    );
    $olds = Old::latest()->paginate(10);

    return redirect()->route('show.old', $olds)->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Old  $old
     * @return \Illuminate\Http\Response
     */
    public function DeleteOld($id)
    {
        Old::find($id)->delete();
        $notification = array(
                                 'message' => 'la personne a été supprimé',
                                 'alert' => 'error',
        );
        $olds = Old::latest()->paginate(10);

    return redirect()->route('show.old', $olds)->with($notification);
    }
}
