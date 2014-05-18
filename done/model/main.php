<?php

include("./view/mainView.php");
include("./view/course_list_view.php");
include("./view/course_order_view.php");
include("./model/entry_model.php");

class main
{
    public function __construct()
    {
        
    }
    
    public function displayMain($view, $search_value, $start, $end)
    {
        $this->model = new entry_model();
        $courses = $this->model->searchResultQuery($search_value, $start, $end);
        
        $numCourses  = count($courses);
        $courses     = array_slice($courses, $start, $end, true);
        $this->$view = new course_list_view($courses, $search_value, $numCourses);
        
        
    }
    
    public function display($view, $search_var, $start, $end)
    {
        
        
        $this->$view = new $view();
        
    }
    
    public function displayByOrder($orderby, $query, $start, $end)
    {
        $this->model     = new entry_model();
        $courses_ordered = $this->model->course_order($orderby, $query, $start, $end);
        $numCourses      = count($courses_ordered);
        $courses_ordered = array_slice($courses_ordered, $start, $end, true);
        $this->$view     = new course_order_view($courses_ordered, $orderby, $query, $numCourses);
        
    }
    
    public function insertUser($username, $password, $fname, $lname, $email)
    {
        $this->model = new entry_model();
        $this->model->insert_user($username, $password, $fname, $lname, $email);
        
    }
    
    public function insertRate($id, $rate)
    {
        $this->model = new entry_model();
        $this->model->setRating($id, $rate);
    }
    
    
}

?>
