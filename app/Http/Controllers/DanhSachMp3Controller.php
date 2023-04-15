<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\danhsachmp3;
use Excel;
use DB;
use App\bai;
class DanhSachMp3Controller extends Controller
{
    //
    public function getList()
    {
        $dsmp3s=danhsachmp3::all();
        return view ('admin.danhsachmp3.list',['dsmp3s'=>$dsmp3s]);
    }
    public function getAdd(){
        $baisa=bai::all();
        $dsmp3s=danhsachmp3::all();
        return view('admin.danhsachmp3.add',['dsmp3s'=>$dsmp3s,'baisa'=>$baisa]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'id_bai'=>'need',
            'mp3tuvung'=>'required',
            'mp3docvanmau'=>'required',
            'mp3btn1'=>'required',
            'mp3btn2'=>'required'
        ],
        [
        ]);
        $danhsachmp3 = new danhsachmp3;
        $danhsachmp3->id_bai = $request->id_bai;
        //tu vung
        if($request->hasFile('mp3tuvung'))
        {
            $file1 = $request->mp3tuvung;
            $name1 = $file1->getClientOriginalName();
            $duoi1 = $file1->getClientOriginalExtension();
            if($duoi1!='mp3')
            {
                return redirect('admin/danhsachmp3/add')->with('thongbao','Bạn chỉ được chọn file có đuôi mp3');
            }
            $Hinh1 = str_random(4)."_".$name1;
            while (file_exists("upload/tuvung/".$Hinh1))
            {
                $Hinh1 = $name1;
            }
            $file1->move('upload/tuvung', $Hinh1);
            $danhsachmp3->mp3tuvung=$Hinh1;
        }
        else
        {
            $danhsachmp3->mp3tuvung="";
        }
        //doc van mau
        if($request->hasFile('mp3docvanmau'))
        {
            $file = $request->mp3docvanmau;
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='mp3')
            {
                return redirect('admin/danhsachmp3/add')->with('thongbao','Bạn chỉ được chọn file có đuôi mp3');
            }
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/docvanmau/".$Hinh))
            {
                $Hinh = $name;
            }
            $file->move('upload/docvanmau', $Hinh);
            $danhsachmp3->mp3docvanmau=$Hinh;
        }
        else
        {
            $danhsachmp3->mp3docvanmau="";
        }
        //btn1
        if($request->hasFile('mp3btn1'))
        {
            $file1 = $request->mp3btn1;
            $name1 = $file1->getClientOriginalName();
            $duoi1 = $file1->getClientOriginalExtension();
            if($duoi1!='mp3')
            {
                return redirect('admin/danhsachmp3/add')->with('thongbao','Bạn chỉ được chọn file có đuôi mp3');
            }
            $Hinh1 = str_random(4)."_".$name1;
            while (file_exists("upload/btn1/".$Hinh1))
            {
                $Hinh1 = $name1;
            }
            $file1->move('upload/btn1', $Hinh1);
            $danhsachmp3->mp3btn1=$Hinh1;
        }
        else
        {
            $danhsachmp3->mp3btn1="";
        }
        //btn2
        if($request->hasFile('mp3btn2'))
        {
            $file = $request->mp3btn2;
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='mp3')
            {
                return redirect('admin/danhsachmp3/add')->with('thongbao','Bạn chỉ được chọn file có đuôi mp3');
            }
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/btn2/".$Hinh))
            {
                $Hinh = $name;
            }
            $file->move('upload/btn2', $Hinh);
            $danhsachmp3->mp3btn2=$Hinh;
        }
        else
        {
            $danhsachmp3->mp3btn2="";
        }
        $danhsachmp3->save();
        return redirect('admin/danhsachmp3/list')->with('thongbao','Thêm thành công');        
    }
    public function getDelete($id)
    {
        $dsmp3s=danhsachmp3::find($id);
        $dsmp3s->delete();
        return redirect('admin/danhsachmp3/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
        $dsmp3s = danhsachmp3::find($id);
        $baisa=bai::all();
        return view('admin.danhsachmp3.edit',['dsmp3s'=>$dsmp3s,'baisa'=>$baisa]);
    }
    public function postEdit(Request $request, $id)
    {   
        $this->validate($request,
        [
            'id_bai'=>'need',
            'mp3tuvung'=>'required',
            'mp3docvanmau'=>'required',
            'mp3btn1'=>'required',
            'mp3btn2'=>'required'
        ],
        [
        ]);      
        $danhsachmp3 = danhsachmp3 ::find($id);
        $danhsachmp3->id_bai = $request->id_bai;
         //tu vung
         if($request->hasFile('mp3tuvung'))
         {
             $file1 = $request->mp3tuvung;
             $name1 = $file1->getClientOriginalName();
             $duoi1 = $file1->getClientOriginalExtension();
             if($duoi1!='mp3')
             {
                 return redirect('admin/danhsachmp3/add')->with('thongbao','Bạn chỉ được chọn file có đuôi mp3');
             }
             $Hinh1 = str_random(4)."_".$name1;
             while (file_exists("upload/tuvung/".$Hinh1))
             {
                 $Hinh1 = $name1;
             }
             $file1->move('upload/tuvung', $Hinh1);
             $danhsachmp3->mp3tuvung=$Hinh1;
         }
         else
         {
             $danhsachmp3->mp3tuvung="";
         }
         //doc van mau
         if($request->hasFile('mp3docvanmau'))
         {
             $file = $request->mp3docvanmau;
             $name = $file->getClientOriginalName();
             $duoi = $file->getClientOriginalExtension();
             if($duoi!='mp3')
             {
                 return redirect('admin/danhsachmp3/add')->with('thongbao','Bạn chỉ được chọn file có đuôi mp3');
             }
             $Hinh = str_random(4)."_".$name;
             while (file_exists("upload/docvanmau/".$Hinh))
             {
                 $Hinh = $name;
             }
             $file->move('upload/docvanmau', $Hinh);
             $danhsachmp3->mp3docvanmau=$Hinh;
         }
         else
         {
             $danhsachmp3->mp3docvanmau="";
         }
         //btn1
         if($request->hasFile('mp3btn1'))
         {
             $file1 = $request->mp3btn1;
             $name1 = $file1->getClientOriginalName();
             $duoi1 = $file1->getClientOriginalExtension();
             if($duoi1!='mp3')
             {
                 return redirect('admin/danhsachmp3/add')->with('thongbao','Bạn chỉ được chọn file có đuôi mp3');
             }
             $Hinh1 = str_random(4)."_".$name1;
             while (file_exists("upload/btn1/".$Hinh1))
             {
                 $Hinh1 = $name1;
             }
             $file1->move('upload/btn1', $Hinh1);
             $danhsachmp3->mp3btn1=$Hinh1;
         }
         else
         {
             $danhsachmp3->mp3btn1="";
         }
         //btn2
         if($request->hasFile('mp3btn2'))
         {
             $file = $request->mp3btn2;
             $name = $file->getClientOriginalName();
             $duoi = $file->getClientOriginalExtension();
             if($duoi!='mp3')
             {
                 return redirect('admin/danhsachmp3/add')->with('thongbao','Bạn chỉ được chọn file có đuôi mp3');
             }
             $Hinh = str_random(4)."_".$name;
             while (file_exists("upload/btn2/".$Hinh))
             {
                 $Hinh = $name;
             }
             $file->move('upload/btn2', $Hinh);
             $danhsachmp3->mp3btn2=$Hinh;
         }
         else
         {
             $danhsachmp3->mp3btn2="";
         }
        $danhsachmp3->save();    
        return redirect('admin/danhsachmp3/list')->with('thongbao','Sửa thành công');  
    }
    public function downloadExcelSample()
	{
		$data = array
        (
            array('mp3docvanmau','mp3docvidu','mp3tuvung','id_bai'),
		);
		return Excel::create('Danh sách mp3', function($excel) use ($data) {
			$excel->sheet('Danh sách mp3', function($sheet) use ($data)
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
                        'mp3docvanmau' => $value->mp3docvanmau,
                        'mp3docvidu' => $value->mp3docvidu,
                        'mp3tuvung' => $value->mp3tuvung,
                        'id_bai' => $value->id_bai,
                    ];					
				}
				if(!empty($insert)){
					DB::table('danhsachmp3s')->insert($insert);					
					return redirect('admin/luyendoc/list')->with('thongbao','Thêm dữ liệu thành công.');		
				}
			}
		}
		return back();
	}
}
