<?php

namespace Cinebaz\Media\Traits;

use Cinebaz\Media\Models\Media;
use Cinebaz\Media\Models\Picture;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


trait TPicture
{

    public function uploadImage($data)
    {

        $default = [
            'data' => null,
            'able_id' => null,
            'able_type' => null,
            'file' => 'image',
            'file_id' => null,
            'size' => null,
            'folder' => 'dropzon'
        ];

        $final = array_merge($default, $data);



        $request = $final['data'];
        if ($final['file_id']) {

             $this->delete($final['file_id']);
        }

        // Get file from request
        $file = $request->file($final['file']);
        // dd($file);

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
        $save = $this->resizeImage($file, $fileNameToStore, $final);
        // dd($save);
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
    private function resizeImage($file, $fileNameToStore, $final)
    {
        $date = date('Y-m');
        $folder_name = str_replace(':', '', $date);
        $request = $final['data'];

        $name = $request->get('name');

        $attributes = [
            'imageable_id' => $final['able_id'],
            'imageable_type' => $final['able_type'],
            'name' => null,
            'file_name' => null,
            'image_type' => 0,
            'mime_type' => null,
            'remarks' => null,
            'sort_by' => null,
            'is_active' => 'Yes',
            'modified_by' => auth('web')->user()->id,
        ];
        $sizes = $this->getSize($final['size']);


        foreach ($sizes as $key => $size) {
            // Resize image
            $resize = Image::make($file)->fit($size[0], $size[1])->encode('jpg');
            // Create hash value
            $hash = md5($resize->__toString());
            // Prepare qualified image name
            $image = $hash . "jpg";
            // Put image to storage
            $save = Storage::put("public/{$final['folder']}/{$folder_name}/{$key}/{$fileNameToStore}", $resize->__toString());

            if ($save) {
                $attributes[$key] = "{$final['folder']}/{$folder_name}/{$key}/{$fileNameToStore}";
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

        return response()->json(['success' => $insert->id, 'img' => $img, 'input' => $input]);
    }

    private function getSize($size = null)
    {
        if ($size == 'Portrait') {
            $sizes = [
                'small' => [260, 390],
                'medium' => [520, 780],
                'full' => [1020, 1560],
                'thumbnail' => [300, 300],
            ];
        } elseif($size == 'square') {
            $sizes = [
                'small' => [260, 260],
                'medium' => [520, 520],
                'full' => [1020, 1020],
                'thumbnail' => [300, 300],
            ];
        }else{
            $sizes = [
                'small' => [418, 235],
                'medium' => [836, 470],
                'full' => [1672, 940],
                'thumbnail' => [300, 300],
            ];
        }

        return $sizes;

    }

    private function delete($id)
    {

        $image = Picture::find($id);
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
