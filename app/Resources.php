<?php


namespace App;


use Assert\Assertion;

/**
 * Class Resources
 *
 * @package App
 */
class Resources
{
    /**
     * @var
     */
    private $food;
    /**
     * @var
     */
    private $wood;
    /**
     * @var
     */
    private $iron;
    /**
     * @var
     */
    private $mithril;

    /**
     * Resources constructor.
     *
     * @param $food
     * @param $wood
     * @param $iron
     * @param $mithril
     */
    public function __construct($food = 0, $wood = 0, $iron = 0, $mithril = 0)
    {
        Assertion::allGreaterOrEqualThan([$food, $wood, $iron, $mithril], 0);

        $this->food = $food;
        $this->wood = $wood;
        $this->iron = $iron;
        $this->mithril = $mithril;
    }

    public static function createFromModel($model)
    {
        return new self($model->food, $model->wood, $model->iron, $model->mithril);
    }

    public function add(Resources $resources)
    {
        $this->food += $resources->getFood();
        $this->wood += $resources->getWood();
        $this->iron += $resources->getIron();
        $this->mithril += $resources->getMithril();

        return $this;
    }

    public function sub(Resources $resources)
    {
        Assertion::allGreaterOrEqualThan(
            [
                $this->food - $resources->food,
                $this->wood - $resources->wood,
                $this->iron - $resources->iron,
                $this->mithril - $resources->mithril,
            ],
            0,
        );

        $this->food -= $resources->getFood();
        $this->wood -= $resources->getWood();
        $this->iron -= $resources->getIron();
        $this->mithril -= $resources->getMithril();
    }

    public function toArray()
    {
        return (array)$this;
    }

    /**
     * @return mixed
     */
    public function getFood()
    {
        return $this->food;
    }

    /**
     * @return mixed
     */
    public function getWood()
    {
        return $this->wood;
    }

    /**
     * @return mixed
     */
    public function getIron()
    {
        return $this->iron;
    }

    /**
     * @return mixed
     */
    public function getMithril()
    {
        return $this->mithril;
    }
}
