<tr>
    <th style="border-left: 1px solid #3399ff;">ID</th>
    <th>分类名称</th>
    <th>分类排序</th>
    <th style="border-right: 1px solid #3399ff;">操作</th>
</tr>
@foreach($qalist as $qa)
    <tr class="trd">
        <td style="border-left: 1px solid #e5e5e5;">{{$qa['id']}}</td>
        <td>{{$qa['cate_name']}}</td>
        <td>{{$qa['sort_id']}}</td>
        <td><a href="{{url('admin/comment/edit').'/'.$qa['id'].'/'.$qa['cate_name']}}{{$fv == null ? '' : '/'.$fv}}"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                    <a href="{{url('admin/comment/del').'/'.$qa['id']}}"><i class="fa fa-fw fa-trash" title="删除"></i></a></td>
    </tr>
@endforeach
<tr>
    <td colspan="5" style="border-left: 1px solid #e5e5e5;">
        {{$qalist->appends(['fv'=>$fv])->links('public.zj_page')}}
    </td>
</tr>