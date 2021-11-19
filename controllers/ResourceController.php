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

    public function handleResource(Request $request)
    {

    }

    public function createResource(Request $request)
    {
        $errors = [];
        $resourceModel = new Resource();
        if ($request->isPost()) {
            $resourceModel->loadData($request->getBody());

            if ($resourceModel->validateData() && $resourceModel->create()) {
                return $this->render('resource_manager', [
                    'list' => $resourceModel->search(),
                    'success'=> "Resource added successfully"
                    ]);
            }

            return $this->render('create_resource', [
                'model' => $resourceModel,

            ]);
//            $url = $request->getBody()['url'];
//            $title = $request->getBody()['title'];
//            $type = $request->getBody()['type_id'];
//            $description = $request->getBody()['description'];
//
//            if (!$url){
//                $errors['url'] = 'URL is required';
//            }
//            if (!$title){
//                $errors['title'] = 'Title is required';
//            }
//
//           echo '<pre>';
//           var_dump($errors);
//           echo '</pre>';
//
//
//            return 'Handling new resource data';
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

            return $this->render('resource_manager', [
                'model' => $resourceModel,
                'params' => $params,
                'list'=>$resourceModel->search(),
                'success'=> "Resource updated successfully"
            ]);
        }
    }

    public function deleteResource(Request $request)
    {
        $resourceModel = new Resource();
        if ($request->isPost()) {
            $params = $request->getBody();


            if ($resourceModel->deleteById($params)) {
                return $this->render('resource_manager', [
                    'list' => $resourceModel->search(),
                    'success'=>"Resource deleted successfully."
                ]);
            }
        }
        return $this->render('resource_manager', ['list' => $resourceModel->search()]);
    }
}
