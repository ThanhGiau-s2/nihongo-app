<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bai;
use App\Models\cauhoinguphap;
use Excel;
use DB;

class CauHoiNguPhapController extends Controller
{
    //
    public function getList()
    {
        $cauhoinguphaps=cauhoinguphap::all();
        return view ('admin.cauhoinguphap.list',['cauhoinguphaps'=>$cauhoinguphaps]);
    }
    public function getAdd(){
        $baisa=bai::all();
        $cauhoinguphaps=cauhoinguphap::all();
        return view('admin.cauhoinguphap.add',['cauhoinguphaps'=>$cauhoinguphaps,'baisa'=>$baisa]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        [            
            'noidung'=>'required',
            'dapandung'=>'required',
            'id_bai'=>'need'     
        ],
        [
        ]);
        $cauhoinguphaps = new cauhoinguphap;       
        $cauhoinguphaps->noidung = $request->noidung;
        $cauhoinguphaps->id_bai = $request->id_bai;   
        $cauhoinguphaps->dapandung = $request->dapandung;
        $cauhoinguphaps->save();
        return redirect('admin/cauhoinguphap/list')->with('thongbao','Thêm thành công');
    }
    public function getDelete($id)
    {
        $cauhoinguphaps=cauhoinguphap::find($id);
        $cauhoinguphaps->delete();
        return redirect('admin/cauhoinguphap/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
        $cauhoinguphaps = cauhoinguphap ::find($id);
        $baisa=bai::all();
        return view('admin.cauhoinguphap.edit',['cauhoinguphaps'=>$cauhoinguphaps,'baisa'=>$baisa]);
    }
    public function postEdit(Request $request, $id)
    {       
        $this->validate($request,
        [            
            'noidung'=>'required|min:1|max:100',            
        ],
        [
        ]);
        $cauhoinguphaps = cauhoinguphap ::find($id);          
        $cauhoinguphaps->noidung = $request->noidung;
        $cauhoinguphaps->id_bai = $request->id_bai;   
        $cauhoinguphaps->dapandung = $request->dapandung;    
        $cauhoinguphaps->save();
        return redirect('admin/cauhoinguphap/list')->with('thongbao','Sửa thành công');
    }
    public function downloadExcelSample()
	{
		$data = array
        (
            array('id_bai','noidung','dapandung'),
		);
		return Excel::create('Danh sách câu hỏi ngữ pháp', function($excel) use ($data) {
			$excel->sheet('Danh sách câu hỏi ngữ pháp', function($sheet) use ($data)
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
                        'dapandung' => $value->dapandung
                    ];					
				}
				if(!empty($insert)){
					DB::table('cauhoinguphaps')->insert($insert);					
					return redirect('admin/cauhoinguphap/list')->with('thongbao','Thêm dữ liệu thành công.');		
				}
			}
		}
		return back();
	}
}
