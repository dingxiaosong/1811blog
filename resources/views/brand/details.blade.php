<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{asset('css/page.css')}}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: left;
            padding:25px;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
   <div class="content">
    <form action="">
        <table >
            <h1>品牌展示</h1>
            <tr>
                <td>品牌id:</td>
                <td>{{$res->brand_id}}</td>
            </tr>
            <tr>

                <td>品牌名字:</td>
                <td>{{$res->brand_name}}</td>
            </tr>
            <tr>
                <td>品牌描述:</td>
                <td>{{$res->brand_desc}}</td>
            </tr>
            <tr>
                <td>品牌地址:</td>
                <td>{{$res->brand_url}}</td>
            </tr>
            <tr>
                <td>品牌logo:</td>
                <td><img src="{{config('app.img_url')}}{{$res->brand_logo}}" width="300px"></td>
            </tr>
            <h3 id="pinglun">评论显示区</h3>
            @foreach($cont as $v)
            <table class="pinglun list" >
                <p>{{$v->demail}}</p><p>{{$v->grade}}</p><p>{{$v->desc}}</p><p>{{$v->created_at}}</p>
            </table>
            </br>
             @endforeach
           
            
            
            

                
               {{csrf_field()}}
               <p>用户名:{{$res->brand_name}}</p>
               <p>email:<input type="email" name="demail" id="email"></p>
               <p>评论等级:
               <input type="radio" name="grade" id="grade" value="1星">1级
               <input type="radio" name="grade" id="grade" value="2星">2级
               <input type="radio" name="grade" id="grade" value="3星">3级
               <input type="radio" name="grade" id="grade" value="4星">4级
               <input type="radio" name="grade" id="grade" value="5星">5级
               </p>
               <p>评论内容: <textarea name="desc" cols="20" rows="3" id="desc"></textarea>      
               <p><input type="button" value="提交评论" class="btn"></p>          
                

</div>


</form>
</table>    
</body>
</html>
<script src="/js/jquery-3.2.1.min.js"></script>

<script>
    $('.btn').click(function(){
     // alert(11);
            var data ={};
            data.demail = $('#email').val();
            data.grade = $('#grade').val();
            data.desc = $('#desc').val();
            // console.log(data.email);
           
            
            $.get(
              "/brand/detailsdo",
              data,
              function(res)
              {
                // console.log(res);
                // alert(res.data.demail);
                var _html = "<table><p>"+res.data.demail+"</p><p>"+res.data.grade+"</p><p>"+res.data.desc+"</p><p>"+res.data.created_at+"</p></table></br>";               
                // console.log(_html);
                 $('#pinglun').after(_html);
                // };
              },'json'
            );
    })

</script>