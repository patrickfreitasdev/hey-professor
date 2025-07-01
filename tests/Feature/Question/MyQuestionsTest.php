<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, get};

it('should be able to list questions created by me', function () {

    $wrongUser     = User::factory()->create();
    $wrongQuestion = Question::factory()
        ->for($wrongUser, 'createdBy')
        ->count(10)->create();

    $user      = User::factory()->create();
    $questions = Question::factory()
        ->for($user, 'createdBy')
        ->count(10)->create();

    actingAs($user);

    $response = get(route('question.index'));

    /** @var Question $q */
    foreach ($questions as $q) {
        $response->assertSee($q->getAttributeValue('question'));
    }

    /** @var Question $q */
    foreach ($wrongQuestion as $q) {
        $response->assertDontSee($q->getAttributeValue('question'));
    }

});
