<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaiController;
use App\Http\Controllers\BangChuCaiController;
use App\Http\Controllers\BangChuCaiChiTietController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\NguPhapController;
use App\Http\Controllers\TuvungController;
use App\Http\Controllers\LuyenNgheController;
use App\Http\Controllers\DanhSachMp3Controller;
use App\Http\Controllers\DocVanMauController;
use App\Http\Controllers\HoiThoaiController;
use App\Http\Controllers\CauHoiController;
use App\Http\Controllers\CauHoiTuVungController;
use App\Http\Controllers\CauHoiNguPhapController;
use App\Http\Controllers\CTBTN1Controller;
use App\Http\Controllers\CTBTN2Controller;
use App\Http\Controllers\KetQuaController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Admins
Route::get('/ad', [AdminController::class, 'index'])->name('adhome'); 
Route::get('/ad/register_ad', [App\Http\Controllers\Admin\AuthController::class, 'getRegister']);
Route::post('/ad/register', [App\Http\Controllers\Admin\AuthController::class, 'postRegister']);
Route::get('/adhome', [App\Http\Controllers\Admin\AuthController::class, 'getLogin']);
Route::post('/ad/login', [App\Http\Controllers\Admin\AuthController::class, 'postLogin']);
Route::get('/ad/guimaxacnhanqmk', [AdminController::class, 'getADGuiMaXacNhanQuenMatKhau']);
Route::post('/ad/guimaxacnhanqmk', [AdminController::class, 'postADGuiMaXacNhanQuenMatKhau']);
Route::post('/ad/nhapmaxacnhanqmk', [AdminController::class, 'postADNhapMaXacNhanQuenMatKhau']);
Route::post('/ad/taomoimk', [AdminController::class, 'postADTaoMoiMatKhau']);
Route::get('/ad/dashboard', [AdminController::class, 'getIndex']);
Route::get('/ad/logout', [AdminController::class, 'getLogout']);

