<?php

namespace App\Traits;

trait ModelHelpers{

    // Helper function for the @can inside thread.blade.php, to check if thread belongs to user
    public function matches(self $model): bool{
        return $this->id() === $model-> id();
    }

}
