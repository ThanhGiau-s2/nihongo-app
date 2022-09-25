<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bai;
use Excel;
use DB;
use Validator;
use App\docvanmau;
class DocVanMauController extends Controller
{
    //
    public function getList()
    {
        $docvanmaus=docvanmau::all();
        return view ('admin.docvanmau.list',['docvanmaus'=>$docvanmaus]);
    }
    public function getAdd(){
        $baisa=bai::all();
        $docvanmau=docvanmau::all();
        return view('admin.docvanmau.add',['docvanmau'=>$docvanmau,'baisa'=>$baisa]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'noidung'=>'required',
            'id_bai'=>'need'
        ],
        [
        ]); 
        $docvanmau = new docvanmau;
        $docvanmau->id_bai = $request->id_bai;
        $docvanmau->noidung = $request->noidung;
        $docvanmau->save();
        return redirect('admin/docvanmau/list')->with('thongbao','Thêm thành công');
    }
    public function getDelete($id)
    {
        $docvanmau=docvanmau::find($id);
        $docvanmau->delete();
        return redirect('admin/docvanmau/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
        $docvanmau = docvanmau ::find($id);
        $baisa=bai::all();
        return view('admin.docvanmau.edit',['docvanmau'=>$docvanmau,'baisa'=>$baisa]);
    }
    public function postEdit(Request $request, $id)
    {   
        $this->validate($request,
        [
            'noidung'=>'required',
            'id_bai'=>'need'
        ],
        [
        ]);
        $docvanmau = docvanmau ::find($id);
        $docvanmau->id_bai = $request->id_bai;
        $docvanmau->noidung = $request->noidung;
        $docvanmau->save();
        return redirect('admin/docvanmau/list')->with('thongbao','Sửa thành công');
    }
    public function downloadExcelSample()
	{
		$data = array
        (
            array('noidung','id_bai','amthanh'),
		);
		return Excel::create('Danh sách đọc văn mẫu', function($excel) use ($data) {
			$excel->sheet('Danh sách đọc văn mẫu', function($sheet) use ($data)
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
                        'amthanh' => $value->amthanh,
                        'id_bai' => $value->id_bai
                    ];					
				}
				if(!empty($insert)){
					DB::table('docvanmaus')->insert($insert);					
					return redirect('admin/docvanmau/list')->with('thongbao','Thêm dữ liệu thành công.');		
				}
			}
		}
		return back();
	}
}
