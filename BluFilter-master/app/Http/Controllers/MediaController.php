<?php

namespace App\Http\Controllers;

use App\Models\MediaImage;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    use ImageUpload;

    public function browseMedia() {
        $images = MediaImage::select('filename')->orderBy('created_at', 'DESC')->paginate(config('items_per_page'));

        return view('back.media-selector', ['images' => $images, 'title' => __('messages.MediaImage')]);
    }

    public function index() {
        return view('back.gallery', [
            'title' => __('messages.media.library'),
            'images' => MediaImage::orderBy('id', 'DESC')->paginate(config('items_per_page'))
        ]);
    }

    public function upload(Request $request) {
        $request->validate(['image' => 'required|image']);

        $this->storeImage($request->image);

        return response()->json(['message' => __('messages.media.uploaded'), 'redirect' => route('media.index')]);
    }

    public function deleteImages(Request $request) {
        $request->validate(['ids' => 'array']);

        $images = MediaImage::findMany(explode(',', $request->ids[0]));

        foreach ($images as $image) {
            $image->delete();
        }

        return redirect()->route('media.gallery')->with('success', __('messages.media.delete'));
    }
}
