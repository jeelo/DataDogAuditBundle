<?php

namespace DataDog\AuditBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Melange\CmsBundle\Annotations\Model;
use Melange\CmsBundle\Annotations\Group;

/**
 * @ORM\Entity
 * @ORM\Table(name="audit_logs")
 */
class AuditLog
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Model(
     *     label="Id",
     *     order={"audit": 1000},
     *     readonly=true
     * )
     */
    private $id;

    /**
     * @ORM\Column(length=12)
     * @Model(
     *     label="Action",
     *     order={"audit": 2000},
     *     readonly=true
     * )
     */
    private $action;

    /**
     * @ORM\Column(length=128)
     * @Model(
     *     label="Table",
     *     order={"audit": 3000},
     *     readonly=true
     * )
     */
    private $tbl;

    /**
     * @ORM\OneToOne(targetEntity="Association")
     * @ORM\JoinColumn(nullable=false)
     * @Group(name="source")
     */
    private $source;

    /**
     * @ORM\OneToOne(targetEntity="Association")
     * @Group(name="target")
     */
    private $target;

    /**
     * @ORM\OneToOne(targetEntity="Association")
     * @Group(name="blame")
     */
    private $blame;

    /**
     * @ORM\Column(type="json", nullable=true)
     * @Model(
     *     label="Diff",
     *     order={"audit": 6000},
     *     readonly=true
     * )
     */
    private $diff;

    /**
     * @ORM\Column(type="datetime", name="logged_at")
     * @Model(
     *     label="Logged At",
     *     order={"audit": 7000},
     *     readonly=true
     * )
     */
    private $loggedAt;

    public function getId()
    {
        return $this->id;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getTbl()
    {
        return $this->tbl;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function getBlame()
    {
        return $this->blame;
    }

    public function getDiff()
    {
        return $this->diff;
    }

    public function getLoggedAt()
    {
        return $this->loggedAt;
    }
}
