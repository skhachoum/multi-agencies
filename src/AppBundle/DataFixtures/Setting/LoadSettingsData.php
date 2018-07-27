<?php
namespace AppBundle\DataFixtures\Setting;

use AppBundle\Entity\Tenant;
use AgenceBundle\Entity\Setting;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadSettingsData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = [
            ["slogan" => "slogan1", 'img' => 'ABC', 'name' => 'name1', 'description' => 'description1', 'theme' => 'theme1', 'isCurrent' => true],
            ["slogan" => "slogan2", 'img' => 'ABC', 'name' => 'name2', 'description' => 'description2', 'theme' => 'theme2', 'isCurrent' => true],
            ["slogan" => "slogan3", 'img' => 'ABC', 'name' => 'name3', 'description' => 'description3', 'theme' => 'theme3', 'isCurrent' => true],
            
        ];

        foreach($data as $tenant) {
            $object = Setting::fromArray($tenant);
            $manager->persist($object);
        }

        $manager->flush();
    }
}
