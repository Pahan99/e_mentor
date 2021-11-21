<?php


namespace app\controllers;


use app\core\Controller;
use app\core\Request;
use app\models\Resource;

class ResourceController extends Controller
{
    public function resources()
    {
        return $this->render('resource_manager');
    }

    public function createResource(Request $request)
    {
        $errors = [];
        $resourceModel = new Resource();
        if ($request->isPost()) {
            $resourceModel->loadData($request->getBody());

            if ($resourceModel->validateData() && $resourceModel->create()) {

                header('location:/resources');
            }

            header('location:/resources');

        }
        return $this->render('create_resource', [
            'model' => $resourceModel
        ]);

    }

    public function getAllResources(Request $request)
    {
        $resourceModel = new Resource();

        $resourceList = $resourceModel->search();

        return $this->render('resource_manager', [
            'list' => $resourceList
        ]);
    }

    public function editResource(Request $request)
    {
        $resourceModel = new Resource();
        if ($request->isGet()) {
            $params = $request->getQueryParams();

            $resourceData = $resourceModel->searchById($params);

            $resourceModel->loadData($resourceData);

            return $this->render('edit_resources', ['model' => $resourceModel]);
        }
        if ($request->isPost()) {
            $params = $request->getQueryParams();

            $resourceModel->loadData($request->getBody());
            $resourceModel->updateById($params);
            header('location:/resources');

        }
    }

    public function deleteResource(Request $request)
    {
        $resourceModel = new Resource();
        if ($request->isPost()) {
            $params = $request->getBody();


            if ($resourceModel->deleteById($params)) {
                header('location:/resources');
            }
        }
        header('location:/resources');
    }
}
