<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class ArtikelModel {
    public static function get_all(){
        $article = DB::table('articles')->get();
        return $article;
    }

    public static function save($data){
        unset($data["_token"]);
        $artikel_baru = DB::table('articles')->insert($data);
        return $artikel_baru;
    }
    
    public static function find_by_id($id){
        $artikel = DB::table('articles')->where('id',$id)->first();
        return $artikel;
    }

    public static function update($id,$request){
        $artikel = DB::table('articles')
                        ->where('id',$id)
                        ->update([
                            'judul' => $request["judul"],
                            'isi' => $request["isi"],
                            'tag' => $request["tag"]
                        ]);
        return $artikel;
    }

    public static function destroy($id){
        $deleted = DB::table('articles')
                        ->where('id',$id)
                        ->delete();
        return $deleted;
    }
}

?>