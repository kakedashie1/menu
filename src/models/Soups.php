<?php

class Soups extends DatabaseModel
{
  public function fetchAllNames()
  {
    return $this->fetchAll('SELECT name FROM soups');

  }

  public function insert($name)
  {
    $this->execute('INSERT INTO soups (name) VALUES (?)', ['s', $name]);

  }
}
