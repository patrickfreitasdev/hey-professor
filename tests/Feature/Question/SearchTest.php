<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, get};

it("should be able to search for question by text", function () {

    //Arrange
    $user = User::factory()->create();
    actingAs($user);

    Question::factory()->create([
        'question' => 'Something else?',
    ]);

    Question::factory()->create([
        'question' => 'Is it my question?',
    ]);

    // Act
    $response = get(route('dashboard', [
        'search' => 'question',
    ]));

    // Assert
    $response->assertSee('Is it my question?');
    $response->assertDontSee('Something else?');

});
