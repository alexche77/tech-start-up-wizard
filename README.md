# Tech Start-up Builder

Trello board: https://trello.com/b/bQmJinMK/tech-startup-rooster

## Vision:

Do you have an awesome start up idea that you want to build up and need help figuring out the dream team?

No worries, we can help you out, just answer a couple of questions, and we will do some magic using torre.co awesome API.

Basically we will put together all the team, taking in consideration all the answers you gave us when you created the 
startup.

Powered by Torre.co

----

### Devlog?

Day 1: 
Recieved the email and I could not believe how hard this test was going to be, because I had to come with something up.
I did not want to do the usual stuff, a search, a job listing app, I wanted to give it a little more fun.

So the idea is simple, given a couple of parameters that the user specifies when entering the startup details, we go
and use the torre.co api to search for best coincidences, the final idea would have a better ui, seed capital vs actual cost 
based on the MVP deliverable date, etc.

Day 2: 

After some sleep, I bootstrapped the project with laravel, I did not think I had enough time to execute with frontend
backend approach, so I went full SSR.

I started setting up a simple trello board: https://trello.com/b/bQmJinMK/tech-startup-rooster

Also did some wireframes to decide the layout.

Progress was slow, since I had a busy day.
Night arrived, and I was thinking to myself: Maybe I should use a frontend framework, it will be easier to make some dynamic
changes to the UI with Vue. I started a vue project but could not decide on what UI library to use, and I went into *that* rabbit hole,
where you have too much to choose from.

After a couple of hours, I gave up on the frontend because I realized I would not have much time..

So I went back to laravel + alpine js for the front end...

At the end of Day 2, I had my database structure clear, It is simple, just the startup table and a couple of tables that will
help the search logic to be more accurate given predefiend values (seeder)

Day 3:

Alpine JS on front end is good enough for what I wanted to do, validations, dynamic content, etc.
I wanted to implement the "search" logic, that will trigger every time a startup was created, this logic will go to 
torre.co api, and query it based on the answers of the user, so for example if the user said that the MVP contained a mobile and web app, we would go
and look for mobile devs and backend devs to torre.co, and pick the top 10 results, store them and show them.

Also, this day was the deployment day. 

I installed docker on a droplet, and ran it with the dev server and docker, that's why it is slow, but I don't have enough time to set it up 
as it should.