Route::group(['prefix'=>'admin'],function()    
{ 
    Route::group(['prefix'=>'bangchucai'],function()
    {
        Route::get('list', [BangChuCaiController::class, 'getList']);
        Route::get('edit/{id}', [BangChuCaiController::class, 'getEdit']);  
        Route::get('delete/{id}', [BangChuCaiController::class, 'getDelete']);
        Route::post('edit/{id}', [BangChuCaiController::class, 'postEdit']);
        Route::get('add', [BangChuCaiController::class, 'getAdd']);
        Route::post('add', [BangChuCaiController::class, 'postAdd']);
        Route::get('downloadExcelSample', [BangChuCaiController::class, 'downloadExcelSample']);
        Route::post('importExcel', [BangChuCaiController::class, 'importExcel']);        
    });
    Route::group(['prefix'=>'bangchucaichitiet'],function()
    {
        Route::get('list', [BangChuCaiChiTietController::class, 'getList']);  
        Route::get('edit/{id}',[BangChuCaiChiTietController::class, 'getEdit']);
        Route::get('delete/{id}',[BangChuCaiChiTietController::class, 'getDelete']);
        Route::post('edit/{id}',[BangChuCaiChiTietController::class, 'postEdit']);
        Route::get('add',[BangChuCaiChiTietController::class, 'getAdd']);
        Route::post('add',[BangChuCaiChiTietController::class, 'postAdd']);
        Route::get('downloadExcelSample', [BangChuCaiChiTietController::class, 'downloadExcelSample']);            
        Route::post('importExcel', [BangChuCaiChiTietController::class, 'importExcel']);
    });   
    Route::group(['prefix'=>'bai'],function()
    {
        Route::get('list',[BaiController::class, 'getList']);  
        Route::get('edit/{id}',[BaiController::class, 'getEdit']);
        Route::get('delete/{id}',[BaiController::class, 'getDelete']);
        Route::post('edit/{id}',[BaiController::class, 'postEdit']);
        Route::get('add',[BaiController::class, 'getAdd']);
        Route::post('add',[BaiController::class, 'postAdd']);
        Route::get('downloadExcelSample', [BaiController::class, 'downloadExcelSample']);            
        Route::post('importExcel', [BaiController::class, 'importExcel']);
    });   
    Route::group(['prefix'=>'tuvung'],function()
    {
        Route::get('list',[TuVungController::class, 'getList']);  
        Route::get('edit/{id}',[TuVungController::class, 'getEdit']);
        Route::get('delete/{id}',[TuVungController::class, 'getDelete']);
        Route::post('edit/{id}',[TuVungController::class, 'postEdit']);
        Route::get('add',[TuVungController::class, 'getAdd']);
        Route::post('add',[TuVungController::class, 'postAdd']);
        Route::get('downloadExcelSample', [TuVungController::class, 'downloadExcelSample']);            
        Route::post('importExcel', [TuVungController::class, 'importExcel']);
    });   
    Route::group(['prefix'=>'nguphap'],function()
    {
        Route::get('list',[NguPhapController::class, 'getList']);  
        Route::get('edit/{id}',[NguPhapController::class, 'getEdit']);
        Route::get('delete/{id}',[NguPhapController::class, 'getDelete']);
        Route::post('edit/{id}',[NguPhapController::class, 'postEdit']);
        Route::get('add',[NguPhapController::class, 'getAdd']);
        Route::post('add',[NguPhapController::class, 'postAdd']);
        Route::get('downloadExcelSample', [NguPhapController::class, 'downloadExcelSample']);            
        Route::post('importExcel', [NguPhapController::class, 'importExcel']);
    });   
    Route::group(['prefix'=>'luyennghe'],function()
    {
        Route::get('list',[LuyenNgheController::class, 'getList']);  
        Route::get('edit/{id}',[LuyenNgheController::class, 'getEdit']);
        Route::get('delete/{id}',[LuyenNgheController::class, 'getDelete']);
        Route::post('edit/{id}',[LuyenNgheController::class, 'postEdit']);
        Route::get('add',[LuyenNgheController::class, 'getAdd']);
        Route::post('add',[LuyenNgheController::class, 'postAdd']);
        Route::get('downloadExcelSample', [LuyenNgheController::class, 'downloadExcelSample']);            
        Route::post('importExcel', [LuyenNgheController::class, ]);
    });   
    Route::group(['prefix'=>'danhsachmp3'],function()
    {
        Route::get('list',[DanhSachMp3Controller::class, 'getList']);  
        Route::get('edit/{id}',[DanhSachMp3Controller::class, 'getEdit']);
        Route::get('delete/{id}',[DanhSachMp3Controller::class, 'getDelete']);
        Route::post('edit/{id}',[DanhSachMp3Controller::class, 'postEdit']);
        Route::get('add',[DanhSachMp3Controller::class, 'getAdd']);
        Route::post('add',[DanhSachMp3Controller::class, 'postAdd']);
        Route::get('downloadExcelSample', [DanhSachMp3Controller::class, 'downloadExcelSample']);            
        Route::post('importExcel', [DanhSachMp3Controller::class, 'importExcel']);
    });   
    Route::group(['prefix'=>'docvanmau'],function()
    {
        Route::get('list',[DocVanMauController::class, 'getList']);  
        Route::get('edit/{id}',[DocVanMauController::class, 'getEdit']);
        Route::get('delete/{id}',[DocVanMauController::class, 'getDelete']);
        Route::post('edit/{id}',[DocVanMauController::class, 'postEdit']);
        Route::get('add',[DocVanMauController::class, 'getAdd']);
        Route::post('add',[DocVanMauController::class, 'postAdd']);
        Route::get('downloadExcelSample', [DocVanMauController::class, 'downloadExcelSample']);            
        Route::post('importExcel',[DocVanMauController::class, 'importExcel']);
    });   
    Route::group(['prefix'=>'hoithoai'],function()
    {
        Route::get('list',[HoiThoaiController::class, 'getList']);  
        Route::get('edit/{id}',[HoiThoaiController::class, 'getEdit']);
        Route::get('delete/{id}',[HoiThoaiController::class, 'getDelete']);
        Route::post('edit/{id}',[HoiThoaiController::class, 'postEdit']);
        Route::get('add',[HoiThoaiController::class, 'getAdd']);
        Route::post('add',[HoiThoaiController::class, 'postAdd']);
        Route::get('downloadExcelSample', [HoiThoaiController::class, 'downloadExcelSample']);            
        Route::post('importExcel', [HoiThoaiController::class, 'importExcel']);
    });   
    Route::group(['prefix'=>'cauhoi'],function()
    {
        Route::get('list',[CauHoiController::class, 'getList']);  
        Route::get('edit/{id}',[CauHoiController::class, 'getEdit']);
        Route::get('delete/{id}',[CauHoiController::class, 'getDelete']);
        Route::post('edit/{id}',[CauHoiController::class, 'postEdit']);
        Route::get('add',[CauHoiController::class, 'getAdd']);
        Route::post('add',[CauHoiController::class, 'postAdd']);
        Route::get('downloadExcelSample', [CauHoiController::class, 'downloadExcelSample']);            
        Route::post('importExcel', [CauHoiController::class, 'importExcel']);
    });   
    Route::group(['prefix'=>'cauhoituvung'],function()
    {
        Route::get('list',[CauHoiTuVungController::class, 'getList']);  
        Route::get('edit/{id}',[CauHoiTuVungController::class, 'getEdit']);
        Route::get('delete/{id}',[CauHoiTuVungController::class, 'getDelete']);
        Route::post('edit/{id}',[CauHoiTuVungController::class, 'postEdit']);
        Route::get('add',[CauHoiTuVungController::class, 'getAdd']);
        Route::post('add',[CauHoiTuVungController::class, 'postAdd']);
        Route::get('downloadExcelSample', [CauHoiTuVungController::class, 'downloadExcelSample']);            
        Route::post('importExcel', [CauHoiTuVungController::class, 'importExcel']);
    });   
    Route::group(['prefix'=>'cauhoinguphap'],function()
    {
        Route::get('list',[CauHoiNguPhapController::class, 'getList']);  
        Route::get('edit/{id}',[CauHoiNguPhapController::class, 'getEdit']);
        Route::get('delete/{id}',[CauHoiNguPhapController::class, 'getDelete']);
        Route::post('edit/{id}',[CauHoiNguPhapController::class, 'postEdit']);
        Route::get('add',[CauHoiNguPhapController::class, 'getAdd']);
        Route::post('add',[CauHoiNguPhapController::class, 'postAdd']);
        Route::get('downloadExcelSample', [CauHoiNguPhapController::class, 'downloadExcelSample']);            
        Route::post('importExcel', [CauHoiNguPhapController::class, 'importExcel']);
    });   
    Route::group(['prefix'=>'ctbtn1'],function()
    {
        Route::get('list',[CTBTN1Controller::class, 'getList']);  
        Route::get('edit/{id}',[CTBTN1Controller::class, 'getEdit']);
        Route::get('delete/{id}',[CTBTN1Controller::class, 'getDelete']);
        Route::post('edit/{id}',[CTBTN1Controller::class, 'postEdit']);
        Route::get('add',[CTBTN1Controller::class, 'getAdd']);
        Route::post('add',[CTBTN1Controller::class, 'postAdd']);
        Route::get('downloadExcelSample',[CTBTN1Controller::class, 'downloadExcelSample'] );            
        Route::post('importExcel', [CTBTN1Controller::class, 'importExcel']);
    });
    Route::group(['prefix'=>'ctbtn2'],function()
    {
        Route::get('list',[CTBTN2Controller::class, 'getList']);  
        Route::get('edit/{id}',[CTBTN2Controller::class, 'getEdit']);
        Route::get('delete/{id}',[CTBTN2Controller::class, 'getDelete']);
        Route::post('edit/{id}',[CTBTN2Controller::class, 'postEdit']);
        Route::get('add',[CTBTN2Controller::class, 'getAdd']);
        Route::post('add',[CTBTN2Controller::class, 'postAdd']);
        Route::get('downloadExcelSample', [CTBTN2Controller::class, 'downloadExcelSample']);            
        Route::post('importExcel', [CTBTN2Controller::class, 'importExcel']);
    });
    Route::group(['prefix'=>'ketqua'],function()
    {
        Route::get('listktbc',[KetQuaController::class, 'getListKTBC']); 
        Route::get('deletekqktbc/{id}',[KetQuaController::class, 'getDeleteKTBC']);
        Route::get('listkttv',[KetQuaController::class, 'getListKTTV']); 
        Route::get('deletekqkttv/{id}',[KetQuaController::class, 'getDeleteKTTV']);
        Route::get('listktnp',[KetQuaController::class, 'getListKTNP']); 
        Route::get('deletekqktnp/{id}',[KetQuaController::class, 'getDeleteKTNP']);
    });
    Route::group(['prefix'=>'ctketqua'],function()
    {
        Route::get('listktbc',[KetQuaController::class, 'getListCTKTBC']); 
        Route::get('deletekqktbc/{id}',[KetQuaController::class, 'getDeleteCTKTBC']);
        Route::get('listkttv',[KetQuaController::class, 'getListCTKTTV']); 
        Route::get('deletekqkttv/{id}',[KetQuaController::class, 'getDeleteCTKTTV']);
        Route::get('listktnp',[KetQuaController::class, 'getListCTKTNP']); 
        Route::get('deletekqktnp/{id}',[KetQuaController::class, 'getDeleteCTKTNP']);
    });
});
    
