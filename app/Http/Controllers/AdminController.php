<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\nhanvien;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('nhanvien');
    }
    public function getIndex()
    {
        return view('admin.layout.home');
    }
    public function index()
    {
        return view('admin.layout.home');
    }
    public function getLogout() {
    	Auth::guard('nhanvien')->logout();
    	return redirect('ad');
    }
    public function getADTrangCaNhan(){
        return view('admin.trangcanhan');
    }
    public function postADDoiTT(Request $request,$id)
    {
        $this->validate($request,
        [
            'ten'=>'required|min:1|max:100'
        ],
        [
        ]);
        $nv = nhanvien ::find($id);
        $nv -> ten = $request->ten;
        $nv -> ngaysinh = $request->ngaysinh;
        $nv -> gioitinh = $request->gioitinh;
        $nv->save();       
        return redirect('ad/trangcanhan')->with('thongbao','Sửa thành công');
    }
    public function getADDoiMatKhau($id)
    {
        $nv = nhanvien ::find($id);
        return view('admin.doimkad',['nv'=>$nv]);
    }
    public function postADDoiMatKhau(Request $request, $id)
    {        
        $nv = nhanvien ::find($id);
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
        if(!Hash::check($old_pw, $nv->password))
            return redirect()->back()->with('thongbao', "Mật khẩu cũ không đúng!");
        $data = array(
            'password' => Hash::make($new_pw)
        );
        nhanvien::where('id',$id)->update($data);
        return redirect('ad/doimk/$id')->with('thongbao','Thay đổi mật khẩu thành công!');
    }
    public function getADGuiMaXacNhanQuenMatKhau()
    {
        return view('admin.guimaxacnhanquenmkad');
    }
}
