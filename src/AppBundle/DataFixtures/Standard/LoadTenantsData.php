<?php
namespace AppBundle\DataFixtures\Standard;

use AppBundle\Entity\Tenant;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTenantsData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $data = [
            ['id' => 'nore', 'server' => 'localhost', 'database' => 'multidb_nore', 'username' => 'root', 'password' => 'root'],
            ['id' => 'sora', 'server' => 'localhost', 'database' => 'multidb_sora', 'username' => 'root', 'password' => 'root'],
            ['id' => 'roka', 'server' => 'localhost', 'database' => 'multidb_roka', 'username' => 'root', 'password' => 'root']
        ];

        foreach($data as $tenant) {
            $object = Tenant::fromArray($tenant);
            $manager->persist($object);
        }

        $manager->flush();
    }
}