// Client
Route::auth();       
Route::get('/', [ClientController::class, 'getTrangChu']);
// chưa đăng nhập
Route::get('dsbh', [ClientController::class, 'getDanhSachBaiHoc']);
Route::get('dsbcc', [ClientController::class, 'getDanhSachBangChuCai']);
Route::get('gioithieu', [ClientController::class, 'getGioiThieu']);
Route::get('bai/{id}', [ClientController::class, 'getBai']);
Route::get('tuvung/{id}', [ClientController::class, 'getTuVung']);
Route::get('nguphap/{id}', [ClientController::class, 'getNguPhap']);
Route::get('luyendoc/{id}', [ClientController::class, 'getLuyenDoc']);
Route::get('luyennghe/{id}', [ClientController::class, 'getLuyenNghe']);
Route::get('hoithoai/{id}', [ClientController::class, 'getHoiThoai']);
// đã đăng nhập
Route::get('dsbhdn/{id}', [ClientController::class, 'getDanhSachBaiHocDangNhap']);
Route::get('dsbhdn/{id}', [ClientController::class, 'getDanhSachBangChuCaiDangNhap']);
Route::get('gioithieudn/{id}', [ClientController::class, 'getGioiThieuDangNhap']);
Route::get('baidn/{id}/{id1}', [ClientController::class, 'getBaiDN']);
Route::get('tuvungdn/{id1}/{id}', [ClientController::class, 'getTuVungDN']);
Route::get('nguphapdn/{id1}/{id}', [ClientController::class, 'getNguPhapDN']);
Route::get('luyendocdn/{id1}/{id}', [ClientController::class, 'getLuyenDocDN']);
Route::get('luyennghedn/{id1}/{id}', [ClientController::class, 'getLuyenNgheDN']);
Route::get('hoithoaidn/{id1}/{id}', [ClientController::class, 'getHoiThoaiDN']);
Route::get('baitap/{id}/{id1}', [ClientController::class, 'getBaiTap']);

