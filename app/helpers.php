

<?php

use Intervention\Image\Facades\Image;

function imageUpload($photo, $existingPhoto, $prefix = ''){
    if ($photo->isValid()) {
        $photo_name = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
        $photo_path = $prefix ? 'admin/images/uploads/'. $prefix . $photo_name : 'admin/images/uploads/'. $photo_name;

        // if file exists than delete 
        if (file_exists($existingPhoto)) {
            unlink($existingPhoto);
        }
        
        //Upload new photo
        Image::make($photo)->save($photo_path);
        return $photo_path;
    }
}
