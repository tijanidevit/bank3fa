<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait UploadImageTrait
{
    protected function uploadImage($file, $folder)
    {
        $fileName = $this->generateFileName($file);
        $filePath = $this->getUploadPath($folder, $fileName);

        $image = Image::make($file);

        // Compress the image before saving it
        $image = $this->compressImage($image);

        Storage::disk($this->getUploadDisk())
            ->put($filePath, (string) $image->encode());

        return $filePath;
    }

    protected function generateFileName($file)
    {
        return md5(uniqid() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
    }

    protected function getUploadFolder()
    {
        return 'uploads';
    }

    protected function getUploadDisk()
    {
        return 'local';
    }

    protected function getUploadPath($folder, $filename)
    {
        return $this->getUploadFolder() . '/' . $folder . '/' . $filename;
    }

    protected function compressImage($image)
    {
        // Reduce the image quality to 80% and set the width to 800 pixels
        return $image->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode(null, 80);
    }
}
