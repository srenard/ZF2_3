<?php
namespace clients\controller;

 class Product
 {
     /**
      * @var string
      */
     protected $name;

     /**
      * @var int
      */
     protected $price;

     /**
      * @var Brand
      */
     protected $brand;

     /**
      * @var array
      */
     protected $categories;

     /**
      * @param string $name
      * @return Product
      */
     public function setName($name)
     {
         $this->name = $name;
         return $this;
     }

     /**
      * @return string
      */
     public function getName()
     {
         return $this->name;
     }

     /**
      * @param int $price
      * @return Product
      */
     public function setPrice($price)
     {
         $this->price = $price;
         return $this;
     }

     /**
      * @return int
      */
     public function getPrice()
     {
         return $this->price;
     }

     /**
      * @param Brand $brand
      * @return Product
      */
     public function setBrand(Brand $brand)
     {
         $this->brand = $brand;
         return $this;
     }

     /**
      * @return Brand
      */
     public function getBrand()
     {
         return $this->brand;
     }

     /**
      * @param array $categories
      * @return Product
      */
     public function setCategories(array $categories)
     {
         $this->categories = $categories;
         return $this;
     }

     /**
      * @return array
      */
     public function getCategories()
     {
         return $this->categories;
     }
 }

 class Brand
 {
     /**
      * @var string
      */
     protected $name;

     /**
      * @var string
      */
     protected $url;

     /**
      * @param string $name
      * @return Brand
      */
     public function setName($name)
     {
         $this->name = $name;
         return $this;
     }

     /**
      * @return string
      */
     public function getName()
     {
         return $this->name;
     }

     /**
      * @param string $url
      * @return Brand
      */
     public function setUrl($url)
     {
         $this->url = $url;
         return $this;
     }

     /**
      * @return string
      */
     public function getUrl()
     {
         return $this->url;
     }
 }

 class Category
 {
     /**
      * @var string
      */
     protected $name;

     /**
      * @param string $name
      * @return Category
      */
     public function setName($name)
     {
         $this->name = $name;
         return $this;
     }

     /**
      * @return string
      */
     public function getName()
     {
         return $this->name;
     }
 }