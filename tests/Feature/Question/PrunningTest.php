<?php

use App\Models\Question;

use function Pest\Laravel\{artisan, assertDatabaseMissing, assertSoftDeleted};

it("Should prune records deleted more than one month", function () {

    $question = Question::factory()->create(['deleted_at' => now()->subMonth(2)]);
    assertSoftDeleted('questions', ['id' => $question->id]);

    artisan('model:prune');

    assertDatabaseMissing('questions', ['id' => $question->id]);

});
