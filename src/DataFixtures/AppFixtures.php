<?php

namespace App\DataFixtures;

use App\Entity\Code;
use App\Entity\Language;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $langCPP = new Language();
        $langCPP->setShortname("cpp");
        $langCPP->setFullname("C++");
        $manager->persist($langCPP);

        $langPHP = new Language();
        $langPHP->setShortname("php");
        $langPHP->setFullname("PHP");
        $manager->persist($langPHP);

        $langSH = new Language();
        $langSH->setShortname("sh");
        $langSH->setFullname("SH");
        $manager->persist($langSH);

        //===========================================================

        $code1 = new Code();
        $code1->setTitle("Hello World");
        $code1->setDescription("The famous Helloworld in C++.");
        $code1->setContent('#include <iostream>
        int main() {
            std::cout << "Hello World!";
            return 0;
        }');
        $code1->setCreationDate(new DateTime());
        $code1->setLanguage($langCPP);
        $manager->persist($code1);

        $code2 = new Code();
        $code2->setTitle("Foreach Loop");
        $code2->setDescription("A simple foreach example.");
        $code2->setContent('<?php
        foreach ($array as $key => $value) 
            echo "$key : $value.\\n";
        }');
        $code2->setCreationDate(new DateTime());
        $code2->setLanguage($langPHP);
        $manager->persist($code2);

        $code3 = new Code();
        $code3->setTitle("Check os version");
        $code3->setDescription("The easy way to check you os version.");
        $code3->setContent('$ cat /etc/os-release');
        $code3->setCreationDate(new DateTime());
        $code3->setLanguage($langSH);
        $manager->persist($code3);

        $manager->flush();
    }
}
