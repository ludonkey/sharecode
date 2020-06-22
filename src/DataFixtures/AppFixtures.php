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

        $langPY = new Language();
        $langPY->setShortname("py");
        $langPY->setFullname("Python");
        $manager->persist($langPY);

        $langJS = new Language();
        $langJS->setShortname("js");
        $langJS->setFullname("Javascript");
        $manager->persist($langJS);

        $langTS = new Language();
        $langTS->setShortname("ts");
        $langTS->setFullname("Typescript");
        $manager->persist($langTS);

        $langJAVA = new Language();
        $langJAVA->setShortname("java");
        $langJAVA->setFullname("Java");
        $manager->persist($langJAVA);

        $langCS = new Language();
        $langCS->setShortname("cs");
        $langCS->setFullname("C#");
        $manager->persist($langCS);

        $langSQL = new Language();
        $langSQL->setShortname("sql");
        $langSQL->setFullname("SQL");
        $manager->persist($langSQL);

        //===========================================================

        $code1 = new Code();
        $code1->setTitle("Hello World");
        $code1->setDescription("The famous Helloworld in C++.");
        $code1->setContent("#include <iostream>\n\nint main() {\n    std::cout << \"Hello World!\";\n    return 0;\n}");
        $code1->setCreationDate(new DateTime());
        $code1->setLanguage($langCPP);
        $manager->persist($code1);

        $code2 = new Code();
        $code2->setTitle("Foreach Loop");
        $code2->setDescription("A simple foreach example.");
        $code2->setContent("<?php\n\nforeach (\$array as \$key => \$value) {\n    echo \"\$key : \$value.\\n\";\n}");
        $code2->setCreationDate(new DateTime());
        $code2->setLanguage($langPHP);
        $manager->persist($code2);

        $code3 = new Code();
        $code3->setTitle("Check os version");
        $code3->setDescription("The easy way to check you os version.");
        $code3->setContent("$ cat /etc/os-release");
        $code3->setCreationDate(new DateTime());
        $code3->setLanguage($langSH);
        $manager->persist($code3);

        $code4 = new Code();
        $code4->setTitle("Bubble Sort");
        $code4->setDescription("Implementation of Bubble Sort - O(n²).");
        $code4->setContent("def bubbleSort(arr):\n    n = len(arr)\n    for i in range(n):\n        for j in range(0, n-i-1):\n            if arr[j] > arr[j+1] :\n                arr[j], arr[j+1] = arr[j+1], arr[j]\n    return arr");
        $code4->setCreationDate(new DateTime());
        $code4->setLanguage($langPY);
        $manager->persist($code4);

        $code5 = new Code();
        $code5->setTitle("Async function");
        $code5->setDescription("A delayed call in javascript.");
        $code5->setContent("function delayedFunction() {\n    alert('Hello');\n}\nsetTimeout(delayedFunction, 3000);");
        $code5->setCreationDate(new DateTime());
        $code5->setLanguage($langJS);
        $manager->persist($code5);

        $code6 = new Code();
        $code6->setTitle("Interface definition");
        $code6->setDescription("Simple interface definition.");
        $code6->setContent("interface Person {\n    fullName: string;\n    toString();\n}");
        $code6->setCreationDate(new DateTime());
        $code6->setLanguage($langTS);
        $manager->persist($code6);

        $code7 = new Code();
        $code7->setTitle("Simple Thread");
        $code7->setDescription("A basic thread implementation.");
        $code7->setContent("public class MyThread extends Thread {\n    public void run(){\n        System.out.println(\"MyThread running\");\n    }\n}\n    \nMyThread myThread = new MyThread();\nmyTread.start();");
        $code7->setCreationDate(new DateTime());
        $code7->setLanguage($langJAVA);
        $manager->persist($code7);

        $code8 = new Code();
        $code8->setTitle("Properties definition");
        $code8->setDescription("How to define properties.");
        $code8->setContent("public class SaleItem\n{\n   public string Name { get; set; }\n   public decimal Price { get; set; }\n}");
        $code8->setCreationDate(new DateTime());
        $code8->setLanguage($langCS);
        $manager->persist($code8);

        $code9 = new Code();
        $code9->setTitle("Group by Query");
        $code9->setDescription("Group by example.");
        $code9->setContent("SELECT SUBJECT, YEAR, Count(*)\nFROM Student\nGROUP BY SUBJECT, YEAR;");
        $code9->setCreationDate(new DateTime());
        $code9->setLanguage($langSQL);
        $manager->persist($code9);

        $manager->flush();
    }
}
