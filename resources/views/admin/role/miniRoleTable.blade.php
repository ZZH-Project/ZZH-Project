<tr>
    <th style="border-left: 1px solid #3399ff;">ID</th>
    <th>角色标识</th>
    <th>角色名称</th>
    <th>描述</th>
    <th>拥有权限</th>
    <th style="border-right: 1px solid #3399ff;text-align: center;">角色操作</th>
</tr>
@foreach($data as $v)
    <tr class="trd">
        <td style="border-left: 1px solid #e5e5e5;">{{$v->id}}</td>
        <td>{{$v->name}}</td>
        <td>{{$v->display_name}}</td>
        <td>{{$v->description}}</td>
        <td>{{$v->dname}}</td>
        <td style="text-align: center">
            <a class="active" href="{{url('admin/role/edit').'/'.$v->id}}">
                <i class="fa fa-wrench" title="修改权限"></i>
            </a>
            <a class="active del" href="javascript:void(0)" name="{{$v->id}}">
                <i class="fa fa-trash" title="删除权限"></i>
            </a>
        </td>
    </tr>
@endforeach
{{--删除角色--}}
<script>
    $(".del").click(function () {
        //获取点击的id
        var id = $(this).attr("name");
        $.ajax({
            url:"{{url('admin/role/del')}}/"+id,
            type:"get",
            data:{"id":id},
            dataType:"string",
            success:function (data) {},
            error:function (msg) {
                if (msg.responseText == 2) {
                    $(".del[name="+id+"]").parent('td').parent('tr').remove();
                    $(".alt").html("角色删除成功！").show().delay(500).fadeOut(500);
                }
            }
        });
    });
</script>
{{--实现隔行换色和鼠标移动变色--}}
<script>
    $(".ftrd").find('td').css({"background":"#faf094"});
    $(".trd").mouseover(function () {
        $(this).find('td').css({"background":"#e5e5e5"});
    });
    $(".trd").mouseout(function () {
        $(this).find('td').css({"background":"white"});
    });
</script>
