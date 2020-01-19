<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadTrait
{
    public function upload($file, $oldFile = null)
    {
        if ($file) {
            $path = '/img/products/';

            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $newFileName = Str::slug($originalFileName) . '_' . time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $newFileName, 'public');

            if($oldFile && $oldFile != '/img/products/default.svg') {
                $this->delete($oldFile);
            }

            return $path . $newFileName;
        }

        return $oldFile;
    }

    public function delete($file)
    {
        if($file && $file != '/img/products/default.svg') {
            Storage::disk('public')->delete($file);
        }
    }
}
