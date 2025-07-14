<?php

use App\Models\{Question, User};
use Illuminate\Pagination\LengthAwarePaginator;

use function Pest\Laravel\{actingAs, get};

it("Should list all the questions", function () {

    //Arrange
    $user = User::factory()->create();
    actingAs($user);

    $questions = Question::factory()->count(5)->create();

    // Act
    $response = get('dashboard');

    // Assert

    /** @var Question $q */
    foreach ($questions as $q) {
        $response->assertSee($q->getAttributeValue('question'));
    }

});

it("Should paginate the result", function () {

    $user = User::factory()->create();
    actingAs($user);

    Question::factory()->count(20)->create();

    get('dashboard')->assertViewHas('questions', function ($value) {
        return $value instanceof LengthAwarePaginator;
    });

});

it("should order by like and unlike, most liked question should be at the top, most unliked questions should be in the bottom", function () {

    $user       = User::factory()->create();
    $secondUser = User::factory()->create();
    actingAs($user);

    Question::factory()->count(5)->create();

    $mostLikedQuestion   = Question::find(3);
    $mostUnlikedQuestion = Question::find(1);

    $user->like($mostLikedQuestion);
    $secondUser->unlike($mostUnlikedQuestion);

    get('dashboard')->assertViewHas('questions', function ($questions) use ($mostLikedQuestion, $mostUnlikedQuestion) {

        expect($questions)->first()->id->toBe(3)
            ->and($questions)->last()->id->toBe(1);

        return true;
    });

});
