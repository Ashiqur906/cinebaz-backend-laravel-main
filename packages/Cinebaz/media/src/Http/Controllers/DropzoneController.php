<?php

namespace Cinebaz\Media\Http\Controllers;

use App\Http\Controllers\Controller;
use Cinebaz\Media\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DropzoneController extends Controller
{


    function upload(Request $request)
    {

        // Get file from request
        $file = $request->file('file');
        $name = $request->get('name');

        // Get filename with extension
        $filenameWithExt = $file->getClientOriginalName();

        // Get file path
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // Remove unwanted characters
        $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
        $filename = preg_replace("/\s+/", '-', $filename);

        // Get the original image extension
        $extension = $file->getClientOriginalExtension();

        // Create unique file name
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

        // Refer image to method resizeImage
        $save = $this->resizeImage($file, $fileNameToStore, $request);

        return $save;
    }

    /**
     * Resizes a image using the InterventionImage package.
     *
     * @param object $file
     * @param string $fileNameToStore
     * @author Niklas Fandrich
     * @return bool
     */
    public function resizeImage($file, $fileNameToStore, $request)
    {
        $date = date('Y-m');
        $folder_name = str_replace(':', '', $date);
        $name = $request->get('name');
        $size = $request->get('size');
        $attributes = [
            'imageable_id' => $request->id,
            'imageable_type' => 'Cinebaz\Media\Models\Media',
            'name' => null,
            'file_name' => null,
            'image_type' => $request->type,
            'mime_type' => null,
            'remarks' => null,
            'sort_by' => null,
            'is_active' => 'Yes',
            'modified_by' => auth('web')->user()->id,
        ];
        if ($size == 'Portrait') {
            $sizes = [
                'small' => [260, 390],
                'medium' => [520, 780],
                'full' => [1020, 1560],
                'thumbnail' => [300, 300],
            ];
        } else {
            $sizes = [
                'small' => [418, 235],
                'medium' => [836, 470],
                'full' => [1672, 940],
                'thumbnail' => [300, 300],
            ];
        }
        if ($size == 'square') {
            $sizes = [
                'small' => [260, 260],
                'medium' => [520, 520],
                'full' => [1020, 1020],
                'thumbnail' => [300, 300],
            ];
        }


        foreach ($sizes as $key => $size) {
            // Resize image
            $resize = Image::make($file)->fit($size[0], $size[1])->encode('jpg');
            // Create hash value
            $hash = md5($resize->__toString());
            // Prepare qualified image name
            $image = $hash . "jpg";
            // Put image to storage
            $save = Storage::put("public/dropzon/{$folder_name}/{$key}/{$fileNameToStore}", $resize->__toString());

            if ($save) {
                $attributes[$key] = "dropzon/{$folder_name}/{$key}/{$fileNameToStore}";
            }
        }


        // dd($attributes);
        $insert = Picture::create($attributes);

        $img = '<div class="drop_img '. (($request->type == 0)? 'multi': '' ).'">';
        $img .= '<img src="' . asset('storage/' . $insert->small) . '" class="img-thumbnail" />';
        $img .= '<input name="' . $name . '[]" type="hidden" value="' . $insert->id . '">';
        $img .= '<button type="button" class="btn btn-danger remove_image" data-name="' . $insert->id . '">Remove</button>';
        $img .= '</div>';

        $input = '<input name="' . $name . '[]" type="hidden" value="' . $insert->id . '">';

        //dd(['success' => $data, 'img' => $img, 'input' => $input]);

        return response()->json(['success' => $insert->id, 'img' => $img, 'input' => $input]);
    }
    function upload2(Request $request)
    {


        $image = $request->file('file');
        $name = $request->get('name');
        // open file a image resource

        //start Folder create 
        $date = date('Y-m');
        $folder_name = str_replace(':', '', $date);
        if (!is_dir(public_path('uploads/dropzon/') . $folder_name)) {
            mkdir(public_path('uploads/dropzon/') . $folder_name, 0777, TRUE);
        }
        $raw_path = 'uploads/dropzon/' . $folder_name;
        $upload_path = public_path($raw_path);
        //end Folder create 

        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());

        $img->resize(10, 10, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save($upload_path . '/' . $input['imagename']);


        $image->move($upload_path, $input['imagename']);
        //dd($imageName);
        $data = $raw_path . '/' . $input['imagename'];


        $img = '<div class="drop_img">';
        $img .= '<img src="' . asset($data) . '" class="img-thumbnail" />';
        $img .= '<input name="' . $name . '[]" type="hidden" value="' . $data . '">';
        $img .= '<button type="button" class="btn btn-danger remove_image" data-name="' . $data . '">Remove</button>';
        $img .= '</div>';
        $input = '<input name="' . $name . '[]" type="hidden" value="' . $data . '">';
        //dd(['success' => $data, 'img' => $img, 'input' => $input]);

        return response()->json(['success' => $data, 'img' => $img, 'input' => $input]);
    }

    function fetch()
    {
        $images = \File::allFiles(public_path('images/dropzon'));
        $output = '<div class="row">';
        foreach ($images as $image) {
            $output .= '
      <div class="col-md-2" style="margin-bottom:16px;" align="center">
                <img src="' . asset('images/dropzon/' . $image->getFilename()) . '" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                <button type="button" class="btn btn-link remove_image" id="' . $image->getFilename() . '">Remove</button>
            </div>
      ';
        }
        $output .= '</div>';
        echo $output;
    }

    function delete(Request $request)
    {
        $image = Picture::find($request->name);

        if (Storage::exists('public/' . $image->small)) {
            Storage::delete('public/' . $image->small);
        }
        if (Storage::exists('public/' . $image->medium)) {
            Storage::delete('public/' . $image->medium);
        }
        if (Storage::exists('public/' . $image->full)) {
            Storage::delete('public/' . $image->full);
        }
        if (Storage::exists('public/' . $image->thumbnail)) {
            Storage::delete('public/' . $image->thumbnail);
        }

        $image->delete();
    }
}
