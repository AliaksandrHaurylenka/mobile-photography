<?php

namespace App\Http\Controllers\Admin\Obj;


use App\Http\Controllers\Traits\FileUploadTraitUser;


class CRUDFile extends CRUD
{
    use FileUploadTraitUser;

    private $nameTable;
    private $model;


    public function __construct($name, $model)
    {
        parent::__construct($name, $model);
        $this->nameTable = $name;
        $this->model = $model;
    }


    public function store($request)
    {
        $this->gate('create');
        $request = $this->saveFiles($request);
        $this->model::create($request->all());
    }


    public function update_file($request, $id, array $columns)
    {
        $this->gate('edit');
        $this->check_file($request, $id, $columns);
    }


    private function check_file($request, $id, array $columns)
    {
        $data = $this->model::findOrFail($id);

        foreach ($columns as $column) {
            if ($_FILES[$column]['name']) {
                $request = $this->saveFiles($request);
                $data->removeFile($column);//функция в модели
            }
        }
        $data->update($request->all());
    }


    public function perma_del_file($id, array $columns)
    {
        $this->gate('delete');

        $data = $this->model::onlyTrashed()->findOrFail($id);

        foreach ($columns as $column) {
            $data->forceDelete();
            $data->removeFile($column);//функция в модели
        }

    }

}
