<?php

use App\Models\User;

use function Pest\Laravel\{actingAs, assertDatabaseCount, assertDatabaseHas, post};

it("should be able to create a new question bigger than 255 characters", function () {

    //AAA

    // Arrange
    $user = User::factory()->create();
    actingAs($user);

    // Act

    $request = post(route('question.store'), [
        'question' => str_repeat('*', 260) . '?',
    ]);

    // Assert
    $request->assertRedirect();
    assertDatabaseCount('questions', 1);
    assertDatabaseHas('questions', [
        'question' => str_repeat('*', 260) . '?',
    ]);

});

it("should check if ends with a question mark", function () {

    // Arrange
    $user = User::factory()->create();
    actingAs($user);

    // Act
    $request = post(route('question.store'), [
        'question' => str_repeat('*', 8) . '?',
    ]);

    // Assert
    $request->assertSessionHasErrors(['question' => __('validation.min.string', ['min' => 10, 'attribute' => 'question'])]);
    assertDatabaseCount('questions', 0);

});

it("Should be have at least 10 characters", function () {

    // Arrange
    $user = User::factory()->create();
    actingAs($user);

    // Act
    $request = post(route('question.store'), [
        'question' => str_repeat('*', 10),
    ]);

    // Assert
    $request->assertSessionHasErrors(['question' => 'Are you sure that is a question? It is missing the question mark in the end.']);
    assertDatabaseCount('questions', 0);

});

it("Should create as draft all the time", function () {

    // Arrange
    $user = User::factory()->create();
    actingAs($user);

    // Act

    $request = post(route('question.store'), [
        'question' => str_repeat('*', 260) . '?',
    ]);

    // assert
    assertDatabaseHas('questions', ['question' => str_repeat('*', 260) . '?', 'draft' => true, ]);

});

test("Only authenticated user can create a new question", function () {

    post(route('question.store'), [
        'question' => str_repeat('*', 8) . '?',
    ])->assertRedirect(route('login'));

});
