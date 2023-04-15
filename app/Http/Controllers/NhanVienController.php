<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhanvien;
use Illuminate\Support\Facades\Hash;

class NhanVienController extends Controller
{
    //
    public function getList()
    {
        $nhanviens=nhanvien::all();
        return view ('admin.nhanvien.list',['nhanviens'=>$nhanviens]);
    }
    public function getAdd(){
        $nhanviens=nhanvien::all();
        return view('admin.nhanvien.add',['nhanviens'=>$nhanviens]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            // 'password' => 'required|min:6',
            // 'password_confirmation' => 'required|same:password',
            // 'name'=>'required|min:1|max:100',
            // 'dob'=>'required',
            // 'gender'=>'required',
            // 'email'=>'required|email|unique:admins',
            // 'active'=>'required',
        ],
        [
        ]);
        $nhanviens = new nhanvien;
        $nhanviens->ten = $request->ten;
        $nhanviens->quyen = $request->quyen;
        $nhanviens->email = $request->email;
        $nhanviens->ngaysinh = $request->ngaysinh;
        $nhanviens->gioitinh = $request->gioitinh;
        $nhanviens->hoatdong = $request->hoatdong;
        $nhanviens->password= Hash::make($request->password);
        $nhanviens->save();
        return redirect('admin/nhanvien/list')->with('thongbao','Thêm thành công');
    }
    public function getDelete($id)
    {
        $nhanviens=nhanvien::find($id);
        $nhanviens->delete();
        return redirect('admin/nhanviens/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
        $nhanviens = nhanvien::find($id);
        return view('admin.nhanvien.edit',['nhanviens'=>$nhanviens]);
    }
    public function postEdit(Request $request, $id)
    {        
        $nhanviens = nhanvien ::find($id);
        $this->validate($request,
        [
            // 'password' => 'required|min:6',
            // 'password_confirmation' => 'required|same:password',
            // 'name'=>'required|min:1|max:100',
            // 'dob'=>'required',
            // 'gender'=>'required',
            // 'email'=>'required|email|unique:admins',
            // 'active'=>'required',
        ],
        [
        ]);
        $nhanviens->ten = $request->ten;
        $nhanviens->quyen = $request->quyen;
        $nhanviens->email = $request->email;
        $nhanviens->ngaysinh = $request->ngaysinh;
        $nhanviens->gioitinh = $request->gioitinh;
        $nhanviens->hoatdong = $request->hoatdong;
        $nhanviens->password= Hash::make($request->password);
        $nhanviens->save();
        return redirect('admin/nhanvien/list')->with('thongbao','Sửa thành công');
    }
    public function downloadExcelSample()
	{
		$data = array
        (
            array('ten'),
		);
		return Excel::create('Danh sách bài học', function($excel) use ($data) {
			$excel->sheet('Danh sách bài học', function($sheet) use ($data)
	        {
				$sheet->fromArray($data,null, 'A1', false, false);
	        });
		})->download('xlsx');
	}
	public function importExcel(Request $request)
	{       
        if($request->hasFile('import_file')){
            $file = $request->import_file;
            $path = $file->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['ten' => $value->ten];					
				}
				if(!empty($insert)){
					DB::table('nhanviens')->insert($insert);					
					return redirect('admin/nhanvien/list')->with('thongbao','Thêm dữ liệu thành công.');		
				}
			}
		}
		return back();
	}
}
