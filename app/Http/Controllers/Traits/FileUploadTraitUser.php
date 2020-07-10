<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Price;
use App\Portfolio;
use App\PhotoImagePage;
use App\Comment;

trait FileUploadTraitUser
{

    /**
     * File upload trait used in controllers to upload files
     */
    public function saveFiles(Request $request)
    {

        if($request->hasFile('flag')){
            $uploadPath = Price::PATH;
        }
        elseif(($request->hasFile('photo') && $request->hasFile('photo_after')) ||
                     ($request->hasFile('photo') && $request->has('category_id')) ||
                     ($request->hasFile('photo_after') && $request->has('category_id')))
        {
            $uploadPath = Portfolio::PATH;
        }
        elseif($request->hasFile('photo') && $request->has('section'))
        {
            $uploadPath = PhotoImagePage::PATH;
        }
        elseif($request->hasFile('avatar'))
        {
            $uploadPath = Comment::PATH;
        }
        // else
        // {
        //     // return redirect()->route('admin.home')->send();
        //     $uploadPath = null;
        // }


        // if (! file_exists($uploadPath)) {
        //     mkdir($uploadPath, 0775);
        // }

        $finalRequest = $request;

        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {
                if ($request->has($key . '_max_width') && $request->has($key . '_max_height')) {
                    // Check file width
                    $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                    $file     = $request->file($key);
                    $image    = Image::make($file);

                    $width  = $image->width();
                    $height = $image->height();
                    if ($width > $request->{$key . '_max_width'} && $height > $request->{$key . '_max_height'}) {
                        $image->resize($request->{$key . '_max_width'}, $request->{$key . '_max_height'});
                    } elseif ($width > $request->{$key . '_max_width'}) {
                        $image->resize($request->{$key . '_max_width'}, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    } elseif ($height > $request->{$key . '_max_height'}) {
                        $image->resize(null, $request->{$key . '_max_height'}, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }
                    $image->save($uploadPath . '/' . $filename);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                } else {
                    $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                    $request->file($key)->move($uploadPath, $filename);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                }
            }
        }

        return $finalRequest;
    }
}
