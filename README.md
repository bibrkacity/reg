<h1>Test task</h1>

## Installation

- Clone repository from [https://github.com/bibrkacity/reg.git](https://github.com/bibrkacity/reg.git).
- Save **/.env.example** as **/.env**
- Edit **/.env** - write your parameters of MySQL connection
- Run composer.update
- Run migrations **php artisan migrate**
- Run **php artisan serve**
- Go to [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser
- Enjoy!
 
## Task contents
1) On the main page, you need to display a registration form with the following fields: Username, Phone number and the Register button.

   After the user has filled in the fields and pressed the Register button, the following happens: The user receives a generated unique link to a special page (page A), access to which will be available via a unique link for 7 days. After the time expires, the link becomes invalid.
2) Page A functionality:

    Ability to generate a new unique link

    Possibility to deactivate this unique link

    Im feeling lucky button
 
    History button

    By clicking on the "Im feeling lucky" button, the user is displayed:
 
    Random number from 1 to 1000. Win/Lose result. Amount won (0 if lost)
 
    If the random number is even, display the Win result to the user. Otherwise, the result is Lose.

    Amount Win. If the random number is over 900, the winning amount must be 70% of the random number. If the random number is over 600, the winning amount must be 50% of the random number. If the random number is more than 300, the winning amount must be 30% of the random number. If the random number is less than 300, the winning amount must be 10% of the random number.
   
   By clicking on the "History" button, the user will see:

    Information about the last 3 results of clicking on the "Im feeling lucky" button

3) Administrative part of the application (optional)
   Add the ability to create, view, edit, delete users

