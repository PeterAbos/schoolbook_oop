<?php
namespace App\Routing;
use App\Controllers\HomeController;
use App\Controllers\SubjectController;
use App\Controllers\ClassController;
use App\Models\Subject;
use App\Views\Display;

class Router
{
    public function handle(): void
    {
        $method = strtoupper($_SERVER['REQUEST_METHOD']);
        $requestUri = $_SERVER['REQUEST_URI'];

        if ($method === 'POST' && isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        }

        $this->dispatch($method, $requestUri);
    }

    private function dispatch(string $method, string $requestUri): void
    {
        switch($method) {
            case 'GET':
                $this->handleGetRequests($requestUri);
                break;
            case 'POST':
                $this->handlePostRequests($requestUri);
                break;
            case 'PATCH':
                $this->handlePatchRequests($requestUri);
                break;
            case 'DELETE':
                $this->handleDeleteRequests($requestUri);
                break;
            default:
                $this->methodNotAllowed();
        }
    }

    private function handleGetRequests(mixed $requestUri) 
    {
        switch ($requestUri) {
            case '/':
                HomeController::index();
                return;
            case '/subjects':
                $subjectController = new SubjectController();
                $subjectController->index();
                break;
            case '/classes':
                $classController = new ClassController();
                $classController->index();
                break;
            default:
                $this->notFound();
        }
    }

    private function handlePostRequests(mixed $requestUri)
    {
        $data = $this->filterPostData($_POST);
        $id = $data['id'] ?? null;

        switch ($requestUri) {
            case '/subjects':
                if(!empty($data)) {
                    $subjectController = new SubjectController();
                    $subjectController->save($data);
                }
                break;
            case '/subjects/create':
                $subjectController = new SubjectController();
                $subjectController->create();
                break;
            case '/subjects/edit':
                $subjectController = new SubjectController();
                $subjectController->edit($id);
                break;
            case '/classes':
                if(!empty($data)) {
                    $classController = new ClassController();
                    $classController->save($data);
                }
                break;
            case '/classes/create':
                $classController = new ClassController();
                $classController->create();
                break;
            case '/classes/edit':
                $classController = new ClassController();
                $classController->edit($id);
                break;
            default:
            $this->notFound();
        }
    }

    private function handlePatchRequests(mixed $requestUri)
    {
        $data = $this->filterPostData($_POST);
        switch($requestUri) {
            case '/subjects':
                $id = $data['id'] ?? null;
                $subjectController = new SubjectController();
                $subjectController->update($id, $data);
                break;
            case '/classes':
                $id = $data['id'] ?? null;
                $classController = new ClassController();
                $classController->update($id, $data);
                break;
            default:
                $this->notFound();
        }
    }

    private function handleDeleteRequests(mixed $requestUri)
    {
        $data = $this->filterPostData($_POST);

        switch($requestUri) {
            case '/subjects':
                $subjectController = new SubjectController();
                $subjectController->delete((int) $data['id']);
                break;
            case '/classes':
                $classController = new ClassController();
                $classController->delete((int) $data['id']);
                break;
            default:
                $this->notFound();
        }
    }

    private function filterPostData(array $data): array
    {
        // Remove unnecessary keys in a clean and simple way
        $filterKeys = ['_method', 'submit', 'btn-del', 'btn-save', 'btn-edit', 'btn-plus', 'btn-update'];
        return array_diff_key($data, array_flip($filterKeys));
    }

    private function methodNotAllowed(): void
    {
        header ($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
        Display::message("405 Method Not Allowed");
    }

    private function notFound(): void
    {
        header ($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        Display::message("404 Not Found");
    }
}