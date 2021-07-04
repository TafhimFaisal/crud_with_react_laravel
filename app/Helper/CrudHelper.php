<?php
namespace App\Helper;
use Illuminate\Http\Request;
use Session;
use Hash;
use Illuminate\Support\Facades\Storage;

// use NabilAnam\SimpleUpload\SimpleUpload;

class CrudHelper {

    protected $model;
    protected $upload;
    protected $files;
    protected $type;
    protected $status_code = [
        'success'=>200,
        'delete'=>200,
        'update'=>200,
        'error'=>500
    ];

    public function __construct($model,array $files = [],$type = null)
    {
        // $this->upload = new SimpleUpload;
        $this->model    = $model;
        $this->files    = $files;
        $this->type     = $type;
    }

    public function store($request,$validat)
    {
        if($validat->validator->fails()){
            return response()->json([
                'message' => 'somthing went wrong',
                'data' => $validat->validator->errors(),
                'validation' => false,
                'type' => 'store'
            ],$this->status_code['error']);
        }

        $data = $request->all();

        // storing files
        if(!empty($this->files)){
            foreach ($this->files as $key => $file) {
                if($request->$file != '#'){
                    $address = $this->storeImage($request,$file);
                    $data[$file] = $address;
                }
            }
        }

        $data = $this->model->create($data);

        return response()->json([
            'message' => $this->type.' Stored Successfully',
            'data' => $data,
            'validation' => true,
            'type' => 'store'
        ],$this->status_code['success']);

    }

    public function destroy($model,string $route = null)
    {
        if(!empty($this->files)){
            foreach ($this->files as $key => $file) {
                if($model->$file != null || $model->$file != "#"){
                    $this->deleteImage($model->$file);
                }
            }
        }

        $model->delete();
        return response()->json([
            'message' => $this->type.' Deleted Successfully'
        ],$this->status_code['delete']);

    }

    public function update($request,$model,$validat)
    {

        if($validat->validator->fails()){
            return response()->json([
                'message' => 'somthing went wrong',
                'data' => $validat->validator->errors(),
                'validation' => false,
                'type' => 'update'
            ],$this->status_code['error']);
        }

        $data = $request->all();
        if(!empty($this->files)){
            foreach ($this->files as $key => $file) {
                if( strpos($request->$file,';base64,') > 0){
                    if($model->$file != null || $model->$file != "#"){
                        $this->deleteImage($model->$file);
                    }
                    $address = $this->storeImage($request,$file);
                    $data[$file] = $address;
                }
            }
        }

        $model->update($data);
        return response()->json([
            'message' => $this->type.' is successfully updated.',
            'data' => $model,
            'validation' => true,
            'type' => 'update'
        ],$this->status_code['update']);

    }

    public function storeImage($request,$file)
    {
        $folderName = 'Images/'.$this->type.'/'.\Str::plural($file);
        $folderPath = $_SERVER['DOCUMENT_ROOT'].'/'.$folderName;

        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        $file_name = $file.'_of_'.str_replace(' ','_',$request->name).'_'.str_replace(['.com','@'],'',$request->email);
        $img = $request->$file;

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath.'/'.$file_name .'.'.$image_type;

        file_put_contents($file, $image_base64);
        return asset($folderName.'/'.$file_name .'.'.$image_type);

    }

    public function deleteImage($file)
    {
        $file = str_replace( asset('/') ,$_SERVER['DOCUMENT_ROOT'], $file);
        if (file_exists($file)) {
            unlink($file);
        }
    }
}
