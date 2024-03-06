<?php

declare(strict_types=1);

namespace KK\CustomApi\Model\Response;

use KK\CustomApi\Api\Data\MyApiResponseInterface;

class MyApiDataResponse implements MyApiResponseInterface
{

    protected $id;

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }


    protected $name;

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }


    protected $gender;

    public function setGender(string $gender)
    {
        $this->gender = $gender;
        return $this;
    }

    public function getGender(): string
    {
        return $this->gender;
    }


    protected $email;

    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }



    protected $status;

    public function setStatus(string $status)
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    protected $feedback;

    public function setFeedback(string $feedback)
    {
        $this->feedback = $feedback;
        return $this;
    }

    public function getFeedback(): string
    {
        return $this->feedback;
    }


    protected $message;

    public function setMessage(mixed $message)
    {
        $this->message = $message;
        return $this;
    }

    public function getMessage(): mixed
    {
        return $this->message;
    }




    protected $success;

    public function setSuccess($success)
    {
        $this->success = $success;
        return $this;
    }

    public function getSuccess()
    {
        return $this->success;
    }

}