Route::get('capnhattuvung/{id}/{id1}', [ClientController::class, 'Capnhattuvung']);
Route::get('capnhatnguphap/{id}/{id1}', [ClientController::class, 'Capnhatnguphap']);
Route::get('capnhatluyendoc/{id}/{id1}', [ClientController::class, 'Capnhatluyendoc']);
Route::get('capnhatluyennghe/{id}/{id1}', [ClientController::class, 'Capnhatluyennghe']);
Route::get('capnhathoithoai/{id}/{id1}', [ClientController::class, 'Capnhathoithoai']);
Route::get('capnhatbaitap/{id}/{id1}', [ClientController::class, 'Capnhatbaitap']);

Route::get('kiemtra/{id}/{id1}', [ClientController::class, 'getKiemTra']);
Route::get('kiemtratv/{id}', [ClientController::class, 'getKiemTraTuVung']);
Route::get('kiemtranp/{id}', [ClientController::class, 'getKiemTraNguPhap']);
Route::get('kqkttv/{id}/{bai}', [ClientController::class, 'getKqKtTv']);
Route::get('kqktnp/{id}/{bai}', [ClientController::class, 'getKqKtNp']);
// Route::get( 'kqkt/{id}/{bai}/{idhv}','ClientController@getKqKt')->name('kqkt');
Route::get('kqkt/{id}/{bai}/{idhv}', [ClientController::class, 'getKqKt']);

