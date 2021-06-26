<?php
#models/product.php

class Product{
    private $id;
    private $name;
    private $price;
    private $promotion_price;
    private $inventory;
    private $description;
    private $images;
    private $isDeleted;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPromotionPrice()
    {
        return $this->promotion_price;
    }

    /**
     * @param mixed $promotion_price
     */
    public function setPromotionPrice($promotion_price): void
    {
        $this->promotion_price = $promotion_price;
    }

    /**
     * @return mixed
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * @param mixed $inventory
     */
    public function setInventory($inventory): void
    {
        $this->inventory = $inventory;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param mixed $images
     */
    public function setImages($images): void
    {
        $this->images = $images;
    }

    /**
     * @return mixed
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * @param mixed $isDeleted
     */
    public function setIsDeleted($isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }

    public function findAll($page = 1)
    {
        $limit = 3;
        $skip = ($page - 1) * $limit;
        $sort = array('created' => -1);
        $options = ['limit' => $limit, 'skip' => $skip, 'sort' => $sort];
        $collection = Mongo::getInstance()->db->selectCollection("PRODUCTS");
        $cursor = $collection->find(['isDeleted' => false], $options);
        return $cursor;
    }
    public function countPage()
    {
        $quesCount = count($this->db->selectCollection("PRODUCTS")->find(["isDeleted" => false])->toArray());
        return ceil($quesCount / 3);
    }

}