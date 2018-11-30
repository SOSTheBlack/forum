<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use function factory;

/**
 * Class ThreadTest.
 *
 * @package Tests\Unit
 */
class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/
    public function a_thread_has_replies()
    {
        $thread = factory('App\Thread')->create();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $thread->replies);
    }

    /** @test **/
    public function a_thread_has_a_creator()
    {
        $thread = factory(\App\Thread::class)->create();

        $this->assertInstanceOf(\App\User::class, $thread->creator);
    }
}
