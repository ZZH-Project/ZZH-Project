<tr>
    <th style="border-left: 1px solid #3399ff;">ID</th>
    <th>用户名</th>
    <th>角色</th>
    <th>邮箱</th>
    <th style="border-right: 1px solid #3399ff;">用户操作</th>
</tr>
@foreach($data as $v)
    <tr class="trd">
        <td style="border-left: 1px solid #e5e5e5;">{{$v['id']}}</td>
        <td>{{$v['username']}}</td>
        <td>无</td>
        <td>{{$v['email'] != null ? $v['email'] : '无'}}</td>
        <td>
            <a class="active" href="{{url('admin/user/edit').'/'.$v['id']}}/{{isset($_GET['page']) ? $_GET['page'] : 1}}">
                <i class="fa fa-user-secret" title="修改信息"></i>
            </a>
            <a class="active" href="{{url('admin/user/del').'/'.$v['id']}}">
                <i class="fa fa-user-times" title="删除用户"></i>
            </a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="5" style="border-left: 1px solid #e5e5e5;">
        {{$data->appends(['fv' => $fv])->links('public.zj_page')}}
    </td>
</tr>
