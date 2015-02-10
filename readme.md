## Welcome to TODOParrot

TODOParrot ([http://todoparrot.com](http://todoparrot.com)) is the companion project to the book, *Easy Laravel 5* ([http://easylaravelbook.com](http://easylaravelbook.com)), written by bestselling author [W. Jason Gilmore](http://wjgilmore.com). Feel free to use this companion project as a learning aide; if you'd like to additionally take advantage of the book now you purchase it via [EasyLaravelBook.com](http://easylaravelbook.com), and receive free updates for life!

* Blade Templating: A simple master layout is used. Nothing new here but a useful example for Laravel newbies.
* Model Relations: TODOParrot users can have many lists, and each list can have many tasks. These relations have been integrated into the models.
* Forms Integration: The new Laravel 5 Form Request feature is used for creating new lists and tasks. 
* Database Queries: The various implemented queries are pretty basic but should provide Laravel newcomers with a few useful examples.
* User Authentication: TODOParrot uses the new Laravel 5 authentication generator.
* Unit Testing: Some simple test-related examples.
* Bootstrap Integration: Because I can't even write my own name legibly let alone design a nice website, TODOParrot uses the Bootstrap framework.

TODOParrot is *not a finished product*! I work on the project in conjunction with the examples found in the book.

In the coming days I'll continue to improve TODOParrot as I continue writing and refining the book. In particular I plan on demonstrating the following features:

* Improved form workflow: Streamlining of the form validation process.
* Database seeding: I'll provide some sample account and list data so you can experiment using a realistic data set. 
* Much more testing: Plenty to do here
* Additional account features: Account confirmation and password recovery, to name a few features.
* List/task editing: Currently users can only create lists and create/modify tasks. In the very near future I'll add list and task deletion.
* User preferences: I'd like to add some simple customization capabilities such as e-mail notification when a task date expires.
* An administration console: The console would allow administrators to view all user accounts and lists.

### Installing TODOParrot

To install TODOParrot you can clone the repository:

    $ git clone https://github.com/wjgilmore/todoparrot.git 

Or if you're not familiar with Git (you really should [learn](https://try.github.io)), you can [download the zip file](https://github.com/wjgilmore/todoparrot/archive/master.zip). After downloading the file, unzip it to a convenient location.

Next, enter the project's root directory and update the project dependencies:

    $ composer update

Once complete, fire up the Laravel development server:

    $ php artisan serve

I'm still working on the unit tests however several are already in place. You can run them by executing the following command from the project root directory:

    $ vendor/bin/phpunit

### License

TODOParrot is licensed under the [MIT license](http://opensource.org/licenses/MIT). If you find something wrong with the code or think it could be improved, I welcome you to [create an issue](https://github.com/wjgilmore/todoparrot/issues) or submit a pull request!

The home page image is copyright 2014 W. Jason Gilmore (wj@wjgilmore.com). It may not be used for any purpose without express written permission from its copyright holder. Also, please do not use the name TODOParrot. I kind of like it.

