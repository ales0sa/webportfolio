<?php

namespace Ales0sa\WebPortfolio\Tests\Feature;

use Ales0sa\WebPortfolio\Tests\TestCase;
use Ales0sa\WebPortfolio\Webs;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class WebsTest extends TestCase
{
    use DatabaseMigrations;

    public function create_webs($args = [], $num = null)
    {
        return factory(Webs::class, $num)->create($args);
    }

    /** @test */
    public function api_can_give_all_webs()
    {
        $this->create_webs();
        $this->getJson(route('webs.index'))->assertOk()->assertJsonStructure(['data']);
    }

    /** @test */
    public function api_can_give_single_webs()
    {
        $webs = $this->create_webs();
        $this->getJson(route('webs.show', $webs->id))->assertJsonStructure(['data']);
    }

    /** @test */
    public function api_can_store_new_webs()
    {
        $webs = factory(Webs::class)->make(['title'=>'Laravel']);
        $this->postJson(route('webs.store'), $webs->toArray())
        ->assertStatus(201);
        $this->assertDatabaseHas('webs', ['title'=>'Laravel']);
    }

    /** @test */
    public function api_can_update_webs()
    {
        $webs = $this->create_webs();
        $this->putJson(route('webs.update', $webs->id), ['title'=>'UpdatedValue'])
        ->assertStatus(202);
        $this->assertDatabaseHas('webs', ['title'=>'UpdatedValue']);
    }

    /** @test */
    public function api_can_delete_webs()
    {
        $webs = $this->create_webs();
        $this->deleteJson(route('webs.destroy', $webs->id))->assertStatus(204);
        $this->assertDatabaseMissing('webs', ['title'=>$webs->title]);
    }
}
