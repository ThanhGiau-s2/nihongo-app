<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bai;
use Excel;
use DB;

class BaiController extends Controller
{
    //
    public function getList()
    {
        $bais=bai::all();
        return view ('admin.dsbaihoc.list',['bais'=>$bais]);
    }
    public function getAdd(){
        $bais=bai::all();
        return view('admin.dsbaihoc.add',['bais'=>$bais]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'ten'=>'required|min:1|max:100',
        ],
        [
        ]);
        $bais = new bai;
        $bais->ten = $request->ten;
        $bais->save();
        return redirect('admin/bai/list')->with('thongbao','Thêm thành công');
    }
    public function getDelete($id)
    {
        $bais=bai::find($id);
        $bais->delete();
        return redirect('admin/bais/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
        $bais = bai::find($id);
        return view('admin.dsbaihoc.edit',['bais'=>$bais]);
    }
    public function postEdit(Request $request, $id)
    {        
        $bais = bai ::find($id);
        $this->validate($request,
        [
            'ten'=>'required|min:1|max:100',
        ],
        [
        ]);
        $bais->ten = $request->ten;
        $bais->save();
        return redirect('admin/bai/list')->with('thongbao','Sửa thành công');
    }
    public function downloadExcelSample()
    {
        $data = array
        (
            array('ten'),
        );
        return Excel::create('Danh sách bài học', function($excel) use ($data) {
            $excel->sheet('Danh sách bài học', function($sheet) use ($data)
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
                    $insert[] = ['ten' => $value->ten];					
                }
                if(!empty($insert)){
                    DB::table('bais')->insert($insert);					
                    return redirect('admin/bai/list')->with('thongbao','Thêm dữ liệu thành công.');		
                }
            }
        }
        return back();
    }
}
