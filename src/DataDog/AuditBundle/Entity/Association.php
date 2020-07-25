<?php

namespace DataDog\AuditBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Melange\CmsBundle\Annotations\Model;
use Melange\CmsBundle\Annotations\Group;

/**
 * @ORM\Entity
 * @ORM\Table(name="audit_associations")
 */
class Association
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(length=128)
     * @Group(
     *     transform="association",
     *     models={
     *      "source": @Model(label="Type", group="Source", order={"audit":4000}, readonly=true),
     *      "target": @Model(label="Type", group="Target", order={"audit":5000}, readonly=true),
     *      "blame":  @Model(label="Type",  group="Blame",  order={"audit":5000}, readonly=true)
     *     }
     * )
     */
    private $typ;

    /**
     * @ORM\Column(length=128)
     * @Group(
     *     models={
     *      "source": @Model(label="Table", group="Source"),
     *      "target": @Model(label="Table", group="Target"),
     *      "blame":  @Model(label="Table", group="Blame")
     *     }
     * )
     */
    private $tbl;

    /**
     * @ORM\Column(nullable=true)
     * @Group(
     *     models={
     *      "source": @Model(label="Label", group="Source"),
     *      "target": @Model(label="Label", group="Target"),
     *      "blame":  @Model(label="Label", group="Blame")
     *     }
     * )
     */
    private $label;

    /**
     * @ORM\Column
     * @Group(
     *     models={
     *      "source": @Model(label="FK", group="Source"),
     *      "target": @Model(label="FK", group="Target"),
     *      "blame":  @Model(label="FK", group="Blame")
     *     }
     * )
     */
    private $fk;

    /**
     * @ORM\Column
     * @Group(
     *     models={
     *      "source": @Model(label="Class", group="Source"),
     *      "target": @Model(label="Class", group="Target"),
     *      "blame":  @Model(label="Class", group="Blame")
     *     }
     * )
     */
    private $class;

    public function getId()
    {
        return $this->id;
    }

    public function getTyp()
    {
        return $this->typ;
    }

    public function getTypLabel()
    {
        $words = explode('.', $this->getTyp());
        return implode(' ', array_map('ucfirst', explode('_', end($words))));
    }

    public function getTbl()
    {
        return $this->tbl;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getFk()
    {
        return $this->fk;
    }

    public function getClass()
    {
        return $this->class;
    }
}
