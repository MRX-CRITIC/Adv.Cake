<?php
require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\TechnicalTask;

class UnitTest extends TestCase
{

    public function testUpsideDownWords()
    {
        $this->assertEquals('Tac', TechnicalTask::upsideDownWords('Cat'));
        $this->assertEquals('tnAhPele', TechnicalTask::upsideDownWords('elEpHant'));
        $this->assertEquals('tac,', TechnicalTask::upsideDownWords('cat,'));
        $this->assertEquals('Амиз:', TechnicalTask::upsideDownWords('Зима:'));
        $this->assertEquals("si 'dloc' won", TechnicalTask::upsideDownWords("is 'cold' now"));
        $this->assertEquals('отэ «Кат» "отсорп"', TechnicalTask::upsideDownWords('это «Так» "просто"'));
        $this->assertEquals('driht-trap', TechnicalTask::upsideDownWords('third-part'));
        $this->assertEquals('nac`t', TechnicalTask::upsideDownWords('can`t'));
    }

}

