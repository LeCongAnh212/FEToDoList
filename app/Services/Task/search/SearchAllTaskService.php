<?php

namespace App\Services\Task\search;

use App\Interfaces\Task\SearchTaskRepositoryInterface;
use App\Interfaces\Task\TaskRepositoryInterface;
use App\Services\BaseService;
use Illuminate\Support\Facades\Log;

class SearchAllTaskService extends BaseService
{
    protected $taskRepository;

    public function __construct(SearchTaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function handle()
    {
        try {
            return $this->taskRepository->searchAllTask($this->data);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return false;
        }
    }
}
