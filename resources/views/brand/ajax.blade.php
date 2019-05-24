<table border="">
    <h3>品牌展示</h3>
    <p><input type="text" name="brand_name" placeholder="请输入品牌名称" ><input type="text" name="brand_url" placeholder="请输入品牌网址"><button>搜索</button></p>
    
    <tr>
        <td>品牌id</td>
        <td>品牌名字</td>
        <td>品牌描述</td>
        <td>品牌地址</td>
        <td>品牌logo</td>
        <td>操作</td>
    </tr>
    @if($data)
    @foreach($data as $v)
    <tr>
        <td>{{$v->brand_id}}</td>
        <td><a href="/brand/details/{{$v->brand_id}}">{{$v->brand_name}}</a></td>
        <td>{{$v->brand_desc}}</td>
        <td>{{$v->brand_url}}</td> 
        <td>
            <!-- <img src="http://www.image.com/{{$v->brand_logo}}" width="50px"> -->
            <img src="{{config('app.img_url')}}{{$v->brand_logo}}" width="50px">

        </td>
        <!-- {{$v->brand_logo}} -->
        <td>
            <a href="edit/{{$v->brand_id}}">修改</a>
            <a href="del/{{$v->brand_id}}">删除</a>
        </td>
    </tr>
    @endforeach
    @endif
</table>    
{{ $data->appends($query)->links() }} 