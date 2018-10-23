<?php

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class ThreadTest
 *
 * @package Tests\Feature
 */
class ReadThreadTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var \App\Thread
     */
    private $thread;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->thread = factory(Thread::class)->create();
    }

    /** @test */
    public function testBasicTest()
    {
        $this->get('/threads')
            ->assertStatus(200)->assertSeeText($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_a_single_thread()
    {
        $this->get($this->thread->patch())
            ->assertStatus(200)->assertSeeText($this->thread->title);
    }
    
    /** @test */
    public function a_user_can_read_replies_that_are_associated_with_a_thread()
    {
        $reply = factory(Reply::class)
            ->create(['thread_id' => $this->thread->id]);

        $this->get($this->thread->patch())
            ->assertSee($reply->body);
    }
}
