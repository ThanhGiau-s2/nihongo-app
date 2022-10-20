@extends('admin.layout.master')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                   
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                       
                    </ol>                    
                </div>            
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admin/cauhoi/add" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm câu hỏi</h5>                                
                    </div>
                    <div class="modal-body">    
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Bài:</label>
                            <div class="col-sm-9">
                                <select name="id_bai" class="form-control select-option" id="">
                                <option value="0">Vui lòng chọn bài</option>                                            
                                    @foreach($baisa as $b)
                                        <option value="{{$b->id}}"/>{{$b->ten}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_bai'))
                                    <span class="error">{{$errors->first('id_bai')}}</span>
                                @endif
                            </div>
                        </div>                           
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nội dung:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="noidungch" class="form-control" placeholder="Nội dung">                                            
                                @if ($errors->has('noidungch'))
                                    <span class="error">{{$errors->first('noidungch')}}</span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group row">            
                            <div class="col-sm-3">Đáp án:</div>                       
                        </div>        
                        <div class="all_ans">
                            <div id="options">
                                <div class="form-group row">        
                                    <div class="col-sm-1 offset-sm-2">
                                        <p class="form-control-plaintext">A. <input type="radio" name="opt_iscorrect" class="" value="1"></p>            
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control sem-semester" placeholder="Đáp án 1" name="dapan1">
                                        @if ($errors->has('dapan1'))
                                            <span class="error">{{$errors->first('dapan1')}}</span>
                                        @endif
                                    </div>
                                   
                                </div>
                                <div class="form-group row">        
                                    <div class="col-sm-1 offset-sm-2">
                                        <p class="form-control-plaintext">B. <input type="radio" name="opt_iscorrect" class="" value="2"></p>            
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control sem-semester" placeholder="Đáp án 2" name="dapan2">
                                        @if ($errors->has('dapan2'))
                                            <span class="error">{{$errors->first('dapan2')}}</span>
                                        @endif
                                    </div>            
                                </div>
                                <div class="form-group row">        
                                    <div class="col-sm-1 offset-sm-2">
                                        <p class="form-control-plaintext">C. <input type="radio" name="opt_iscorrect" class="" value="3"></p>            
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control sem-semester" placeholder="Đáp án 3" name="dapan3">
                                        @if ($errors->has('dapan3'))
                                            <span class="error">{{$errors->first('dapan3')}}</span>
                                        @endif
                                    </div>            
                                </div>                            
                                <div class="form-group row">        
                                    <div class="col-sm-1 offset-sm-2">
                                        <p class="form-control-plaintext">D. <input type="radio" name="opt_iscorrect" class="" value="4"></p>            
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control sem-semester" placeholder="Đáp án 4" name="dapan4">
                                        @if ($errors->has('dapan4'))
                                            <span class="error">{{$errors->first('dapan4')}}</span>
                                        @endif
                                    </div>            
                                </div>
                                @if ($errors->has('opt_iscorrect'))
                                    <span class="error">{{$errors->first('opt_iscorrect')}}</span>
                                @endif
                            </div>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a type="" href="admin/cauhoi/list" class="btn btn-secondary">Trở về</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection