<?php

it("should be able to create a new question bigger than 10 characters", function () {

    //AAA

    // Arrange
    $user = \App\Models\User::factory()->create();
    \Pest\Laravel\actingAs($user);

    // Act

    $request = \Pest\Laravel\post(route('question.store'), [
        'question' => str_repeat('*', 260) . '?',
    ]);

    // Assert
    $request->assertRedirect(route('dashboard'));
    \Pest\Laravel\assertDatabaseCount('questions', 1);
    \Pest\Laravel\assertDatabaseHas('questions', [
        'question' => str_repeat('*', 260) . '?',
    ]);

});

it("should check if ends with a question mark", function () {

});

it("Should be have at least 10 characters", function () {

});
