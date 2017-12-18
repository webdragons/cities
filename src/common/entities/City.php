<?php

namespace bulldozer\cities\common\entities;

/**
 * Class City
 * @package bulldozer\cities\common\entities
 */
class City
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var bool
     */
    private $active;

    /**
     * @var bool
     */
    private $default;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Email[]
     */
    private $emails = [];

    /**
     * @var Phone[]
     */
    private $phones = [];

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $workingTime;

    /**
     * @var float
     */
    private $lat;

    /**
     * @var float
     */
    private $lng;

    /**
     * City constructor.
     * @param int $id
     * @param bool $active
     * @param bool $default
     * @param string $name
     * @param array $emails
     * @param array $phones
     * @param string $address
     * @param string $workingTime
     * @param float $lat
     * @param float $lng
     * @throws CityException
     */
    public function __construct(
        int $id,
        bool $active,
        bool $default,
        string $name,
        array $emails,
        array $phones,
        string $address,
        string $workingTime,
        float $lat,
        float $lng
    ) {
        $this->id = $id;
        $this->active = $active;
        $this->default = $default;
        $this->name = $name;
        $this->address = $address;
        $this->workingTime = $workingTime;
        $this->lat = $lat;
        $this->lng = $lng;

        foreach ($emails as $email) {
            if ($email instanceof Email) {
                $this->emails[] = $email;
            } elseif (is_string($email)) {
                $this->emails[] = new Email($email);
            } else {
                throw new CityException('Unsupported email type');
            }
        }

        foreach ($phones as $phone) {
            if ($phone instanceof Phone) {
                $this->phones[] = $phone;
            } elseif (is_string($phone)) {
                $this->phones[] = new Phone($phone);
            } else {
                throw new CityException('Unsupported phone type');
            }
        }

        $this->phones = $phones;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * @param bool $default
     */
    public function setDefault(bool $default)
    {
        $this->default = $default;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getEmails(): array
    {
        return $this->emails;
    }

    /**
     * @param Email $email
     */
    public function addEmail(Email $email)
    {
        $this->emails[] = $email;
    }

    /**
     * @return array
     */
    public function getPhones(): array
    {
        return $this->phones;
    }

    /**
     * @param Phone $phone
     */
    public function addPhone(Phone $phone)
    {
        $this->phones[] = $phone;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getWorkingTime(): string
    {
        return $this->workingTime;
    }

    /**
     * @param string $workingTime
     */
    public function setWorkingTime(string $workingTime)
    {
        $this->workingTime = $workingTime;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     */
    public function setLat(float $lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return float
     */
    public function getLng(): float
    {
        return $this->lng;
    }

    /**
     * @param float $lng
     */
    public function setLng(float $lng)
    {
        $this->lng = $lng;
    }
}