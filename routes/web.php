<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;

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
Route::get('logout','HomeController@getLogout');
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
