## Welcome to TODOParrot

TODOParrot ([http://www.todoparrot.com](http://www.todoparrot.com)) is the companion project to the book, *Easy Laravel 5* ([http://easylaravelbook.com](http://easylaravelbook.com)), written by bestselling author [W. Jason Gilmore](http://wjgilmore.com). Feel free to use the TODOParrot code as a learning aide, and if you'd like to learn even more about Laravel head on over to [EasyLaravelBook.com](http://easylaravelbook.com) and find out what the book has to offer!

### Useful Features for Laravel Newbies

If you're new to Laravel consider paying particular attention to the following TODOParrot features:

* **Blade Templating**: A simple master layout is used to wrap the application (`resources/views/layouts/master.blade.php`). Nothing particularly advanced here but a useful example nonetheless.
* **Model Relations**: TODOParrot users can have many lists, and each list can have many tasks. These relations have been integrated into the `User`, `Task`, and `Todolist` models.
* **Forms Integration**: The new Laravel 5 Form Request feature is used for creating new lists and tasks. Check out for instance how the `app/Http/Controllers/ListsController.php`, `app/Http/Requests/ListCreateFormRequest.php`, and `resources/views/lists/create.blade.php` files work together to add a new list to the database.
* **Eloquent Integration**: The eloquent ORM is used to query and manage database data.
* **Database Seeding**: Inside `database/seeds` you'll find a working seed example involving the `Category` model. This model and corresponding table aren't actually used yet, but they exist and the `CategoryTableSeeder.php` demonstrates how to seed the table.
* **Model Methods**: I added a few helper methods to models to cut down on redundant code. For instance, the `Todolist` model includes a `remainingTasks` method used to easily determine how many incomplete tasks remain for a given list.
* **Custom Middleware**: The native `Authenticate` middleware is used in the application, as is a custom middleware named `ListOwnershipMiddleware.php`, which determines whether the current user is allowed to view and edit specified lists.
* **User Authentication**: TODOParrot uses the sweet new Laravel 5 authentication features. Users can create a new account, sign in, sign out, and recover their password.
* **Unit Testing**: You'll find a few simple test-related examples in the `tests` directory.
* **Bootstrap Integration**: TODOParrot uses the Bootstrap framework and a modified [Bootswatch](http://bootswatch.com/) theme.
 
### TODOParrot is a Work in Progress

As LinkedIn founder Reid Hoffman famously said, "If you are not embarrassed by the first version of your product, you've launched too late." TODOParrot was created solely with the intention of helping fellow developers get acquainted with Laravel 5 features and Laravel in general, so it's silly for me to not just release what's in place now because even if not finished there's still plenty to learn from.

Future versions will include:

* LESS Integration with Elixir: In the interests of time I just pushed my pre-existing Bootswatch template directly into `public/css`. Definitely want to take advantage of Elixir. NOTE: see [this starter project](http://www.easylaravelbook.com/projects/phpleaks/) for working example.
* Route Model Binding: Route model binding is a much cleaner way to handle boilerplate tasks.
* Much More Testing: Plenty to do here
* User Preferences: I'd like to add some simple customization capabilities such as e-mail notification when a task date expires.
* ~~An Administration Console: The console would allow administrators to view all user accounts and lists.~~ DONE!
* E-mail Task Reminders: Would e-mail users when a task due date nears using the command scheduler.
* A Command Bus Example: It would be cool to demonstrate how to create lists via e-mail.

### Installing TODOParrot

To install TODOParrot you can clone the repository:

    $ git clone https://github.com/wjgilmore/todoparrot.git 

Or if you're not familiar with Git (you really should [learn](https://try.github.io)), you can [download the zip file](https://github.com/wjgilmore/todoparrot/archive/master.zip). After downloading the file, unzip it to a convenient location.

Next, enter the project's root directory and install the project dependencies:

    $ composer install

Next, configure your database (`config/database.php`). See Chapter 3 for more details about database configuration. Once complete, create the database and then run the migrations:

	$ php artisan migrate

Next, seed the database:

	$ php artisan db:seed

Finally, fire up the PHP development server (`php artisan serve`) or navigate to the appropriate Homestead URL and play around with the application!

I'm still working on the unit tests however several are already in place. If you'd like to run the tests you should first create a test database and then assign that name to the `phpunit.xml` `DB_DATABASE` environment variable. You can run them by executing the following command from the project root directory:

    $ vendor/bin/phpunit

### Frequently Asked Questions

#### Why did you implement ______ this way?

I rebuilt the early test version of TODOParrot over two frenzied afternoons after finishing the book. Some of the code needs to be refactored and can be improved. But most of what you find in the code should nonetheless be pretty helpful in terms of learning more about Laravel.

#### Can I adopt the code for my own purposes?

Yep as long as you abide by the terms of the license.

#### Can I ask you questions?

Yep. E-mail me at wj@wjgilmore.com.

#### Do you offer book discounts?

Sometimes. To celebrate the availability of this companion project, I've embedded this easter egg here, good for 20% off the book when purchasing via Gumroad or Leanpub. Use the code `easteregg` when checking out to receive the discount. Head over to [http://easylaravelbook.com](http://easylaravelbook.com) for more information about the book and for purchase links.

#### Your code is just plain wrong

That doesn't surprise me one bit. Send me a pull request.

### License

TODOParrot is licensed under the [MIT license](http://opensource.org/licenses/MIT). If you find something wrong with the code or think it could be improved, I welcome you to [create an issue](https://github.com/wjgilmore/todoparrot/issues) or submit a pull request!

The home page image is copyright 2014 W. Jason Gilmore (wj@wjgilmore.com). It may not be used for any purpose without express written permission from its copyright holder. Also, please do not use the name TODOParrot. I kind of like it.

