<tr>
    <th style="border-left: 1px solid #3399ff;">ID</th>
    <th>专题标题</th>
    <th>分类名称</th>
    <th>用户ID</th>
    <th>专题大图片</th>
    <th>浏览数</th>
    <th>是否上线</th>
    <th style="border-right: 1px solid #3399ff;">操作</th>
</tr>
@foreach($list as $v)
    <tr class="trd">
        <td style="border-left: 1px solid #e5e5e5;">{{$v->id}}</td>
        <td>{{$v->title}}</td>
        @foreach($cate as $a)
            @if($a->id == $v->cate_id)
                <td>{{$a->cate_name}}</td>
            @endif
        @endforeach
        <td>{{$v->auser_id}}</td>
        <td><img src='{{asset("upload/images/$v->banner_img")}}' width="100"></td>
        <td>{{$v->good_num == 0 ? 0 : $v->good_num}}</td>
        <td>
                        <span class="show" style="cursor: pointer;" name="{{$v->id}}">
                            <svg class="icon icon_em_18" aria-hidden="true" style="color:{{$v->is_show == 1 ? 'green' : 'red'}};">
                                <use xlink:href="#front_icon-yundong"></use>
                            </svg>
                        </span>
        </td>
        <td>
            <a class="active" href="{{url('admin/themeList/edit').'/'.$v->id}}">
                <i class="fa fa-wrench" title="修改专题"></i>
            </a>
            <a class="active del" href="javascript:void(0)" name="{{$v->id}}">
                <i class="fa fa-trash" title="删除专题"></i>
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
{{--点击显示--}}
<script>
    $(".show").click(function () {
        var id = $(this).attr("name");
        $.ajax({
            url:"{{url('admin/themeList/is')}}/"+id,
            type:"get",
            data:{"id":id},
            dataType:"string",
            success:function (data) {},
            error:function (msg) {
                if (msg.responseText == 2) {
                    $(".show[name="+id+"] svg").css({'color':'red'});
                    $(".alt").html("专题已下线！").show().delay(500).fadeOut(500);
                } else if(msg.responseText == 1) {
                    $(".show[name="+id+"] svg").css({'color':'green'});
                    $(".alt").html("专题已上线！").show().delay(500).fadeOut(500);
                }
            }
        });
    });
</script>
{{--删除分类--}}
<script>
    $(".del").click(function () {
        //获取点击的id
        var id = $(this).attr("name");
        $.ajax({
            url:"{{url('admin/themeList/del')}}/"+id,
            type:"get",
            data:{"id":id},
            dataType:"string",
            success:function (data) {},
            error:function (msg) {
                if (msg.responseText == 2) {
                    $(".del[name="+id+"]").parent('td').parent('tr').remove();
                    $(".alt").html("专题删除成功！").show().delay(500).fadeOut(500);
                }
            }
        });
    });
</script>