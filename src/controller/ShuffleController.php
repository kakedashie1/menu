<?php


class ShuffleController extends Controller
{


  public function index()
  {

      return $this->render([
        'main_dish' => "",
        'sub_dish' => "",
        'soup' => "",
      ]);


  }

  public function create()
  {
      if (!$this->request->isPost()) {
        throw new HttpNotFoundException();
      }



      $main_dishes = $this->databaseManager->get('MainDishes')->fetchAllNames();
      $sub_dishes = $this->databaseManager->get('SubDishes')->fetchAllNames();
      $soups = $this->databaseManager->get('Soups')->fetchAllNames();

      if (empty($main_dishes) || empty($sub_dishes) || empty($soups)) {
        throw new ShuffleNotFoundException();
      }


        $main_dishes = $this->databaseManager->get('MainDishes')->fetchAllNames();

        shuffle($main_dishes);
        $main_dish = $main_dishes[0]['name'];

        $sub_dishes = $this->databaseManager->get('SubDishes')->fetchAllNames();

        shuffle($sub_dishes);
        $sub_dish = $sub_dishes[0]['name'];

        $soups = $this->databaseManager->get('Soups')->fetchAllNames();

        shuffle($soups);
        $soup = $soups[0]['name'];

        unset($_SESSION['error']);

        return $this->render([
          'main_dish' => $main_dish,
          'sub_dish' => $sub_dish,
          'soup' => $soup,
        ], 'index');


  }
}
