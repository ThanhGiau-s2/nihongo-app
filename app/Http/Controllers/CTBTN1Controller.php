<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chitietbaitapnghe_1;
use App\Models\bai;
use Excel;
use DB;

class CTBTN1Controller extends Controller
{
    //
    public function getList()
    {
        $ctbtn1=chitietbaitapnghe_1::all();
        return view ('admin.chitietbaitapnghe1.list',['ctbtn1'=>$ctbtn1]);
    }
    public function getAdd(){
        $baisa=bai::all();
        $ctbtn1=chitietbaitapnghe_1::all();
        return view('admin.chitietbaitapnghe1.add',['ctbtn1'=>$ctbtn1,'baisa'=>$baisa]);
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
        $ctbtn1 = new chitietbaitapnghe_1;
        $ctbtn1->id_bai = $request->id_bai;
        $ctbtn1->noidung = $request->noidung;
        $ctbtn1->save();
        return redirect('admin/ctbtn1/list')->with('thongbao','Thêm thành công');        
    }
    public function getDelete($id)
    {
        $ctbtn1=chitietbaitapnghe_1::find($id);
        $ctbtn1->delete();
        return redirect('admin/ctbtn1/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
        $ctbtn1 = chitietbaitapnghe_1::find($id);
        $baisa=bai::all();
        return view('admin.chitietbaitapnghe1.edit',['ctbtn1'=>$ctbtn1,'baisa'=>$baisa]);
    }
    public function postEdit(Request $request, $id)
    {    
        $this->validate($request,
        [
            'noidung'=>'required'
        ],
        [
        ]);     
        $ctbtn1 = chitietbaitapnghe_1 ::find($id);
        $ctbtn1->id_bai = $request->id_bai;
        $ctbtn1->noidung = $request->noidung;
        $ctbtn1->save();       
        return redirect('admin/ctbtn1/list')->with('thongbao','Sửa thành công');
    }
    public function downloadExcelSample()
	{
		$data = array
        (
            array('noidung','id_bai'),
		);
		return Excel::create('Danh sách đáp án btn 1', function($excel) use ($data) {
			$excel->sheet('Danh sách đáp án btn 1', function($sheet) use ($data)
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
					DB::table('chitietbaitapnghe_1s')->insert($insert);					
					return redirect('admin/ctbtn1/list')->with('thongbao','Thêm dữ liệu thành công.');		
				}
			}
		}
		return back();
	}
	
}
