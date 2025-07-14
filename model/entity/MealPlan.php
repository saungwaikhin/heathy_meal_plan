<?php
class MealPlan{
    private $meal_id;
    private $meal_type;
    private $Meal_time;
    private $food_id;
    private $meal_desc;
    private $meal_image;
    /**
     * @return mixed
     */
    public function getMeal_id()
    {
        return $this->meal_id;
    }

    /**
     * @return mixed
     */
    public function getMeal_type()
    {
        return $this->meal_type;
    }

    /**
     * @return mixed
     */
    public function getMeal_time()
    {
        return $this->Meal_time;
    }

    /**
     * @return mixed
     */
    public function getFood_id()
    {
        return $this->food_id;
    }

    /**
     * @return mixed
     */
    public function getMeal_desc()
    {
        return $this->meal_desc;
    }

    /**
     * @return mixed
     */
    public function getMeal_image()
    {
        return $this->meal_image;
    }

    /**
     * @param mixed $meal_id
     */
    public function setMeal_id($meal_id)
    {
        $this->meal_id = $meal_id;
    }

    /**
     * @param mixed $meal_type
     */
    public function setMeal_type($meal_type)
    {
        $this->meal_type = $meal_type;
    }

    /**
     * @param mixed $Meal_time
     */
    public function setMeal_time($Meal_time)
    {
        $this->Meal_time = $Meal_time;
    }

    /**
     * @param mixed $food_id
     */
    public function setFood_id($food_id)
    {
        $this->food_id = $food_id;
    }

    /**
     * @param mixed $meal_desc
     */
    public function setMeal_desc($meal_desc)
    {
        $this->meal_desc = $meal_desc;
    }

    /**
     * @param mixed $meal_image
     */
    public function setMeal_image($meal_image)
    {
        $this->meal_image = $meal_image;
    }  
}