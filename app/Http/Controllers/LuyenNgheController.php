<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\luyennghe;
use App\Models\bai;
use Excel;
use DB;

class LuyenNgheController extends Controller
{
    //
    public function getList()
    {
        $luyennghes=luyennghe::all();
        return view ('admin.luyennghe.list',['luyennghes'=>$luyennghes]);
    }
    public function getAdd(){
        $baisa=bai::all();
        $luyennghes=luyennghe::all();
        return view('admin.luyennghe.add',['luyennghes'=>$luyennghes,'baisa'=>$baisa]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'id_bai'=>'need',
            'hinh'=>'required',
            'cau'=>'required',
            'mp3'=>'required'
        ],
        [
        ]);
        $luyennghe = new luyennghe;
        $luyennghe->id_bai = $request->id_bai;
        $luyennghe->cau = $request->cau;
        if($request->hasFile('hinh'))
        {
            $file = $request->hinh;
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='png'&&$duoi!='jpg'&&$duoi!='jpeg')
            {
                return back()->with('thongbao','Bạn chỉ được chọn file có đuôi png hoặc jpg hoặc jpeg chp field Hình');
            }
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/luyennghe/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/luyennghe', $Hinh);
            $luyennghe->hinh=$Hinh;
        }
        else
        {
            $luyennghe->hinh="";
        }
        if($request->hasFile('mp3'))
        {
            $file1 = $request->mp3;
            $name1 = $file1->getClientOriginalName();
            $duoi1 = $file1->getClientOriginalExtension();
            if($duoi1!='mp3')
            {
                return back()->with('thongbao','Bạn chỉ được chọn file có đuôi mp3 cho field Mp3');
            }
            $Hinh1 = str_random(4)."_".$name1;
            while (file_exists("upload/luyennghe/".$Hinh1))
            {
                $Hinh1 = str_random(4)."_".$name1;
            }
            $file1->move('upload/luyennghe', $Hinh1);
            $luyennghe->mp3=$Hinh1;
        }
        else
        {
            $luyennghe->mp3="";
        }
        $luyennghe->save();
        return redirect('admin/luyennghe/list')->with('thongbao','Thêm thành công');        
    }
    public function getDelete($id)
    {
        $luyennghes=luyennghe::find($id);
        $luyennghes->delete();
        return redirect('admin/luyennghe/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
        $luyennghes = luyennghe::find($id);
        $baisa=bai::all();
        return view('admin.luyennghe.edit',['luyennghes'=>$luyennghes,'baisa'=>$baisa]);
    }
    public function postEdit(Request $request, $id)
    {    
        $this->validate($request,
        [
            'hinh'=>'required',
            'mp3'=>'required',
            'cau'=>'required'
        ],
        [
        ]);     
        $luyennghe = luyennghe ::find($id);
        $luyennghe->id_bai = $request->id_bai;
        $luyennghe->cau = $request->cau;
        if($request->hasFile('hinh'))
        {
            $file = $request->hinh;
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='png'&&$duoi!='jpg'&&$duoi!='jpeg')
            {
                return back()->with('thongbao','Bạn chỉ được chọn file có đuôi png hoặc jpg hoặc jpeg cho field Hình');
            }
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/luyennghe/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/luyennghe', $Hinh);
            $luyennghe->hinh=$Hinh;
        }
        else
        {
            $luyennghe->hinh="";
        }
        if($request->hasFile('mp3'))
        {
            $file1 = $request->mp3;
            $name1 = $file1->getClientOriginalName();
            $duoi1 = $file1->getClientOriginalExtension();
            if($duoi1!='mp3')
            {
                return back()->with('thongbao','Bạn chỉ được chọn file có đuôi mp3 cho field Mp3');
            }
            $Hinh1 = str_random(4)."_".$name1;
            while (file_exists("upload/luyennghe/".$Hinh1))
            {
                $Hinh1 = str_random(4)."_".$name1;
            }
            $file1->move('upload/luyennghe', $Hinh1);
            $luyennghe->mp3=$Hinh1;
        }
        else
        {
            $luyennghe->mp3="";
        }
        $luyennghe->save();       
        return redirect('admin/luyennghe/list')->with('thongbao','Sửa thành công');
    }
    public function downloadExcelSample()
	{
		$data = array
        (
            array('noidung','id_bai'),
		);
		return Excel::create('Danh sách luyện nghe', function($excel) use ($data) {
			$excel->sheet('Danh sách luyện nghe', function($sheet) use ($data)
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
                        'noidung' => $value->noidung,
                        'id_bai' => $value->id_bai,
                    ];					
				}
				if(!empty($insert)){
					DB::table('luyennghes')->insert($insert);					
					return redirect('admin/luyennghe/list')->with('thongbao','Thêm dữ liệu thành công.');		
				}
			}
		}
		return back();
	}
}
