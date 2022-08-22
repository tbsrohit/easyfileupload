<?php
namespace Easyfileupload\Easyfileupload;
/***
 * 
 * Class Fileupload
 * 
 * @author Rohit jayswal <tbs.rohitj@gmail.com>
 */
class Fileupload{
    
    public static $temFile;
    public static $filePath;
    public static $fileName;
    public static $orgFileName;
    public static function upload($file, $path){
        static::$temFile = $file;
        static::$filePath = __DIR__.'/'.$path;
        return new static;
    }
    public function save(){
        $fileName = time() . uniqid() . '.' . pathinfo(static::$temFile, PATHINFO_EXTENSION);
        static::$orgFileName = pathinfo(static::$temFile, PATHINFO_BASENAME);
        static::$fileName = $fileName;
        static::$temFile->move(static::$filePath, $fileName);
        return new static;
    }
    public function getFileName(){
        return static::$fileName;
    }
    public function getOrgFileName(){
        return static::$orgFileName;
    }
}