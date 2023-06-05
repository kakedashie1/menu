<?php

class ShuffleNotFoundException extends Exception
{
  public function __construct($message = "No dishes found in the database. Please add some before shuffling.", $code = 0, Throwable $previous = null) {
    parent::__construct($message, $code, $previous);
  }
}
