<?php

namespace Ales0sa\WebPortfolio\Tests\Unit;

use Ales0sa\WebPortfolio\Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class WebsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
public function it_belongs_to_user()
{
    $user = factory(\Ales0sa\WebPortfolio\User::class)->create();
    $Webs  = factory(\Ales0sa\WebPortfolio\Webs::class)->create(['user_id' => $user->id]);
    $this->assertInstanceOf(\Ales0sa\WebPortfolio\User::class, $Webs->user);
}
}
