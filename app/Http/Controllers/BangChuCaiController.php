<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bangchucai;
use App\Models\bai;
use Excel;
use DB;
class BangChuCaiController extends Controller
{
    //
    public function getList()
    {
        $bccs=bangchucai::all();
        return view ('admin.bangchucai.list',['bccs'=>$bccs]);
    }
    public function getAdd(){
        $bccs=bangchucai::all();
        return view('admin.bangchucai.add',['bccs'=>$bccs]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'ten'=>'required|min:1|max:100',
            'hinh'=>'required'
        ],
        [
        ]);
        $bangchucai = new bangchucai;
        $bangchucai->ten = $request->ten;       
        if($request->hasFile('hinh'))
        {
            $file = $request->hinh;
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png'&& $duoi!='jpeg'&& $duoi!='JPG'&& $duoi!='PNG'&& $duoi!='JPEG')
            {
                return redirect('admin/bangchucai/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/bangchucai/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/bangchucai', $Hinh);
            $bangchucai->hinh=$Hinh;
        }
        else
        {
            $bangchucai->hinh="";
        }       
        $bangchucai->save();
        return redirect('admin/bangchucai/list')->with('thongbao','Thêm thành công');        
    }
    public function getDelete($id)
    {
        $bccs=bangchucai::find($id);
        $bccs->delete();
        return redirect('admin/bangchucai/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
        $bccs = bangchucai::find($id);
        $baisa=bai::all();
        return view('admin.bangchucai.edit',['bccs'=>$bccs,'baisa'=>$baisa]);
    }
    public function postEdit(Request $request, $id)
    {     
        $this->validate($request,
        [
            'ten'=>'required|min:1|max:100',
            'hinh'=>'required'
        ],
        [
        ]);
        $bangchucai = bangchucai ::find($id);
        $bangchucai->ten = $request->ten;       
        if($request->hasFile('hinh'))
        {
            $file = $request->hinh;
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg'&& $duoi!='png'&& $duoi!='jpeg'&& $duoi!='JPG'&& $duoi!='PNG'&& $duoi!='JPEG')
            {
                return redirect('admin/bangchucai/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/bangchucai/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/bangchucai', $Hinh);
            $bangchucai->hinh=$Hinh;
        }
        else
        {
            $bangchucai->hinh="";
        }       
        $bangchucai->save();       
        return redirect('admin/bangchucai/list')->with('thongbao','Sửa thành công');
    }
    public function downloadExcelSample()
	{
		$data = array
        (
            array('hiragana','hantu','nghia','id_bai'),
		);
		return Excel::create('Danh sách từ vựng', function($excel) use ($data) {
			$excel->sheet('Danh sách từ vựng', function($sheet) use ($data)
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
                        'hiragana' => $value->hiragana,
                        'hantu' => $value->hantu,
                        'nghia' => $value->nghia,
                        'id_bai' => $value->id_bai,
                    ];					
				}
				if(!empty($insert)){
					DB::table('bccs')->insert($insert);					
					return redirect('admin/bangchucai/list')->with('thongbao','Thêm dữ liệu thành công.');		
				}
			}
		}
		return back();
	}
}
