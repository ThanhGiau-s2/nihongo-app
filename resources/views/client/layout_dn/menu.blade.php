<div class="col-md-4 col-4 dsbh_p2"> 
<h3 style="text-align:center">Danh sách bài học</h3>    
@if($last_bai>=1)   
    <div class="hangbh">
        <?php
        for ($i = 1; $i <= $last_bai; $i++) {?>
            @if(isset($id)&& $i==$id)
            <a href="baidn/{{$i}}/{{Auth::user()->id}}"><div class="baihocactive">{{$i}}</div></a>
            @else
            <a href="baidn/{{$i}}/{{Auth::user()->id}}"><div class="baihoc">{{$i}}</div></a>
            @endif 
        <?php 
        }?>
    </div>
@endif
@if($last_bai>6) 
    <div class="hangbh">
        <?php
        for ($i = 6; $i <= 10; $i++) {?>
            <a href="baidn/{{$i}}"><div class="baihoc">{{$i}}</div></a>
        <?php 
        }?>
    </div>
@endif
@if($last_bai>11) 
    <div class="hangbh">
        <?php
        for ($i = 11; $i <= 15; $i++) {?>
            <a href="baidn/{{$i}}"><div class="baihoc">{{$i}}</div></a>
        <?php 
        }?>
    </div>    
@endif
@if($last_bai>16) 
    <div class="hangbh">
        <?php
        for ($i = 16; $i <= 20; $i++) {?>
            <a href="baidn/{{$i}}"><div class="baihoc">{{$i}}</div></a>
        <?php 
        }?>
    </div>    
@endif
@if($last_bai>21)                 
    <div class="hangbh">
        <?php
        for ($i = 21; $i <= 25; $i++) {?>
            <a href="baidn/{{$i}}"><div class="baihoc">{{$i}}</div></a>
        <?php 
        }?>
    </div>  
@endif                  
</div>
</div>
</div>
</section>