Route::get('batdaukiemtra/{id}/{id1}', [ClientController::class, 'getBatDauKiemTra']);
Route::get('batdaukiemtratuvung/{id}/{id1}', [ClientController::class, 'getBatDauKiemTraTuVung']);
Route::get('batdaukiemtranguphap/{id}/{id1}', [ClientController::class, 'getBatDauKiemTraNguPhap']);
Route::get('danglendiendan/{idkq}', [ClientController::class, 'getDangLenDienDan']);
Route::get('diendan/{id}', [ClientController::class, 'getDienDan']);

Route::post('kiemtra', [ClientController::class, 'postKiemtra']);
Route::post('kiemtratv', [ClientController::class, 'postKiemtraTuVung']);
Route::post('kiemtranp', [ClientController::class, 'postKiemtraNguPhap']);

Route::get('doimk/{id}', [ClientController::class, 'getDoiMatKhau']);
Route::get('doimk/{id}', [ClientController::class, 'postDoiMatKhau']);

Route::get('/trangcanhan/{id}', [ClientController::class, 'getTrangCaNhan']);
Route::post('suatt/{id}', [ClientController::class, 'postDoiTT']);

Route::get('ad/trangcanhan', [ClientController::class, 'getADTrangCaNhan']);
Route::post('ad/suatt/{id}', [ClientController::class, 'postADDoiTT']);
Route::get('ad/doimk/{id}', [ClientController::class, 'getADDoiMatKhau']);
Route::post('ad/doimk/{id}', [ClientController::class, 'postADDoiMatKhau']);

Route::get('lichhoc/{id}', [ClientController::class, 'getLichhoc']);
Route::get('dklichhoc', [ClientController::class, 'postDangKiLichHoc']);
Route::get('qllichhoc/edit/{id}/{id1}', [ClientController::class, 'getEditLichhoc']);
Route::get('qllichhoc/edit/{id}/{id1}', [ClientController::class, 'postEditLichhoc']);
Route::get('qllichhoc/delete/{id}/{id1}', [ClientController::class, 'getDeleteLichhoc']);
Route::get('/kqkt/{id}', [ClientController::class, 'getKetQuaKiemTra']);

Route::get('/hiragana', [ClientController::class, 'getHiragana']);
Route::get('/katakana', [ClientController::class, 'getKatakana']);
Route::get('/hiraganaluyentap', [ClientController::class, 'getHiraLuyenTap']);
Route::get('/katakanaluyentap', [ClientController::class, 'getKataLuyenTap']);

Route::get('/hiragana_dn/{id}', [ClientController::class, 'getHiraganaDN']);
Route::get('/katakana_dn/{id}', [ClientController::class, 'getKatakanaDN']);
Route::get('/hiraganaluyentap_dn/{id}', [ClientController::class, 'getHiraLuyenTapDN']);
Route::get('/katakanaluyentap_dn/{id}', [ClientController::class, 'getKataLuyenTapDN']);

Route::get('/guimaxacnhan', [ClientController::class, 'getGuiMaXacNhan']);
Route::post('/guimaxacnhan', [ClientController::class, 'postGuiMaXacNhan']);
Route::get('/batdauhoc', [ClientController::class, 'getBatDauHoc']);
Route::get('/home', [ClientController::class, 'getBatDauHoc']);
Route::get('/dkhoc/{id}', [ClientController::class, 'getDKHoc']);
Route::get('/index_dangnhap/{id}', [ClientController::class, 'getIndexDangNhap']);

Route::post('/nhapmaxacnhan', [ClientController::class, 'postNhapMaXacNhan']);

Route::get('/guimaxacnhanqmk', [ClientController::class, 'getGuiMaXacNhanQuenMatKhau']);
Route::post('/guimaxacnhanqmk', [ClientController::class, 'postGuiMaXacNhanQuenMatKhau']);
Route::post('/nhapmaxacnhanqmk', [ClientController::class, 'postNhapMaXacNhanQuenMatKhau']);
Route::post('/taomoimk', [ClientController::class, 'postTaoMoiMatKhau']);
Route::get('logout', [HomeController::class, 'getLogout']);
