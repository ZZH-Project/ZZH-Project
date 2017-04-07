<tr>
    <th style="border-left: 1px solid #3399ff;">ID</th>
    <th>问答标题</th>
    <th>用户编号</th>
    <th>评论编号</th>
    <th>评论内容</th>
    <th>点赞数</th>
    <th>发布时间</th>
    <th>是否显示</th>
    <th>回答详情</th>
</tr>
@foreach($qacomment as $v)
    <tr class="trd">
    <td style="border-left: 1px solid #e5e5e5;">{{$v->id}}</td>
    <td>{{$v->title}}</td>
    <td>{{$v->user_id}}</td>
    @if($v->comment_id ==0)
        <td style="background: darkgray">{{$v->comment_id}}</td>
    @else
        <td>{{$v->comment_id}}</td>
    @endif
    <td>{{$v->content}}</td>
    <td>{{$v->good_num}}</td>
    <td>{{date('Y-m-d H:i:s',$v->issue_time)}}</td>
    <td>{{$v->is_show}}</td>
    <td><a href="{{url("admin/qacomment/showcomment").'/'.$v->id}}"><i class="fa fa-fw fa-align-justify"></i></a></td>
    </tr>
@endforeach
<tr>
    <td colspan="8" style="border-left: 1px solid #e5e5e5;">
        {{--                        {{$qalist->appends(['fv'=>$fv])->links('public.zj_page')}}--}}
    </td>
</tr>