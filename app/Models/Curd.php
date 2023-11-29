<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\select;
use App\Http\Controllers\CurdController;

class Curd extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','image'];


    protected static $crt,$up;
    protected static $img, $imgName, $imgDir, $imgLink;


    public static function getImage($request)
    {
        self::$img = $request->file('image');
        if (self::$img) {
            self::$imgName = "-".time().self::$img->getClientOriginalName();
            #self::$imgName = self::$img->getClientOriginalName();
            self::$imgDir = "image/";
            self::$img->move(self::$imgDir, self::$imgName );
            self::$imgLink = self::$imgDir . self::$imgName;
            return self::$imgLink;
        }
        else{
            return "";
        }

    }

    public static function data($request){
        self::$crt = new Curd();

        self::$crt->name = $request->name;
        self::$crt->email = $request->email;
        self::$crt->image = Curd::getImage($request);
        self::$crt->save();
    }
    public static function updateData($request)
    {
        self::$up = Curd::find($request->eid);
        self::$img = $request->file('image');

        if (self::$img){
            if (file_exists(self::$up->image)){
                unlink(self::$up->image);
            }
            #$fullFileName = $fileName."-".time().$image_icon->getClientOriginalExtension();
            self::$imgName = "--".time().self::$img->getClientOriginalName();
            self::$imgDir = "image/";
            self::$img->move(self::$imgDir, self::$imgName );
            self::$imgLink = self::$imgDir . self::$imgName;
        }

        self::$up->name = $request->name;
        self::$up->email = $request->email;
        self::$up->image = self::$imgLink;
        self::$up->save();
    }

}
