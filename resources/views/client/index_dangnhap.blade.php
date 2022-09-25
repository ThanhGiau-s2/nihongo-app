@extends('client.layout_dn.master')
@section('content')
<div class="container content">
    <div class="dd"><h3><a href="/index_dangnhap/{{Auth::user()->id}}">Trang chủ</a></h3></div>
    <section>
        <div class="row pb400">
            <div class="col-md-8 col-8 ctbh">
            <h2>Minna no nihongo</h2>
            <p>Giáo trình sách Minnano Nihongo được đánh giá cao về tính chính xác và độ tin cậy.</br>
            Có thể nói đó là giáo trình mà bất kì ai học tiếng Nhật từ sơ tới trung cấp đều học qua.</br>
            Trang web Nihongo xin giới thiệu bộ giáo trình và cách sử dụng sao cho hiệu quả Mina sơ cấp .</p>
            <p>Giáo trình sách Minnano Nihongo gồm:</p>
            <li>Cuốn Honsatsu (Quyển chính)</li>
            <li>Cuốn bản dịch</li>
            <li>Cuốn bài tập Bunkei Renshuuchou</li>
            <li>Cuốn Hyoujun Mondaishuu</li>
            <li>Cuốn Shokyuude Yomeru Toliiku 25</li>
            <li>Cuốn Choukai Tasuku 25</li>
            <li>Cuốn Yasashii Sakubun</li>
            <h3>Danh sách bài học</h3>
                <ul>
                @foreach($tenbh as $tbh)
                <li><a href="baidn/{{$tbh->id}}/{{Auth::user()->id}}"><b>Bài{{$tbh->id}}:</b> {{$tbh->tieude}}</a></li>
            @endforeach
                   
                </ul>
            </div>
@endsection

   
        
                
