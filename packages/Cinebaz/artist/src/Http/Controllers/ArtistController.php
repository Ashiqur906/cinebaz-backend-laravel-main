<?php
namespace Cinebaz\Artist\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cinebaz\Artist\Models\Artist;
use Cinebaz\Artist\Models\Occupation;
use Cinebaz\Artist\Http\Requests\ArtistRequest;
use Cinebaz\Artist\Http\Requests\OccupationRequest;
use Str;
use File;
use Illuminate\Support\Facades\Storage;
use URL;


class ArtistController extends Controller
{
     public function index(){
        return view('artist::index',[
            'artists' => Artist::orderBy('id', 'desc')->get()
        ]);
     }


     public function create(){
        
        return view('artist::create');
     }

    public function store(ArtistRequest $request){
           
            $artist = new Artist();
            $artist->fill($request->all());
            if($request->hasFile('image')){
                $artist->image =  Storage::put('artist-image', $request->file('image'));
            }
            $artist->save();  
            return redirect()->route('admin.artist.create')->with('success' , 'Data saved successfully');   

    }

    public function edit($slug){
        
        return view('artist::edit',[
            'artist'  => get_artist_row($slug)
        ]);
     }


    public function update(ArtistRequest $request , $slug){
            $artist = get_artist_row($slug);
            $old_file = $artist->image;
            $artist->fill($request->all());
            if($request->hasFile('image')){
                if ( $artist->image != null){
                    $this->deleteFile($old_file);
                }
                $artist->image = Storage::put('artist-image', $request->file('image'));
             }
            $artist->save(); 
            return redirect()->route('admin.artist.index')->with('success' , 'Data updated successfully');
    }


     public function getslug(Request $request)
    {

        $search = [
            'slug' => $request->get('slug'),
            'table' => $request->get('table'),
            'column' => $request->get('column'),
            'id' => $request->get('id')
        ];

        $getslug = dynamicslugVal($search);
        return response()->json(['slug' => $getslug]);
    }

    public function status($slug){

        $artist  = get_artist_row($slug);
        $artist->is_active = $artist->is_active == 'Yes' ? 'No' : 'Yes'; 
        $artist->save();

        return redirect()->route('admin.artist.index')->with('success' , 'Status changed successfully');

    }

    public function destroy($slug){
            $artist = get_artist_row($slug);
            $old_file = $artist->image;
            $artist->delete(); 
        return redirect()->route('admin.artist.index')->with('success' , 'Data deleted successfully');
    
    }

    public function occupationIndex(){
        return view('artist::occupation.index',[
            'occupations' => Occupation::orderBy('id','desc')->paginate(10)
        ]);
    }

    public function occupationStore(OccupationRequest $request){
        $occupation = new Occupation();
        $occupation->fill($request->all());
        $occupation->save();
        return redirect()->route('admin.artist.occupation')->with('success' , 'Data stored successfully');
             
                        
    }

    public function occupationUpdate(OccupationRequest $request , $id){
        $occupation = Occupation::findOrFail($id);
        $occupation->fill($request->all());
        $occupation->save();
        return redirect()->route('admin.artist.occupation')->with('success' , 'Data updated successfully');

    }

    public function occupationDestroy($id){
        $occupation = Occupation::findOrFail($id); 
        $occupation->delete();
        return redirect()->route('admin.artist.occupation')->with('success' , 'Data deleted successfully');
    }

    private function deleteFile($path)
    {         
       if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }

  
}
?>