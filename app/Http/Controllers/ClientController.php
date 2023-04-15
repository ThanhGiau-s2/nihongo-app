<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bai;
use App\dangkihoc;
use App\bangchucaichitiet;
use App\chitietkqktbaicus;
use App\ketquaktbaicus;
use App\kqkttvs;
use App\kqktnps;
use App\chitietkqkttvs;
use App\chitietkqktnps;
use App\lichhoc;
use App\danhsachmp3;
use App\user;
use App\xacnhanemail;
use Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Excel;
use DB;

class ClientController extends Controller
{
    //
    public function getTrangChu()
    {
        $tenbh= DB::table('hoithoais')            
        ->get();
        return view ('client.layout.home',['tenbh'=>$tenbh]);
    }
    public function getDanhSachBaiHoc()
    {
        $tenbh= DB::table('hoithoais')            
        ->get();
        return view ('client.danhsachbaihoc',['tenbh'=>$tenbh]);
    }
    public function getGioiThieu()
    {
        return view ('client.gioithieu');
    }
    public function getGioiThieuDangNhap($id)
    {
        $last=DB::table('lichhocs')->where('id_hv','=',$id)->latest('id')->first();
        if(!isset($last)){
            $last = 1;
            $last_bai = 1;
        }
        else{
            if($last->ketqua>=5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai;
            }
        }
        return view('client.gioithieudn',['last_bai'=>$last_bai]);
    }
    public function getDanhSachBangChuCai()
    {
        return view ('client.danhsachbcc');
    }
    public function getDanhSachBaiHocDangNhap($id)
    {
        $last=DB::table('lichhocs')->where('id_hv','=',$id)->latest('id')->first();
        if(!isset($last)){
            $last = 1;
            $last_bai = 1;
        }
        else{
            if($last->ketqua>=5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai + 0;
            }
        }
        $tenbh = DB::table('hoithoais')->limit($last_bai)->get();
        return view('client.dsbhdn',['last'=>$last,'last_bai'=>$last_bai,'tenbh'=>$tenbh]);
    }
    public function getDanhSachBangChuCaiDangNhap($id)
    {
        $last=DB::table('lichhocs')->where('id_hv','=',$id)->latest('id')->first();
        if(!isset($last)){
            $last = 1;
            $last_bai = 1;
        }
        else{
            if($last->ketqua>=5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai + 0;
            }
        }
        return view ('client.danhsachbccdn',['last_bai'=>$last_bai]);
    }
    public function getBai($id)
    {
        return view ('client.chitietbaihoc',['id'=>$id]);
    }
    public function getBaiDN($id,$id1)
    {
        $lh1= DB::table('lichhocs')            
        ->where([
            ['id_bai', '=', $id],
            ['id_hv', '=', $id1]
        ])
        ->first();
        if(!isset($lh1))
        {
            $lh = new lichhoc;
            $lh->id_hv = $id1;
            $lh->id_bai = $id;
            $lh->ngayhoc = date('Y/m/d');
            $lh->hoatdong = 0;
            $lh->ketqua = 0;
            $lh->tuvung = 0;
            $lh->nguphap = 0;
            $lh->luyendoc = 0;
            $lh->luyennghe = 0;
            $lh->hoithoai = 0;
            $lh->baitap = 0;
            $lh->save();  
            $lh1=DB::table('lichhocs')->where([
                ['id_hv','=',$id1],
                ['id_bai','=',$id]]
                )->get();
            $lh2=DB::table('lichhocs')->where('id_hv','=',$id1)->latest('id')->first();
            $last_bai = $lh2->id_bai;
        }
        else
        {
            $last=DB::table('lichhocs')->where('id_hv',$id1)->latest('id')->first();
            $last_bai = $last->id_bai;
            if($last->id_bai<$id)
            {
                return back();
            }
            if($last->ketqua>=5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai + 0;
            }
            $lh1= DB::table('lichhocs')            
            ->where([
                ['id_bai', '=', $id],
                ['id_hv', '=', $id1] 
            ])
            ->get();
        }
        return view ('client.chitietbaihocdn',['id'=>$id,'lh1'=>$lh1,'last_bai'=>$last_bai]);
    }
    public function Capnhattuvung($id,$id1)
    {
        $cntv = lichhoc::where(
        [
            ['id_bai', '=', $id],
            ['id_hv', '=', $id1],
            ['tuvung', '=', '0']
        ]
        )->update(['tuvung' => '1']);
        $last=DB::table('lichhocs')->latest('id')->first();
        if($last->id_bai<$id)
        {
            return back();
        }
        if($last->ketqua>5)
        {
            $last_bai = $last->id_bai + 1;
        }
        else{
            $last_bai = $last->id_bai + 0;
        }
        $lh1= DB::table('lichhocs')            
        ->where([
            ['id_bai', '=', $id],
            ['id_hv', '=', $id1]
        ])
        ->get();
        $last=DB::table('lichhocs')->latest('id')->first();
        return view ('client.chitietbaihocdn',['id'=>$id,'lh1'=>$lh1,'last'=>$last,'last_bai'=>$last_bai]);
    }
    public function Capnhatnguphap($id,$id1)
    {
        $cnnp = lichhoc::where(
        [
            ['id_bai', '=', $id],
            ['id_hv', '=', $id1],
            ['nguphap', '=', '0']
        ]
        )->update(['nguphap' => '1']);
        $last=DB::table('lichhocs')->latest('id')->first();
        if($last->id_bai<$id)
        {
            return back();
        }
        if($last->ketqua>5)
        {
            $last_bai = $last->id_bai + 1;
        }
        else{
            $last_bai = $last->id_bai + 0;
        }
        $lh1= DB::table('lichhocs')            
        ->where([
            ['id_bai', '=', $id],
            ['id_hv', '=', $id1]
        ])
        ->get();
        $last=DB::table('lichhocs')->latest('id')->first();
        return view ('client.chitietbaihocdn',['id'=>$id,'lh1'=>$lh1,'last'=>$last,'last_bai'=>$last_bai]);
    }
    public function Capnhatluyendoc($id,$id1)
    {
        $cnld = lichhoc::where(
        [
            ['id_bai', '=', $id],
            ['id_hv', '=', $id1],
            ['luyendoc', '=', '0']
        ]
        )->update(['luyendoc' => '1']);
        $last=DB::table('lichhocs')->latest('id')->first();
        if($last->id_bai<$id)
        {
            return back();
        }
        if($last->ketqua>5)
        {
            $last_bai = $last->id_bai + 1;
        }
        else{
            $last_bai = $last->id_bai + 0;
        }
        $lh1= DB::table('lichhocs')            
        ->where([
            ['id_bai', '=', $id],
            ['id_hv', '=', $id1]
        ])
        ->get();
        $last=DB::table('lichhocs')->latest('id')->first();
        return view ('client.chitietbaihocdn',['id'=>$id,'lh1'=>$lh1,'last'=>$last,'last_bai'=>$last_bai]);
    }
    public function Capnhatluyennghe($id,$id1)
    {
        $cnln = lichhoc::where(
        [
            ['id_bai', '=', $id],
            ['id_hv', '=', $id1],
            ['luyennghe', '=', '0']
        ]
        )->update(['luyennghe' => '1']);
        $last=DB::table('lichhocs')->latest('id')->first();
        if($last->id_bai<$id)
        {
            return back();
        }
        if($last->ketqua>5)
        {
            $last_bai = $last->id_bai + 1;
        }
        else{
            $last_bai = $last->id_bai + 0;
        }
        $lh1= DB::table('lichhocs')            
        ->where([
            ['id_bai', '=', $id],
            ['id_hv', '=', $id1]
        ])
        ->get();
        $last=DB::table('lichhocs')->latest('id')->first();
        return view ('client.chitietbaihocdn',['id'=>$id,'lh1'=>$lh1,'last'=>$last,'last_bai'=>$last_bai]);
    }
    public function Capnhathoithoai($id,$id1)
    {
        $cnht = lichhoc::where(
        [
            ['id_bai', '=', $id],
            ['id_hv', '=', $id1],
            ['hoithoai', '=', '0']
        ]
        )->update(['hoithoai' => '1']);
        $last=DB::table('lichhocs')->latest('id')->first();
        if($last->id_bai<$id)
        {
            return back();
        }
        if($last->ketqua>5)
        {
            $last_bai = $last->id_bai + 1;
        }
        else{
            $last_bai = $last->id_bai + 0;
        }
        $lh1= DB::table('lichhocs')            
        ->where([
            ['id_bai', '=', $id],
            ['id_hv', '=', $id1]
        ])
        ->get();
        $last=DB::table('lichhocs')->latest('id')->first();
        return view ('client.chitietbaihocdn',['id'=>$id,'lh1'=>$lh1,'last'=>$last,'last_bai'=>$last_bai]);
    }
    public function Capnhatbaitap($id,$id1)
    {
        $cnbt = lichhoc::where(
        [
            ['id_bai', '=', $id],
            ['id_hv', '=', $id1],
            ['baitap', '=', '0']
        ]
        )->update(['baitap' => '1']);
        $last=DB::table('lichhocs')->latest('id')->first();
        if($last->id_bai<$id)
        {
            return back();
        }
        if($last->ketqua>5)
        {
            $last_bai = $last->id_bai + 1;
        }
        else{
            $last_bai = $last->id_bai + 0;
        }
        $lh1= DB::table('lichhocs')            
        ->where([
            ['id_bai', '=', $id],
            ['id_hv', '=', $id1]
        ])
        ->get();
        $last=DB::table('lichhocs')->latest('id')->first();
        return view ('client.chitietbaihocdn',['id'=>$id,'lh1'=>$lh1,'last'=>$last,'last_bai'=>$last_bai]);
    }
    public function getTuVung($id)
    {
        $tv= DB::table('tuvungs')            
        ->where('id_bai',$id)
        ->get();
        $dsmp3s=DB::table('danhsachmp3s')            
        ->where('id_bai',$id)
        ->get();
        return view ('client.tuvung',['tv'=>$tv,'id'=>$id,'dsmp3s'=>$dsmp3s]);
    }
    public function getTuVungDN($id1,$id)
    {
        $tv= DB::table('tuvungs')            
        ->where('id_bai',$id)
        ->get();
        $dsmp3s=DB::table('danhsachmp3s')            
        ->where('id_bai',$id)
        ->get();
        $last=DB::table('lichhocs')->where('id_hv','=',$id1)->latest('id')->first();
        if($last->id_bai<$id)
        {
            return back();
        }
        else
        {
            $last=DB::table('lichhocs')->where('id_hv','=',$id1)->latest('id')->first();
            if(isset($last) && $last->ketqua>5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai + 0;
            }
            return view ('client.tuvungdn',['dsmp3s'=>$dsmp3s,'tv'=>$tv,'id'=>$id,'last_bai'=>$last_bai]);
        }
    }
    public function getNguPhap($id)
    {
        $np= DB::table('nguphaps')            
        ->where('id_bai',$id)
        ->get();
        return view ('client.nguphap',['np'=>$np,'id'=>$id]);
    }
    public function getNguPhapDN($id1,$id)
    {
        $np= DB::table('nguphaps')            
        ->where('id_bai',$id)
        ->get();
        $last=DB::table('lichhocs')->latest('id')->where('id_hv','=',$id1)->first();
        if(isset($last) && $last->id_bai<$id)
        {
            return back();
        }
        else
        {   
            if(isset($last) && $last->ketqua>5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai + 0;
            }
            return view ('client.nguphapdn',['np'=>$np,'id'=>$id,'last_bai'=>$last_bai]);
        }  
    }
    public function getLuyenDoc($id)
    {
        $dvm= DB::table('danhsachmp3s')            
        ->where('id_bai',$id)
        ->get();
        $dvmha= DB::table('docvanmaus')            
        ->where('id_bai',$id)
        ->get();
        return view ('client.docvanmau',['dvm'=>$dvm,'dvmha'=>$dvmha,'id'=>$id]);
    }
    public function getLuyenDocDN($id1,$id)
    {
        $dvm= DB::table('danhsachmp3s')            
        ->where('id_bai',$id)
        ->get();
        $dvmha= DB::table('docvanmaus')            
        ->where('id_bai',$id)
        ->get();
        $last=DB::table('lichhocs')->latest('id')->where('id_hv','=',$id1)->first();
        if(isset($last) && $last->id_bai<$id)
        {
            return back();
        }
        else
        {   
            if(isset($last) && $last->ketqua>5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai + 0;
            }
            return view ('client.docvanmaudn',['dvm'=>$dvm,'dvmha'=>$dvmha,'id'=>$id,'last'=>$last,'last_bai'=>$last_bai]);
        }  
    }
    public function getHoiThoai($id)
    {
        $ht= DB::table('hoithoais')            
        ->where('id_bai',$id)
        ->get();
        return view ('client.hoithoai',['ht'=>$ht,'id'=>$id]);
    }    
    public function getHoiThoaiDN($id1,$id)
    {
        $ht= DB::table('hoithoais')            
        ->where('id_bai',$id)
        ->get();
        $last=DB::table('lichhocs')->latest('id')->where('id_hv','=',$id1)->first();
        if(isset($last) && $last->id_bai<$id)
        {
            return back();
        }
        else
        {   
            if(isset($last) && $last->ketqua>5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai + 0;
            }
            return view ('client.hoithoaidn',['ht'=>$ht,'id'=>$id,'last'=>$last,'last_bai'=>$last_bai]);
        }  
    }    
    public function getLuyenNghe($id)
    {
        $ln= DB::table('luyennghes')            
        ->where('id_bai',$id)
        ->get();
        return view ('client.luyennghe',['ln'=>$ln,'id'=>$id]);
    } 
    public function getLuyenNgheDN($id1,$id)
    {
        $ln= DB::table('luyennghes')            
        ->where('id_bai',$id)
        ->get();
        $last=DB::table('lichhocs')->latest('id')->first();
        if($last->id_bai<$id)
        {
            return back();
        }
        else
        {
            $last_bai = $last->id_bai + 0;
            if($last->ketqua>5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai + 0;
            }
            return view ('client.luyennghedn',['ln'=>$ln,'id'=>$id,'last_bai'=>$last_bai]);
        }  
    } 
    public function getBaiTap($id1,$id)
    {
        $ctbt1= DB::table('chitietbaitapnghe_1s')            
        ->where('id_bai',$id)
        ->get();
        $ctbt2= DB::table('chitietbaitapnghe_2s')            
        ->where('id_bai',$id)
        ->get();
        $ht= DB::table('danhsachmp3s')            
        ->where('id_bai',$id)
        ->get();
        $ht1= DB::table('danhsachmp3s')            
        ->where('id_bai',$id)
        ->get();
        $last=DB::table('lichhocs')->latest('id')->where('id_hv','=',$id1)->first();
        if(isset($last) && $last->id_bai<$id)
        {
            return back();
        }
        else
        {   
            if(isset($last) && $last->ketqua>5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai + 0;
            }
            return view ('client.baitap',['id'=>$id,'ctbt1'=>$ctbt1,'ctbt2'=>$ctbt2,'ht'=>$ht,'last_bai'=>$last_bai,'ht1'=>$ht1]);
        }  
    }   
    public function getKiemTra($id,$id1)
    {
        $ktra= DB::table('cauhois')            
        ->where('id_bai',$id)
        ->get();
        $last=DB::table('lichhocs')->where('id_hv','=',$id1)->latest('id')->first();
        if(!isset($last)){
            $last = 1;
            $last_bai = 1;
        }
        else{
            if($last->ketqua>=5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai;
            }
        }
        return view ('client.kiemtra',['ktra'=>$ktra,'id'=>$id,'last_bai'=>$last_bai]);
    }  
    public function getKiemTraTuVung($id)
    {
        $ktra= DB::table('cauhoituvungs')            
        ->where('id_bai',$id)
        ->get();
        $last=DB::table('lichhocs')->latest('id')->first();
        $last_bai = $last->id_bai + 0;
        if($last->ketqua>5)
        {
            $last_bai = $last->id_bai + 1;
        }
        else{
            $last_bai = $last->id_bai + 0;
        }
        return view ('client.kiemtratuvung',['ktra'=>$ktra,'id'=>$id,'last_bai'=>$last_bai]);
    }  
    public function getKiemTraNguPhap($id)
    {
        $ktra= DB::table('cauhoinguphaps')            
        ->where('id_bai',$id)
        ->get();
        $last=DB::table('lichhocs')->latest('id')->first();
        $last_bai = $last->id_bai + 0;
        if($last->ketqua>5)
        {
            $last_bai = $last->id_bai + 1;
        }
        else{
            $last_bai = $last->id_bai + 0;
        }
        return view ('client.kiemtranguphap',['ktra'=>$ktra,'id'=>$id,'last_bai'=>$last_bai]);
    }  
    public function getBatDauKiemTra($id,$id1)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $today = getdate();
        $h = $today['hours'];
        $m = $today['minutes'];
        $s = $today['seconds'];
        $total=$h*3600+$m*60+$s; 
        $mkt =$today['minutes']+15;
        $totalkt=$h*3600+$mkt*60+$s; 
        $last=DB::table('lichhocs')->where('id_hv','=',$id1)->first();
        if(!isset($last)){
            $last = 1;
            $last_bai = 1;
        }
        else{
            if($last->ketqua>=5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai;
            }
        }
        $ktra= DB::table('cauhois')            
            ->where('id_bai',$id)
            ->get();
        $ctkq= DB::table('ketquaktbaicuses')            
        ->where([
            ['id_bai', '=', $id],
            ['gioketthuc', '>', $total],
            ['hoatdong','=',0]
        ])->first();
        if(!isset($ctkq))
        {
            $bd = new ketquaktbaicus;
            $bd->ketqua =0;
            $bd->hoatdong =0;
            $bd->giobatdau = $total;
            $bd->gioketthuc = $totalkt;
            $bd->giohoanthanh = 0;
            $bd->ngay = date('Y/m/d');
            $bd->id_hv = $id1;
            $bd->id_bai = $id;
            $bd->save();  
            $id_kq = $bd->id;
            $gbd=$bd->giobatdau;
            $gkt=$bd->gioketthuc;
            return view ('client.bdkiemtra',['ktra'=>$ktra,'id'=>$id,'last'=>$last,'totalkt'=>$totalkt,'gbd'=>$gbd,'gkt'=>$gkt,'id_kq'=>$id_kq,'last_bai'=>$last_bai]);
        }
        else
        {
            $id_kq = $ctkq->id;
            $gbd=$ctkq->giobatdau;
            $gkt=$ctkq->gioketthuc;
            return view ('client.bdkiemtra',['ktra'=>$ktra,'id'=>$id,'last'=>$last,'totalkt'=>$totalkt,'gbd'=>$gbd,'gkt'=>$gkt,'id_kq'=>$id_kq,'last_bai'=>$last_bai]);
        }
    }  
    public function getBatDauKiemTraTuVung($id,$id1)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $today = getdate();
        $h = $today['hours'];
        $m = $today['minutes'];
        $s = $today['seconds'];
        $total= $h*3600+$m*60+$s; 
        $mkt = $today['minutes']+15;
        $totalkt= $h*3600 + $mkt*60 +$s; 
        $ktra= DB::table('cauhoituvungs')            
        ->where('id_bai',$id)
        ->get();
        $last=DB::table('lichhocs')->latest('id')->first();
        $last_bai = $last->id_bai + 0;
            if($last->ketqua>5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai + 0;
            }
        $ctkq= DB::table('kqkttvs')            
        ->where([
            ['id_bai', '=', $id],
            ['gioketthuc', '>', $total],
            ['hoatdong','=',0]
        ])->first();
        if(!isset($ctkq))
        {
            $bd = new kqkttvs;
            $bd->ketqua =0;
            $bd->hoatdong =0;
            $bd->giobatdau = $total;
            $bd->gioketthuc = $totalkt;
            $bd->ngay = date('Y/m/d');
            $bd->id_hv = $id1;
            $bd->id_bai = $id;
            $bd->save();  
            $id_kq = $bd->id;
            $gbd=$bd->giobatdau;
            $gkt=$bd->gioketthuc;
            return view ('client.bdkiemtratuvung',['ktra'=>$ktra,'id'=>$id,'last'=>$last,'totalkt'=>$totalkt,'gbd'=>$gbd,'gkt'=>$gkt,'id_kq'=>$id_kq,'last_bai'=>$last_bai]);
        }
        else
        {
            $id_kq = $ctkq->id;
            $gbd=$ctkq->giobatdau;
            $gkt=$ctkq->gioketthuc;
            return view ('client.bdkiemtratuvung',['ktra'=>$ktra,'id'=>$id,'last'=>$last,'totalkt'=>$totalkt,'gbd'=>$gbd,'gkt'=>$gkt,'id_kq'=>$id_kq,'last_bai'=>$last_bai]);
        }
    } 
    public function getBatDauKiemTraNguPhap($id,$id1)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $today = getdate();
        $h = $today['hours'];
        $m = $today['minutes'];
        $s = $today['seconds'];
        $total=$h*3600+$m*60+$s; 
        $mkt =$today['minutes']+15;
        $ktra= DB::table('cauhoinguphaps')            
        ->where('id_bai',$id)
        ->get();
        $last=DB::table('lichhocs')->where('id_hv','=',$id1)->latest('id')->first();
        if(!isset($last)){
            $last = 1;
            $last_bai = 1;
        }
        else{
            if($last->ketqua>=5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai;
            }
        }
        $totalkt=$h*3600+$mkt*60+$s; 
        $ctkq= DB::table('kqktnps')            
        ->where([
            ['id_bai', '=', $id],
            ['gioketthuc', '>', $total],
            ['hoatdong','=',0]
        ])->first();
        if(!isset($ctkq))
        {
            $bd = new kqktnps;
            $bd->ketqua =0;
            $bd->hoatdong =0;
            $bd->giobatdau = $total;
            $bd->gioketthuc = $totalkt;
            $bd->ngay = date('Y/m/d');
            $bd->id_hv = $id1;
            $bd->id_bai = $id;
            $bd->save();  
            $id_kq = $bd->id;
            $gbd=$bd->giobatdau;
            $gkt=$bd->gioketthuc;
            return view ('client.bdkiemtranguphap',['ktra'=>$ktra,'id'=>$id,'last'=>$last,'totalkt'=>$totalkt,'total'=>$total,'last_bai'=>$last_bai,'id_kq'=>$id_kq,'gbd'=>$gbd,'gkt'=>$gkt]);
        }
        else
        {
            $id_kq = $ctkq->id;
            $gbd=$ctkq->giobatdau;
            $gkt=$ctkq->gioketthuc;
            return view ('client.bdkiemtranguphap',['ktra'=>$ktra,'id'=>$id,'last'=>$last,'totalkt'=>$totalkt,'gbd'=>$gbd,'gkt'=>$gkt,'id_kq'=>$id_kq,'last_bai'=>$last_bai]);
        }
    }  
    public function getKqKt($id,$bai,$idhv)
    {
        $que = DB::table('chitietkqktbaicuses')
        ->select(DB::raw('count(*) as sl,id_kq'))                     
        ->groupBy('id_kq')
        ->where([
            ['ketqua','=',1],
            ['id_kq','=',$id],
            ])
        ->get();
        $sl = count($que);
        if($sl!=0){
            foreach($que as $q)
            {
                $sl = $q->sl;
            }
        }
        else{
            $sl=0;
        }
        $last=DB::table('lichhocs')->where('id_hv','=',$idhv)->latest('id')->first();
        if(!isset($last)){
            $last = 1;
            $last_bai = 1;
        }
        else{
            if($last->ketqua>=5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai;
            }
        }
        if($bai>1)
        {
            $baicu=$bai-1;
        }
        else
        {
            $baicu=1;
        }
        if($sl>=5)
        {
            $baimoi=$bai+1;
        }
        else
        {
            $baimoi=$bai;
        }
        return view ('client.kqkiemtra',['sl'=>$sl,'last_bai'=>$last_bai,'bai'=>$bai,'id_kq'=>$id,'baicu'=>$baicu,'baimoi'=>$baimoi]);
    }
    public function getKqKtTv($id,$bai)
    {
        $que = DB::table('chitietkqktbaicuses')
        ->select(DB::raw('count(*) as sl,id_kq'))                     
        ->groupBy('id_kq')
        ->where([
            ['ketqua','=',1],
            ['id_kq','=',$id],
            ])
        ->get();
        $sl = count($que);
        if($sl!=0){
            foreach($que as $q)
            {
                $sl = $q->sl;
            }
        }
        else{
            $sl=0;
        }
        $last=DB::table('lichhocs')->latest('id')->first();
        $last_bai = $last->id_bai + 0;
        if($last->ketqua>5)
        {
            $last_bai = $last->id_bai + 1;
        }
        else{
            $last_bai = $last->id_bai + 0;
        }
        $id = $bai;
        return view ('client.kqkiemtratv',['sl'=>$sl,'last_bai'=>$last_bai,'id'=>$id]);
    }
    public function getKqKtNp($id,$bai)
    {
        $que = DB::table('chitietkqktbaicuses')
        ->select(DB::raw('count(*) as sl,id_kq'))                     
        ->groupBy('id_kq')
        ->where([
            ['ketqua','=',1],
            ['id_kq','=',$id],
            ])
        ->get();
        $sl = count($que);
        if($sl!=0){
            foreach($que as $q)
            {
                $sl = $q->sl;
            }
        }
        else{
            $sl=0;
        }
        $last=DB::table('lichhocs')->latest('id')->first();
        $last_bai = $last->id_bai + 0;
        if($last->ketqua>5)
        {
            $last_bai = $last->id_bai + 1;
        }
        else{
            $last_bai = $last->id_bai + 0;
        }
        $id = $bai;
        return view ('client.kqkiemtranp',['sl'=>$sl,'last_bai'=>$last_bai,'id'=>$id]);
    }
    public function postKiemtra(Request $request)
    {
        $idhv = $request->hv;
        $bai = $request->bai;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $today = getdate();
        $h = $today['hours'];
        $m = $today['minutes'];
        $s = $today['seconds'];
        $total=$h*3600+$m*60+$s; 
        $idkq1= DB::table('ketquaktbaicuses')            
        ->where([
            ['gioketthuc','>',$total],
            ['hoatdong','=',0]
        ])
        ->first();
        if(!isset($idkq1)){
            $lastkq=DB::table('ketquaktbaicuses')->where('id_hv','=',$idhv)->latest('id')->first();
            $id_kq = $lastkq->id;
            return redirect()->route('kqkt', [
                'id'	=>	$id_kq,
                'bai'   =>  $bai,
                'idhv'  =>  $idhv
            ]);
        }
        else{
            $chitietkqktbaicus = new chitietkqktbaicus; 
        $luachon = $request->input('luachon'); 
        $ch = $request->input('id_ch');   
        for($i = 1; $i < 11; $i++)
        {   
            $kq = new chitietkqktbaicus;   
            $kq->id_ch = $ch[$i];
            if(isset($luachon[$i])) {  
                $kq->luachon = $luachon[$i];
            }
            else{
                $kq->luachon = 0;
                $luachon[$i]=0;
            }
            $kq->id_kq = $idkq1->id;
            $kq->ketqua = 0;
            $kq->save();
            $ctkq1 = DB::table('chitietkqktbaicuses')            
            ->join('cauhois', 'cauhois.id', '=', 'chitietkqktbaicuses.id_ch')          
            ->where(
                [
                    ['cauhois.id', 'like', $ch[$i]],
                    ['cauhois.dapandung', 'like', $luachon[$i]],
                ])  
            ->update([
                'ketqua' => 1
                ]); 
        }   
        $id_kq = $idkq1->id;                 
        $que = DB::table('chitietkqktbaicuses')
        ->select(DB::raw('count(*) as sl,id_kq'))                     
        ->groupBy('id_kq')
        ->where([
            ['ketqua','=',1],
            ['id_kq','=',$id_kq],
            ])
        ->get();
        $sl = count($que);
        if($sl!=0){
            foreach($que as $q)
            {
                $sl = $q->sl;
            }
        }
        else{
            $sl=0;
        }
        $kqua = ketquaktbaicus::where('id', '=', $id_kq)
        ->update(['ketqua' => $sl,
        'hoatdong'=>1,
        'giohoanthanh' =>$total]);
        $kqua1 = lichhoc::where([
            ['id_bai', '=', $request->bai],
            ['id_hv','=',$idhv]
            ])
        ->update([
            'ketqua' => $sl,
            'hoatdong'=>1
            ]);
        if($bai>1)
        {
            $baicu=$bai-1;
        }
        else
        {
            $baicu=1;
        }
        if($sl>=5)
        {
            $baimoi=$bai+1;
        }
        else
        {
            $baimoi=$bai;
        }
        $last=DB::table('lichhocs')->where('id_hv','=',$idhv)->latest('id')->first();
        if(!isset($last)){
            $last = 1;
            $last_bai = 1;
        }
        else{
            if($last->ketqua>=5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai;
            }
        }
        return view ('client.kqkiemtra',['sl'=>$sl,'baimoi'=>$baimoi,'bai'=>$bai,'baicu'=>$baicu,'last_bai'=>$last_bai,'id_kq'=>$id_kq]);
        }
    }
    public function postKiemtraTuVung(Request $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $today = getdate();
        $h = $today['hours'];
        $m = $today['minutes'];
        $s = $today['seconds'];
        $total=$h*3600+$m*60+$s; 
        $idkq= DB::table('kqkttvs')            
        ->where([
            ['gioketthuc','>',$total],
            ['hoatdong','=','0']
            ])
        ->first();
        $id_kq = $idkq->id; 
        $kqkttv= DB::table('chitietkqkttvs')            
        ->where('id_kq', '=', $id_kq)
        ->first();
        if(!isset($kqkttv)){
            $luachon = $request->input('luachon'); 
            $ch = $request->input('id_ch');     
            for($i = 1; $i < 7; $i++)
            {               
                $kq = new chitietkqkttvs;   
                $kq->id_ch = $ch[$i];
                if(isset($luachon[$i])) {  
                    $kq->luachon = $luachon[$i];
                }
                else{
                    $kq->luachon = 0;
                    $luachon[$i]=0;
                }
                $kq->id_kq = $id_kq;
                $kq->ketqua = 0;
                $kq->save();
                $ctkq1 = DB::table('chitietkqkttvs')            
                ->join('cauhoituvungs', 'cauhoituvungs.id', '=', 'chitietkqkttvs.id_ch')          
                ->where(
                    [
                        ['cauhoituvungs.id', 'like', $ch[$i]],
                        ['cauhoituvungs.dapandung', 'like', $luachon[$i]],
                    ])  
                ->update(['ketqua' => 1]); 
            }   
        }         
        $que = DB::table('chitietkqkttvs')
        ->select(DB::raw('count(*) as sl,id_kq'))                     
        ->groupBy('id_kq')
        ->where([
            ['ketqua','=',1],
            ['id_kq','=',$id_kq],
            ])
        ->first();
        $sl = count($que);
        if($sl!=0)
        {
            $sl = $que->sl;
        }
        $bai = $request->bai;
        $id = $request->bai;
        $kqua = kqkttvs::where('id', '=', $id_kq)
        ->update(['ketqua' => $sl,
        'hoatdong'=>1,
        'giohoanthanh' =>$total]);
        $last=DB::table('lichhocs')->latest('id')->first();
        $last_bai = $last->id_bai + 0;
        if($last->ketqua>5)
        {
            $last_bai = $last->id_bai + 1;
        }
        else{
            $last_bai = $last->id_bai + 0;
        }
        return view ('client.kqkiemtratv',['sl'=>$sl,'bai'=>$bai,'id'=>$id,'last_bai'=>$last_bai]);
    }
    public function postKiemtraNguPhap(Request $request)
    {
        $chitietkqktnps = new chitietkqktnps; 
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $today = getdate();
        $h = $today['hours'];
        $m = $today['minutes'];
        $s = $today['seconds'];
        $total=$h*3600+$m*60+$s; 
        $idkq= DB::table('kqktnps')            
        ->where('gioketthuc','>',$total)
        ->get();
        $luachon = $request->input('luachon'); 
        $ch = $request->input('id_ch');     
        for($i = 2; $i < 5; $i++)
        {
            foreach($idkq as $kq1)
            {
                $id_kq = $kq1->id;
            }                   
            $kq = new chitietkqktnps;   
            $kq->id_ch = $ch[$i];
            if(isset($luachon[$i])) {  
                $kq->luachon = $luachon[$i];
            }
            else{
                $kq->luachon = 0;
                $luachon[$i]=0;
            }
            foreach($idkq as $kq1)
            {
                $kq->id_kq = $kq1->id;
            }
            $kq->ketqua = 0;
            $kq->save();
            $ctkq1 = DB::table('chitietkqktnps')            
            ->join('cauhoinguphaps', 'cauhoinguphaps.id', '=', 'chitietkqktnps.id_ch')          
            ->where(
                [
                    ['cauhoinguphaps.id', 'like', $ch[$i]],
                    ['cauhoinguphaps.dapandung', 'like', $luachon[$i]],
                ])  
            ->update(['ketqua' => 1]); 
        }              
        $que = DB::table('chitietkqktnps')
        ->select(DB::raw('count(*) as sl,id_kq'))                     
        ->groupBy('id_kq')
        ->where([
            ['ketqua','=',1],
            ['id_kq','=',$id_kq],
            ])
        ->get();
        $sl = count($que);
        if($sl!=0){
            foreach($que as $q)
            {
                $sl = $q->sl;
            }
        }
        $bai = $request->bai;
        $kqua = kqktnps::where('id', '=', $id_kq)
        ->update(['ketqua' => $sl,
        'hoatdong'=>1,
        'giohoanthanh' =>$total]);
        $id = $request->bai;
        $last=DB::table('lichhocs')->latest('id')->first();
        $last_bai = $last->id_bai + 0;
        if($last->ketqua>5)
        {
            $last_bai = $last->id_bai + 1;
        }
        else{
            $last_bai = $last->id_bai + 0;
        }
        return view ('client.kqkiemtranp',['bai'=>$bai,'sl'=>$sl,'id'=>$id,'last_bai'=>$last_bai]);
    }
    public function getDoiMatKhau($id)
    {
        $last=DB::table('lichhocs')->where('id_hv','=',$id)->latest('id')->first();
        if(!isset($last)){
            $last = 1;
            $last_bai = 1;
        }
        else{
            if($last->ketqua>=5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai;
            }
        }
        return view('client.doimk',['last_bai'=>$last_bai]);
    }
    public function postDoiMatKhau(Request $request, $id)
    {        
        $users = user ::find($id);
        $this->validate($request,
        [
            'old_pw'=>'required|min:6',
            'new_pw'=>'required|min:6',
            'new_pw_confirmation'=>'required|same:new_pw',
        ],
        [
        ]);
        $data;
        $old_pw = $request->old_pw;
        $new_pw=$request->new_pw;
        $new_pw_confirmation=$request->new_pw_confirmation;
        if(!Hash::check($old_pw, $users->password))
            return redirect()->back()->with('thongbao', "Mật khẩu cũ không đúng!");
        $data = array(
            'password' => Hash::make($new_pw)
        );
        user::where('id',$id)->update($data);
        return redirect('doimk/{{Auth::user()->id}}')->with('thongbao','Thay đổi mật khẩu thành công!');
    }
    public function getTrangCaNhan($id)
    {
        $last=DB::table('lichhocs')->where('id_hv','=',$id)->latest('id')->first();
        if(!isset($last)){
            $last = 1;
            $last_bai = 1;
        }
        else{
            if($last->ketqua>=5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai;
            }
        }
        return view('client.trangcanhan',['last_bai'=>$last_bai]);
    }
    public function postDoiTT(Request $request,$id)
    {
        $this->validate($request,
        [
            'ten'=>'required|min:1|max:100'
        ],
        [
        ]);
        $users = user ::find($id);
        $users->name = $request->ten;
        $users->save();       
        return redirect('doimk/{{Auth::user()->id}}')->with('thongbao','Thay đổi tên thành công!');
    }
    public function getLichHoc($id)
    {
        $users = user ::find($id);
        $last  = DB::table('dangkihocs')->latest('id')->first();
        if(!isset($last)){
            $last_bai=1;
            $idbai=2;
        }
        else{
            $last_bai = $last->id_bai ;
            $idbai=$last->id_bai;
        }       
        $usersa=user::all();
        $lh= DB::table('lichhocs')            
        ->where([
            ['id_hv','=',$id],
            ['hoatdong','=','1']
        ])
        ->get();
        $dkh = dangkihoc::all();
        $baisa=bai::all();
        $last=DB::table('lichhocs')->where('id_hv','=',$id)->latest('id')->first();
        if(!isset($last)){
            $last_bai=1;
        }
        else{
            $id=$last->id_bai;
        }        
        return view('client.lichhoc',['idbai'=>$idbai,'users'=>$users,'lh'=>$lh,'baisa'=>$baisa,'id'=>$id,'dkh'=>$dkh,'last_bai'=>$last_bai]);
    }
    public function getKetQuaKiemTra($id)
    {
        $kqtv= DB::table('kqkttvs')            
        ->where('id_hv',$id)
        ->get();
        $kqnp= DB::table('kqktnps')            
        ->where('id_hv',$id)
        ->get();
        $lh= DB::table('ketquaktbaicuses')            
        ->where([
            ['id_hv','=',$id],
            ['hoatdong','=','1']
        ])
        ->get();
        $last=DB::table('lichhocs')->where('id_hv','=',$id)->latest('id')->first();
        if(!isset($last)){
            $last = 1;
            $last_bai = 1;
        }
        else{
            if($last->ketqua>=5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai;
            }
        }
        return view('client.ketquakiemtra',['lh'=>$lh,'kqtv'=>$kqtv,'kqnp'=>$kqnp,'last_bai'=>$last_bai]);
    }
    public function postDangKiLichHoc(Request $request)
    {
        $this->validate($request,
        [
            'ngaydkhoc'=>'required|min:1|max:100',
            'id_bai'=>'need'
        ],
        [
        ]);
        $id = $request->hv;
        $users = user ::find($id);
        $last  = DB::table('dangkihocs')->where('id_hv','=',$id)->latest('id')->first();
        if(!isset($last)){
            $last_bai=1;
            $idbai=2;
        }
        else{
            $last_bai = $last->id_bai ;
            $idbai = $last->id_bai;
        }       
        if($last_bai == $request->id_bai){
            $ex = dangkihoc::where('id_bai', '=', $request->id_bai)->update(['ngaydangkihoc' => $request->ngaydkhoc]);
        }
        else{
            $dkh = new dangkihoc;
            $dkh->id_hv = $id;
            $dkh->id_bai = $request->id_bai;
            $dkh->ngaydangkihoc =  $request->ngaydkhoc;
            $dkh->save();  
        }
        $usersa=user::all();
        $dkh=dangkihoc::all();
        $lh = DB::table('lichhocs')->where('id_hv','=',$id)->get();
        $baisa=bai::all();
        return view('client.lichhoc',['users'=>$users,'idbai'=>$idbai,'dkh'=>$dkh,'baisa'=>$baisa,'lh'=>$lh,'last_bai'=>$last_bai]);
    }
    public function getHiragana()
    {
        $hira1= DB::table('bangchucaichitiets')            
        ->where('loai',1)
        ->get();
        $hira2= DB::table('bangchucaichitiets')            
        ->where('loai',2)
        ->get();
        return view('client.hiragana',['hira1'=>$hira1,'hira2'=>$hira2]);
    }
    public function getKatakana()
    {
        $hira1= DB::table('bangchucaichitiets')            
        ->where('loai',1)
        ->get();
        $hira2= DB::table('bangchucaichitiets')            
        ->where('loai',2)
        ->get();
        return view('client.katakana',['hira1'=>$hira1,'hira2'=>$hira2]);
    }
    public function getHiraLuyenTap()
    {
        $hira1= DB::table('bangchucaichitiets')            
        ->where('loai',1)
        ->get();
        $hira2= DB::table('bangchucaichitiets')            
        ->where('loai',2)
        ->get();
        return view('client.hiragana_luyentap',['hira1'=>$hira1,'hira2'=>$hira2]);
    }
    public function getKataLuyenTap()
    {
        $hira1= DB::table('bangchucaichitiets')            
        ->where('loai',1)
        ->get();
        $hira2= DB::table('bangchucaichitiets')            
        ->where('loai',2)
        ->get();
        return view('client.katakana_luyentap',['hira1'=>$hira1,'hira2'=>$hira2]);
    }
    public function getHiraganaDN($id)
    {
        $hira1= DB::table('bangchucaichitiets')            
        ->where('loai',1)
        ->get();
        $hira2= DB::table('bangchucaichitiets')            
        ->where('loai',2)
        ->get();
        $last=DB::table('lichhocs')->where('id_hv','=',$id)->latest('id')->first();
        if(!isset($last))
        {
            $last_bai = 1;
        }
        else
        {
            if($last->ketqua>=5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai;
            }
        }        
        return view('client.hiragana_dn',['hira1'=>$hira1,'hira2'=>$hira2,'last_bai'=>$last_bai]);
    }
    public function getKatakanaDN($id)
    {
        $hira1= DB::table('bangchucaichitiets')            
        ->where('loai',1)
        ->get();
        $hira2= DB::table('bangchucaichitiets')            
        ->where('loai',2)
        ->get();
        $last=DB::table('lichhocs')->where('id_hv','=',$id)->latest('id')->first();
        if(!isset($last))
        {
            $last_bai = 1;
        }
        else
        {
            $last_bai = $last->id_bai + 0;
            if($last->ketqua>5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai + 0;
            }
        }        
        return view('client.katakana_dn',['hira1'=>$hira1,'hira2'=>$hira2,'last_bai'=>$last_bai]);
    }
    public function getHiraLuyenTapDN($id)
    {
        $hira1= DB::table('bangchucaichitiets')            
        ->where('loai',1)
        ->get();
        $hira2= DB::table('bangchucaichitiets')            
        ->where('loai',2)
        ->get();
        $last=DB::table('lichhocs')->where('id_hv','=',$id)->latest('id')->first();
        if(!isset($last))
        {
            $last_bai = 1;
        }
        else
        {
            $last_bai = $last->id_bai + 0;
            if($last->ketqua>5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai + 0;
            }
        }        
        return view('client.hiragana_luyentap_dn',['hira1'=>$hira1,'hira2'=>$hira2,'last_bai'=>$last_bai]);
    }
    public function getKataLuyenTapDN($id)
    {
        $hira1= DB::table('bangchucaichitiets')            
        ->where('loai',1)
        ->get();
        $hira2= DB::table('bangchucaichitiets')            
        ->where('loai',2)
        ->get();
        $last=DB::table('lichhocs')->where('id_hv','=',$id)->latest('id')->first();
        if(!isset($last))
        {
            $last_bai = 1;
        }
        else
        {
            $last_bai = $last->id_bai + 0;
            if($last->ketqua>5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai + 0;
            }
        }        
        return view('client.katakana_luyentap_dn',['hira1'=>$hira1,'hira2'=>$hira2,'last_bai'=>$last_bai]);
    }
    public function getGuiMaXacNhan()
    {
        return view('client.guimaxacnhan');
    }
    public function getBatDauHoc()
    {
        return view('client.batdauhoc');
    }
    public function getDKHoc($id)
    {
        $last=DB::table('lichhocs')->where('id_hv','=',$id)->latest('id')->first();
        if(!isset($last)){
            Lichhoc::create(
                [
                    'ketqua'=>'0',
                    'hoatdong'=>'0',
                    'tuvung'=>'0',
                    'nguphap'=>'0',
                    'luyendoc'=>'0',
                    'luyennghe'=>'0',
                    'hoithoai'=>'0',
                    'baitap'=>'0',
                    'id_hv'=>$id,
                    'id_bai'=>'1',
                    'ngayhoc'=>date('Y/m/d')
                ]
            );
            $last = 1;
            $last_bai = 1;
            $tenbh = DB::table('hoithoais')->limit($last_bai)->get();
            return view('client.index_dangnhap',['last'=>$last,'last_bai'=>$last_bai,'tenbh'=>$tenbh]);
        }
        else{
            $last=DB::table('lichhocs')->where('id_hv','=',$id)->latest('id')->first();
            if($last->ketqua>=5){
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai;
            }
            $tenbh = DB::table('hoithoais')->limit($last_bai)->get();
            return view('client.index_dangnhap',['last'=>$last,'last_bai'=>$last_bai,'tenbh'=>$tenbh]);
        }
    }
    public function getEditLichhoc($id,$id1)
    {
        $dkhcs = dangkihoc ::find($id);
        $lh  = DB::table('lichhocs')->where('id_hv','=',$id1)->get();
        $dkh  = DB::table('dangkihocs')->where('id_hv','=',$id1)->get();
        $last=DB::table('lichhocs')->latest('id')->first();
        if(!isset($last))
        {
            $last_bai = 1;
        }
        else
        {
            if($last->ketqua>5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai + 0;
            }
        }   
        return view('client.qllichoc_edit',['lh'=>$lh,'dkh'=>$dkh,'dkhcs'=>$dkhcs,'last_bai'=>$last_bai]);
    }
    public function getDeleteLichhoc($id,$id1)
    {
        $dkhcs=dangkihoc::find($id);
        $dkhcs->delete();
        $last  = DB::table('dangkihocs')->where('id_hv','=',$id1)->latest('id')->first();
        $lh  = DB::table('lichhocs')->where('id_hv','=',$id1)->get();
        $dkh  = DB::table('dangkihocs')->where('id_hv','=',$id1)->get();
        if(!isset($dkh)){
            $last_bai=1;
            $idbai=2;
        }
        else{
            $last_bai = $last->id_bai ;
            $idbai=$last->id_bai;
        }       
        return view('client.lichhoc',['idbai'=>$idbai,'dkh'=>$dkh,'lh'=>$lh,'last_bai'=>$last_bai]);
    }
    public function postEditLichhoc(Request $request, $id,$id1)
    {     
        $dkhcs = dangkihoc ::find($id);   
        $this->validate($request,
        [
            'ngaydkhoc'=>'required|min:1|max:100',
            'id_bai'=>'need'
        ],
        [
        ]);
        $dkhcs->ngaydangkihoc = $request->ngaydkhoc;
        $dkhcs->save();
        $last  = DB::table('dangkihocs')->where('id_hv','=',$id1)->latest('id')->first();
        $lh  = DB::table('lichhocs')->where('id_hv','=',$id1)->get();
        $dkh  = DB::table('dangkihocs')->where('id_hv','=',$id1)->get();
        if(!isset($dkh)){
            $last_bai=1;
            $idbai=2;
        }
        else{
            $last_bai = $last->id_bai ;
            $idbai=$last->id_bai;
        }       
        return view('client.lichhoc',['idbai'=>$idbai,'dkh'=>$dkh,'lh'=>$lh,'last_bai'=>$last_bai]);
    }
    public function getIndexDangNhap($id)
    {
        $last=DB::table('lichhocs')->where('id_hv','=',$id)->latest('id')->first();
        if(!isset($last)){
            $last = 1;
            $last_bai = 1;
        }
        else{
            if($last->ketqua>=5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai + 0;
            }
        }
        $tenbh = DB::table('hoithoais')->limit($last_bai)->get();
        return view('client.index_dangnhap',['last'=>$last,'last_bai'=>$last_bai,'tenbh'=>$tenbh]);
    }
    public function postGuiMaXacNhan(Request $request)
    {
        $this->validate($request,
        [
            'email'=>'required|unique:xacnhanemails|min:1|max:100'
        ],
        [
        ]);
        $makichhoat = str_random(6);
        Mail::send('email_verify', array('makichhoat'=>$makichhoat), function($message) {
            $message->to(Input::get('email'), 'Visitor')->subject('Mã xác nhận');
        });
        $xacnhan = new xacnhanemail;
        $xacnhan->email = $request->email;
        $xacnhan->makichhoat = $makichhoat;
        $xacnhan->save();
        $email = $request->email;
        return view('client.nhapmaxacnhan',['email'=>$email]);
    }
    public function postNhapMaXacNhan(Request $request)
    {
        $this->validate($request,
        [
            'makichhoat'=>'required|min:1|max:6'
        ],
        [
        ]);
        $nmxn = DB::table('xacnhanemails')                  
        ->where(
            [
                ['email', 'like', $request->email],
                ['makichhoat', 'like', $request->makichhoat],
            ])  
        ->first();
        $email=$request->email;
        if(!isset($nmxn))
        {
            return back();
        }
        else
        {
            return view('auth.register',['email'=>$email]);
        }
    }
    public function getGuiMaXacNhanQuenMatKhau()
    {
        return view('client.guimaxacnhanquenmk');
    }
    public function postGuiMaXacNhanQuenMatKhau(Request $request)
    {
        $this->validate($request,
        [
            'email'=>'required|min:1|max:100'
        ],
        [
        ]);
        $email = $request->email;
        $makichhoat = str_random(6);
        // Mail::send('email_verify', array('makichhoat'=>$makichhoat), function($message) {
        //     $message->to(Input::get('email'), 'Visitor')->subject('Mã xác nhận');
        // });
        $ex = user::where('email', '=', $request->email)->update(['makichhoatqmk' => $makichhoat]);
        return view('client.nhapmaxacnhanquenmk',['email'=>$email]);
    }
    public function postNhapMaXacNhanQuenMatKhau(Request $request)
    {
        $this->validate($request,
        [
            'makichhoat'=>'required|min:1|max:6'
        ],
        [
        ]);
        $nmxn = DB::table('users')                  
        ->where(
            [
                ['email', 'like', $request->email],
                ['makichhoatqmk', 'like', $request->makichhoat],
            ])  
        ->first();
        $email=$request->email;
        if(!isset($nmxn))
        {
            return back();
        }
        else
        {
            return view('client.quenmk',['email'=>$email]);
        }
    }
    public function postTaoMoiMatKhau(Request $request)
    {        
        $this->validate($request,
        [
            'new_pw'=>'required|min:6',
            'new_pw_confirmation'=>'required|same:new_pw',
        ],
        [
        ]);
        $data;
        $email=$request->email;
        $new_pw=$request->new_pw;
        $new_pw_confirmation=$request->new_pw_confirmation;
        $data = array(
            'password' => Hash::make($new_pw)
        );
        user::where('email',$email)->update($data);
        return view('auth.login');
    }
    public function getDangLenDienDan($id)
    {
        $kqua = ketquaktbaicus::where('id', '=', $id)
        ->update(['post' => 1]);
        $kqktbc = DB::table('ketquaktbaicuses')            
                ->join('users', 'users.id', '=', 'ketquaktbaicuses.id_hv')
                ->where('post','=','1')
                ->orderBy('ketqua', 'desc')
                ->limit(10)
                ->get();
        $kqktbc1 = DB::table('ketquaktbaicuses')            
        ->join('users', 'users.id', '=', 'ketquaktbaicuses.id_hv')
        ->where('post','=','1')
        ->orderBy('ketquaktbaicuses.updated_at', 'desc')
        ->limit(10)
        ->get();
        $last=DB::table('lichhocs')->latest('id')->first();
        if(!isset($last)){
            $last_bai=1;
        }
        if($last->ketqua>5)
        {
            $last_bai = $last->id_bai + 1;
        }
        else{
            $last_bai = $last->id_bai + 0;
        }
        return view('client.diendan',['kqktbc'=>$kqktbc,'kqktbc1'=>$kqktbc1,'last_bai'=>$last_bai]);
    }  
    public function getDienDan($id)
    {
        $kqktbc = DB::table('ketquaktbaicuses')            
                ->join('users', 'users.id', '=', 'ketquaktbaicuses.id_hv')
                ->where('post','=','1')
                ->orderBy('ketqua', 'desc')
                ->limit(10)
                ->get();
        $kqktbc1 = DB::table('ketquaktbaicuses')            
        ->join('users', 'users.id', '=', 'ketquaktbaicuses.id_hv')
        ->where('post','=','1')
        ->orderBy('ketquaktbaicuses.updated_at', 'desc')
        ->limit(10)
        ->get();
        $last=DB::table('lichhocs')->where('id_hv','=',$id)->latest('id')->first();
        if(!isset($last)){
            $last_bai=1;
        }
        else{
            if($last->ketqua>5)
            {
                $last_bai = $last->id_bai + 1;
            }
            else{
                $last_bai = $last->id_bai;
            }
        }
        return view('client.diendan',['kqktbc'=>$kqktbc,'kqktbc1'=>$kqktbc1,'last_bai'=>$last_bai]);
    }  
}
