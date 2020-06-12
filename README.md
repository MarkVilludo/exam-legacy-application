## Pictureworks Laravel Coding  Test

- Create database name legacy_application in MySql
- Edit .env file and put database name in "database=legacy_application"
- Open terminal or Command prommpt.
- Run the migration "php artisan migrate"
- Run the database seeder "php artisan db:seed"
- Serve application by "php artisan serve"
- Index page will redirect to users
- In user have view functions to view the layout provided by the exam and dyamic data from the database seeder

How to Import Json collection and enviroment in Postman
-------------------

- Open postman and import the collection and enviroment json file in the the root folder of the project > Exported Collection API's the ff file shows.


Functionalities
-------------------
- User List
- User Show Details
- User Add
- User Update

Functionality to be Ported
-------------------
1. GET requests with URL parameters "?id=X" should return the existing styled HTML for some user with id "X". All input must be validated.
2. POST requests with form fields "password", "id" and "comments" will append the value of 'comments' to the existing comments field of user with identifier 'id' provided the 'password' is a given static value. All input must be validated.
3. POST requests with a JSON object containing "password", "id" and "comments" will do exactly the same as (2) above. All input must be validated.
4. Command line executions such as "php controller.php ID COMMENTS" will essentially do the same as (2) above, too, where "ID" is the user identifier and "COMMENTS" is some amount of comments, potentially with spaces. No password is required for this execution type. All input must be validated. Hint: behavior should be ported over to Artisan console commands.
5. Parts 1-4 above should be ported with expected functionality using native Laravel behavior (e.g. url “?id=x” should be available via "/user/{id}").
6. Migrations must be provided. Seeders must be provided. And .env.example file should be filled in with the relevant info.
7. Documentation must list all the routes implemented, params and what they do. 

<b>As a general overarching rule: regardless of access method, as long as your code has the exact same input and output as the legacy app, you have done the right thing.</b>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).