<?php

class Report extends BaseModel{

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

 public function getReport(){
    $report = Report::find()->all();
 } 

}