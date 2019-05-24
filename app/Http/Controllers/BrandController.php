<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests\StoreBrandPost;

use App\Brand; 
use Illuminate\Support\Facades\Cache;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = request()->page??1;
        // dd($page);
        $pagesize =config('app.pageSize');
        $query = request()->all();
        $brand_name = $query['brand_name']??'';
        $brand_url = $query['brand_url']??'';
        // var_dump($brand_url);
        // var_dump($brand_name);exit;
        $data = cache('list_'.$page.'_'.$brand_name.'_'.$brand_url);
      //  echo 'list_'.$page.'_'.$brand_name.'_'.$brand_url;
       // dd($data);
        if (!$data) {
            echo 123;
             $where = [];
            if (isset($query['brand_name'])) {
                $where[] = ['brand_name','like',"%$query[brand_name]%"];
            }
            if ($query['brand_url']??'') {
                $where['brand_url'] = $query['brand_url'];
            }
             // DB::connection()->enableQueryLog();
            // $data = DB::table('brand')->where($where)->paginate($pagesize);
            $data = Brand::where($where)->paginate($pagesize);

            // $logs = DB::getQueryLog();
            // dd($logs);
           // echo 'list_'.$page.'_'.$brand_name.'_'.$brand_url;
            cache(['list_'.$page.'_'.$brand_name.'_'.$brand_url=>$data],1);

            // dump($query);exit;
        }
       // dd(request()->ajax());
        if (request()->ajax()) {
            return view('brand.ajax', ['data' => $data,'query'=>$query]);
        }
            return view('brand.list', ['data' => $data,'query'=>$query]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo 123;
        return view('brand/add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    // public function store(StoreBrandPost $request){
        // echo 2222;
        //  $validator = \Validator::make($request->all(), [             
        //     'brand_name' => 'required|unique:brand|max:255',         
        //     'user_age' => 'required',     
        //     'user_tel' => 'required',     
        //     ],[
        //         'brand_name.required' => '用户名不能为空!',
        //         'brand_name.unique' => '用户名已存在!',
        //         'brand_name.max' => '用户名长度不能超过255!',
        //         'user_age.required' => '年龄不能为空!',
        //         'user_tel.required' => '电话不能为空!',
        //     ]); 
 
        // if ($validator->fails()) {             
        //     return redirect('brand/add')->withErrors($validator)->withInput();         
        // }
        $data = $request->except('_token');
        //validate验证第一种方法
         // $validatedData = $request->validate([         
         //    'brand_name' => 'required|unique:brand|max:255',         
         //    'brand_url' => 'required',     
         //    'brand_logo' => 'required',     
         //    'brand_desc' => 'required',     
         //    ],[
         //        'brand_name.required' => '用户名不能为空!',
         //        'brand_name.unique' => '用户名已存在!',
         //        'brand_name.max' => '用户名长度不能超过255!',
         //        'brand_url.required' => '网址不能为空!',
         //        'brand_logo.required' => 'logo不能为空!',
         //        'brand_desc.required' => '描述不能为空!',
         //    ]);
        // dd($request->hasFile('brand_logo'));
        if ($request->hasFile('brand_logo')) {
            $res = $this->uplode($request,'brand_logo');
            // dd($res);
            if ($res['code']) {
                $data['brand_logo'] = $res['font'];
            }
        }
        // dd($uplode);
        // $res = DB::table('brand')->insert($data);
        $res = Brand::insert($data);
        // dd($res);
        if ($res) {
            return redirect('/brand/list');
        }
    }
    public function uplode(Request $request,$file)
    {
        // dump($file);exit;
        if ($request->file($file)->isValid()) {         
           $photo = $request->file($file);         
           // $extension = $photo->extension();         
            $store_result = $photo->store(date('Ymd'));  
            // dd($store_result);
            return ['code'=>1,'font'=>$store_result];     

        }else{
            return ['code'=>0,'font'=>'上传出错'];     

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = DB::table('brand')->where('brand_id', '=', $id)->get();
        $data = Brand::where('brand_id', '=', $id)->get();
        // dd($data);
        return view('brand.edit',['data'=>$data]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        // dd($data);
        if ($request->hasFile('brand_logo')) {
            $res = $this->uplode($request,'brand_logo');
            // dd($res);
            if ($res['code']) {
                $data['brand_logo'] = $res['font'];
            }
        }
       // $res = DB::table('brand')->where('brand_id', $data['brand_id'])->update($data);
       $res =Brand::where('brand_id', $data['brand_id'])->update($data);
       // dd($res);
        if ($res) {
            return redirect('/brand/list');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dump($id);exit;
        // $res = DB::table('brand')->where('brand_id', '=', $id)->delete();
        $res = Brand::where('brand_id', '=', $id)->delete();
        if ($res) {
            return redirect('/brand/list');
        }
    }
    public function details($brand_id)
    {
        // echo 1;
        // dd($brand_id);
        $res = Brand::where('brand_id', '=', $brand_id)->first();
        // dd($res);
        $cont = DB::table('details')->get();
            $cont = $this->objectToArray($cont);
           // dd($cont);
           foreach ($cont as $key => $value) {
            $cont[$key]['created_at'] = date('Ymd',$value['created_at']);
           }
           $cont = $this->arrayToObject($cont);
           // dd($cont);
        return view('brand/details',compact('res','cont'));
    }
    public function detailsdo()
    {
        $data = request()->all();
        // dd($data);
        $data['created_at'] = time();
        // dd($data);
        $res = DB::table('details')->insert($data);
        // dd($res);
        return ['data'=>$data];
        // if ($res) {
        //    $cont = DB::table('details')->get();
        //     $cont = $this->objectToArray($cont);
        //    // dd($cont);
        //    foreach ($cont as $key => $value) {
        //     $cont[$key]['created_at'] = date('Ymd',$value['created_at']);
        //    }
        //    $cont = $this->arrayToObject($cont);
        //    dd($cont);

        // }
        // echo json_encode($cont);
            // return view('brand/details', ['cont' => $cont]);

    }
    function objectToArray($object) {
    //先编码成json字符串，再解码成数组
    return json_decode(json_encode($object), true);
    }
    public function arrayToObject($e)
    {

        if (gettype($e) != 'array') return;
        foreach ($e as $k => $v) {
            if (gettype($v) == 'array' || getType($v) == 'object')
                $e[$k] = (object)$this->arrayToObject($v);
        }
        return (object)$e;
    }

    public function goodslist()
    {
        $pagesize =config('app.pageSize');
        $page = request()->page??1;
        // dd($page);
        $query = request()->all();
        // dd($query);
        $goods_name = $query['goods_name']??'';
        $value = Cache::get('key3');
        // dd($value);
        if (!$value) {
            echo 123;
            $where = [];
            if (isset($query['goods_name'])) {
                $where[] = ['goods_name','like',"%$query[goods_name]%"];
            }
            $data = DB::table('goods')->where($where)->paginate($pagesize);
            Cache::put('key3',$data);

            // dd($data);
            return view('/brand/goodslist',compact('data','query'));
        }
            return view('/brand/goodslist',compact('data','query'));
        
    }
    public function goodscar($id)
    {
        $value = Cache::get('aw');
        // // dd($value);
        if (!$value) {
            echo 123;
            $res = DB::table('goods')->where('goods_id',$id)->first();
            // dd($res);
            // $aa=$this->objectToArray($res);
            // dd($aa)
            Cache::put('aw',$res);
           // dd($res);
            return view('brand.goodscar',compact('res'));

        }
        // echo 1;
        return view('brand.goodscar',compact('res'));
    }
}
