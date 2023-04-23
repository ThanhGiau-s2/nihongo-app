<?php
namespace App\Http\Controllers;
use DB;
use App\Models\kqktnps;
use App\Models\kqkttvs;
use App\Models\ketquaktbaicus;
use App\Models\chitietkqktnps;
use App\Models\chitietkqkttvs;
use App\Models\chitietkqktbaicuses;

class KetQuaController extends Controller
{
    //
    public function getListKTBC()
    {       
        $kqktbc = DB::table('ketquaktbaicuses')            
                ->join('users', 'users.id', '=', 'ketquaktbaicuses.id_hv')
                ->select('ketquaktbaicuses.id as id_kqktbc','users.id as id_hv','users.name','ketquaktbaicuses.id_bai','ketquaktbaicuses.ketqua','ketquaktbaicuses.giobatdau','ketquaktbaicuses.giohoanthanh','ketquaktbaicuses.ngay')
                ->get();
        return view ('admin.ketqua.listkqktbc',['kqktbc'=>$kqktbc]);
    }
    public function getListKTTV()
    {       
        $kqkttv = DB::table('kqkttvs')            
                ->join('users', 'users.id', '=', 'kqkttvs.id_hv')
                ->select('kqkttvs.id as id_kqkttv','users.id as id_hv','users.name','kqkttvs.id_bai','kqkttvs.ketqua','kqkttvs.giobatdau','kqkttvs.giohoanthanh','kqkttvs.ngay')
                ->get();
        return view ('admin.ketqua.listkqkttv',['kqkttv'=>$kqkttv]);
    }
    public function getListKTNP()
    {       
        $kqktnp = DB::table('kqktnps')            
                ->join('users', 'users.id', '=', 'kqktnps.id_hv')
                ->select('kqktnps.id as id_kqktnp','users.id as id_hv','users.name','kqktnps.id_bai','kqktnps.ketqua','kqktnps.giobatdau','kqktnps.giohoanthanh','kqktnps.ngay')
                ->get();
        return view ('admin.ketqua.listkqktnp',['kqktnp'=>$kqktnp]);
    }
    public function getDeleteKTBC($id)
    {       
        $kqktbc=ketquaktbaicus::find($id);
        $kqktbc->delete();
        return redirect('admin/ketqua/listktbc')->with('thongbao','Xóa thành công');
    }
    public function getDeleteKTTV($id)
    {       
        $kqkttv=kqkttvs::find($id);
        $kqkttv->delete();
        return redirect('admin/ketqua/listkttv')->with('thongbao','Xóa thành công');
    }
    public function getDeleteKTNP($id)
    {       
        $kqktnp=kqktnps::find($id);
        $kqktnp->delete();
        return redirect('admin/ketqua/listktnp')->with('thongbao','Xóa thành công');
    }
    public function getListCTKTBC()
    {       
        $kqktbc = DB::table('chitietkqktbaicuses')            
                ->get();
        return view ('admin.ketqua.listctkqktbc',['kqktbc'=>$kqktbc]);
    }
    public function getListCTKTTV()
    {       
        $kqkttv = DB::table('chitietkqkttvs')            
                ->get();
        return view ('admin.ketqua.listctkqkttv',['kqkttv'=>$kqkttv]);
    }
    public function getListCTKTNP()
    {       
        $kqktnp = DB::table('chitietkqktnps')            
                ->get();
        return view ('admin.ketqua.listctkqktnp',['kqktnp'=>$kqktnp]);
    }
    public function getDeleteCTKTBC($id)
    {       
        $kqktbc=chitietkqktbaicuses::find($id);
        $kqktbc->delete();
        return redirect('admin/ctketqua/listktbc')->with('thongbao','Xóa thành công');
    }
    public function getDeleteCTKTTV($id)
    {       
        $kqkttv=chitietkqkttvs::find($id);
        $kqkttv->delete();
        return redirect('admin/ctketqua/listkttv')->with('thongbao','Xóa thành công');
    }
    public function getDeleteCTKTNP($id)
    {       
        $kqktnp=chitietkqktnps::find($id);
        $kqktnp->delete();
        return redirect('admin/ctketqua/listktnp')->with('thongbao','Xóa thành công');
    }
}
