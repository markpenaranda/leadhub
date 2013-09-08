<?php

class Project extends BaseModel {

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

  public static function getAllProjects(){
    return Project::find()->sort(array('created_at' => -1))->all();
  }

  // public function update($id){
  //     try {
  //     $self = self::toArray();
  //     self::update(array('_id' => $id), $self, array( '$upsert' => true ));
  //     $success = $self;
  //   } catch (Exeption $e) {
  //     $success = false;
  //   }
  // } 


  

}