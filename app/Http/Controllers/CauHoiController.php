<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cauhoi;
use App\luachon;
use Excel;
use DB;
use App\bai;

class CauHoiController extends Controller
{
    //
    public function getList()
    {
        $cauhois=cauhoi::all();
        return view ('admin.cauhoi.list',['cauhois'=>$cauhois]);
    }
    public function getAdd(){
        $baisa=bai::all();
        $cauhois=cauhoi::all();
        return view('admin.cauhoi.add',['cauhois'=>$cauhois,'baisa'=>$baisa]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        [     
            'id_bai'=>'need',       
            'noidungch'=>'required|min:1|max:100',        
            'dapan1'=>'required|min:1|max:100',        
            'dapan2'=>'required|min:1|max:100', 
            'dapan3'=>'required|min:1|max:100',      
            'dapan4'=>'required|min:1|max:100',              
            'opt_iscorrect'=>'required'       
        ],
        [
        ]);
        $cauhois = new cauhoi;       
        $cauhois->noidung = $request->noidungch;
        $cauhois->id_bai = $request->id_bai;   
        $cauhois->dapan1 = $request->dapan1;  
        $cauhois->dapan2 = $request->dapan2;  
        $cauhois->dapan3 = $request->dapan3;  
        $cauhois->dapan4 = $request->dapan4;  
        $cauhois->dapandung = $request->opt_iscorrect;  
        $cauhois->save();
        return redirect('admin/cauhoi/list')->with('thongbao','Thêm thành công');
    }
    public function getDelete($id)
    {
        $cauhois=cauhoi::find($id);
        $cauhois->delete();
        return redirect('admin/cauhoi/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
        $cauhois = cauhoi ::find($id);
        $baisa=bai::all();
        return view('admin.cauhoi.edit',['cauhois'=>$cauhois,'baisa'=>$baisa]);
    }
    public function postEdit(Request $request, $id)
    {       
        $this->validate($request,
        [            
            'noidungch'=>'required|min:1|max:100',        
            'dapan1'=>'required|min:1|max:100',        
            'dapan2'=>'required|min:1|max:100', 
            'dapan3'=>'required|min:1|max:100',      
            'dapan4'=>'required|min:1|max:100',              
            'opt_iscorrect'=>'required'         
        ],
        [
        ]);
        $cauhois = cauhoi ::find($id);          
        $cauhois->noidung = $request->noidungch;
        $cauhois->id_bai = $request->id_bai;   
        $cauhois->dapan1 = $request->dapan1;  
        $cauhois->dapan2 = $request->dapan2;  
        $cauhois->dapan3 = $request->dapan3;  
        $cauhois->dapan4 = $request->dapan4;  
        $cauhois->dapandung = $request->opt_iscorrect;  
        $cauhois->save();
        return redirect('admin/cauhoi/list')->with('thongbao','Sửa thành công');
    }
    public function downloadExcelSample()
	{
		$data = array
        (
            array('noidung','id_bai','dapan1','dapan2','dapan3','dapan4','dapandung'),
		);
		return Excel::create('Danh sách câu hỏi', function($excel) use ($data) {
			$excel->sheet('Danh sách câu hỏi', function($sheet) use ($data)
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
                        'dapan1' => $value->dapan1,
                        'dapan2' => $value->dapan2,
                        'dapan3' => $value->dapan3,
                        'dapan4' => $value->dapan4,
                        'dapandung' => $value->dapandung
                    ];					
				}
				if(!empty($insert)){
					DB::table('cauhois')->insert($insert);					
					return redirect('admin/cauhoi/list')->with('thongbao','Thêm dữ liệu thành công.');		
				}
			}
		}
		return back();
	}
}
