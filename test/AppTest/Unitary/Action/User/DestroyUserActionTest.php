<?php

declare(strict_types=1);

namespace AppTest\Unitary\Action\User;

use App\Action\User\DestroyUserAction;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Faker\Factory as Faker;

class DestroyUserActionTest extends TestCase
{
    /** @var DestroyUserAction */
    private $action;

    /** @var Generator */
    private $faker;

    protected function setUp()
    {
        $this->action = $this->getMockBuilder(DestroyUserAction::class)
            ->disableOriginalConstructor()
            ->setMethods(['action'])
            ->getMock();

        $this->faker = Faker::create();
    }

    /**
     * Teste de ação de deleção de usuário
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Exception\InvalidArgumentException
     */
    public function testActionDestroyUserAction()
    {
        $id = $this->faker->randomDigit();

        $this->action->method('action')
            ->willReturn(true);

        $delete = $this->action->action($id);

        $this->assertInternalType('boolean', $delete);
        $this->assertTrue($delete);
    }

    /**
     * Testa retorno falso na ação de deleção de usuário
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Exception\InvalidArgumentException
     */
    public function testActionDestroyUserActionReturnFalse()
    {
        $id = $this->faker->randomDigit();

        $this->action->method('action')
            ->willReturn(false);

        $delete = $this->action->action($id);

        $this->assertInternalType('boolean', $delete);
        $this->assertFalse($delete);
    }

    /**
     * @expectedException \Exception
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Exception\InvalidArgumentException
     */
    public function testActionDestroyUserActionReturnException()
    {
        $id = $this->faker->randomDigit();

        $this->action->method('action')
            ->will($this->throwException(new \Exception));

        $this->action->action($id);
    }
}