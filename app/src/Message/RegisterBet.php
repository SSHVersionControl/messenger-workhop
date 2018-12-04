<?php

declare(strict_types=1);

namespace App\Message;

class RegisterBet
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $gameName;

    /**
     * @var string
     */
    private $leftScore;

    /**
     * @var string
     */
    private $rightScore;

    public function __construct(
        string $username,
        string $gameName,
        string $leftScore,
        string $rightScore
    ) {
        $this->username = $username;
        $this->gameName = $gameName;
        $this->leftScore = $leftScore;
        $this->rightScore = $rightScore;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getGameName(): string
    {
        return $this->gameName;
    }

    /**
     * @param string $gameName
     */
    public function setGameName(string $gameName): void
    {
        $this->gameName = $gameName;
    }

    /**
     * @return string
     */
    public function getLeftScore(): string
    {
        return $this->leftScore;
    }

    /**
     * @param string $leftScore
     */
    public function setLeftScore(string $leftScore): void
    {
        $this->leftScore = $leftScore;
    }

    /**
     * @return string
     */
    public function getRightScore(): string
    {
        return $this->rightScore;
    }

    /**
     * @param string $rightScore
     */
    public function setRightScore(string $rightScore): void
    {
        $this->rightScore = $rightScore;
    }
}
