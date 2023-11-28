<?php

class ImageModel
{
    public function createThumbnail($sourcePath, $destinationPath, $width, $height)
    {
        list($sourceWidth, $sourceHeight, $sourceType) = getimagesize($sourcePath);
        $sourceImage = $this->createImageFromType($sourceType, $sourcePath);

        $thumbnailImage = imagecreatetruecolor($width, $height);
        imagecopyresampled($thumbnailImage, $sourceImage, 0, 0, 0, 0, $width, $height, $sourceWidth, $sourceHeight);

        $this->saveImageWithType($thumbnailImage, $destinationPath, $sourceType);

        imagedestroy($sourceImage);
        imagedestroy($thumbnailImage);
    }

    public function resizeImage($sourcePath, $destinationPath, $width, $height)
    {
        list($sourceWidth, $sourceHeight, $sourceType) = getimagesize($sourcePath);
        $sourceImage = $this->createImageFromType($sourceType, $sourcePath);

        $resizedImage = imagecreatetruecolor($width, $height);
        imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $width, $height, $sourceWidth, $sourceHeight);

        $this->saveImageWithType($resizedImage, $destinationPath, $sourceType);

        imagedestroy($sourceImage);
        imagedestroy($resizedImage);
    }

    public function createImageFromType($type, $path)
    {
        switch ($type) {
            case IMAGETYPE_JPEG:
                return imagecreatefromjpeg($path);
            case IMAGETYPE_PNG:
                return imagecreatefrompng($path);
            case IMAGETYPE_GIF:
                return imagecreatefromgif($path);
                // Add more cases for other image types as needed
            default:
                return false;
        }
    }

    public function saveImageWithType($image, $path, $type)
    {
        switch ($type) {
            case IMAGETYPE_JPEG:
                imagejpeg($image, $path);
                break;
            case IMAGETYPE_PNG:
                imagepng($image, $path);
                break;
            case IMAGETYPE_GIF:
                imagegif($image, $path);
                break;
                // Add more cases for other image types as needed
        }
    }
}
