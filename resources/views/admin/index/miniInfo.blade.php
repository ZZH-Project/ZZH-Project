@foreach($data as $v)
<div id="top" style="overflow: hidden;">
    <div id="aname" style="float: left;">{{$v->username}}</div>
    <div id="atime" style="float: right;">{{$v->created_at}}</div>
</div>
<div id="bottom">{{$v->content}}</div>
@endforeach
