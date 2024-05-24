<?php

namespace Src\Entity;

class Moto {
    private int $id;
    private string $brand;
    private string $model;
    private string $type;
    private float $price;
    private string $image;

    public function __construct(int $id, string $brand, string $model, string $type, float $price, string $image) {
        $this->id = $id;
        $this->brand = $brand;
        $this->model = $model;
        $this->type = $type;
        $this->price = $price;
        $this->image = $image;
    }

    static public function fromArray($array): self{
        return new self($array["id"],$array["brand"], $array["model"], $array["type"], $array["price"], $array["image"]);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;

    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;

    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;

    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;

    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;

    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;

    }
}