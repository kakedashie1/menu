<?php

class SubDishes extends DatabaseModel
{
  public function fetchAllNames()
  {
    return $this->fetchAll('SELECT name FROM sub_dishes');

  }

  public function insert($name)
  {
    $this->execute('INSERT INTO sub_dishes (name) VALUES (?)', ['s', $name]);

  }
}
