<?php

class MainDishes extends DatabaseModel
{
  public function fetchAllNames()
  {
    return $this->fetchAll('SELECT name FROM main_dishes');

  }

  public function insert($name)
  {
    $this->execute('INSERT INTO main_dishes (name) VALUES (?)', ['s', $name]);

  }
}
