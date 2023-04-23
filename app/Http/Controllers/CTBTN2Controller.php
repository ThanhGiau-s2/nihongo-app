<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chitietbaitapnghe_2;
use App\Models\bai;
use Excel;
use DB;

class CTBTN2Controller extends Controller
{
    //
    public function getList()
    {
        $ctbtn2=chitietbaitapnghe_2::all();
        return view ('admin.chitietbaitapnghe2.list',['ctbtn2'=>$ctbtn2]);
    }
    public function getAdd(){
        $baisa=bai::all();
        $ctbtn2=chitietbaitapnghe_2::all();
        return view('admin.chitietbaitapnghe2.add',['ctbtn2'=>$ctbtn2,'baisa'=>$baisa]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
           'id_bai'=>'need',
           'noidung'=>'required'
        ],
        [
        ]);
        $ctbtn2 = new chitietbaitapnghe_2;
        $ctbtn2->id_bai = $request->id_bai;
        $ctbtn2->noidung = $request->noidung;
        $ctbtn2->save();
        return redirect('admin/ctbtn2/list')->with('thongbao','Thêm thành công');        
    }
    public function getDelete($id)
    {
        $ctbtn2=chitietbaitapnghe_2::find($id);
        $ctbtn2->delete();
        return redirect('admin/ctbtn2/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
        $ctbtn2 = chitietbaitapnghe_2::find($id);
        $baisa=bai::all();
        return view('admin.chitietbaitapnghe2.edit',['ctbtn2'=>$ctbtn2,'baisa'=>$baisa]);
    }
    public function postEdit(Request $request, $id)
    {    
        $this->validate($request,
        [
            'noidung'=>'required'
        ],
        [
        ]);     
        $ctbtn2 = chitietbaitapnghe_2 ::find($id);
        $ctbtn2->id_bai = $request->id_bai;
        $ctbtn2->noidung = $request->noidung;
        $ctbtn2->save();       
        return redirect('admin/ctbtn2/list')->with('thongbao','Sửa thành công');
    }
    public function downloadExcelSample()
	{
		$data = array
        (
            array('noidung','id_bai'),
		);
		return Excel::create('Danh sách đáp án btn 2', function($excel) use ($data) {
			$excel->sheet('Danh sách đáp án btn 2', function($sheet) use ($data)
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
					DB::table('chitietbaitapnghe_2s')->insert($insert);					
					return redirect('admin/ctbtn2/list')->with('thongbao','Thêm dữ liệu thành công.');		
				}
			}
		}
		return back();
	}
    
	
}
