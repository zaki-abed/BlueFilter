<?php


namespace App\Traits;


use App\Models\MediaImage;
use Intervention\Image\Facades\Image;
use Storage;
use Str;
use File;
trait ImageUpload
{
    public function storeImage($image) {

        if (!File::isDirectory(public_path('storage/images/'))) {
            File::makeDirectory(public_path('storage/images/'), 0777, true, true);
        }
        if (!File::isDirectory(public_path('storage/images/thumbnails/'))) {
            File::makeDirectory(public_path('storage/images/thumbnails/'), 0777, true, true);
        }

        $height = Image::make($image)->height();

        if($height >= 2000)
            $height = 200;
        else if($height >= 1000 && $height < 2000)
            $height = 300;
        else if($height >= 800 && $height < 1000)
            $height = 200;
        else if($height >= 600 && $height < 800)
            $height = 170;
        else
            $height = 180;

        $filename = Str::random().'.' .$image->getClientOriginalExtension();

        $thumbnail = Image::make($image->getRealPath());

        $thumbnail->resize(300, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('storage/images/thumbnails/').'/'.$filename);

        $img = Image::make($image->getRealPath());

       // $image->storeAs(public_path('images'), $filename);
        $img->save(public_path('storage/images/').'/'.$filename);

        $compressed_file_path = public_path('storage/images') .'/'. $filename;

        $this->compress($compressed_file_path, $compressed_file_path, 20);

        $media_image = new MediaImage();
        $media_image->filename = $filename;
        $media_image->save();

        return $filename;
    }

    function compress($source, $destination, $quality) {
        $info = getimagesize($source);
        if ($info['mime'] == "image/jpeg")
            $image = imagecreatefromjpeg($source);

        else if ($info['mime'] == "image/gif")
            $image = imagecreatefromgif($source);

        else if ($info['mime'] == "image/png")
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);
    }
}
