<?php
namespace App\Helper;

use Illuminate\Support\Facades\Session;

class sepetHelper
{
    static function add($id,$fiyat,$image,$name)
    {
        $sepet = Session::get('basket');
        $array = [
            'id'=>$id,
            'name'=>$name,
            'image'=>$image,
            'fiyat'=>$fiyat
        ];
        Session::put('basket.'.rand(1,9000),$array);
    }

        static function remove($id)
        {
           $s = Session::get('basket');
            Session::forget('basket'.$id);
        }
        static function countData()
        {

         return count(Session::get('basket'));

        }
        static function allist()
        {
            $x = Session::get('basket');
            return $x;
        }
        static function totalPrice()
        {
           $data = self::allist();
            return collect($data)->sum('fiyat');
        }
}
