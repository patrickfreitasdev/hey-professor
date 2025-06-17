<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, assertDatabaseHas, post};

it("Should be able to like a question", function () {

    //Arrange
    $user = User::factory()->create();
    actingAs($user);

    $question = Question::factory()->create();

    // Acting
    post(route('question.like', $question))->assertRedirect();

    // Assert
    assertDatabaseHas('votes', [
        'question_id' => $question->id,
        'like'        => 1,
        'unlike'      => 0,
        'user_id'     => $user->id,
    ]);

});

it("Should not be able to like more than one time", function () {

    //Arrange
    $user = User::factory()->create();
    actingAs($user);

    $question = Question::factory()->create();

    // Acting
    post(route('question.like', $question));
    post(route('question.like', $question));
    post(route('question.like', $question));
    post(route('question.like', $question));

    expect($user->votes()->where('question_id', '=', $question->id)->count())->toBe(1);

});
