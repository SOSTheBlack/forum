<?php

namespace Tests\Feature;

use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class ThreadTest
 *
 * @package Tests\Feature
 */
class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function testBasicTest()
    {
        $thread = factory(Thread::class)->create();

        $response = $this->get('/threads');
        $response->assertStatus(200)->assertSeeText($thread->title);

        $response = $this->get('/threads/' . $thread->id);
        $response->assertSeeText($thread->title);
    }
}
