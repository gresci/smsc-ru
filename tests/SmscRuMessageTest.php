<?php

namespace NotificationChannels\SmscRu\Test;

use Orchestra\Testbench\TestCase;
use NotificationChannels\SmscRu\SmscRuMessage;

class SmscRuMessageTest extends TestCase
{
    /** @test */
    public function it_can_accept_a_content_when_constructing_a_message()
    {
        $message = new SmscRuMessage('hello');

        $this->assertEquals('hello', $message->content);
    }

    /** @test */
    public function it_can_accept_a_content_when_creating_a_message()
    {
        $message = SmscRuMessage::create('hello');

        $this->assertEquals('hello', $message->content);
    }

    /** @test */
    public function it_can_set_the_content()
    {
        $message = (new SmscRuMessage())->content('hello');

        $this->assertEquals('hello', $message->content);
    }

    /** @test */
    public function it_can_set_the_from()
    {
        $message = (new SmscRuMessage())->from('John_Doe');

        $this->assertEquals('John_Doe', $message->from);
    }

    /** @test */
    public function it_can_convert_self_to_array()
    {
        $message = (new SmscRuMessage())->content('hello')->from('John_Doe');

        $params = $message->toArray();

        $this->assertArraySubset($params, [
            'charset' => 'utf-8',
            'sender'  => 'John_Doe',
            'mes'     => 'hello',
        ]);
    }
}