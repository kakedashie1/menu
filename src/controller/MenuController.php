<?php


class MenuController extends Controller
{

  public function index()
  {
   $main_dish = $this->databaseManager->get('MainDishes');
   $main_dishes = $main_dish->fetchAllNames();

   $sub_dish = $this->databaseManager->get('SubDishes');
   $sub_dishes = $sub_dish->fetchAllNames();

   $soup = $this->databaseManager->get('Soups');
   $soups = $soup->fetchAllNames();

    return $this->render([
      'main_dishes' => $main_dishes,
      'sub_dishes' => $sub_dishes,
      'soups' => $soups,
      'title' => '献立の登録',
    ]);


  }

  public function create()
  {
    if (!$this->request->isPost()) {
      throw new HttpNotFoundException();
    }

    $main_dish = $this->databaseManager->get('MainDishes');


    $sub_dish = $this->databaseManager->get('SubDishes');


    $soup = $this->databaseManager->get('Soups');



    $redirect = false;


  if (!empty($_POST['main_name'])) {

    $main_dish->insert($_POST['main_name']);


  }

  if (!empty($_POST['sub_name'])) {

    $sub_dish->insert($_POST['sub_name']);




  }

  if (!empty($_POST['soup_name'])) {

    $soup->insert($_POST['soup_name']);


  }

  $main_dishes = $main_dish->fetchAllNames();
  $sub_dishes = $sub_dish->fetchAllNames();
  $soups = $soup->fetchAllNames();




  header('Location: /menu');
  exit;


return $this->render([
  'main_dishes' => $main_dishes,
  'sub_dishes' => $sub_dishes,
  'soups' => $soups,
  'title' => '献立の登録',
], 'index');

  }


}
