# u04-todo-app-Ludvigpbf

## What is it?

This is an app where you can add tasks to be done. You can create, read, update and delete information. It is also possible to copy data and change the color theme in the app.

## Getting Started

1. Clone the repo from github to your computer.
2. Then create a devcontainer by opening the folder with the project in VS code.
3. Go into the terminal in VS code and type `docker-compose up`
4. Recreate the database using the username and password found in the
   docker-compose. yml file and then run the sql commands found in the _db.sql_ file.
5. Then go to the _localhost/index.php_ page in the browser.
6. Now you are good to go. Start entering tasks and mark them as complete when they are done.

## What functions do i need?

Each **task** must have:

1. A unique id
2. A title
3. A task text
4. Completion marking (if the task is complete)

The **user** should be able to:

1. Show all data
2. Add a task
3. Change a task
4. Delete a task
5. Mark a task as complete
6. Mark all tasks

The **app** should:

1. Save all changes in the database

"Nice to have"-functions:

1. Change color-theme
2. Copy tasks

## Design

- Subtle colors:
  - Purple: rgba(174,156,214)
  - Pink: rgba(225, 138, 170)
  - Grey: rgba(156,171,212)
  - Green: rgba(183, 233, 193)
  - Blue: rgba( 167, 199, 231)
  * Dark: rgba( 49,69,69)

* "Cards"-view (assets/inspo/inspo-2 & assets/inspo/inspo-4)
