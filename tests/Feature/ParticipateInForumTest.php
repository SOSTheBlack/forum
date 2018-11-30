<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class ParticipateInForum.
 *
 * @package Tests\Feature
 */
class ParticipateInForumTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_aunthenticated_user_may_prticipate_in_forum_threads()
    {
        $user = factory(\App\User::class)->create();
        $this->be($user);

        $thread = factory(\App\Thread::class)->create(['user_id' => $user->id]);

        $reply = factory(\App\Reply::class)->make();
        $this->post('/threads/' . $thread->id . '/replies', $reply->toArray());

//        $this->get($thread->path())
//            ->assertSee($reply->body);
    }
}
