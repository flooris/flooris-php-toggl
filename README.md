# PHP-Toggl
PHP library for the [Toggl Timetracker](https://toggl.com)  API (v8)

## Getting Started
### Composer (recommended)
`composer require flooris/php-toggl`

### Download
Download the zip or `git clone git@github.com:flooris/php-toggl.git`

**Dependencies:** PHP >= 5.5.9 and [Guzzle](https://github.com/guzzle/guzzle) >=6.2

### Example:
```php
$toggl = new Toggl($api_key)
$toggl->startTimer($data);
```


## Methods
### Clients
```php
$toggl->getClients($id);
```
```php
$toggl->getClientProjects($id);
```
```php
$toggl->saveClient($id, $data);
```
```php
$toggl->deleteClient($id);
```

### Dashboard
```php
$toggl->getDashboard($workspace_id);
```

### Me
```php
$toggl->getMe();
```
```php
$toggl->saveMe($data);
```
```php
$toggl->resetApiKey();
```

### Projects
```php
$toggl->getProject($id);
```
```php
$toggl->getProjectTasks($id);
```
```php
$toggl->saveProject($id, $data);
```
```php
$toggl->deleteProject($id);
```
```php
$toggl->getProjectUsers($project_id);
```
```php
$toggl->saveProjectUser($id, $data);
```
```php
$toggl->deleteProjectUser($id);
```

### Tags
```php
$toggl->saveTag($id, $data);
```
```php
$toggl->deleteTag($id);
```

### Tasks
```php
$toggl->getTask($id);
```
```php
$toggl->saveTask($id, $data);
```
```php
$toggl->deleteTask($id);
```

### Time Entries
```php
$toggl->getTimeEntry($id);
```
```php
$toggl->getTimer();
```
```php
$toggl->saveTimeEntry($id, $data, $start_timer);
```
```php
$toggl->startTimer($data);
```
```php
$toggl->stopTimer($id);
```

### Users
```php
$toggl->createUser($data);
```

### Workspaces
```php
$toggl->getWorkspaces($id);
```
```php
$toggl->getWorkspaceUsers($id);
```
```php
$toggl->getWorkspaceClients($id);
```
```php
$toggl->getWorkspaceProjects($id);
```
```php
$toggl->getWorkspaceTasks($id);
```
```php
$toggl->getWorkspaceTags($id);
```
```php
$toggl->updateWorkspace($id, $data);
```

### Workspace Users
```php
$toggl->inviteUsers($id, $email);
```
```php
$toggl->deleteWorkspaceUser($id);
```


