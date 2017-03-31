<tr>
    <th style="border-left: 1px solid #3399ff;">ID</th>
    <th>权限名称</th>
    <th>权限路由</th>
    <th>描述</th>
    <th style="text-align: center">菜单栏显示</th>
    <th style="border-right: 1px solid #3399ff;text-align: center;">权限操作</th>
</tr>
@foreach($data as $v)
    @if ($v->parent_id == 0)
        <tr class="ftrd">
            <td style="border-left: 1px solid #e5e5e5;">{{$v->id}}</td>
            <td>{{$v->display_name}}</td>
            <td>{{$v->name}}</td>
            <td>{{$v->description}}</td>
            @if($v->is_menu == 0)
                <td style="color: red;text-align: center;">否</td>
            @elseif($v->is_menu == 1)
                <td style="color: green;text-align: center;">是</td>
            @endif
            <td style="text-align: center">
                <a class="active" href="{{url('admin/permission/edit').'/'.$v->id}}">
                    <i class="fa fa-wrench" title="修改权限"></i>
                </a>
                <a class="active del" href="javascript:void(0)" name="{{$v->id}}">
                    <i class="fa fa-trash" title="删除权限"></i>
                </a>
            </td>
        </tr>
    @else
        <tr class="trd">
            <td style="border-left: 1px solid #e5e5e5;">{{$v->id}}</td>
            <td>{{str_repeat('~', 3*$v->count).$v->display_name}}</td>
            <td>{{$v->name}}</td>
            <td>{{$v->description}}</td>
            @if($v->is_menu == 0)
                <td style="color: red;text-align: center;">否</td>
            @elseif($v->is_menu == 1)
                <td style="color: green;text-align: center;">是</td>
            @endif
            <td style="text-align: center">
                <a class="active" href="{{url('admin/permission/edit').'/'.$v->id}}">
                    <i class="fa fa-wrench" title="修改权限"></i>
                </a>
                <a class="active del" href="javascript:void(0)" name="{{$v->id}}">
                    <i class="fa fa-trash" title="删除权限"></i>
                </a>
            </td>
        </tr>
    @endif
@endforeach
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
{{--删除权限--}}
<script>
    $(".del").click(function () {
        //获取点击的id
        var id = $(this).attr("name");
        $.ajax({
            url:"{{url('admin/permission/del')}}/"+id,
            type:"get",
            data:{"id":id},
            dataType:"string",
            success:function (data) {},
            error:function (msg) {
                if (msg.responseText == 1) {
                    $(".alt").html("该路由下面有子路由无法删除！").show().delay(500).fadeOut(500);
                } else if (msg.responseText == 2) {
                    $(".del[name="+id+"]").parent('td').parent('tr').remove();
                    $(".alt").html("路由删除成功！").show().delay(500).fadeOut(500);
                }
            }
        });
    });
</script>