<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cauhoituvung;
use App\Models\bai;
use Excel;
use DB;

class CauHoiTuVungController extends Controller
{
    //
    public function getList()
    {
        $cauhoituvungs=cauhoituvung::all();
        return view ('admin.cauhoituvung.list',['cauhoituvungs'=>$cauhoituvungs]);
    }
    public function getAdd(){
        $baisa=bai::all();
        $cauhoituvungs=cauhoituvung::all();
        return view('admin.cauhoituvung.add',['cauhoituvungs'=>$cauhoituvungs,'baisa'=>$baisa]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        [            
            'id_bai'=>'need',     
            'noidung'=>'required',  
            'dapan1'=>'required|min:1|max:100',        
            'dapan2'=>'required|min:1|max:100', 
            'dapan3'=>'required|min:1|max:100',      
            'dapan4'=>'required|min:1|max:100',              
            'opt_iscorrect'=>'required'       
        ],
        [
        ]);
        $cauhoituvungs = new cauhoituvung;       
        $cauhoituvungs->id_bai = $request->id_bai;   
        $cauhoituvungs->dapan1 = $request->dapan1;  
        $cauhoituvungs->dapan2 = $request->dapan2;  
        $cauhoituvungs->dapan3 = $request->dapan3;  
        $cauhoituvungs->dapan4 = $request->dapan4;  
        $cauhoituvungs->dapandung = $request->opt_iscorrect;  
        if($request->hasFile('noidung'))
        {
            $file = $request->noidung;
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='mp3')
            {
                return redirect('admin/cauhoituvung/add')->with('thongbao','Bạn chỉ được chọn file có đuôi mp3');
            }
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/chtv/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/chtv', $Hinh);
            $cauhoituvungs->noidung=$Hinh;
        }
        else
        {
            $cauhoituvungs->noidung="";
        }
        $cauhoituvungs->save();
        return redirect('admin/cauhoituvung/list')->with('thongbao','Thêm thành công');
    }
    public function getDelete($id)
    {
        $cauhoituvungs=cauhoituvung::find($id);
        $cauhoituvungs->delete();
        return redirect('admin/cauhoituvung/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
        $cauhoituvungs = cauhoituvung ::find($id);
        $baisa=bai::all();
        return view('admin.cauhoituvung.edit',['cauhoituvungs'=>$cauhoituvungs,'baisa'=>$baisa]);
    }
    public function postEdit(Request $request, $id)
    {       
        $this->validate($request,
        [            
            'noidung'=>'required'
        ],
        [
        ]);
        $cauhoituvungs = cauhoituvung ::find($id);          
        if($request->hasFile('noidung'))
        {
            $file = $request->noidung;
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='mp3')
            {
                return back()->with('thongbao','Bạn chỉ được chọn file có đuôi mp3');
            }
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/chtv/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/chtv', $Hinh);
            $cauhoituvungs->noidung=$Hinh;
        }
        else
        {
            $cauhoituvungs->noidung="";
        }
        $cauhoituvungs->id_bai = $request->id_bai;   
        $cauhoituvungs->dapan1 = $request->dapan1;  
        $cauhoituvungs->dapan2 = $request->dapan2;  
        $cauhoituvungs->dapan3 = $request->dapan3;  
        $cauhoituvungs->dapan4 = $request->dapan4;  
        $cauhoituvungs->dapandung = $request->opt_iscorrect;  
        $cauhoituvungs->save();
        return redirect('admin/cauhoituvung/list')->with('thongbao','Sửa thành công');
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
					DB::table('cauhoituvungs')->insert($insert);					
					return redirect('admin/cauhoituvung/list')->with('thongbao','Thêm dữ liệu thành công.');		
				}
			}
		}
		return back();
	}
}
