<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BetRepository")
 */
final class Bet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gameName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $leftScore;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rightScore;

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getGameName()
    {
        return $this->gameName;
    }

    /**
     * @param mixed $gameName
     */
    public function setGameName($gameName): void
    {
        $this->gameName = $gameName;
    }

    /**
     * @return mixed
     */
    public function getLeftScore()
    {
        return $this->leftScore;
    }

    /**
     * @param mixed $leftScore
     */
    public function setLeftScore($leftScore): void
    {
        $this->leftScore = $leftScore;
    }

    /**
     * @return mixed
     */
    public function getRightScore()
    {
        return $this->rightScore;
    }

    /**
     * @param mixed $rightScore
     */
    public function setRightScore($rightScore): void
    {
        $this->rightScore = $rightScore;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
