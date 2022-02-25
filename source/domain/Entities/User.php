<?php

namespace Source\domain\Entities;

use DateTimeInterface;
use Source\domain\ValueObjects\Name;
use Source\domain\ValueObjects\Email;
use Source\domain\ValueObjects\Identity;
use Source\domain\ValueObjects\Password;

class User extends Entity
{   
    public function __construct(
        Identity $id,
        Name $name,
        Email $email,
        Password $password,
        DateTimeInterface $createdAt,
        DateTimeInterface $updatedAt
    ) {
        $this->attributes = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'createdAt' => $createdAt,
            'updatedAt' => $updatedAt
        ];
    }

    public function getId(): Identity
    {
        return $this->attributes['id'];
    }
    
    public function getName(): Name
    {
        return $this->attributes['name'];
    }
    
    public function getEmail(): Email
    {
        return $this->attributes['email'];
    }
    
    public function getPassword(): Password
    {
        return $this->attributes['password'];
    }
    
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->attributes['createdAt'];
    }
    
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->attributes['updatedAt'];
    }

    public function setId(Identity $id): User
    {
        $this->attributes['id'] = $id;
        
        return $this;
    }

    public function setName(Name $name): User
    {
        $this->attributes['name'] = $name;
        
        return $this;
    }

    public function setEmail(Email $email): User
    {
        $this->attributes['email'] = $email;
        
        return $this;
    }

    public function setPassword(Password $password): User
    {
        $this->attributes['password'] = $password;
        
        return $this;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): User
    {
        $this->attributes['createdAt'] = $createdAt;
        
        return $this;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt): User
    {
        $this->attributes['updatedAt'] = $updatedAt;
        
        return $this;
    }

    public function __toString(): string
    {
        $string = '';

        foreach ($this->attributes as $attribute => $value) {

            $string .= "{$attribute}:";

            if ($value instanceof DateTimeInterface) {
                
                $string .= $value->format('d-m-Y H:i:s');
                
                continue;
            }

            $string .= $value;
        }

        return $string;
    }
}