<?php

namespace App\Http\Controllers\Admin\Obj;


use App\Http\Controllers\Traits\FileUploadTraitUser;


class CRUDFile extends CRUD
{
    use FileUploadTraitUser;

    private $nameTable;
    private $model;
    private $delete;
    private $create;
    private $edit;
    private $view;


    public function __construct($name, $model, $delete, $create, $edit, $view)
    {
        parent::__construct($name, $model, $delete, $create, $edit, $view);
        $this->nameTable = $name;
        $this->model = $model;
        $this->delete = $delete;
        $this->create = $create;
        $this->edit = $edit;
        $this->view = $view;
    }


    public function store($request)
    {
        $this->gate($this->create);
        $request = $this->saveFiles($request);
        $this->model::create($request->all());
    }


    public function update_file($request, $id, array $columns)
    {
        $this->gate($this->edit);
        $this->check_file($request, $id, $columns);
    }


    private function check_file($request, $id, array $columns)
    {
        $data = $this->model::findOrFail($id);

        foreach ($columns as $column) {
            if ($_FILES[$column]['name']) {
                $request = $this->saveFiles($request);
                $this->removeFile($id, $column, $data);
            }
        }
        $data->update($request->all());
    }

    /**
     * Удаление фото при удалении записи в базе
     * Функция используется в update и perma_del
     * @param $id
     * @param $column
     * @param $method
     */
    private function removeFile($id, $column, $method)
    {
        $data = $method;
        if ($data->$column != null && file_exists($this->model::PATH . $data->$column)) {
            unlink(public_path($this->model::PATH . $data->$column));
        }
    }


    public function perma_del_file($id, array $columns)
    {
        $this->gate($this->delete);

        $data = $this->model::onlyTrashed()->findOrFail($id);

        foreach ($columns as $column) {
            $this->removeFile($id, $column, $data);
            $data->forceDelete();
        }

    }

}
