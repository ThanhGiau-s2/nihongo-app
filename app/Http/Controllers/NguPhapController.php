<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nguphap;
use App\Models\bai;
use Excel;
use DB;

class NguPhapController extends Controller
{
    //
    public function getList()
    {
        $nguphaps=nguphap::all();
        return view ('admin.nguphap.list',['nguphaps'=>$nguphaps]);
    }
    public function getAdd(){
        $baisa=bai::all();
        $nguphaps=nguphap::all();
        return view('admin.nguphap.add',['nguphaps'=>$nguphaps,'baisa'=>$baisa]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'id_bai'=>'need',
            'tieude'=>'required|min:1|max:100',
            'noidung'=>'required|min:1|max:100'
        ],
        [
        ]);
        $nguphaps = new nguphap;
        $nguphaps->tieude = $request->tieude;
        $nguphaps->noidung = $request->noidung;
        $nguphaps->id_bai = $request->id_bai;
        $nguphaps->save();
        return redirect('admin/nguphap/list')->with('thongbao','Thêm thành công');
    }
    public function getDelete($id)
    {
        $nguphaps=nguphap::find($id);
        $nguphaps->delete();
        return redirect('admin/nguphap/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
        $nguphaps = nguphap ::find($id);
        $baisa=bai::all();
        return view('admin.nguphap.edit',['nguphaps'=>$nguphaps,'baisa'=>$baisa]);
    }
    public function postEdit(Request $request, $id)
    {        
        $nguphaps = nguphap ::find($id);
        $this->validate($request,
        [
            'tieude'=>'required|min:1|max:100',
            'noidung'=>'required|min:1|max:100'
        ],
        [
        ]);
        $nguphaps->tieude = $request->tieude;
        $nguphaps->noidung = $request->noidung;
        $nguphaps->save();
        return redirect('admin/nguphap/list')->with('thongbao','Sửa thành công');
    }
    public function downloadExcelSample()
	{
		$data = array
        (
            array('tieude','noidung','id_bai'),
		);
		return Excel::create('Danh sách ngữ pháp', function($excel) use ($data) {
			$excel->sheet('Danh sách ngữ pháp', function($sheet) use ($data)
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
                        'tieude' => $value->tieude,
                        'noidung' => $value->noidung,
                        'id_bai' => $value->id_bai
                    ];					
				}
				if(!empty($insert)){
					DB::table('nguphaps')->insert($insert);					
					return redirect('admin/nguphap/list')->with('thongbao','Thêm dữ liệu thành công.');		
				}
			}
		}
		return back();
	}
}
