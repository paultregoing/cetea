<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\PeopleModel;

class Home extends BaseController
{
    use ResponseTrait;

    public function index(): string
    {
        $peopleModel = new PeopleModel();
        $data['people'] = $peopleModel->where('alreadyMadeTea', false)->findAll();
        $data['heroes'] = $peopleModel->where('alreadyMadeTea', true)->findAll();

//        log_message('debug', print_r($data['people'], true));

        return view('templates/header')
            . view('main', $data)
            . view('templates/footer');
    }

    public function addTeaMinion()
    {
//        log_message('debug', 'adding a minion');
//        log_message('debug', print_r($this->request->getPost(), true));

        $peopleModel = new PeopleModel();

        return $peopleModel->replace([
            'name' => $this->request->getPost()['name'],
            'alreadyMadeTea' => false,
        ]);
    }

    public function getTeaMinion(): object
    {
        $peopleModel = new PeopleModel();
        $people = $peopleModel->where('alreadyMadeTea', false)->findAll();

        $finger = rand(0, count($people) - 1);
        $victim = $people[$finger];

        $victim['alreadyMadeTea'] = true;
        $peopleModel->update($victim['name'], $victim);

        log_message('debug', print_r($victim, true));

        return $this->respond($victim);
    }

    public function resetTeaMinions(): bool
    {
//        log_message('debug', 'RESET THE MINONS');

        $db = \Config\Database::connect();
        $builder = $db->table('people');

        $builder->set('alreadyMadeTea', false);
        $builder->update();

        return true;
    }
}
