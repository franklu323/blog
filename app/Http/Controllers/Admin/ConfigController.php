<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
    //get.admin/config
    public function index(){
        $data = Config::orderBy('conf_order','asc')->get();
        foreach ($data as $k=>$v){
            switch ($v->field_type){
                case 'input':
                    $data[$k]->_html = '<input type="text" class="lg" name="conf_content[]" value="'.$v->conf_content.'">';
                    break;
                case 'textarea':
                    $data[$k]->_html = '<textarea type="text" class="lg" name="conf_content[]">'.$v->conf_content.'</textarea>';
                    break;
                case 'radio':
                    //1|open 0|close
                    $arr = explode(',',$v->field_value);
                    $str ='';
                    foreach($arr as $m=>$n){
                        //1|open
                        $r = explode('|',$n);
                        $c = $v->conf_content == $r[0]?' checked ':'';
                        $str .= '<input type="radio" name="conf_content[]" value="'.$r[0].'" '.$c.'>'.$r[1].'　';
                    }
                    $data[$k]->_html = $str;
                    break;
            }
        }


        return view('admin.config.index',compact('data'));
    }

    public function changeOrder(){
        $input = Input::all();
        $config = Config::find($input['conf_id']);
        $config->conf_order = $input['conf_order'];
        $re = $config->update();

        if($re){
            $data = [
                'status' => 0,
                'msg' => 'Configuration order update successful!'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => 'Configuration order update failed!'
            ];
        }
        return $data;
    }

    public function show(){

    }

    public function create(){
        return view('admin/config/add');
    }

    public function store(){
        $input = Input::except('_token');
        $rules = [
            'conf_name' => 'required',
            'conf_title' => 'required',
        ];
        $message = [
            'conf_name.required'=>'Configuration name is required. Please Filled up the category name',
            'conf_title.required'=>'Configuration title is required. Please Filled up the category name'
        ];
        $validator = Validator::make($input, $rules,$message);
        if ($validator->passes()) {
            $re = Config::create($input);
            if($re){
                return redirect('admin/config');
            }else{
                return back()->with('errors','Unknown error, please try again later');
            }
        } else {
            return back()->withErrors($validator);
        }
    }

    //GET|HEAD                       | admin/navs/{navs}/edit | navs.edit 编辑链接
    public function edit($conf_id){
        $field = Config::find($conf_id);
        return view('admin.config.edit', compact('field'));
    }


    //PUT|PATCH                      | admin/navs/{navs}      | nav.update 更新链接
    public function update($conf_id){
        $input = Input::except('_token','_method');
        $re = Config::where('conf_id',$conf_id)->update($input);
        if($re){
            $this->putFile();
            return redirect('admin/config');
        }else{
            return back()->with('errors','Update failed, please try later');
        }
    }
    
    //DELETE                         | admin/navs/{navs}      | navs.destroy 删除链接
    public function destroy($conf_id){
        $re = Config::where('conf_id',$conf_id)->delete();
        if($re){
            $this->putFile();
            $data =[
                'status' => 0,
                'msg' => 'Delete Success!'
            ];
        }else{
            $data =[
                'status' => 1,
                'msg' => 'Delete Failed!'
            ];
        }
        return $data;
    }

    public function changeContent(){
        $input = Input::all();
        foreach ($input['conf_id'] as $k=>$v){
            Config::where('conf_id',$v)->update(['conf_content'=>$input['conf_content'][$k]]);
        }
        $this->putFile();
        return back()->with('errors','Update Success!');
    }

    public function putFile(){
        $config = Config::pluck('conf_content','conf_name')->all();
        $path = base_path().'\config\web.php';
        $str = '<?php return '.var_export($config,true).';';
        file_put_contents($path,$str);
    }

}
