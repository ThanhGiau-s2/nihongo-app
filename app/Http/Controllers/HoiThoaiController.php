<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hoithoai;
use App\bai;
use Excel;
use DB;
class HoiThoaiController extends Controller
{
    //
    public function getList()
    {
        $hoithoais=hoithoai::all();
        return view ('admin.hoithoai.list',['hoithoais'=>$hoithoais]);
    }
    public function getAdd(){
        $baisa=bai::all();
        $hoithoais=hoithoai::all();
        return view('admin.hoithoai.add',['hoithoais'=>$hoithoais,'baisa'=>$baisa]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'id_bai'=>'need',
            'tieude'=>'required',
            'hinhdaidien'=>'required',
            'noidung'=>'required',
            'mp3'=>'required'
        ],
        [
        ]);  
        $hoithoai = new hoithoai;
        $hoithoai->tieude = $request->tieude;
        $hoithoai->id_bai = $request->id_bai;
        if($request->hasFile('hinhdaidien'))
        {
            $file = $request->hinhdaidien;
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png'&& $duoi!='jpeg')
            {
                return redirect('admin/hoithoai/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/hoithoai/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/hoithoai', $Hinh);
            $hoithoai->hinhdaidien=$Hinh;
        }
        else
        {
            $hoithoai->hinhdaidien="";
        }
        $hoithoai->noidung = $request->noidung;
        if($request->hasFile('mp3'))
        {
            $file2 = $request->mp3;
            $name2 = $file2->getClientOriginalName();
            $duoi2 = $file2->getClientOriginalExtension();
            if($duoi2!='mp3')
            {
                return redirect('admin/hoithoai/add')->with('thongbao','Bạn chỉ được chọn file có đuôi mp3');
            }
            $mp3 = str_random(4)."_".$name2;
            while (file_exists("upload/hoithoai/".$mp3))
            {
                $mp3 = str_random(4)."_".$name2;
            }
            $file2->move('upload/hoithoai', $mp3);
            $hoithoai->mp3=$mp3;
        }
        else
        {
            $hoithoai->mp3="";
        }
        $hoithoai->save();
        return redirect('admin/hoithoai/list')->with('thongbao','Thêm thành công');        
    }
    public function getDelete($id)
    {
        $hoithoais=hoithoai::find($id);
        $hoithoais->delete();
        return redirect('admin/hoithoai/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
        $hoithoais = hoithoai::find($id);
        $baisa=bai::all();
        return view('admin.hoithoai.edit',['hoithoais'=>$hoithoais,'baisa'=>$baisa]);
    }
    public function postEdit(Request $request, $id)
    {     
        $this->validate($request,
        [
            'tieude'=>'required',
            'hinhdaidien'=>'required',
            'noidung'=>'required',
            'mp3'=>'required'
        ],
        [
        ]);
        $hoithoai = hoithoai ::find($id);
        $hoithoai->tieude = $request->tieude;
        $hoithoai->id_bai = $request->id_bai;
        if($request->hasFile('hinhdaidien'))
        {
            $file = $request->hinhdaidien;
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png'&& $duoi!='jpeg')
            {
                return redirect('admin/hoithoai/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/hoithoai/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/hoithoai', $Hinh);
            $hoithoai->hinhdaidien=$Hinh;
        }
        else
        {
            $hoithoai->hinhdaidien="";
        }
        $hoithoai->noidung = $request->noidung;
        if($request->hasFile('mp3'))
        {
            $file2 = $request->mp3;
            $name2 = $file2->getClientOriginalName();
            $duoi2 = $file2->getClientOriginalExtension();
            if($duoi2!='mp3')
            {
                return redirect('admin/hoithoai/add')->with('thongbao','Bạn chỉ được chọn file có đuôi mp3');
            }
            $mp3 = str_random(4)."_".$name2;
            while (file_exists("upload/hoithoai/".$mp3))
            {
                $mp3 = str_random(4)."_".$name2;
            }
            $file2->move('upload/hoithoai', $mp3);
            $hoithoai->mp3=$mp3;
        }
        else
        {
            $hoithoai->mp3="";
        }
        $hoithoai->save();      
        return redirect('admin/hoithoai/list')->with('thongbao','Sửa thành công');
    }
    public function downloadExcelSample()
	{
		$data = array
        (
            array('hinhdaidien','tieude','mp3','noidung','id_bai')
		);
		return Excel::create('Danh sách hội thoại', function($excel) use ($data) {
			$excel->sheet('Danh sách hội thoại', function($sheet) use ($data)
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
					$insert[] = [
                        'hinhdaidien' => $value->hinhdaidien,
                        'tieude' => $value->tieude,
                        'mp3' => $value->mp3,
                        'noidung' => $value->noidung,
                        'id_bai' => $value->id_bai,
                    ];					
				}
				if(!empty($insert)){
					DB::table('hoithoais')->insert($insert);					
					return redirect('admin/hoithoai/list')->with('thongbao','Thêm dữ liệu thành công.');		
				}
			}
		}
		return back();
	}
}
