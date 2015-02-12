## Welcome to TODOParrot

TODOParrot ([http://todoparrot.com](http://todoparrot.com)) is the companion project to the book, *Easy Laravel 5* ([http://easylaravelbook.com](http://easylaravelbook.com)), written by bestselling author [W. Jason Gilmore](http://wjgilmore.com). Feel free to use this companion project as a learning aide; further, the book goes into great detail about many of the features found in this application. You can purchase it via [EasyLaravelBook.com](http://easylaravelbook.com), and receive free updates for life!

### Useful Features for Laravel Newbies 

If you're new to Laravel I suggest paying particular attention to the following features:

* Blade Templating: A simple master layout is used to wrap the application (`resources/views/layouts/master.blade.php`). Nothing particularly advanced here but a useful example nonetheless.
* Model Relations: TODOParrot users can have many lists, and each list can have many tasks. These relations have been integrated into the `User`, `Task`, and `Todolist` models.
* Forms Integration: The new Laravel 5 Form Request feature is used for creating new lists and tasks. Check out for instance how the `app/Http/Controllers/ListsController.php`, `app/Http/Requests/ListCreateFormRequest.php`, and `resources/views/lists/create.blade.php` files work together to add a new list to the database.
* Eloquent: The eloquent ORM is used to query and manage database data.
* Model methods: I added a few helper methods to models to cut down on redundant code. For instance, the `Todolist` model includes a `remainingTasks` method used to easily determine how many incomplete tasks remain for a given list.
* User Authentication: TODOParrot uses the sweet new Laravel 5 authentication features. Users can create a new account, sign in, sign out, and recover their password.
* Unit Testing: You'll find a few simple test-related examples in the `tests` directory.
* Bootstrap Integration: TODOParrot uses the Bootstrap framework and a modified [Bootswatch](http://bootswatch.com/) theme.
 
### TODOParrot is Not Production Ready

TODOParrot is *not a finished product*! I've been using the project as a testing ground for the various Laravel 5 features while writing *Easy Laravel 5*. Now that the book is published I've spent the last two days completely rewriting the code from the ground up. Future versions will include:

* Less integration with Elixir: In the interests of time I just pushed my pre-existing Bootswatch template directly into `public/css`. Definitely want to take advantage of Elixir.
* Route model binding: Route model binding is a much cleaner way to handle boilerplate tasks.
* Much more testing: Plenty to do here
* Additional account features: Account confirmation and password recovery, to name a few features.
* User preferences: I'd like to add some simple customization capabilities such as e-mail notification when a task date expires.
* An administration console: The console would allow administrators to view all user accounts and lists.
* E-mail task due date reminders: Would e-mail users when a task due date nears.

### Installing TODOParrot

To install TODOParrot you can clone the repository:

    $ git clone https://github.com/wjgilmore/todoparrot.git 

Or if you're not familiar with Git (you really should [learn](https://try.github.io)), you can [download the zip file](https://github.com/wjgilmore/todoparrot/archive/master.zip). After downloading the file, unzip it to a convenient location.

Next, enter the project's root directory and update the project dependencies:

    $ composer update

Next, configure your database (`config/database.php`). See Chapter 3 for more details about database configuration. Once complete, create the database and then run the migrations:

	$ php artisan migrate

Next, seed the database:

	$ php artisan db:seed

Finally, fire up the PHP development server (`php artisan serve`) or navigate to the appropriate Homestead URL and play around with the application!

I'm still working on the unit tests however several are already in place. You can run them by executing the following command from the project root directory:

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

