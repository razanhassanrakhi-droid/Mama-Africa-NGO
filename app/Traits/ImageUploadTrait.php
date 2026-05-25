<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageUploadTrait
{
    /**
     * Handle image upload (Normal or Cropped Base64)
     *
     * @param \Illuminate\Http\Request $request
     * @param string $inputName Original file input name
     * @param string $croppedInputName Hidden input name for cropped base64
     * @param string $folder Storage folder
     * @param string|null $oldImage Old image path to delete
     * @return string|null
     */
    public function uploadImage($request, $inputName = 'image', $croppedInputName = 'cropped_image', $folder = 'uploads', $oldImage = null)
    {
        $imagePath = $oldImage;

        // 1. Check for Cropped Image (Base64)
        if ($request->filled($croppedInputName)) {
            $base64Data = $request->input($croppedInputName);
            
            if ($base64Data === 'deleted') {
                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
                return null;
            }

            if (str_contains($base64Data, ';base64,')) {
                $parts = explode(';base64,', $base64Data);
                $imageTypeAux = explode('image/', $parts[0]);
                $imageType = $imageTypeAux[1] ?? 'jpeg';
                $imageData = base64_decode($parts[1]);
                
                $fileName = $folder . '/' . uniqid() . '.' . $imageType;
                
                // Delete old image if exists
                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
                
                Storage::disk('public')->put($fileName, $imageData);
                $imagePath = $fileName;
                return $imagePath;
            }
        }

        // 2. Check for Normal File Upload
        if ($request->hasFile($inputName)) {
            // Delete old image if exists
            if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
            
            $imagePath = $request->file($inputName)->store($folder, 'public');
        }

        return $imagePath;
    }
}
