# u04-todo-app-Ludvigpbf

## Vad är det?

Det här är en app där man kan lägga till uppgifter som ska göras. Man kan skapa, läsa, uppdatera och radera uppgifter. Det går även att kopiera uppgifter samt byta färgtema i appen.

För att sätta igång appen skriver man in:
localhost:8080
där man skriver in användarnamnet och lösenordet som finns i docker-compose.yml filen. Återskapa sedan databasen genom att skriva in i sql, kommandona som finns i db.sql filen.

Gå sedan till sidan: localhost/index.php.

Nu är det bara att tuta och köra. Börja lägga in uppgifter och markera dom som färdiga när dom är gjorda.

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
