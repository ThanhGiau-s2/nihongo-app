@extends('admin.layout.master')
@section('content')
    <h3 class="tieude">こんにちは</h3>
    <div class="container">
        <div class="row">            
            <div class="col-md-4 wrap-content">
            <a href="/admin/bangchucaichitiet/list">
                <img src="admin/assets/images/bangchucai.png" alt=""/>
                <p>Bảng chữ cái</p>
            </a>
            </div>            
            <div class="col-md-4 wrap-content">
            <a href="/admin/tuvung/list">    
            <img src="admin/assets/images/tuvung.png" alt=""/>
            <p>Từ vựng</p>
            </a>
            </div>
            <div class="col-md-4 wrap-content">
            <a href="/admin/nguphap/list">  
            <img src="admin/assets/images/nguphap.jpg" alt=""/>
            <p>Ngữ pháp</p>
            </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 wrap-content">
            <a href="/admin/docvanmau/list"> 
            <img src="admin/assets/images/luyendoc.jpg" alt=""/>
               <p>Luyện đọc</p>
            </div>
            <div class="col-md-4 wrap-content">
            <a href="/admin/luyennghe/list"> 
            <img src="admin/assets/images/luyennghe.jpg" alt=""/>
                <p>Luyện nghe</p>
            </div>
            <div class="col-md-4 wrap-content">
            <a href="/admin/hoithoai/list"> 
            <img src="admin/assets/images/hoithoai.jpg" alt=""/>
               <p>Hội thoại</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 wrap-content">
            <a href="/admin/ketqua/listktbc"> 
            <img src="admin/assets/images/ketqua.jpg" alt=""/>
                <p>Kết quả kiểm tra bài cũ</p>
            </div>
            <div class="col-md-4 wrap-content">
            <a href="/admin/ketqua/listkttv"> 
            <img src="admin/assets/images/ketqua.jpg" alt=""/>
                <p>Kết quả kiểm tra từ vựng</p>
            </div>
            <div class="col-md-4 wrap-content">
            <a href="/admin/ketqua/listktnp"> 
            <img src="admin/assets/images/ketqua.jpg" alt=""/>
                <p>Kết quả kiểm tra ngữ pháp</p>
            </div>
        </div>
    </div>
@endsection