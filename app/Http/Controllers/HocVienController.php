<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hocvien;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
class HocVienController extends Controller
{
    //
    public function getList()
    {
        $hocviens=user::all();
        return view ('admin.hocvien.list',['hocviens'=>$hocviens]);
    }
    public function getAdd(){
        $hocviens=hocvien::all();
        return view('admin.hocvien.add',['hocviens'=>$hocviens]);
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
        $hocviens = new hocvien;
        $hocviens->ten = $request->ten;
        $hocviens->quyen = $request->quyen;
        $hocviens->email = $request->email;
        $hocviens->ngaysinh = $request->ngaysinh;
        $hocviens->gioitinh = $request->gioitinh;
        $hocviens->hoatdong = $request->hoatdong;
        $hocviens->password= Hash::make($request->password);
        $hocviens->save();
        return redirect('admin/hocvien/list')->with('thongbao','Thêm thành công');
    }
    public function getDelete($id)
    {
        $hocviens=hocvien::find($id);
        $hocviens->delete();
        return redirect('admin/hocviens/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
        $hocviens = user::find($id);
        return view('admin.hocvien.edit',['hocviens'=>$hocviens]);
    }
    public function postEdit(Request $request, $id)
    {        
        $hocviens = hocvien ::find($id);
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
        $hocviens->ten = $request->ten;
        $hocviens->quyen = $request->quyen;
        $hocviens->email = $request->email;
        $hocviens->ngaysinh = $request->ngaysinh;
        $hocviens->gioitinh = $request->gioitinh;
        $hocviens->hoatdong = $request->hoatdong;
        $hocviens->password= Hash::make($request->password);
        $hocviens->save();
        return redirect('admin/hocvien/list')->with('thongbao','Sửa thành công');
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
					DB::table('hocviens')->insert($insert);					
					return redirect('admin/hocvien/list')->with('thongbao','Thêm dữ liệu thành công.');		
				}
			}
		}
		return back();
	}
}
