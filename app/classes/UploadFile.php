<?php

namespace App\Classes;

class UploadFile{

  protected $filename;
  protected $max_filesize = 2097152;
  protected $extension;
  protected $path;

  //get file Name
  public function getName() {
    return $this->filename;
  }

  public function setName($file, $name = "") {
    if ($name === "") {
      $name = pathinfo($file, PATHINFO_FILENAME);
    }
    $name = str_replace(["_", " "], "-", $name);
    $name = strtolower($name);
    $hash = md5(microtime());
    $ext = $this->fileExtension($file);
    $this->filename = "{$name}-{$hash}.{$ext}";
  }

  protected function fileExtension($file) {
    return $this->extension = pathinfo($file, PATHINFO_EXTENSION);
  }

  public static function fileSize($file) {

    #how to use a class property in a static method
    $fileobj = new static;
    return $file > $fileobj->max_filesize ? true : false;
  }

  public static function isImage($file) {
    $fileobj = new static;
    $ext = $fileobj->fileExtension($File);
    $validExt = array('jpg', 'jpeg', 'png', 'svg', 'bmp', 'gif', 'svg');

    #if the file extension is not in the $validExt array...
    if (!in_array(strtolower($ext), $validExt)) {
      return false;
    }

    return true;

  }


#get the path where file was uploaded to
  public function path() {

    return $this->path;
  }

  public static function move($tmp_path, $folder, $file, $new_filename = '') {
    $fileobj = new static;
    $ds = DIRECTORY_SEPARATOR;

    $fileobj->setName($file, $new_filename);
    $file_name = $fileobj->getName();

    if (!is_dir($folder)) {
      mkdir($folder, 0777, true);
    }

    $fileobj->path = "{$folder}{$ds}{$file_name}";
    $absolute_path = BASE_PATH."{$ds}public{$ds}$fileobj->path";

    #👇check whether file was moved successfully from temp path to absolute specified path
    if (move_uploaded_file($tmp_path, $absolute_path)) {
      // enable method chaining
      return $fileobj;
    }

    return null;
  }
}
