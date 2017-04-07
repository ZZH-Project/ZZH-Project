@extends('admin.layouts.Index')
@section('title','美丽联合-微圈列表')
@section('title-first','微圈内容管理')
@section('title-second','微圈列表')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_userList_zj.css')}}">
@endsection
@section('main')
    <div style="background: white;padding: 0 10px 25px 10px;">
        <h3 style="padding-top: 20px;color: #3399ff;">微圈内容列表</h3>
        <div style="padding:10px 0;">
            <div class="find">微圈标题搜索：</div><input id="uf" class="myinput-main" type="text" value="">
            <input class="token" type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="clear"></div>
        </div>
        <table class="tb">
            <tr>
                <th style="border-left: 1px solid #3399ff;">ID</th>
                <th>分类名称</th>
                <th>用户ID</th>
                <th>专题标题</th>
                <th>专题大图片</th>
                <th>专题文章内容</th>
                <th>点赞数</th>
                <th style="border-right: 1px solid #3399ff;">操作</th>
            </tr>
           {{-- @foreach($data as $v)
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
            @endforeach--}}
        </table>
    </div>
@endsection
@section('script')
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
                url:"{{url('admin/wechatCate/del')}}/"+id,
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
    {{--分类无刷新搜索--}}
    <script>
        $("#uf").keyup(function () {
            //获取输入的值
            var fv = $("#uf").val();
            var token = $(".token").val();
            $.ajax({
                url:"{{url('admin/wechatCate/show')}}",
                type:"post",
                data:{"fv":fv,"_token":token,'a':1},
                dataType:"string",
                success:function(data){},
                error:function (msg) {
                    //迷你视图
                    $tb = msg.responseText;
                    $(".tb").html($tb);
                }
            });
        });
    </script>
@endsection


