<?php

class User extends BaseModel {

  public function save()
  {
    //try to insert the data to db
    try {
      $self = self::toArray();
      self::insert($self);
      $success = $self;
    } catch (Exeption $e) {
      $success = false;
    }

    return $success;
  }

  

}