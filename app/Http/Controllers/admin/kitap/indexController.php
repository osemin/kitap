<?php

namespace App\Http\Controllers\admin\kitap;

use App\Helper\imageUpload;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Kategoriler;
use App\Kitaplar;
use App\YayinEvi;
use App\Yazarlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class indexController extends Controller
{
    public function index()
    {
        $data = Kitaplar::paginate(10);
        return view('admin.kitap.index',['data'=>$data]);
    }
    public function create()
    {
        $yazar = Yazarlar::all();
        $yayinevi = YayinEvi::all();
        $kategori = Kategoriler::all();
        return view('admin.kitap.create',['kategori'=>$kategori,'yazar'=>$yazar,'yayinevi'=>$yayinevi]);

    }
    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        $all['image']=imageUpload::singleUpload(rand(1,900),"kitap",$request->file('image'));
        $insert = Kitaplar::create($all);
        if ($insert)
        {
            return redirect()->back()->with('status','Kitap Eklendi');

        }
        else
        {
            return redirect()->back()->with('status','Hatalı İşlem');
        }
    }

    public function edit($id)
    {
        $c = Kitaplar::where('id','=',$id)->count();
        if ($c!=0)
        {
            $yazar = Yazarlar::all();
            $yayinevi = YayinEvi::all();
            $kategori = Kategoriler::all();
            $data = Kitaplar::where('id','=',$id)->get();
            return view('admin.kitap.edit',['kategori'=>$kategori,'data'=>$data,'yazar'=>$yazar,'yayinevi'=>$yayinevi]);
        }
        else
        {
            return view('/');
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Kitaplar::where('id','=',$id)->count();
        if ($c!=0)
        {
            $data = Kitaplar::where('id','=',$id)->get();
            $all = $request->except('_token');
            $all['selflink']=mHelper::permalink($all['name']);
            $all['image'] = imageUpload::singleUploadUpdate(rand(1,9000),"kitap",$request->file('image'),$data,"image");
            $update = Kitaplar::where('id','=',$id)->update($all);
            if ($update)
            {
                return redirect()->back()->with('status ' ,'Kitap Eklendi.');

            }
            else
            {
                return  redirect()->back()->with('status','Eklenemedi.');
            }
        }
        else
        {
            return redirect('/');
        }

    }
    public function delete($id)
    {
        $c = Kitaplar::where('id','=',$id)->count();
        if ($c!=0)
        {
            $data = Kitaplar::where('id','=',$id)->get();
            File::delete('public/'.$data[0]['image']);
            Kitaplar::where('id','=',$id)->delete();
            return redirect()->back();
        }
        else
        {
            return redirect('/');
        }
    }


}
