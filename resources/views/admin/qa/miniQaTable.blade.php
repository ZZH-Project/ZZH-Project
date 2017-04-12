<tr>
    <th style="border-left: 1px solid #3399ff;">ID</th>
    <th>问答标题</th>
    <th>用户名</th>
    <th>问答分类</th>
    <th>点赞数</th>
    <th>发布时间</th>
    <th>是否显示</th>
    <th>问答详情</th>
</tr>
@foreach($qalists as $qalist)
    <tr class="trd">
        <td style="border-left: 1px solid #e5e5e5;">{{$qalist->id}}</td>
        <td>{{$qalist->title}}</td>
        <td>{{$qalist->user_id}}</td>
        <td>{{$qalist->cate_name}}</td>
        <td>{{$qalist->good_num}}</td>
        <td>{{date('Y-m-d H:m:s',$qalist->issue_time)}}</td>
        <td>{{$qalist->is_show}}</td>
        <td><a href="{{url("admin/qa/showcontent").'/'.$qalist->id}}"><i class="fa fa-fw fa-align-justify"></i></a></td>
    </tr>
@endforeach
<tr>
    <td colspan="8" style="border-left: 1px solid #e5e5e5;">
        {{--                        {{$qalist->appends(['fv'=>$fv])->links('public.zj_page')}}--}}
    </td>
</tr>