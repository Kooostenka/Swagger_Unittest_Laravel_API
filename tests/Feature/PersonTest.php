<?php

namespace Tests\Feature;

use App\Models\Person;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PersonTest extends TestCase
{
    private $path = 'api/person';

    public function test_create_person()
    {
        $person = Person::factory()->make();

        $this->postJson($this->path, $person->toArray())->assertOk();

    }

    public function test_show_person()
    {
        $person = Person::factory()->create();
        $this->getJson($this->path . '/'. $person->id)
            ->assertOk();
    }

    public function test_update_person()
    {
        $person = Person::factory()->create();
        $newDataPerson = Person::factory()->make();

        $this->putJson($this->path .'/'. $person->id, $newDataPerson->toArray())
            ->assertOk();

    }

    public function test_list_person()
    {
        Person::factory()->count(10)->create();
        $this->get($this->path)->assertOk();

    }

    public function test_delete_person()
    {
        $person = Person::factory()->create();
        $this->delete($this->path . '/' . $person->getRouteKey())
            ->assertOk();
    }
}
