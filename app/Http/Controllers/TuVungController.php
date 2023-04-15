<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tuvung;
use App\bai;
use Excel;
use DB;

class TuVungController extends Controller
{
    //
    public function getList()
    {
        $tuvungs=tuvung::all();
        return view ('admin.tuvung.list',['tuvungs'=>$tuvungs]);
    }
    public function getAdd(){
        $baisa=bai::all();
        $tuvungs=tuvung::all();
        return view('admin.tuvung.add',['tuvungs'=>$tuvungs,'baisa'=>$baisa]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'hiragana'=>'required|min:1|max:100',
            'hantu'=>'required|max:100',
            'nghia'=>'required|min:1|max:100',
            'id_bai'=>'need',
            'amthanh'=>'required'
        ],
        [
        ]);
        $tuvungs = new tuvung;
        $tuvungs->id_bai = $request->id_bai;
        $tuvungs->hiragana = $request->hiragana;
        $tuvungs->hantu = $request->hantu;
        $tuvungs->nghia = $request->nghia;
        if($request->hasFile('amthanh'))
        {
            $file = $request->amthanh;
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            $Hinh = $name;
            while (file_exists("upload/tuvungtheobai/".$Hinh))
            {
                $Hinh = $name;
            }
            $file->move('upload/tuvungtheobai', $Hinh);
            $tuvungs->amthanh=$Hinh;
        }
        else
        {
            $tuvungs->amthanh="";
        }
        $tuvungs->save();
        return redirect('admin/tuvung/list')->with('thongbao','Thêm thành công');
    }
    public function getDelete($id)
    {
        $tuvungs=tuvung::find($id);
        $tuvungs->delete();
        return redirect('admin/tuvung/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
        $tuvungs = tuvung::find($id);
        $baisa=bai::all();
        return view('admin.tuvung.edit',['tuvungs'=>$tuvungs,'baisa'=>$baisa]);
    }
    public function postEdit(Request $request, $id)
    {     
        $this->validate($request,
        [
            'hiragana'=>'required|min:1|max:100',
            'hantu'=>'max:100',
            'nghia'=>'required|min:1|max:100',
            'id_bai'=>'need',
            'amthanh'=>'required'
        ],
        [
        ]);
        $tuvungs = tuvung ::find($id);
        $tuvungs->id_bai = $request->id_bai;
        $tuvungs->hiragana = $request->hiragana;
        $tuvungs->hantu = $request->hantu;
        $tuvungs->nghia = $request->nghia;
        if($request->hasFile('amthanh'))
        {
            $file = $request->amthanh;
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            $Hinh = $name;
            while (file_exists("upload/tuvungtheobai/".$Hinh))
            {
                $Hinh = $name;
            }
            $file->move('upload/tuvungtheobai', $Hinh);
            $tuvungs->amthanh=$Hinh;
        }
        else
        {
            $tuvungs->amthanh="";
        }
        $tuvungs->save();       
        return redirect('admin/tuvung/list')->with('thongbao','Sửa thành công');
    }
    public function downloadExcelSample()
	{
		$data = array
        (
            array('hiragana','amthanh','hantu','nghia','id_bai'),
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
                        'amthanh' => $value->amthanh,
                        'id_bai' => $value->id_bai,
                    ];					
				}
				if(!empty($insert)){
					DB::table('tuvungs')->insert($insert);					
					return redirect('admin/tuvung/list')->with('thongbao','Thêm dữ liệu thành công.');		
				}
			}
		}
		return back();
	}
}
