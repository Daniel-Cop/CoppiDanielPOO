<?php 

// ImageUploader it's not finish due to time. I leave the file for future reference
namespace Src\Service;

class ImageUploader {
    private string $targetDirectory;
    private array $allowedExtensions;
    private int $maxSize; // 1 MB
    private array $errors;
    private string $targetFile;

    public function __construct($targetDirectory = "img/", $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png', 'webp', 'avif'], $maxSize = 1000000, $errors = [], $targetFile = "") {
        $this->targetDirectory = $targetDirectory;
        $this->allowedExtensions = $allowedExtensions;
        $this->maxSize = $maxSize;
        $this->errors = $errors;
        $this->targetFile = $targetFile;
    }

    public function uploadImage(): bool {
        if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0) {
            $this->errors['img'] = 'No image uploaded or upload error.';
            return false;
        }


        if ($_FILES['image']['size'] <= $this->maxSize) {
            $this->errors['img'] = 'Image exceeds maximum size';
            return false;
        }        

        $extension = strtolower(pathinfo("img/".basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'webp', 'avif');
        if (!in_array($extension, $this->allowedExtensions)){
            $this->errors['img'] = 'Invalid image format';
            return false;
        }

        $imgName = rtrim($_FILES['image']['name'], ".".$extension);
        $uniqueName = $imgName."-".uniqid().".".$extension;
        $_FILES["image"]["name"] = $uniqueName;
        $this->targetFile = $this->targetDirectory.$uniqueName;

        move_uploaded_file($_FILES['image']['tmp_name'], "../".$this->targetFile);

        if (!move_uploaded_file($_FILES['image']['tmp_name'], "../".$this->targetFile)) {
            $this->targetFile = "";
            $this->errors['img'] = "Failed to upload image";
            return false;
        }

        return true; // upload successfull
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }

    public function setTargetDirectory($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;

    }

    public function getAllowedExtensions()
    {
        return $this->allowedExtensions;
    }

    public function setAllowedExtensions($allowedExtensions)
    {
        $this->allowedExtensions = $allowedExtensions;

    }

    public function getMaxSize()
    {
        return $this->maxSize;
    }

    public function setMaxSize($maxSize)
    {
        $this->maxSize = $maxSize;

    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function setErrors($errors)
    {
        $this->errors = $errors;

    }
}

