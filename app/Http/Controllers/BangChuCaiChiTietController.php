<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bangchucaichitiet;
use App\Models\bai;
use Excel;
use DB;
class BangChuCaiChiTietController extends Controller
{
    //
    public function getList()
    {
        $bccs=bangchucaichitiet::all();
        return view ('admin.bangchucaichitiet.list',['bccs'=>$bccs]);
    }
    public function getAdd(){
        $bccs=bangchucaichitiet::all();
        return view('admin.bangchucaichitiet.add',['bccs'=>$bccs]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'hira'=>'required|min:1|max:100',
            'kata'=>'required|min:1|max:100',
            'romaji'=>'required|min:1|max:100',
            'amthanh'=>'required',
            'loai'=>'need'
        ],
        [
        ]);
        $bangchucaichitiet = new bangchucaichitiet;
        $bangchucaichitiet->hira = $request->hira;     
        $bangchucaichitiet->kata = $request->kata;     
        $bangchucaichitiet->romaji = $request->romaji;    
        $bangchucaichitiet->loai = $request->loai;        
        if($request->hasFile('amthanh'))
        {
            $file = $request->amthanh;
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='mp3'&& $duoi!='MP3')
            {
                return redirect('admin/bangchucaichitiet/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/bangchucaichitiet/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/bangchucaichitiet', $Hinh);
            $bangchucaichitiet->amthanh=$Hinh;
        }
        else
        {
            $bangchucaichitiet->amthanh="";
        }       
        $bangchucaichitiet->save();
        return redirect('admin/bangchucaichitiet/list')->with('thongbao','Thêm thành công');        
    }
    public function getDelete($id)
    {
        $bccs=bangchucaichitiet::find($id);
        $bccs->delete();
        return redirect('admin/bangchucaichitiet/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
        $bccs = bangchucaichitiet::find($id);
        $baisa=bai::all();
        return view('admin.bangchucaichitiet.edit',['bccs'=>$bccs,'baisa'=>$baisa]);
    }
    public function postEdit(Request $request, $id)
    {     
        $this->validate($request,
        [
            'hira'=>'required|min:1|max:100',
            'kata'=>'required|min:1|max:100',
            'romaji'=>'required|min:1|max:100',
            'amthanh'=>'required',
            'loai'=>'need'
        ],
        [
        ]);
        $bangchucaichitiet = bangchucaichitiet ::find($id);
        $bangchucaichitiet->hira = $request->hira;     
        $bangchucaichitiet->kata = $request->kata;     
        $bangchucaichitiet->romaji = $request->romaji;    
        $bangchucaichitiet->loai = $request->loai;        
        if($request->hasFile('amthanh'))
        {
            $file = $request->amthanh;
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='mp3'&& $duoi!='MP3')
            {
                return redirect('admin/bangchucaichitiet/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/bangchucaichitiet/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/bangchucaichitiet', $Hinh);
            $bangchucaichitiet->amthanh=$Hinh;
        }
        else
        {
            $bangchucaichitiet->amthanh="";
        }       
        $bangchucaichitiet->save();
        return redirect('admin/bangchucaichitiet/list')->with('thongbao','Sửa thành công'); 
    }
    public function downloadExcelSample()
	{
		$data = array
        (
            array('hira','kata','romaji','loai','amthanh'),
		);
		return Excel::create('Bảng chữ cái chi tiết', function($excel) use ($data) {
			$excel->sheet('Bảng chữ cái chi tiết', function($sheet) use ($data)
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
                        'hira' => $value->hira,
                        'kata' => $value->kata,
                        'romaji' => $value->romaji,
                        'loai' => $value->loai,
                        'amthanh'=>$value->amthanh
                    ];					
				}
				if(!empty($insert)){
					DB::table('bangchucaichitiets')->insert($insert);					
					return redirect('admin/bangchucaichitiet/list')->with('thongbao','Thêm dữ liệu thành công.');		
				}
			}
		}
		return back();
	}
}
