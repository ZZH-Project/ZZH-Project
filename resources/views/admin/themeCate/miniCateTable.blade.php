<tr>
    <th style="border-left: 1px solid #3399ff;">ID</th>
    <th>分类排序编号</th>
    <th>分类名称</th>
    <th>分类图片</th>
    <th style="border-right: 1px solid #3399ff;">操作</th>
</tr>
@foreach($data as $v)
    <tr class="trd">
        <td style="border-left: 1px solid #e5e5e5;">{{$v->id}}</td>
        <td>{{$v->sort_id}}</td>
        <td>{{$v->cate_name}}</td>
        <td>{{$v->cate_img}}</td>
        <td>
            <a class="active" href="{{url('admin/themeCate/edit').'/'.$v->id}}">
                <i class="fa fa-wrench" title="修改分类"></i>
            </a>
            <a class="active del" href="javascript:void(0)" name="{{$v->id}}">
                <i class="fa fa-trash" title="删除分类"></i>
            </a>
        </td>
    </tr>
@endforeach
{{--实现隔行换色和鼠标移动变色--}}
<script>
    $(".trd").mouseover(function () {
        $(this).find('td').css({"background":"#e5e5e5"});
    });
    $(".trd").mouseout(function () {
        $(this).find('td').css({"background":"white"});
    });
</script>
{{--删除分类--}}
<script>
    $(".del").click(function () {
        //获取点击的id
        var id = $(this).attr("name");
        $.ajax({
            url:"{{url('admin/themeCate/del')}}/"+id,
            type:"get",
            data:{"id":id},
            dataType:"string",
            success:function (data) {},
            error:function (msg) {
                if (msg.responseText == 2) {
                    $(".del[name="+id+"]").parent('td').parent('tr').remove();
                    $(".alt").html("分类删除成功！").show().delay(500).fadeOut(500);
                }
            }
        });
    });
</script>