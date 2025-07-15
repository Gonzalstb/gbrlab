namespace App\Services;

use App\Models\Task;
use App\Models\User;
use App\Mail\TaskAssigned;
use Illuminate\Support\Facades\Mail;

class TaskService
{
    public function createTask(array $data, User $assigner): Task
    {
        $task = Task::create($data);
        $assignedUser = User::find($task->assigned_to);
        if ($assignedUser) {
            Mail::to($assignedUser->email)->send(new TaskAssigned($task, $assigner));
        }
        return $task;
    }
}
