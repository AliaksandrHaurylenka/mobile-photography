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
                $this->delete_a_file_when_updating($id, $column);
            }
        }
        $data->update($request->all());
    }

    /**
     * Удаление фото при удалении записи в базе
     * Функция используется в update и perma_del
     * @param $id
     * @param $column
     */
//    private function removeFile($id, $column)
//    {
//        $data = $this->model::onlyTrashed()->findOrFail($id);
//        if ($data->$column != null && file_exists($this->model::PATH . $data->$column)) {
//            unlink(public_path($this->model::PATH . $data->$column));
//        }
//    }
    private function delete_a_file_when_updating($id, $column)
    {
        $data = $this->model::findOrFail($id);
        if ($data->$column != null && file_exists($this->model::PATH . $data->$column)) {
            unlink(public_path($this->model::PATH . $data->$column));
        }
    }

    private function delete_a_file_permanently($id, $column)
    {
        $data = $this->model::onlyTrashed()->findOrFail($id);
        if ($data->$column != null && file_exists($this->model::PATH . $data->$column)) {
            unlink(public_path($this->model::PATH . $data->$column));
        }
    }


    public function perma_del_file($id, array $columns)
    {
        $this->gate('delete');

        $data = $this->model::onlyTrashed()->findOrFail($id);

        foreach ($columns as $column) {
            $this->delete_a_file_permanently($id, $column);
            $data->forceDelete();
        }

    }

}
